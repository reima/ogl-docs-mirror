<?xml version='1.0'?> 
<xsl:stylesheet  
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0"> 

<xsl:import href="file:///usr/share/sgml/docbook/xsl-stylesheets/xhtml/docbook.xsl"/> 

<xsl:template match="/">
  <xsl:processing-instruction name="xml-stylesheet">
   <xsl:text>type="text/xsl" href="mathml.xsl"</xsl:text>
  </xsl:processing-instruction>
  <xsl:apply-imports/>
</xsl:template>


</xsl:stylesheet>  

