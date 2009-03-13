XMLCATALOG = /etc/xml/catalog
# The DTD file to install
DTD	   = dbmathml.dtd
# Where to put it
INSTDIR    = /usr/share/xml/docbook-mathml-dtd-1.1CR1
# The PUBLIC and SYSTEM DTD identifiers
PUBDTD	   = "-//OASIS//DTD DocBook MathML Module V1.1b1//EN"
SYSDTD	   = "http://www.oasis-open.org/docbook/xml/mathml/1.1CR1/dbmathml.dtd"
# The URI to the local copy of the DTD
DTDURI	   = "file://$(INSTDIR)/$(DTD)"

install: instdtd instcat

instdtd:
	-mkdir -p $(INSTDIR)
	-cp -f $(DTD) $(INSTDIR)

instcat:
	xmlcatalog --noout --add public \
	    $(PUBDTD) $(DTDURI) $(XMLCATALOG)
	xmlcatalog --noout --add system \
	    $(SYSDTD) $(DTDURI) $(XMLCATALOG)

uninstall: uninstdtd uninstcat

uninstdtd:
	-rm -f $(INSTDIR)/$(DTD)
	-rmdir $(INSTDIR)

uninstcat:
	xmlcatalog --noout --del $(PUBDTD) $(XMLCATALOG)
	xmlcatalog --noout --del $(SYSDTD) $(XMLCATALOG)

# Useful for Ubuntu 8.10 with w3-mathml-dtd package installed
instmathml2cat:
	xmlcatalog --noout --add public "-//W3C//DTD MathML 2.0//EN"			      "file:///usr/share/xml/schema/w3c/mathml/dtd/mathml2.dtd"		$(XMLCATALOG)
	xmlcatalog --noout --add public "-//W3C//DTD MathML//EN"			      "file:///usr/share/xml/schema/w3c/mathml/dtd/mathml2.dtd"		$(XMLCATALOG)
	xmlcatalog --noout --add public "-//W3C//DTD XHTML 1.1 plus MathML 2.0//EN"	      "file:///usr/share/xml/schema/w3c/mathml/dtd/xhtml-math11-f.dtd"	$(XMLCATALOG)
	xmlcatalog --noout --add system "http://www.w3.org/TR/MathML2/dtd/mathml2.dtd"	      "file:///usr/share/xml/schema/w3c/mathml/dtd/mathml2.dtd"		$(XMLCATALOG)
	xmlcatalog --noout --add system "http://www.w3.org/TR/MathML2/dtd/xhtml-math11-f.dtd" "file:///usr/share/xml/schema/w3c/mathml/dtd/xhtml-math11-f.dtd"	$(XMLCATALOG)

# Useful for Ubuntu 8.10 with w3-mathml-dtd package installed
uninsmathml2cat:
	xmlcatalog --noout --del public "-//W3C//DTD MathML 2.0//EN"			      "file:///usr/share/xml/schema/w3c/mathml/dtd/mathml2.dtd"		$(XMLCATALOG)
	xmlcatalog --noout --del public "-//W3C//DTD MathML//EN"			      "file:///usr/share/xml/schema/w3c/mathml/dtd/mathml2.dtd"		$(XMLCATALOG)
	xmlcatalog --noout --del public "-//W3C//DTD XHTML 1.1 plus MathML 2.0//EN"	      "file:///usr/share/xml/schema/w3c/mathml/dtd/xhtml-math11-f.dtd"	$(XMLCATALOG)
	xmlcatalog --noout --del system "http://www.w3.org/TR/MathML2/dtd/mathml2.dtd"	      "file:///usr/share/xml/schema/w3c/mathml/dtd/mathml2.dtd"		$(XMLCATALOG)
	xmlcatalog --noout --del system "http://www.w3.org/TR/MathML2/dtd/xhtml-math11-f.dtd" "file:///usr/share/xml/schema/w3c/mathml/dtd/xhtml-math11-f.dtd"	$(XMLCATALOG)

