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
      <h1>Vertex Attributes </h1>
    <!-- InstanceEndEditable --><!-- InstanceBeginEditable name="Tutorial Text" -->
    <h2>Introduction</h2>
    <p>Vertex attributes are used to communicate from &quot;outside&quot; to the vertex shader. Unlike uniform variables, values are provided per vertex (and not globally for all vertices). There are built-in vertex attributes like the normal or the position, or you can specify your own vertex attribute like a tangent or another custom value. Attributes can't be defined in the fragment shader. </p>
    <p>Attributes can be defined in the vertex shader using the &quot;attribute&quot; qualifier: </p>
    <table width="90%" border="0" align="center" bordercolor="#0000CC" bgcolor="#EEEEEE">
      <tr>
        <td><pre>attribute float myAttrib;
</pre></td>
      </tr>
      <tr>
        <td bgcolor="#CCCCFF"><span style="font-style: italic">Vertex Shader Source Code </span></td>
      </tr>
    </table>
    <p>&nbsp; </p>
    <h2>Built in Vertex Attributes</h2>
    <p>In many cases the built in vertex attributes are sufficent to use. In the C++ program you can use the regular OpenGL function to set vertex attribute values, for example glVertex3f for the position. </p>
    <table width="50%" border="0" align="center" bgcolor="#DDFFEE">
      <tr>
        <td width="32%"><span style="font-weight: bold">gl_Vertex</span></td>
        <td width="68%">Position (vec4) </td>
      </tr>
      <tr>
        <td><span style="font-weight: bold">gl_Normal</span></td>
        <td>Normal (vec4) </td>
      </tr>
      <tr>
        <td><span style="font-weight: bold">gl_Color</span></td>
        <td>Primary color of vertex (vec4) </td>
      </tr>
      <tr>
        <td><span style="font-weight: bold">gl_MultiTexCoord0</span></td>
        <td>Texture coordinate of texture unit 0 (vec4) </td>
      </tr>
      <tr>
        <td><span style="font-weight: bold">gl_MultiTexCoord1</span></td>
        <td>Texture coordinate of texture unit 1 (vec4) </td>
      </tr>
      <tr>
        <td><span style="font-weight: bold">gl_MultiTexCoord2</span></td>
        <td>Texture coordinate of texture unit 2 (vec4) </td>
      </tr>
      <tr>
        <td><span style="font-weight: bold">gl_MultiTexCoord3</span></td>
        <td>Texture coordinate of texture unit 3 (vec4) </td>
      </tr>
      <tr>
        <td><span style="font-weight: bold">gl_MultiTexCoord4</span></td>
        <td>Texture coordinate of texture unit 4 (vec4) </td>
      </tr>
      <tr>
        <td><span style="font-weight: bold">gl_MultiTexCoord5</span></td>
        <td>Texture coordinate of texture unit 5 (vec4) </td>
      </tr>
      <tr>
        <td><span style="font-weight: bold">gl_MultiTexCoord6</span></td>
        <td><p>Texture coordinate of texture unit 6 (vec4) </p>          </td>
      </tr>
      <tr>
        <td><span style="font-weight: bold">gl_MultiTexCoord7</span></td>
        <td>Texture coordinate of texture unit 7 (vec4) </td>
      </tr>
      <tr>
        <td><span style="font-weight: bold">gl_FogCoord</span></td>
        <td>Fog Coord (float)</td>
      </tr>
    </table>
    <h3>Example: Built-in Vertex Attributes </h3>
    <p>This example uses the built in attributes gl_Vertex and gl_Color. The color value is used to translate the object (i.e. misuse of color) . </p>
    <p align="center"><img src="attrib.gif" alt="tutorial example" width="264" height="207"></p>
    <table width="90%" border="0" align="center" bordercolor="#0000CC" bgcolor="#EEEEEE">
      <tr>
        <td><pre>glBegin(GL_TRIANGLES)
   glVertex3f(0.0f, 0.0f, 0.0f);
   glColor3f(0.1,0.0,0.0);
   glVertex3f(1.0f, 0.0f, 0.0f);
   glColor3f(0.0,0.1,0.0);
   glVertex3f(1.0f, 1.0f, 0.0f);
   glColor3f(0.1,0.1,0.0);

glEnd();    </pre></td>
      </tr>
      <tr>
        <td bgcolor="#CCCCFF"><span style="font-style: italic">C++ Source Code </span></td>
      </tr>
    </table>
    <br>
    <table width="90%" border="0" align="center" bordercolor="#0000CC" bgcolor="#EEEEEE">
      <tr>
        <td><pre>void main(void)<br>{
   vec4 a = gl_Vertex + gl_Color;<br>   gl_Position = gl_ModelViewProjectionMatrix * a;<br>}</pre></td>
      </tr>
      <tr>
        <td bgcolor="#CCCCFF"><span style="font-style: italic">Vertex Shader Source Code </span></td>
      </tr>
    </table>
    <br>
    <table width="90%" border="0" align="center" bordercolor="#0000CC" bgcolor="#EEEEEE">
      <tr>
        <td><pre>void main (void)  <br>{     <br>   gl_FragColor = gl_FragColor = vec4(0.0,0.0,1.0,1.0);  <br>}</pre></td>
      </tr>
      <tr>
        <td bgcolor="#CCCCFF"><span style="font-style: italic">Fragment Shader Source Code </span></td>
      </tr>
    </table>
    <h2>Custom Vertex Attributes</h2>
    <p>A custom, user-defined attribute can also be defined. The OpenGL function <a href="http://www.opengl.org/sdk/docs/man/xhtml/glBindAttribLocation.xml" target="_blank">glBindAttribLocation</a> associates the name of the variable with an index.</p>
    <p>For example, glBindAttribLocation(ProgramObject, 10, &quot;myAttrib&quot;) would bind the attribute &quot;myAttrib&quot; to index 10.</p>
    <p>The maximum number of attribute locations is limited by the graphics hardware. You can retrieve the maximum supported number of vertex attributes with glGetIntegerv(GL_MAX_VERTEX_ATTRIBS, &amp;n).</p>
    <p>Setting attribute values can be done using <a href="http://www.opengl.org/sdk/docs/man/xhtml/glVertexAttrib.xml" target="_blank">glVertexAttrib</a> function. </p>
    <p>Unfortunately there are certain limitations when using this on NVidia Hardware.  According to NVidia:<br>
      &quot;<span style="font-style: italic">GLSL attempts to eliminate aliasing of vertex attributes but this is integral to NVIDIA&rsquo;s hardware approach and necessary for maintaining compatibility with existing OpenGL applications that NVIDIA customers rely on. NVIDIA&rsquo;s GLSL implementation therefore does not allow built-in vertex attributes to collide with a generic vertex attributes that is assigned to a particular vertex  attribute index with glBindAttribLocation. For example, you should not use gl_Normal (a built-in vertex attribute) and also use glBindAttribLocation to bind a generic vertex attribute named &quot;whatever&quot; to vertex attribute index 2 because gl_Normal aliases to index 2.</span>&quot;</p>
    <p>In other words, NVidia hardware indices are reserved for built-in attributes. You can't use the following indices.</p>
    <table width="28%" border="0" align="center" bgcolor="#DDFFEE">
      <tr>
        <td width="74%">gl_Vertex</td>
        <td width="26%">0</td>
      </tr>
      <tr>
        <td>gl_Normal</td>
        <td>2</td>
      </tr>
      <tr>
        <td>gl_Color</td>
        <td>3</td>
      </tr>
      <tr>
        <td>gl_SecondaryColor</td>
        <td>4</td>
      </tr>
      <tr>
        <td>gl_FogCoord</td>
        <td>5</td>
      </tr>
      <tr>
        <td>gl_MultiTexCoord0</td>
        <td>8</td>
      </tr>
      <tr>
        <td>gl_MultiTexCoord1</td>
        <td>9</td>
      </tr>
      <tr>
        <td>gl_MultiTexCoord2</td>
        <td>10</td>
      </tr>
      <tr>
        <td>gl_MultiTexCoord3</td>
        <td>11</td>
      </tr>
      <tr>
        <td>gl_MultiTexCoord4</td>
        <td>12</td>
      </tr>
      <tr>
        <td>gl_MultiTexCoord5</td>
        <td>13</td>
      </tr>
      <tr>
        <td>gl_MultiTexCoord6</td>
        <td>14</td>
      </tr>
      <tr>
        <td>gl_MultiTexCoord7</td>
        <td>15</td>
      </tr>
    </table>
    <h2>Example Project</h2>
    <p><a href="downloads/GLSL_Attributes.zip" style="font-weight: bold">Download:
      GLSL_Attributes.zip</a> (Visual Studio 8 Project)<br>
      <span style="font-style: italic">(If you create a project/makefile for a different platform/compiler, please send it to: christen(at)clockworkcoders.com and I will put it here.) </span> </p>
    <p>&nbsp; </p>
    <!-- InstanceEndEditable -->
    <table width="100%" border="0">
        <tr>
          <td width="50%" align="left" valign="middle"><!-- InstanceBeginEditable name="Link To Previous" -->
            <h3><a href="uniform.php">Previous: Uniform Variables</a></h3>
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
