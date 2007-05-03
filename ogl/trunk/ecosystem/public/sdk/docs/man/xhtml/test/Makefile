all:
	xsltproc --xinclude -o out.xml.tmp  opengl-man.xsl test.xml
	sed 's/<?xml-stylesheet/<!-- saved from url=(0013)about:internet -->\n<?xml-stylesheet/g' \
	    < out.xml.tmp > out.xml
	rm -f out.xml.tmp
