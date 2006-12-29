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
      <h1>Texturing </h1>
    <!-- InstanceEndEditable --><!-- InstanceBeginEditable name="Tutorial Text" -->
    <h2>Introduction</h2>
    <p>Textures are basically a chuck of memory, often using  R,G,B(,A) values with 8 bits per channel. Usually textures contain image data, but it is data, you can do with it whatever you want. In GLSL a texture is specified as a uniform variable. Textures have their own type, which is one of the following: </p>
    <table width="72%" border="1" align="center" bgcolor="#DDFFEE">
      <tr>
        <td width="33%"><span style="font-weight: bold">sampler1D</span></td>
        <td width="67%">1D texture</td>
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
        <td>for rectanguar textures (width, height non power of 2) (<a href="http://www.opengl.org/registry/specs/ARB/texture_rectangle.txt" target="_blank">GL_ARB_texture_rectangle</a>) </td>
      </tr>
      <tr>
        <td><span style="font-weight: bold">sampler2DRectShadow</span></td>
        <td>for shadow map, rectanguar textures (width, height non power of 2) (<a href="http://www.opengl.org/registry/specs/ARB/texture_rectangle.txt" target="_blank">GL_ARB_texture_rectangle</a>)</td>
      </tr>
    </table>
    <p align="center" style="font-style: italic">Table: Texture Data Types in GLSL </p>
    <p align="left">There are texture lookup functions to access the image data. Texture lookup functions can be called in the vertex and fragment shader. When looking up a texture in the vertex shader, level of detail is not yet computed, however there are some special lookup functions for that (function names end with &quot;Lod&quot;).<br>
    The parameter &quot;bias&quot; is only available in the fragment shader It is an optional parameter you can use to add to the current level of detail.<br>
    Function names ending with &quot;Proj&quot; are the projective versions, the texture coordinate is divided by the last component of the texture coordinate vector. </p>
    <table width="73%" border="0" align="center" bgcolor="#DDFFEE">
      <tr>
        <td width="96%">vec4 <span style="font-weight: bold">texture1D</span>(sampler1D s, float coord [, float bias]) </td>
        <td width="4%">&nbsp;</td>
      </tr>
      <tr>
        <td>vec4 <span style="font-weight: bold">texture1DProj</span>(sampler1D s, vec2 coord [,float bias]) </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>vec4 <span style="font-weight: bold">texture1DLod</span>(sampler1D s, vec4 coord [,float bias])</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>vec4 <span style="font-weight: bold">texture1DProjLod</span>(sampler1D s, float coord, float lod)</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>vec4 <span style="font-weight: bold">texture1DProjLod</span>(sampler1D s, vec4 coord, float lod)</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>vec4 <span style="font-weight: bold">texture2D</span>(sampler2D s, vec2 coord [, float bias]) </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>vec4 <span style="font-weight: bold">texture2DProj</span>(sampler2D s, vec3 coord [,float bias]) </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>vec4 <span style="font-weight: bold">texture2DProj</span>(sampler2D s, vec4 coord [,float bias]) </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>vec4 <span style="font-weight: bold">texture2DProjLod</span>(sampler2D s, vec3 coord, float lod) </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>vec4 <span style="font-weight: bold">texture2DProjLod</span>(sampler2D s, vec4 coord, float lod) </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>vec4 <span style="font-weight: bold">texture3D</span>(sampler3D s, vec3 coord [, float bias]) </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>vec4 <span style="font-weight: bold">texture3DProj</span>(sampler3D s, vec4 coord [, float bias]) </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>vec4 <span style="font-weight: bold">texture3DLod</span>(sampler3D s, vec3 coord [, float bias]) </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>vec4 <span style="font-weight: bold">texture3DProjLod</span>(sampler3D s, vec4 coord, float lod) </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>vec4 <span style="font-weight: bold">textureCube</span>(samplerCube s, vec3 coord [, float bias]) </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>vec4<span style="font-weight: bold"> textureCubeLod</span>(samplerCube s, vec3 coord , float lod) </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>vec4 <span style="font-weight: bold">shadow1D</span>(sampler1DShadow s, vec3 coord [, float bias]) </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>vec4 <span style="font-weight: bold">shadow1DProj</span>(sampler1DShadow s, vec4 coord [, float bias]) </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>vec4 <span style="font-weight: bold">shadow1DLod</span>(sampler1DShadow s, vec3 coord [, float bias]) </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>vec4 <span style="font-weight: bold">shadow1DProjLod</span>(sampler1DShadow s, vec4 coord, float lod) </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>vec4 <span style="font-weight: bold">shadow2D</span>(sampler2DShadow s, vec3 coord [, float bias]) </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>vec4 <span style="font-weight: bold">shadow2DProj</span>(sampler2DShadow s, vec4 coord [, float bias]) </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>vec4 <span style="font-weight: bold">shadow2DLod</span>(sampler2DShadow s, vec3 coord, float lod) </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>vec4 <span style="font-weight: bold">shadow2DProjLod</span>(sampler2DShadow s, vec4 coord, float lod) </td>
        <td>&nbsp;</td>
      </tr>
    </table>
    <p align="center" style="font-style: italic">Table: Texture Lookup Functions in GLSL</p>
    <p align="left">&nbsp; </p>
    <p align="left">&nbsp;</p>
    <h2>Example: Loading a Texture </h2>
    <p>This part doesn't have anything to do with GLSL, but to have some code to load textures is important. There are many OpenSource libraries specialized in loading image formats. One of them is <a href="http://openil.sourceforge.net/" target="_blank">DevIL</a>, another one is <a href="http://freeimage.sourceforge.net/" target="_blank">FreeImage</a>. I am going to use FreeImage to load images for this tutorial. </p>
    <p>I wrote a little wrapper around FreeImage to load and create textures with minimal code overhead.  I also included a simple implementation of a smart pointer, which makes it much easier if you have several objects using the same texture, but you don't have to use it to load textures. </p>
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
    <p>&nbsp;</p>
    <h2>Example: Swapping Color Channels </h2>
    <p>An simple GLSL example is to swap the red and blue channel of the displayed texture.. </p>
    <table width="90%" border="0" align="center" bordercolor="#0000CC" bgcolor="#EEEEEE">
      <tr>
        <td><pre>varying vec2 vTexCoord;


void main(void)
{
   vTexCoord = gl_MultiTexCoord0;
   gl_Position = gl_ModelViewProjectionMatrix * gl_Vertex;
}
        </pre></td>
      </tr>
      <tr>
        <td bgcolor="#CCCCFF">Vertex Shader Source Code </td>
      </tr>
    </table>
    <p>the texture coordinate is passed down to the fragment shader as varying variable. </p>
    <table width="90%" border="0" align="center" bordercolor="#0000CC" bgcolor="#EEEEEE">
      <tr>
        <td><pre>uniform sampler2D myTexture;

varying vec2 vTexCoord;



void main(void)

{
   gl_FragColor = texture2D(myTexture, vTexCoord).bgra;
}</pre></td>
      </tr>
      <tr>
        <td bgcolor="#CCCCFF">Fragment Shader Source Code</td>
      </tr>
    </table>
    <p>You probably noticed the &quot;.xy&quot; and &quot;.bgra&quot;. The order of components in GLSL can be changed. This can be done by appending the component names in the order you want. You can even repeat comonents. In this example &quot;.bgra&quot; is used. This technique can also be used to convert vectors, for example vec4 to vec2. </p>
    <table width="90%" border="0" align="center" bordercolor="#0000CC" bgcolor="#EEEEEE">
      <tr>
        <td><pre>vec4 TestVec = vec4(1.0, 2.0, 3.0, 4.0);<br>
vec4 a = TestVec.xyzw;    // (1.0, 2.0, 3.0, 4.0)
vec4 b = TestVec.wxyz;    // (4.0, 1.0, 2.0, 3.0)
vec4 c = TestVec.xxyy;    // (1.0, 1.0, 2.0, 2.0)
vec2 d = TextVec.zx;      // (3.0, 1.0)
        </pre></td>
      </tr>
      <tr>
        <td bgcolor="#CCCCFF">Vertex of Fragment Shader Source Code: Swizzle Examples </td>
      </tr>
    </table>
    <p>You may also wonder why &quot;rgba&quot; is used and not &quot;xyzw&quot;. GLSL allows using the following names for vector component lookup:</p>
    <table width="58%" border="0" align="center" bgcolor="#DDFFEE">
      <tr>
        <td>x,y,z,w</td>
        <td>Useful for points, vectors, normals </td>
      </tr>
      <tr>
        <td>r,g,b,a</td>
        <td>Useful for colors </td>
      </tr>
      <tr>
        <td>s,t,p,q</td>
        <td>Useful for texture coordinates </td>
      </tr>
    </table>
    <p align="center" style="font-style: italic">Table: Vector Component Names </p>
    <h2>Multitexturing</h2>
    <p>Mutlitexturing is very easy: In the GLSL program you simply specify several samplers and in the C++ program you bind textures to the appropriate texture units. The uniform sampler variables must be set to the appropriate texture unit number. </p>
    <h2>Example Project  </h2>
    <p>This source code only contains the simple example of swapping red and blue channel and is meant as base code for your texturing experiments. It contains everything required to compile it under Visual Studio 8 (GLEW, Freeglut, FreeImage). </p>
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
