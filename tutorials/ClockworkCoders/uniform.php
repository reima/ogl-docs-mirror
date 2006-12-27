<html><!-- InstanceBegin template="/Templates/tutorial.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<title>Tutorials</title>
<?php include("/home/virtual/opengl.org/var/www/html/sdk/inc/sdk_head.txt"); ?>
</head>
<body>
<p>
  <?php include("/home/virtual/opengl.org/var/www/html/sdk/inc/sdk_body_start.txt"); ?></p>
<h2>Clockworkcoders Tutorials </h2>
<table width="85%" border="1" cellpadding="8" cellspacing="4" bordercolor="#000066" bgcolor="#999999">
  <tr>
    <td width="3%" height="245" align="center" valign="top" bgcolor="#9999FF"><div align="left">
      <p>&nbsp;</p>
      <br/>
      <br/>
      <br/>
      </p>
    </div></td>
    <td width="97%" align="left" valign="top" bgcolor="#FFFFCC"><!-- InstanceBeginEditable name="Tutorial Name" -->
      <h1>Uniform Variables </h1>
    <!-- InstanceEndEditable --><!-- InstanceBeginEditable name="Tutorial Text" -->
    <h2>Introduction</h2>
    <p>Uniform variables are used to communicate with your vertex or fragment  shader from &quot;outside&quot;. In your shader you use the 'uniform' qualifier to declare the  variable:</p>
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
    <h2>Changing Value in C++</h2>
    <p>&nbsp; </p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <!-- InstanceEndEditable -->
    <table width="100%" border="0">
        <tr>
          <td width="50%" align="left" valign="middle"><!-- InstanceBeginEditable name="Link To Previous" -->
            <h3><a href="Templates/index.php">Return to Index</a></h3>
          <!-- InstanceEndEditable --></td>
          <td width="81%" align="right" valign="middle"><!-- InstanceBeginEditable name="Link To Next" -->
            <h3><a href="varying.php">Next: Varying Variables</a></h3>
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
