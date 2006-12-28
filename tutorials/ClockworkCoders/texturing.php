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
      <h1>Texturing</h1>
    <!-- InstanceEndEditable --><!-- InstanceBeginEditable name="Tutorial Text" -->
    <h2>Introduction</h2>
    <p>When using textures in OpenGL the most difficult part  is loading a texture from file into memory. However, there are many OpenSource libraries specialized in loading image formats. One of them is <a href="http://openil.sourceforge.net/" target="_blank">DevIL</a>, another one is <a href="http://freeimage.sourceforge.net/" target="_blank">FreeImage</a>. I am going to use FreeImage to load images for this tutorial.  </p>
    <p>Textures are basically a chuck of memory, often available as R,G,B(,A) values. In GLSL a texture is specified as a uniform variable. Textures have their own type, which is one of the following: </p>
    <table width="55%" border="0" align="center" bgcolor="#DDFFEE">
      <tr>
        <td width="29%"><span style="font-weight: bold">sampler1D</span></td>
        <td width="71%">1D texture</td>
      </tr>
      <tr>
        <td><span style="font-weight: bold">sampler2D</span></td>
        <td><p>2D texture </p>          </td>
      </tr>
      <tr>
        <td><span style="font-weight: bold">sampler3D</span></td>
        <td>3D texture </td>
      </tr>
      <tr>
        <td><span style="font-weight: bold">samplerCube</span></td>
        <td>Cubemap texture </td>
      </tr>
      <tr>
        <td><span style="font-weight: bold">sampler1DShadow</span></td>
        <td>1D texture for shadow map </td>
      </tr>
      <tr>
        <td><span style="font-weight: bold">sampler2DShadow</span></td>
        <td>2D texture for shadow map </td>
      </tr>
      <tr>
        <td><span style="font-weight: bold">sampler2DRect</span></td>
        <td>for rectanguar textures (<a href="http://www.opengl.org/registry/specs/ARB/texture_rectangle.txt" target="_blank">GL_ARB_texture_rectangle</a>) </td>
      </tr>
      <tr>
        <td><span style="font-weight: bold">sampler2DRectShadow</span></td>
        <td>for shadow map, rectanguar textures (<a href="http://www.opengl.org/registry/specs/ARB/texture_rectangle.txt" target="_blank">GL_ARB_texture_rectangle</a>)</td>
      </tr>
    </table>
    <p align="left">&nbsp; </p>
    <h2>Example Project </h2>
    <p>In this example project the above example shaders are used. FreeImage (source) is included in the project. I also made a little OpenGL wrapper around FreeImage, to simplify (again!) the loading of textures:</p>
    <table width="90%" border="0" align="center" bordercolor="#0000CC" bgcolor="#EEEEEE">
      <tr>
        <td><pre>#include &quot;texture.h&quot;
#include &quot;smartptr.h&quot;

cwc::SmartPtr&lt;cwc::TextureBase&gt;   pTexture;

void loadtexture()
{
    pTexture = cwc::TextureFactory::CreateTextureFromFile(&quot;texture.jpg&quot;);
}


void draw()
{
  if (pTexture) pTexture-&gt;bind(0);  // bind texture to texture unit 0
}</pre></td>
      </tr>
      <tr>
        <td bgcolor="#CCCCFF">C++ Source Code: Loading Texture </td>
      </tr>
    </table>
    <p>&nbsp; </p>
    <p><a href="downloads/GLSL_Texture.zip" style="font-weight: bold">Download:
      GLSL_Texture.zip</a> (Visual Studio 8 Project)<br>
        <span style="font-style: italic">(If you create a project/makefile for a different platform/compiler, please send it to: christen(at)clockworkcoders.com and I will put it here.) </span></p>
    <p>&nbsp;</p>
    <!-- InstanceEndEditable -->
    <table width="100%" border="0">
        <tr>
          <td width="50%" align="left" valign="middle"><!-- InstanceBeginEditable name="Link To Previous" -->
            <h3><a href="varying.php">Previous: Varying Variables</a></h3>
          <!-- InstanceEndEditable --></td>
          <td width="81%" align="right" valign="middle"><!-- InstanceBeginEditable name="Link To Next" -->
            <h3><a href="lighting.php">Next: Per Fragment Lighting</a></h3>
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
