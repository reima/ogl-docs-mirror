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
      <h1>Discarding Fragments </h1>
    <!-- InstanceEndEditable --><!-- InstanceBeginEditable name="Tutorial Text" -->
    <p>It is possible to tell the fragment shader it shouldn't write any pixel. This can be done using the &quot;discard&quot; statement.</p>
    <p>This can be used - for example - to implement a color key. </p>
    <p>Using the following texture, all red pixels should be removed (discarded!). </p>
    <p align="center"><img src="texture.gif" width="256" height="256"> <br>
    Texture with with red color key </p>
    <p>&nbsp;</p>
    <table width="90%" border="0" align="center" bordercolor="#0000CC" bgcolor="#EEEEEE">
      <tr>
        <td><pre>varying vec2 vTexCoord;</pre>
          <pre>void main(void)
{
   vTexCoord = gl_MultiTexCoord0.xy;
   gl_Position = gl_ModelViewProjectionMatrix * gl_Vertex;
}        </pre>          
          </td>
      </tr>
      <tr>
        <td bgcolor="#CCCCFF">Vertex Shader Source Code </td>
      </tr>
    </table>
    <br>
    <table width="90%" border="0" align="center" bordercolor="#0000CC" bgcolor="#EEEEEE">
      <tr>
        <td><pre>sampler2D myTexture;
           varying vec2 vTexCoord;</pre>
          <pre>void main (void) 
{  
   vec4 color = texture2D(myTexture, vTexCoord); 
             
   if (color.rgb == vec3(1.0,0.0,0.0))
      discard; 
   
   gl_FragColor = color;
} </pre>          <pre>&nbsp;</pre></td>
      </tr>
      <tr>
        <td bgcolor="#CCCCFF"><span style="font-style: italic">Fragment Shader Source Code </span></td>
      </tr>
    </table>
    <p>&nbsp;</p>
    <p>If you start the shader you will get the following result:</p>
    <p align="center"><img src="color-key-bad.gif" width="648" height="510"> </p>
    <p align="left">There are still some red pixels visible. This is because the texture was filtered. This can be prevented by setting the texture parameters to: </p>
    <p>glTexParameteri(GL_TEXTURE_2D,GL_TEXTURE_MAG_FILTER,GL_NEAREST);<br>
    glTexParameteri(GL_TEXTURE_2D,GL_TEXTURE_MIN_FILTER,GL_NEAREST);</p>
    <p align="center"><img src="color-key.gif" width="648" height="510"></p>
    <p align="left">This time it looks better. </p>
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
<?php include("/home/virtual/opengl.org/var/www/html/sdk/inc/sdk_footer.txt"); ?>
</body>
<!-- InstanceEnd --></html>
