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
