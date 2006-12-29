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
      <h1>Loading, Compiling, Linking, and Using GLSL Programs</h1>
    <!-- InstanceEndEditable --><!-- InstanceBeginEditable name="Tutorial Text" -->
    <h2 align="center"><img src="screenshot_load.gif" alt="tutorial image" width="302" height="244"></h2>
    <h2>A Simple Vertex Shader</h2>
    <p>This vertex shader scales all vertices in x and y direction. This doesn't really make much sense, but it is a good example to get started with. All vertices of our primitive (or object or scene) will go through this program. gl_Vertex is the current vertex which is being processed by this program. The vertex has the same (untransformed) values like you specify in glVertex3f(x,y,z) in your C++ program. The gl_ModelViewProjectionMatrix is the concatenated modelview and projection matrix.  I assume you know what the modelview and projection matrices are, otherwise you can look it up in the <a href="http://www.opengl.org/sdk/docs/man/xhtml/glMatrixMode.xml" target="_blank">OpenGL SDK</a>. </p>
    <table width="90%" border="0" align="center" bordercolor="#0000CC" bgcolor="#EEEEEE">
      <tr>
        <td><pre>void main(void)
{
   vec4 a = gl_Vertex;
   a.x = a.x * 0.5;
   a.y = a.y * 0.5;


   gl_Position = gl_ModelViewProjectionMatrix * a;

}       </pre></td>
      </tr>
      <tr>
        <td bgcolor="#CCCCFF"><span style="font-style: italic">Vertex Shader Source Code </span></td>
      </tr>
    </table>
    <h2>A Simple Fragment Shader </h2>
    <p>A fragment is basically a pixel before it is rasterized. If you render a fully visible triangle then all pixels between the three vertices must be drawn. Before those pixels are drawn they go through the fragment processor and for each possible pixel the fragment program is exectuted.</p>
    <p>In this simple example every fragment is set to green. gl_FragColor holds the output color.</p>
    <table width="90%" border="0" align="center" bordercolor="#0000CC" bgcolor="#EEEEEE">
      <tr>
        <td><pre>void main (void)  
{     
   gl_FragColor = vec4(0.0, 1.0, 0.0, 1.0);  
}        </pre></td>
      </tr>
      <tr>
        <td bgcolor="#CCCCFF"><span style="font-style: italic">Fragment Shader Source Code </span></td>
      </tr>
    </table>
    <h2>Loading Shader</h2>
    <p>Now we have two simple shaders, a vertex and a fragment shader. If the shaders are located in text files they must be loaded into memory first. <span style="font-weight: bold">This part has nothing to do with OpenGL</span>, it is a simple ASCII file loader. If you write your shaders in Unicode (for the comments), you have to write your own loader. The actual program in memory should be in ASCII. You could also embed your shaders into your C++ code using a static char array. In other words: it doesn't matter how you get your shaders into memory. I recommend using ASCII files. This way you can change your shader code without recompiling your application. The source here simply loads an ASCII Shader File: </p>
    <table width="67%" border="0" align="center" bordercolor="#0000CC" bgcolor="#EEEEEE">
      <tr>
        <td><pre>unsigned long getFileLength(ifstream&amp; file)<br>{<br>    if(!file.good()) return 0;<br>    <br>    unsigned long pos=file.tellg();<br>    file.seekg(0,ios::end);<br>    unsigned long len = file.tellg();<br>    file.seekg(ios::beg);<br>    <br>    return len;<br>}

int loadshader(char* filename, GLchar** ShaderSource, unsigned long* len)<br>{<br>   ifstream file;<br>   file.open(filename, ios::in); // opens as ASCII!<br>   if(!file) return -1;<br>    <br>   len = getFileLength(file);<br>    <br>   if (len==0) return -2;   // Error: Empty File <br>    <br>   *ShaderSource = (GLubyte*) new char[len+1];<br>   if (*ShaderSource == 0) return -3;   // can't reserve memory<br>   
    // len isn't always strlen cause some characters are stripped in ascii read...
    // it is important to 0-terminate the real length later, len is just max possible value... <br>   *ShaderSource[len] = 0; <br><br>   unsigned int i=0;<br>   while (file.good())<br>   {<br>       *ShaderSource[i] = file.get();       // get character from file.<br>       if (!file.eof())<br>        i++;<br>   }<br>    <br>   *ShaderSource[i] = 0;  // 0-terminate it at the correct position<br>    <br>   file.close();<br>      <br>   return 0; // No Error<br>}


int unloadshader(GLubyte** ShaderSource)
{
   if (*ShaderSource != 0)
     delete[] *ShaderSource;
   *ShaderSource = 0;
}</pre></td>
      </tr>
      <tr>
        <td bgcolor="#CCCCFF"><span style="font-style: italic">C++ Source Code </span></td>
      </tr>
    </table>
    <p>&nbsp;</p>
    <h2>Compiling Shader</h2>
    <p>First you have to create an OpenGL &quot;Shader Object&quot; specifying what kind of shader it is (e.g. Vertex Shader, Geometry Shader, or Fragment Shader) . A shader object can be created using the OpenGL function <a href="http://www.opengl.org/sdk/docs/man/xhtml/glCreateShader.xml" target="_blank">glCreateShader</a> with the arguments GL_VERTEX_SHADER or GL_FRAGMENT_SHADER (or GL_GEOMETRY_SHADER_EXT).</p>
    <table width="90%" border="0" align="center" bordercolor="#0000CC" bgcolor="#EEEEEE">
      <tr>
        <td><pre>GLuint vertexShader, fragmentShader;
<br>vertexShaderObject = glCreateShader(GL_VERTEX_SHADER);
fragmentShaderObject = glCreateShader(GL_FRAGMENT_SHADER);
</pre></td>
      </tr>
      <tr>
        <td bgcolor="#CCCCFF"><span style="font-style: italic">C++ Source Code </span></td>
      </tr>
    </table>
    <p><br>
      Once you created the shader objects you can attach (or replace) the shader source code to that object using the OpenGL function <a href="http://www.opengl.org/sdk/docs/man/xhtml/glShaderSource.xml" target="_blank">glShaderSource</a>:</p>
    <table width="90%" border="0" align="center" bordercolor="#0000CC" bgcolor="#EEEEEE">
      <tr>
        <td><pre>glShaderSourceARB(vertexShaderObject, 1, &amp;VertexShaderSource, &amp;vlength);<br>glShaderSourceARB(fragmentShaderObject, 1, &amp;FragmentShaderSource, &amp;flength);</pre></td>
      </tr>
      <tr>
        <td bgcolor="#CCCCFF"><span style="font-style: italic">C++ Source Code </span></td>
      </tr>
    </table>
    <p>Now it is time to compile!  This can be done using the OpenGL function <a href="http://www.opengl.org/sdk/docs/man/xhtml/glCompileShader.xml" target="_blank">glCompileShader</a>:</p>
    <table width="90%" border="0" align="center" bordercolor="#0000CC" bgcolor="#EEEEEE">
      <tr>
        <td><pre>glCompileShaderARB(vertexShaderObject);

glCompileShaderARB(fragmentShaderObject);</pre></td>
      </tr>
      <tr>
        <td bgcolor="#CCCCFF"><span style="font-style: italic">C++ Source Code </span></td>
      </tr>
    </table>
    <p>Now the shaders are probably compiled. But what if you made some typo when entering the shader source code ? To check if the compile was successful or not you can use glGetObjectParameteriv with &quot;GL_COMPILE_STATUS&quot; argument. </p>
    <table width="90%" border="0" align="center" bordercolor="#0000CC" bgcolor="#EEEEEE">
      <tr>
        <td><pre>GLint compiled;

glGetObjectParameteriv(ShaderObject, GL_COMPILE_STATUS, &amp;compiled);
if (compiled)
{
   ... // yes it compiled!
}        </pre></td>
      </tr>
      <tr>
        <td bgcolor="#CCCCFF"><span style="font-style: italic">C++ Source Code. </span></td>
      </tr>
    </table>
    <p>If compilation failed, the exact cause can be checked using <a href="http://www.opengl.org/sdk/docs/man/xhtml/glGetShaderInfoLog.xml" target="_blank">glGetShaderInfoLog</a>. This usually returns a log message with the error description. The contents of the returned log is  depends on the implementation/driver.</p>
    <table width="90%" border="0" align="center" bordercolor="#0000CC" bgcolor="#EEEEEE">
      <tr>
        <td><pre>GLint blen = 0;	<br>GLsizei slen = 0;

glGetShaderiv(ShaderObject, GL_INFO_LOG_LENGTH , &amp;blen);       
</pre>
          <pre>if (blen &gt; 1)
{
 GLchar* compiler_log = (GLchar*)malloc(blen);</pre>
          <pre> glGetInfoLogARB(ShaderObject, blen, &amp;slen, compiler_log);
 cout &lt;&lt; &quot;compiler_log:\n&quot;, compiler_log);
 free (compiler_log);
}</pre>          </td>
      </tr>
      <tr>
        <td bgcolor="#CCCCFF"><span style="font-style: italic">C++ Source Code </span></td>
      </tr>
    </table>
    <h2>Linking</h2>
    <p>A vertex shader and fragment shader (and geometry shader) must be put together to a unit before it is possible to link. This unit is called &quot;Program Object&quot;. The Program Object is created using <a href="http://www.opengl.org/sdk/docs/man/xhtml/glCreateProgram.xml" target="_blank">glCreateProgram</a>.</p>
    <p>The OpenGL function <a href="http://www.opengl.org/sdk/docs/man/xhtml/glAttachShader.xml" target="_blank">glAttachShader</a> can attach a Shader Objects to a Program Object.</p>
    <p style="font-style: italic">(When using geometry shaders, you have to specify input primitive Type, output primitive type and maximal number of vertices before linking. But for now forget about geometry shaders.) </p>
    <table width="90%" border="0" align="center" bordercolor="#0000CC" bgcolor="#EEEEEE">
      <tr>
        <td><pre>

ProgramObject = glCreateProgram();

glAttachShader(ProgramObject, vertexShaderObject);
glAttachShader(ProgramObject, fragmentShaderObject);
<br>glLinkProgram(ProgramObject);        </pre></td>
      </tr>
      <tr>
        <td bgcolor="#CCCCFF"><span style="font-style: italic">C++ Source Code </span></td>
      </tr>
    </table>
    <p>&nbsp;</p>
    <p>To check if linking was successful, glGetObjectParameteriv can be used again, similar to compiling.</p>
    <table width="90%" border="0" align="center" bordercolor="#0000CC" bgcolor="#EEEEEE">
      <tr>
        <td><pre>GLint linked;
glGetProgramiv(ProgramObject, GL_LINK_STATUS, &amp;linked);
if (linked)
{<br>   // ok!
}       </pre></td>
      </tr>
      <tr>
        <td bgcolor="#CCCCFF"><span style="font-style: italic">C++ Source Code </span></td>
      </tr>
    </table>
    <p><br>
    It is also possible to get a linker log, similar to the compiler log. Instead of using the ShaderObject, use the ProgramObject. </p>
    <h2>Using Shaders</h2>
    <p>Once you have a linked Program Object, it is very easy to use that shader with the OpenGL function <a href="http://www.opengl.org/sdk/docs/man/xhtml/glUseProgram.xml" target="_blank">glUseProgram</a> with the program object as argument. To stop using the program you can call glUseProgram(0).</p>
    <h2>Example Project </h2>
    <p>As you see it is pretty easy to load, compile, link and use shaders. On the other side it is pretty complicated if you use many different shaders in your code. I created some C++ classes which simplify the whole process.</p>
    <p>the class cwc::glShaderManager loads, compiles and links a GLSL program (from file or memory). It returns a cwc::glShader, which holds/represents the &quot;Program Object&quot;. There are many other useful things in that class. It is the &quot;libglsl&quot; I created a while back. </p>
    <table width="90%" border="0" align="center" bordercolor="#0000CC" bgcolor="#EEEEEE">
      <tr>
        <td><pre>#include &quot;glsl.h&quot;<br>
cwc::glShaderManager SM;<br>cwc::glShader *shader;

shader = SM.loadfromFile(&quot;vertexshader.txt&quot;,&quot;fragmentshader.txt&quot;); // load (and compile, link) from file<br>if (shader==0) <br>   std::cout &lt;&lt; &quot;Error Loading, compiling or linking shader\n&quot;;

...

shader-&gt;begin();
  drawPrimitive
shader-&gt;end();
        </pre></td>
      </tr>
      <tr>
        <td bgcolor="#CCCCFF"><span style="font-style: italic">C++ Source Code </span></td>
      </tr>
    </table>
    <p> In future tutorials, this way is used to load/compile/link shaders to reduce code overhead. </p>
    <p><a href="downloads/GLSL_Loading.zip" style="font-weight: bold">Download:
      GLSL_Loading.zip</a> (Visual Studio 8 Project)<br>
      <span style="font-style: italic">(If you create a project/makefile for a different platform/compiler, please send it to: christen(at)clockworkcoders.com and I will put it here.) </span></p>
    <p>&nbsp;</p>
    <!-- InstanceEndEditable -->
    <table width="100%" border="0">
        <tr>
          <td width="50%" align="left" valign="middle"><!-- InstanceBeginEditable name="Link To Previous" -->
            <h3><a href="index.php">Return to Index</a></h3>
          <!-- InstanceEndEditable --></td>
          <td width="81%" align="right" valign="middle"><!-- InstanceBeginEditable name="Link To Next" -->
            <h3><a href="uniform.php">Next: Uniform Variables</a></h3>
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
