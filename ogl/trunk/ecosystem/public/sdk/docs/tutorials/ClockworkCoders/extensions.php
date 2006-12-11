<html>

<head>

<title>OpenGL Extensions Tutorial</title>

<?php include("http://www.opengl.org/inc/sdk_head.txt"); ?>

</head>

<body>

<?php include("http://www.opengl.org/inc/sdk_body_start.txt"); ?>

<h1>OpenGL Extensions Tutorial</h1>
by Martin Christen, christen[at]clockworkcoders.com

<h2>Introduction</h2>
OpenGL Extensions are usually made available to access new features of 3D
graphics hardware. Hardware vendors define new functions and/or tokens that
enhance the existing features of OpenGL. 

<p>Extensions created by a single vendor are called
"<strong>vendor-specific</strong>" and extensions created by several vendors
are called "<strong>multivendor</strong>" extensions.</p>

<p>If a vendor-specific or multivendor extension proves to be a good
enhancement, the OpenGL Architecture Review Board (ARB) may promote it to an
"<strong>ARB approved</strong>" extension.</p>

<p>If the extension is very useful, the ARB may decide to integrate the
extension as a "<strong>core feature</strong>" to OpenGL. This happened for
example with the OpenGL Shading Language which is now a core feature of
OpenGL 2.0 and higher. </p>

<p>This concept makes OpenGL very powerful, because source code remains
backwards compatible. OpenGL programs written 10 years ago still work
today.</p>

<h2>Detecting Extensions</h2>
Once you have a valid OpenGL context, you can get a list of all extensions
with glGetString(GL_EXTENSIONS). It returns a space delimited char-array of
all available extensions. <br>
<br>


<table width="90%" border="0" bgcolor="#EEEEEE">
  <tbody>
    <tr>
      <td><pre>const GLubyte* sExtensions = glGetString(GL_EXTENSIONS);</pre>
      </td>
    </tr>
  </tbody>
</table>
<br>
<br>
All extensions have the form: GL_VENDOR_extension_name, where "VENDOR" may be
- but not limited to - one of the following: 

<table border="1">
  <caption></caption>
  <tbody>
    <tr>
      <td><span
      style="font-family: monospace; font-size: 12pt">ARB</span></td>
      <td>Architecture Review Board approved extension</td>
    </tr>
    <tr>
      <td style="font-family: monospace; font-size: 12pt">EXT</td>
      <td>Multivendor Extension</td>
    </tr>
    <tr>
      <td style="font-family: monospace; font-size: 12pt">APPLE</td>
      <td>Extension from Apple Computer, Inc.</td>
    </tr>
    <tr>
      <td style="font-family: monospace; font-size: 12pt">ATI</td>
      <td>Extension from ATI Technologies, Inc. (AMD)</td>
    </tr>
    <tr>
      <td style="font-family: monospace; font-size: 12pt">HP</td>
      <td>Extension from Hewlett Packard.</td>
    </tr>
    <tr>
      <td style="font-family: monospace; font-size: 12pt">NV</td>
      <td>Extension from NVIDIA Corporation</td>
    </tr>
    <tr>
      <td><span
      style="font-family: monospace; font-size: 12pt">SGIS</span></td>
      <td>Extension from Silicon Graphics, Inc.</td>
    </tr>
  </tbody>
</table>
<pre></pre>
It is worth to mention that there are also other prefixes than "GL": Those
are platform specific extensions. The most famous are "WGL" for Windows
specific extensions and "GLX" for X-Windows specific extensions.

<h2>Using Extensions</h2>
Using extensions in your C++ code is - unfortunately - platform specific. The
address of the function (function pointer) must be retrieved from the OpenGL
implementation (e.g. hardware driver). Under Windows this can be done using
"wglGetProcAddress". 

<p>To save a lot of time handling all function pointers and tokens of all
extensions for several platforms, there are some good OpenSource solutions
available which simplify this process. One of them is "GLEW", available at <a
href="http://glew.sourceforge.net">http://glew.sourceforge.net</a>. Another
implementation is "GLee", available at <a
href="http://elf-stone.com/glee.php">http://elf-stone.com/glee.php</a>. Both
are good ways to handle extensions and are released under a modified BSD
license. (Make sure to read the licenses for details.) </p>

<h2>Introduction to GLEW</h2>
I am going to use GLEW, without a real reason - GLee is just as good. The
latest version of GLEW is 1.3.5 and supports OpenGL 2.1 core functionality
and some other new extensions.

<h3>Installation</h3>
GLEW can be compiled statically or dynamically. If you create a static lib,
make sure to create a preprocessor variable "GLEW_STATIC" under Windows.
Another way is to copy "glew.c" and "glew.h" directly to your code (you also
have to define "GLEW_STATIC" under Windows). This is my preferred way because
it makes cross platform management easier.

<p>You can download a sample OpenGL project using GLEW + FreeGLUT here: </p>

<p><a href="downloads/OpenGL_Extensions_Tutorial.zip">Download:
OpenGL_Extensions_Tutorial.zip</a></p>

<p>It is a Visual Studio 7.1 project. And can be converted to 8.0 without
problems.</p>

<h3>Initializing GLEW</h3>
GLEW requires an initialization. When you do this initialization a valid
OpenGL rendering context must be available. (In most cases this means an
OpenGL window must be present and active). <br>
<br>


<table width="90%" border="0" bgcolor="#EEEEEE">
  <tbody>
    <tr>
      <td><pre>GLenum err = glewInit();
if (GLEW_OK != err)
{
  // failed to initialize GLEW!
}
std::cout "Using GLEW Version: " glewGetString(GLEW_VERSION);</pre>
      </td>
    </tr>
  </tbody>
</table>
<br>


<h3>Checking OpenGL Version</h3>
GLEW allows checking if all core extensions of a certain OpenGL Version (1.1,
1.2, 1.3, 1.5, 2.0, 2.1) are available. If you have for example OpenGL 1.3
installed, then the core extensions of OpenGL 1.2 and 1.1 will be present
too. <br>
<br>


<table width="90%" border="0" bgcolor="#EEEEEE">
  <tbody>
    <tr>
      <td><pre>if (GLEW_VERSION_1_5)
{
   std::cout "Core extensions of OpenGL 1.1 to 1.5 are available!\n";
}</pre>
      </td>
    </tr>
  </tbody>
</table>
<br>


<h3>Checking Extensions</h3>
There are two ways to check an extension: over a GLEW macro or � as a slower
alternative � over a string. <br>
<br>


<table width="90%" border="0" bgcolor="#EEEEEE">
  <tbody>
    <tr>
      <td><pre>if (GLEW_ARB_vertex_program) 
{ 
  ... 
}</pre>
      </td>
    </tr>
  </tbody>
</table>
<br>


<table width="90%" border="0" bgcolor="#EEEEEE">
  <tbody>
    <tr>
      <td><pre>if (glewIsSupported("GL_ARB_vertex_program")) 
{ 
  ... 
}</pre>
      </td>
    </tr>
  </tbody>
</table>
<br>


<h3>Platform specific extensions</h3>
Platform specific extensions can also be queried using a GLEW macro. or using
the functions "wglewIsSupported" or "glxglewIsSupported"). To use platform
specific extensions include "wglew.h" or "glxglew.h" after the regular
"glew.h". <br>
<br>


<table width="90%" border="0" bgcolor="#EEEEEE">
  <tbody>
    <tr>
      <td><pre>if (WGLEW_ARB_pbuffer)
{ 
  ... 
}</pre>
      </td>
    </tr>
  </tbody>
</table>
<br>


<h2>Exercises</h2>
1. Write a program which detects the OpenGL core version installed on your
machine and print the result to console. (use GLEW or GLee for this!) 

<p></p>

<p></p>

<p>2. What is the maximum length of the string returned by
glGetString(GL_EXTENSIONS) ? </p>

<p></p>

<h2>OpenGL Shading Language Extensions</h2>
Now we know enough about extensions to actually use them for our GLSL
programs.

<h3>Checking Presence of GLSL</h3>
To check if the OpenGL Shading Language is present, the extension
"GL_ARB_shading_language_100" must be available. If this extension is
present, the actual version of the OpenGL Shading Language can be queried
with glGetString(GL_SHADING_LANGUAGE_VERSION_ARB). The format of the returned
string is: 

<p>"major.minor.release vendor_info_string". (with "release" and
"vendor_info_string" being optional). Version numbers have 1 or more
digits.</p>

<p> Unfortunately this is not possible with the initial version of the OpenGL
Shading Language. If the query returns an "GL_INVALID_ENUM" error, then you
can assume it is version 1.051 (major=1, minor=0, revision=51). <br>
<br>
</p>

<table width="90%" border="0" bgcolor="#EEEEEE">
  <tbody>
    <tr>
      <td><pre>if (glewIsSupported("ARB_shading_language_100")) 
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
        </pre>
      </td>
    </tr>
  </tbody>
</table>
<br>
<br>
If "GL_ARB_shading_language_100" is present, the other extensions related to
the shading language must be present too: "GL_ARB_shader_objects",
"GL_ARB_fragment_shader", and "GL_ARB_vertex_shader".

<?php include("http://www.opengl.org/inc/sdk_footer.txt"); ?>

</body>

</html>
