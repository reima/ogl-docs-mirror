<html><!-- InstanceBegin template="/Templates/tutorial.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<title>Tutorials</title>
<?php include("/home/virtual/opengl.org/var/www/html/sdk/inc/sdk_head.txt"); ?>
</head>
<body>
<?php include("/home/virtual/opengl.org/var/www/html/sdk/inc/sdk_body_start.txt"); ?>

<h2>Clockworkcoders Tutorials </h2>
<table width="97%" border="0" align="center" cellpadding="6" cellspacing="0" bordercolor="#000066" bgcolor="#999999">
  <tr>
    <td height="245" bgcolor="#9999FF"><div align="left">
      <p>&nbsp;</p>
      <br/>
      <br/>
      <br/>
      </p>
    </div></td>
    <td width="1169" align="left" valign="top" bgcolor="#FFFFCC"><!-- InstanceBeginEditable name="Tutorial Name" -->
      <h1>OpenGL Extensions: Part 2 </h1>
    <!-- InstanceEndEditable --><!-- InstanceBeginEditable name="Tutorial Text" -->
    <h2>&nbsp;</h2>
    <h2>OpenGL Shading Language Extensions</h2>
    Now we know enough about extensions to actually use them for our GLSL
programs.
    <h3>&nbsp;</h3>
    <h3>Checking Presence of GLSL</h3>
    <p>To check if the OpenGL Shading Language is present, the extension
&quot;<span style="font-weight: bold">GL_ARB_shading_language_100</span>&quot; must be available. If this extension is
present, the actual version of the OpenGL Shading Language can be queried
with glGetString(<span style="font-weight: bold">GL_SHADING_LANGUAGE_VERSION_ARB</span>). The format of the returned
string is:</p>
<p>
&quot;major.minor.release vendor_info_string&quot;. (with &quot;release&quot; and
  &quot;vendor_info_string&quot; being optional). Version numbers have 1 or more
  digits.</p>
<p>
  Unfortunately this is not possible with the initial version of the OpenGL
  Shading Language. If the query returns an &quot;GL_INVALID_ENUM&quot; error, then you
  can assume it is version 1.051 (major=1, minor=0, revision=51). </p>
  <table width="90%" border="0" align="center" bgcolor="#EEEEEE">
  <tbody>
    <tr>
      <td><pre>if (glewIsSupported(&quot;GL_ARB_shading_language_100&quot;)) 
{  
   int major, minor, revision;
   const GLubyte* sVersion = glGetString(GL_SHADING_LANGUAGE_VERSION_ARB);
   if (glGetError() == GL_INVALID_ENUM)
   {
      major = 1; minor = 0; revision=51;
   }
   else
   {
      // parse string sVersion to get major, minor, revision
   }
}
</pre></td>
    </tr>
  </tbody>
</table>
<br />
<br />
<p>If &quot;<span style="font-weight: bold">GL_ARB_shading_language_100</span>&quot; is present, the other extensions related to
the shading language must be present too: &quot;<span style="font-weight: bold">GL_ARB_shader_objects</span>&quot;,
&quot;<span style="font-weight: bold">GL_ARB_fragment_shader</span>&quot;, and &quot;<span style="font-weight: bold">GL_ARB_vertex_shader</span>&quot;.</p>

<p>&nbsp;</p>
    <!-- InstanceEndEditable -->
    <table width="100%" border="0">
        <tr>
          <td width="50%" align="left" valign="middle"><!-- InstanceBeginEditable name="Link To Previous" -->
            <h3><a href="extensions.php">Go Back to: Extensions Part I</a></h3>
          <!-- InstanceEndEditable --></td>
          <td width="81%" align="right" valign="middle"><!-- InstanceBeginEditable name="Link To Next" -->
            <h3><a href="index.php">Return to Index</a> </h3>
          <!-- InstanceEndEditable --></td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<p align="center"><img src="author.gif" width="377" height="21"></p>
<?php include("/home/virtual/opengl.org/var/www/html/sdk/inc/sdk_footer.txt"); ?>
</body>
<!-- InstanceEnd --></html>
