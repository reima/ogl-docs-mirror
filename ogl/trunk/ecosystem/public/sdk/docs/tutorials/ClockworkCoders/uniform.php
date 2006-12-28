<html><!-- InstanceBegin template="/Templates/tutorial.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<title>Tutorials</title>
<?php include("/home/virtual/opengl.org/var/www/html/sdk/inc/sdk_head.txt"); ?>
</head>
<body>
<p>
  <?php include("/home/virtual/opengl.org/var/www/html/sdk/inc/sdk_body_start.txt"); ?></p>
<h2>Clockworkcoders Tutorials </h2>
<table width="97%" border="0" align="center" cellpadding="6" cellspacing="0" bordercolor="#000066" bgcolor="#999999">
  <tr>
    <td width="4" height="245" bgcolor="#9999FF"><div align="left">
      <p>&nbsp;</p>
      <br/>
      <br/>
      <br/>
      </p>
    </div></td>
    <td width="1169" align="left" valign="top" bgcolor="#FFFFCC"><!-- InstanceBeginEditable name="Tutorial Name" -->
      <h1>Uniform Variables </h1>
    <!-- InstanceEndEditable --><!-- InstanceBeginEditable name="Tutorial Text" -->
    <h2 align="center"><img src="screenshot_uniform.gif" alt="Tutorial Screenshot" width="329" height="258"></h2>
    <h2>Introduction</h2>
    <p>Uniform variables are used to communicate with your vertex or fragment  shader from &quot;outside&quot;. In your shader you use the <span style="font-weight: bold">uniform</span> qualifier to declare the  variable:</p>
    <table width="90%" border="0" align="center" bordercolor="#0000CC" bgcolor="#EEEEEE">
      <tr>
        <td><pre>uniform float myVariable;
</pre></td>
      </tr>
      <tr>
        <td bgcolor="#CCCCFF"><span style="font-style: italic">Vertex of Fragment Shader Source Code </span></td>
      </tr>
    </table>
    <p>Uniform variables are <strong>read-only</strong> and have the same value among all processed vertices. You can only change them within your C++ program.</p>
    <h2>Example</h2>
    <table width="90%" border="0" align="center" bordercolor="#0000CC" bgcolor="#EEEEEE">
      <tr>
        <td><pre>uniform float Scale;</pre>
          <pre>void main(void)  
{     
   vec4 a = gl_Vertex;     
   a.x = a.x * Scale;     
   a.y = a.y * Scale;     
</pre>
          <pre>   gl_Position = gl_ModelViewProjectionMatrix * a;  
}         </pre>
          </td>
      </tr>
      <tr>
        <td bgcolor="#CCCCFF"><span style="font-style: italic">Vertex Shader Source Code </span></td>
      </tr>
    </table>
    <p>&nbsp;</p>
    <table width="90%" border="0" align="center" bordercolor="#0000CC" bgcolor="#EEEEEE">
      <tr>
        <td><pre>uniform vec4 uColor;</pre>
          <pre>void main (void) 
{ 
   gl_FragColor = uColor; 
}</pre>          
          </td>
      </tr>
      <tr>
        <td bgcolor="#CCCCFF"><span style="font-style: italic">Fragment Shader Source Code </span></td>
      </tr>
    </table>
    <p>In this example the vertex shader scales every incoming vertex with a value spcified in a uniform variable. In the fragment shader a uniform vector value is used as the output color. </p>
    <h2>Changing the Uniform Value in C++</h2>
    <p>Access to uniform variables is available after linking the program. With <a href="http://www.opengl.org/sdk/docs/man/xhtml/glGetUniformLocation.xml">glGetUniformLocation</a> you can retrieve the location of the uniform variable within the specified program object. Once you have that location you can set the value. If the variable is not found, -1 is returned. With <a href="http://www.opengl.org/sdk/docs/man/xhtml/glUniform.xml">glUniform</a> you can set the value of the uniform variable.</p>
    <table width="90%" border="0" align="center" bordercolor="#0000CC" bgcolor="#EEEEEE">
      <tr>
        <td><pre>GLint loc = glGetUniformLocation(ProgramObject, &quot;Scale&quot;);
if (loc != -1)
{
   glUniform1f(loc, 0.432);
}</pre></td>
      </tr>
      <tr>
        <td bgcolor="#CCCCFF"><span style="font-style: italic">C++ Source Code </span></td>
      </tr>
    </table>
    <p>The uniform location remains valid until you link the program again, so there is no need to call glGetUniformLocation every frame.</p>
    <p>In the example project the above example shaders are used and the vertex value and color value is changed with a timer function.</p>
    <p><a href="downloads/GLSL_Uniform.zip" style="font-weight: bold">Download:
      GLSL_Uniform.zip</a> (Visual Studio 8 Project)<br>
      <span style="font-style: italic">(If you create a project/makefile for a different platform/compiler, please send it to: christen(at)clockworkcoders.com and I will put it here.) </span> </p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <!-- InstanceEndEditable -->
    <table width="100%" border="0">
        <tr>
          <td width="50%" align="left" valign="middle"><!-- InstanceBeginEditable name="Link To Previous" -->
            <h3><a href="index.php">Return to Index</a></h3>
          <!-- InstanceEndEditable --></td>
          <td width="81%" align="right" valign="middle"><!-- InstanceBeginEditable name="Link To Next" -->
            <h3><a href="attributes.php">Next: Vertex Attributes</a><a href="varying.php"></a></h3>
          <!-- InstanceEndEditable --></td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<p><br>
  <?php include("/home/virtual/opengl.org/var/www/html/sdk/inc/sdk_footer.txt"); ?>
</p>
</body>
<!-- InstanceEnd --></html>
