#!/usr/bin/python3
#
# Copyright (c) 2013-2014 The Khronos Group Inc.
#
# Permission is hereby granted, free of charge, to any person obtaining a
# copy of this software and/or associated documentation files (the
# "Materials"), to deal in the Materials without restriction, including
# without limitation the rights to use, copy, modify, merge, publish,
# distribute, sublicense, and/or sell copies of the Materials, and to
# permit persons to whom the Materials are furnished to do so, subject to
# the following conditions:
#
# The above copyright notice and this permission notice shall be included
# in all copies or substantial portions of the Materials.
#
# THE MATERIALS ARE PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
# EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
# MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
# IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY
# CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT,
# TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE
# MATERIALS OR THE USE OR OTHER DEALINGS IN THE MATERIALS.

import io, os, re, string, sys;

if __name__ == '__main__':
    if (len(sys.argv) != 4):
        print('Usage:', sys.argv[0], ' gendir srcdir indexfile', file=sys.stderr)
        exit(1)
    else:
        gendir = sys.argv[1]
        srcdir = sys.argv[2]
        outfilename = sys.argv[3]
        # print(' gendir = ', gendir, ' srcdir = ', srcdir, 'outfilename = ', outfilename)
else:
    print('Unknown invocation mode', file=sys.stderr)
    exit(1)

# Various levels of indentation in generated HTML
ind1 = '    '
ind2 = ind1 + ind1
ind3 = ind2 + ind1
ind4 = ind2 + ind2

# Page title
pageTitle = 'OpenGL 4.x Reference Pages'

# Docbook source and generated HTML file extensions
srcext = '.xml'
genext = '.xhtml'

# List of generated files
files = os.listdir(gendir)

# Add [file, alias] to dictionary[key]
def addkey(dict, file, key, alias):
    if (key in dict.keys()):
        value = dict[key]
        print('Key', key, '-> [', file, ',', alias, '] already exists in dictionary as [', value[0], ',', value[1], ']')
    else:
        dict[key] = [file, key]
        # print('Adding key', key, 'to dictionary as [', file, ',', alias, ']')

# Create list of entry point names to be indexed.
# Unlike the old Perl script, this proceeds as follows:
# - Each .xhtml page with a parent .xml page gets an
#   index entry for its base name.
# - Additionally, each <function> tag inside a <funcdef>
#   in the parent page gets an aliased index entry.
# - Each .xhtml page *without* a parent is reported but
#   not indexed.
# - Each collision in index terms is reported.
# - Index terms are keys in a dictionary whose entries
#   are [ pagename, alias ] where pagename is the
#   base name of the indexed page and alias is 1 if
#   this index isn't the same as pagename.
# - There are separate dictionaries for API and GLSL
#   pages, and a simplistic way of telling the files
#   apart which is sensitive to the file names:
#
#   * Everything starting with 'gl[A-Z]' is API
#   * 'removedTypes.*' is API (more may be added)
#   * Everything else is GLSL

def isGLfile(entrypoint):
    if (re.match('^gl[A-Z]', entrypoint) or entrypoint == 'removedTypes'):
        return True
    else:
        return False

# Dictionaries for API and GLSL keys
apiIndex = {}
glslIndex = {}

for file in files:
    # print('Processing file', file)
    (entrypoint,ext) = os.path.splitext(file)
    if (ext == genext):
        parent = srcdir + '/' + entrypoint + srcext
        # Determine if this is an API or GLSL page
        if (isGLfile(entrypoint)):
            dict = apiIndex
        else:
            dict = glslIndex
        if (os.path.exists(parent)):
            addkey(dict, file, entrypoint, 0)
            # Search parent file for <function> tags inside <funcdef> tags
            # This doesn't search for <varname> inside <fieldsynopsis>, because
            #   those aren't on the same line and it's hard.
            fp = open(parent)
            for line in fp.readlines():
                # Look for <function> tag contents and add as aliases
                # Don't add the same key twice
                for m in re.finditer(r"<funcdef>.*<function>(.*)</function>.*</funcdef>", line):
                    funcname = m.group(1)
                    if (funcname != entrypoint):
                        addkey(dict, file, funcname, 1)
            fp.close()
        else:
            print('No parent page for', file, ', will not be indexed')

# Some utility functions for generating the navigation table
# Opencl_tofc.html uses style.css instead of style-index.css
def printHeader(fp):
    print('<html>',
          '<head>',
          '    <link rel="stylesheet" type="text/css" href="style-index.css" />',
          '    <title>' + pageTitle + '</title>',
          '    <?php include \'accord.js\'; ?>',
          '</head>',
          '<body>',
          '    <div id="navwrap">',
          '    <ul id="containerul"> <!-- Must wrap entire list for expand/contract -->',
          '    <li class="Level1">',
          '        <a href="start.html" target="pagedisplay">Introduction</a>',
          '    </li>',
          sep='\n', file=fp)

def printFooter(fp):
    print('    </div> <!-- End containerurl -->',
          '    <script type="text/javascript">initiate();</script>',
          '</body>',
          '</html>',
          sep='\n', file=fp)

# Add a nav table entry. key = link name,
# keyval = [file for link target, alias]
def addMenuLink(key, keyval, fp):
    file = keyval[0]
    alias = keyval[1]

    print(ind4 + '<li><a href="' + file + '" target="pagedisplay">'
               + key + '</a></li>',
          sep='\n', file=fp)

def beginLetterSection(letter, fp):
    print(ind2 + '<li>' + letter,
          ind3 + '<ul class="Level3">',
          sep='\n', file=fp)

def endLetterSection(opentable, fp):
    if (opentable == 0):
        return
    print(ind3 + '</ul> <!-- End Level3 -->',
          ind2 + '</li>',
          sep='\n', file=fp)

# Sort key for sorting a list of strings; ignore any 'gl' prefix
def sortPrefixKey(key):
    if (len(key) > 2 and key[0:2] == 'gl'):
        return key[2:]
    else:
        return key

# Sort key for sorting a list of strings; don't ignore prefixes.
def sortNoPrefixKey(key):
    return key

# Return the keys in a dictionary sorted by name
def sortedKeys(dict, glPrefix):
    list = [key for key in dict.keys()]
    if (glPrefix):
        list.sort(key = sortPrefixKey)
    else:
        list.sort(key = sortNoPrefixKey)
    return list

# Generate accordion menu for this dictionary, titled as specified.
# If glPrefix is True, ignore 'gl' prefixes during alphabetization.
# fp is the file to write to
def genDict(dict, title, glPrefix, fp):
    print(ind1 + '<li class="Level1">' + title,
          ind2 + '<ul class="Level2">',
          sep='\n', file=fp)

    # Print links for sorted keys in each letter section
    curletter = ''
    opentable = 0

    # Determine which letters are in the table of contents for this
    # dictionary. If glPrefix is set, strip the 'gl' prefix from each
    # key containing it first.

    # Keys is the sorted list of page indexes
    keys = sortedKeys(dict, glPrefix)

    # print('@ Sorted list of page indexes:\n', keys)

    for key in keys:
        if (glPrefix and len(key) > 2 and key[0:2] == 'gl'):
            c = key[2]
        else:
            c = key[0]

        if (c != curletter):
            endLetterSection(opentable, fp)
            # Start a new subtable for this letter
            beginLetterSection(c, fp)
            opentable = 1
            curletter = c
        addMenuLink(key, dict[key], fp)
    endLetterSection(opentable, fp)

    print(ind2 + '</ul> <!-- End Level2 -->',
          ind1 + '</li> <!-- End Level1 -->',
          sep='\n', file=fp)

######################################################################

# Actually generate the accordion menu, separate API and GLSL sections
fp = open(outfilename, 'w')
printHeader(fp)

genDict(apiIndex, 'API Entry Points', True, fp)
genDict(glslIndex, 'GLSL Functions', False, fp)

printFooter(fp)
fp.close()


