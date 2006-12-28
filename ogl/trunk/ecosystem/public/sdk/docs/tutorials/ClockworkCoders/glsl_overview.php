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
      <h1>OpenGL Shading Language Overview </h1>
    <!-- InstanceEndEditable --><!-- InstanceBeginEditable name="Tutorial Text" -->
    <p>&nbsp;</p>
    <h2>Programmable Graphics Hardware Pipeline</h2>
    <p>&nbsp;</p>
    <p><img src="pipeline.gif" alt="pipeline" width="545" height="218"></p>
    <p>&nbsp;</p>
    <h3>Programmable Vertex Processor </h3>
    <p>The vertex processor is a programmable unit that operates on incoming vertex attributes, such as position, color, texture coordinates, and so on. The vertex processor is intended to perform traditional graphics operations such as vertex transformation, normal transformation/normalization, texture coordinate generation, and texture coordinate transformation.<br>
      The vertex processor only has one vertex as input and only writes one vertex as output. <span style="font-weight: bold">Topological information of the vertices is not available</span>.    </p>
    <h3>Programmable Geometry Processor</h3>
    <p> The greometry processor allows access to the geometry (lines, triangles, quads etc.). It is even possible to create new geometry. However, the geometry shader is <span style="font-weight: bold">not</span> part of the OpenGL Shading Language specification. It is a <span style="font-weight: bold">multivendor extension</span> and  currently available (for developers) on NVidia GeForce 8 series graphics cards. Because this is a very important extension to the OpenGL Shading Language it is mentioned here and in some tutorials. (If you don't want or can't use Geometry Shaders, simply ignore this and let the fixed function pipeline do it!) </p>
    <h3>Programmable  Fragment Processor</h3>
    <p>The fragment processor is intended to perform traditional graphics operations such as operations on interpolated values, texture access, texture application, fog, and color sum.  </p>
    <p>&nbsp;</p>
    <!-- InstanceEndEditable -->
    <table width="100%" border="0">
        <tr>
          <td width="50%" align="left" valign="middle"><!-- InstanceBeginEditable name="Link To Previous" -->
            <h3><a href="extensions.php">Back To: Using OpenGL Extensions</a></h3>
          <!-- InstanceEndEditable --></td>
          <td width="81%" align="right" valign="middle"><!-- InstanceBeginEditable name="Link To Next" -->
            <h3><a href="extensions.php"></a><a href="loading.php">Next: Loading and compiling GLSL programs</a></h3>
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
