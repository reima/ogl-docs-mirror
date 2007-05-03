all: out10.xml out11.xml

out10.xml: test.xml always
	xsltproc --xinclude -o $@ --stringparam profile.revision "0" \
	    opengl-man.xsl test.xml

out11.xml: test.xml always
	xsltproc --xinclude -o $@ --stringparam profile.revision "1" \
	    opengl-man.xsl test.xml

always:
