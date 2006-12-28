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
      <h1>Varying Variables</h1>
    <!-- InstanceEndEditable --><!-- InstanceBeginEditable name="Tutorial Text" -->
    <h2>Introduction</h2>
    <p>Varying variables provide an interface between Vertex and Fragment  Shader. Vertex Shaders compute values per vertex and fragment shaders  compute values per fragment. If you define a varying variable in a  vertex shader, its value will be interpolated (perspective-correct)  over the primitive being rendered and you can access the interpolated  value in the fragment shader. </p>
    <p>Varying can be used only with the data types float, vec2, vec3, vec4, mat2, mat3, mat4. (arrays of them too.)</p>
    <h2>Example</h2>
    <p align="center"><img src="varying.gif" width="262" height="206"></p>
    <p>Im the example before (Vertex Attributes) the color attribute was used to transform the vertex position, this time we actually use the color value in its correct purpose and pass it down to the fragment shader. The color value is interpolated this way. If you disable the shader you should get the same result - the fixed function pipeline does the same with the color!</p>
    <table width="90%" border="0" align="center" bordercolor="#0000CC" bgcolor="#EEEEEE">
      <tr>
        <td><pre>varying vec4 vColor;</pre>
          <pre>void main(void)
{
   vColor = gl_Color;
   gl_Position = gl_ModelViewProjectionMatrix * gl_Vertex;
}</pre>          
          </td>
      </tr>
      <tr>
        <td bgcolor="#CCCCFF"><span style="font-style: italic">Vertex Shader Source Code </span></td>
      </tr>
    </table>
    <br>
    <table width="90%" border="0" align="center" bordercolor="#0000CC" bgcolor="#EEEEEE">
      <tr>
        <td><pre>varying vec4 vColor;</pre>
          <pre>void main (void) 
{ 
   gl_FragColor = vColor; 
}</pre></td>
      </tr>
      <tr>
        <td bgcolor="#CCCCFF"><span style="font-style: italic">Fragment Shader Source Code </span></td>
      </tr>
    </table>
    <h2>Example Project </h2>
    <p>In this example project the above example shaders are used.</p>
    <p><a href="downloads/GLSL_Varying.zip" style="font-weight: bold">Download:
      GLSL_Uniform.zip</a> (Visual Studio 8 Project)<br>
        <span style="font-style: italic">(If you create a project/makefile for a different platform/compiler, please send it to: christen(at)clockworkcoders.com and I will put it here.) </span></p>
    <p>&nbsp; </p>
    <p>&nbsp;</p>
    <!-- InstanceEndEditable -->
    <table width="100%" border="0">
        <tr>
          <td width="50%" align="left" valign="middle"><!-- InstanceBeginEditable name="Link To Previous" -->
            <h3><a href="uniform.php"></a><a href="attributes.php">Previous: Vertex Attributes</a></h3>
          <!-- InstanceEndEditable --></td>
          <td width="81%" align="right" valign="middle"><!-- InstanceBeginEditable name="Link To Next" -->
            <h3><a href="vertex.php"></a><a href="index.php">Return to Index</a></h3>
          <!-- InstanceEndEditable --></td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<p align="center"><img src="author.gif" width="377" height="21"></p>
<p><br>
  <?php include("/home/virtual/opengl.org/var/www/html/sdk/inc/sdk_footer.txt"); ?>
</p>
</body>
<!-- InstanceEnd --></html>
