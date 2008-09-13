Khronos has released the OpenGL man page XML sources. This was done
mostly at the request of people wishing to adapt the man pages to other
output formats or language bindings.

You will need to have a reasonable understanding of Subversion, Docbook,
XML, XSLT, Linux package management (if using Linux), and other
components of the toolchain used to generate the man pages, before
you're likely to have much success with them. A great deal of Docbook,
XML, and XSL infrastructure may need to be installed on your system
first.

The directory tree containing the man pages is available for anonymous,
read-only checkout in Khronos' Subversion server, at

    https://cvs.khronos.org/svn/repos/ogl/trunk/ecosystem/public/sdk/docs/man/

If you have the Subversion command-line client installed, you should be
able to check out the man pages into the directory 'man' by executing
the command

    svn co --username anonymous --password anonymous https://cvs.khronos.org/svn/repos/ogl/trunk/ecosystem/public/sdk/docs/man/ man

Under 'man' you'll find the OpenGL 2.1 man pages, both the Docbook XML
source in this directory and generated XHTML+MathML in xhtml/ , and some
supporting build and XSL infrastructure. There are two files in the
OpenGL.org Wiki containing additional documentation:

http://www.opengl.org/wiki/index.php/Getting_started/XML_Toolchain_and_Man_Pages#Toolchain
  - Description of the tools used to build the man pages; how to install
    and make use of them if you want to build them yourself; and how to
    report problems.

http://www.opengl.org/wiki/index.php/Getting_started/Viewing_XHTML_and_MathML
  - Some notes on viewing XHTML+MathML documents in different browsers.
