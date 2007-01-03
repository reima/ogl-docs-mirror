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
      <h1>Discarding Fragments </h1>
    <!-- InstanceEndEditable --><!-- InstanceBeginEditable name="Tutorial Text" -->
    <p>It is possible to tell the fragment shader it shouldn't write any pixel. This can be done using the &quot;discard&quot; statement.</p>
    <p>This can be used - for example - to implement a color key. </p>
    <table width="90%" border="0" align="center" bordercolor="#0000CC" bgcolor="#EEEEEE">
      <tr>
        <td><pre>varying vec2 vTexCoord;


void main (void)  <br>{     
   if (pixel in texture == key_value)
     discard;
<br>   gl_FragColor = vec4(0.0,0.0,1.0,1.0);  <br>}</pre></td>
      </tr>
      <tr>
        <td bgcolor="#CCCCFF"><span style="font-style: italic">Fragment Shader Source Code </span></td>
      </tr>
    </table>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <!-- InstanceEndEditable -->
    <table width="100%" border="0">
        <tr>
          <td width="50%" align="left" valign="middle"><!-- InstanceBeginEditable name="Link To Previous" -->
            <h3><a href="lighting.php">Previous: Per Fragment Lighting</a></h3>
          <!-- InstanceEndEditable --></td>
          <td width="81%" align="right" valign="middle"><!-- InstanceBeginEditable name="Link To Next" -->
            <h3><a href="index.php">Back to Index </a></h3>
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
