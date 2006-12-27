<html><!-- InstanceBegin template="/Templates/tutorial.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<title>Tutorials</title>
<?php include("/home/virtual/opengl.org/var/www/html/sdk/inc/sdk_head.txt"); ?>
</head>
<body>
<?php include("/home/virtual/opengl.org/var/www/html/sdk/inc/sdk_body_start.txt"); ?>

<!-- InstanceBeginEditable name="Title" -->
<h1>Clockworkcoders OpenGL Tutorials</h1>
<!-- InstanceEndEditable -->
<table width="100%" border="1" cellpadding="8" cellspacing="12" bordercolor="#000066" bgcolor="#999999">
  <tr>
    <td width="16%" height="245" align="center" valign="top" bgcolor="#9999FF"><div align="left">
      <p><a href="Templates/badlink.html">Hom</a><a href="Templates/index.html">e</a><br />
            <br />
          <a href="Templates/badlink.html">GLSL Tutorials</a></p>
      <p class="Stil1"><a href="Templates/badlink.html">Geometry Shader Tutorials</a></p>
      <p><a href="Templates/badlink.html">Downloads</a></p>
      <br/>
      <br/>
      <br/>
      </p>
    </div></td>
    <td width="84%" align="left" valign="top" bgcolor="#FFFFCC"><!-- InstanceBeginEditable name="Tutorial Name" -->
      <h1>OpenGL Extensions Tutorial</h1>
    <!-- InstanceEndEditable --><!-- InstanceBeginEditable name="Tutorial Text" -->
    <h2>Introduction</h2>
    OpenGL Extensions are usually made available to access new features of 3D
graphics hardware. Hardware vendors define new functions and/or tokens that
enhance the existing features of OpenGL.
    <p>Extensions created by a single vendor are called
  &quot;<strong>vendor-specific</strong>&quot; and extensions created by several vendors
      are called &quot;<strong>multivendor</strong>&quot; extensions.</p>
    <p>If a vendor-specific or multivendor extension proves to be a good
      enhancement, the OpenGL Architecture Review Board (ARB) may promote it to an
  &quot;<strong>ARB approved</strong>&quot; extension.</p>
    <p>If the extension is very useful, the ARB may decide to integrate the
      extension as a &quot;<strong>core feature</strong>&quot; to OpenGL. This happened for
      example with the OpenGL Shading Language which is now a core feature of
      OpenGL 2.0 and higher. </p>
    <p>This concept makes OpenGL very powerful, because source code remains
      backwards compatible. OpenGL programs written 10 years ago still work
      today.</p>
    <h2>Detecting Extensions</h2>
    Once you have a valid OpenGL context, you can get a list of all extensions
with glGetString(GL_EXTENSIONS). It returns a space delimited char-array of
all available extensions. <br />
<br />
<table width="90%" border="0" bgcolor="#EEEEEE">
  <tbody>
    <tr>
      <td><pre>const GLubyte* sExtensions = glGetString(GL_EXTENSIONS);</pre>
      </td>
    </tr>
  </tbody>
</table>
<br />
<br />
All extensions have the form: GL_VENDOR_extension_name, where &quot;VENDOR&quot; may be
- but not limited to - one of the following:
<table border="1">
  <caption>
  </caption>
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
<br />
 There are also other prefixes than &quot;GL&quot;: Those
are platform specific extensions. The most famous are &quot;WGL&quot; for Windows
specific extensions and &quot;GLX&quot; for X-Windows specific extensions.
<h2>Using Extensions</h2>
Using extensions in your C++ code is - unfortunately - platform specific. The
address of the function (function pointer) must be retrieved from the OpenGL
implementation (e.g. hardware driver). Under Windows this can be done using
&quot;wglGetProcAddress&quot;.
<p>To save a lot of time handling all function pointers and tokens of all
  extensions for several platforms, there are some good OpenSource solutions
  available which simplify this process. One of them is &quot;GLEW&quot;, available at <a
href="http://glew.sourceforge.net">http://glew.sourceforge.net</a>. Another
  implementation is &quot;GLee&quot;, available at <a
href="http://elf-stone.com/glee.php">http://elf-stone.com/glee.php</a>. Both
  are good ways to handle extensions and are released under a modified BSD
  license. (Make sure to read the licenses for details.) </p>
<h2>Introduction to GLEW</h2>
I am going to use GLEW, without a real reason - GLee is just as good. The
latest version of GLEW is 1.3.5 and supports OpenGL 2.1 core functionality
and some other new extensions.
<h3>Installation</h3>
GLEW can be compiled statically or dynamically. If you create a static lib,
make sure to create a preprocessor variable &quot;GLEW_STATIC&quot; under Windows.
Another way is to copy &quot;glew.c&quot; and &quot;glew.h&quot; directly to your code (you also
have to define &quot;GLEW_STATIC&quot; under Windows). This is my preferred way because
it makes cross platform management easier.
<p>You can download a sample OpenGL project using GLEW + FreeGLUT here: </p>
<p><a href="downloads/OpenGL_Extensions_Tutorial.zip">Download:
  OpenGL_Extensions_Tutorial.zip</a></p>
<p>It is a Visual Studio 7.1 project. And can be converted to 8.0 without
  problems.</p>
<h3>Initializing GLEW</h3>
GLEW requires an initialization. When you do this initialization a valid
OpenGL rendering context must be available. (In most cases this means an
OpenGL window must be present and active). <br />
<br />
<table width="90%" border="0" bgcolor="#EEEEEE">
  <tbody>
    <tr>
      <td><pre>GLenum err = glewInit();
if (GLEW_OK != err)
{
  // failed to initialize GLEW!
}
std::cout &quot;Using GLEW Version: &quot; glewGetString(GLEW_VERSION);</pre>
      </td>
    </tr>
  </tbody>
</table>
<br />
<h3>Checking OpenGL Version</h3>
GLEW allows checking if all core extensions of a certain OpenGL Version (1.1,
1.2, 1.3, 1.5, 2.0, 2.1) are available. If you have for example OpenGL 1.3
installed, then the core extensions of OpenGL 1.2 and 1.1 will be present
too. <br />
<br />
<table width="90%" border="0" bgcolor="#EEEEEE">
  <tbody>
    <tr>
      <td><pre>if (GLEW_VERSION_1_5)
{
   std::cout &quot;Core extensions of OpenGL 1.1 to 1.5 are available!\n&quot;;
}</pre>
      </td>
    </tr>
  </tbody>
</table>
<br />
<h3>Checking Extensions</h3>
There are two ways to check an extension: over a GLEW macro or &ndash; as a slower
alternative &ndash; over a string. <br />
<br />
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
<br />
<table width="90%" border="0" bgcolor="#EEEEEE">
  <tbody>
    <tr>
      <td><pre>if (glewIsSupported(&quot;GL_ARB_vertex_program&quot;)) 
{ 
  ... 
}</pre>
      </td>
    </tr>
  </tbody>
</table>
<br />
<h3>Platform specific extensions</h3>
Platform specific extensions can also be queried using a GLEW macro. or using
the functions &quot;wglewIsSupported&quot; or &quot;glxglewIsSupported&quot;). To use platform
specific extensions include &quot;wglew.h&quot; or &quot;glxglew.h&quot; after the regular
&quot;glew.h&quot;. <br />
<br />
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
<br />
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
&quot;GL_ARB_shading_language_100&quot; must be available. If this extension is
present, the actual version of the OpenGL Shading Language can be queried
with glGetString(GL_SHADING_LANGUAGE_VERSION_ARB). The format of the returned
string is:
<p>&quot;major.minor.release vendor_info_string&quot;. (with &quot;release&quot; and
  &quot;vendor_info_string&quot; being optional). Version numbers have 1 or more
  digits.</p>
<p> Unfortunately this is not possible with the initial version of the OpenGL
  Shading Language. If the query returns an &quot;GL_INVALID_ENUM&quot; error, then you
  can assume it is version 1.051 (major=1, minor=0, revision=51). <br />
  <br />
</p>
<table width="90%" border="0" bgcolor="#EEEEEE">
  <tbody>
    <tr>
      <td><pre>if (glewIsSupported(&quot;ARB_shading_language_100&quot;)) 
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
<br />
<br />
If &quot;GL_ARB_shading_language_100&quot; is present, the other extensions related to
the shading language must be present too: &quot;GL_ARB_shader_objects&quot;,
&quot;GL_ARB_fragment_shader&quot;, and &quot;GL_ARB_vertex_shader&quot;.
<?php include("/home/virtual/opengl.org/var/www/html/sdk/inc/sdk_footer.txt"); ?>
<p>&nbsp;</p>
    <!-- InstanceEndEditable -->
    <table width="100%" border="0">
        <tr>
          <td width="50%" align="left" valign="middle"><!-- InstanceBeginEditable name="Link To Previous" -->
            <h3>Link To Previous</h3>
          <!-- InstanceEndEditable --></td>
          <td width="81%" align="right" valign="middle"><!-- InstanceBeginEditable name="Link To Next" -->
            <h3>Link To Next</h3>
          <!-- InstanceEndEditable --></td>
        </tr>
      </table>
      </td>
  </tr>
</table>
<p>&nbsp;</p>
<p>
  <?php include("/home/virtual/opengl.org/var/www/html/sdk/inc/sdk_footer.txt"); ?>
</p>
</body>
<!-- InstanceEnd --></html>
