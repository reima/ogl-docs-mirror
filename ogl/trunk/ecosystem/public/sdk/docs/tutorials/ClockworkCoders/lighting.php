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
      <h1>Per Fragment Lighting</h1>
    <!-- InstanceEndEditable --><!-- InstanceBeginEditable name="Tutorial Text" -->
    <h2 align="center"><img src="lighting-phong.png" width="411" height="323"></h2>
    <h2>Introduction</h2>
    <p>In OpenGL Shading language you can access built in OpenGL lighting  states. Implementing an advanced lightning model would be compatible  with standard OpenGL statements.</p>
    <h2>Accessing Lighting States</h2>
    <p>You can access all OpenGL Lighting states and some derived states. The  following tables can also be found in the OpenGL Shading Language  specification:</p>
    <h3>Light Source Parameters</h3>
    <p>gl_LightSource[] is a built-in array you can access for all lights. gl_LightSource is defined this way: </p>
    <table width="60%" border="0" align="center" bordercolor="#0000CC" bgcolor="#EEEEEE">
      <tr>
        <td><pre>struct gl_LightSourceParameters 
{   
   vec4 ambient;              // Aclarri   
   vec4 diffuse;              // Dcli   
   vec4 specular;             // Scli   
   vec4 position;             // Ppli   
   vec4 halfVector;           // Derived: Hi   
   vec3 spotDirection;        // Sdli   
   float spotExponent;        // Srli   
   float spotCutoff;          // Crli                              
                              // (range: [0.0,90.0], 180.0)   
   float spotCosCutoff;       // Derived: cos(Crli)                 
                              // (range: [1.0,0.0],-1.0)   
   float constantAttenuation; // K0   
   float linearAttenuation;   // K1   
   float quadraticAttenuation;// K2  
};    


uniform gl_LightSourceParameters gl_LightSource[gl_MaxLights];
        </pre></td>
      </tr>
      <tr>
        <td bgcolor="#CCCCFF"><span style="font-style: italic">Light Source Parameters Definition </span></td>
      </tr>
    </table>
    <h3>Material Parameters</h3>
    <p>You can access the values you set in C++ with <a href="http://www.opengl.org/sdk/docs/man/xhtml/glMaterial.xml" target="_blank">glMaterial</a> using the GLSL built-in variables gl_FrontMateral and gl_BackMaterial.</p>
    <table width="48%" border="0" align="center" bordercolor="#0000CC" bgcolor="#EEEEEE">
      <tr>
        <td><pre>struct gl_MaterialParameters  
{   
   vec4 emission;    // Ecm   
   vec4 ambient;     // Acm   
   vec4 diffuse;     // Dcm   
   vec4 specular;    // Scm   
   float shininess;  // Srm  
};  


uniform gl_MaterialParameters gl_FrontMaterial;  
uniform gl_MaterialParameters gl_BackMaterial;        </pre></td>
      </tr>
      <tr>
        <td bgcolor="#CCCCFF"><span style="font-style: italic">Material Parameters </span></td>
      </tr>
    </table>
    <p>&nbsp;</p>
    <h3>Derived State from Products of Light and Material    </h3>
    <table width="51%" border="0" align="center" bordercolor="#0000CC" bgcolor="#EEEEEE">
      <tr>
        <td><pre>struct gl_LightModelProducts  
{    
   vec4 sceneColor; // Derived. Ecm + Acm * Acs  
};  


uniform gl_LightModelProducts gl_FrontLightModelProduct;  
uniform gl_LightModelProducts gl_BackLightModelProduct;      


struct gl_LightProducts 
{   
   vec4 ambient;    // Acm * Acli    
   vec4 diffuse;    // Dcm * Dcli   
   vec4 specular;   // Scm * Scli  
};  


uniform gl_LightProducts gl_FrontLightProduct[gl_MaxLights];  
uniform gl_LightProducts gl_BackLightProduct[gl_MaxLights];
        </pre></td>
      </tr>
      <tr>
        <td bgcolor="#CCCCFF"><span style="font-style: italic">Derived State from Products of Light and Material </span></td>
      </tr>
    </table>
    <h2> Shading Models</h2>
    <p>A shading model is a mathematical representation of the surface characteric of an object. </p>
    <table width="50%" border="1" align="center" cellpadding="2" bordercolor="#000000">
      <tr align="left" valign="top">
        <td width="50%"><p><img src="lighting-original.png" width="324" height="255" align="top">Per Vertex Lighting using fixed function pipeline (without GLSL) </p>
          </td>
        <td width="50%"><p align="left"><img src="lighting-phong.png" width="324" height="255" align="top">Per Fragment Lighting using phong shading model (phong fragment shader) </p>
          </td>
      </tr>
    </table>
    <p>&nbsp;</p>
    <p style="font-weight: bold">Diffuse Reflection <span style="font-style: italic">(Lambert's cosine  law)</span> </p>
    <p align="center"><img src="lighting-diffuse.png" width="324" height="255"> <br>
    Image: Diffuse Term </p>
    <p>The angle between the two vectors, is called the angle of incidence. Lambert's law states that the amount of  reflected light is proportional to the cosine of the angle  of incidence (dot product). A surface is illuminated by a light source only if the angle of  incidence is between 0 and 90 degrees. </p>
    <table width="47%" border="0" align="center" bordercolor="#0000CC" bgcolor="#EEEEEE">
      <tr>
        <td><pre>varying vec3 N;<br>varying vec3 v;

void main(void)
{

   v = vec3(gl_ModelViewMatrix * gl_Vertex);       
   N = normalize(gl_NormalMatrix * gl_Normal);</pre>
          <pre>   gl_Position = gl_ModelViewProjectionMatrix * gl_Vertex;</pre>
          <pre>
}
          </pre></td>
      </tr>
      <tr>
        <td bgcolor="#CCCCFF">Vertex Shader Source Code </td>
      </tr>
    </table>
    <p>The current vertex position is transformed to eye space. This is done by multiplying the modelview matrix with the vertex position. The normal is passed to the fragment shader. <br>
    </p>
    <table width="39%" border="0" align="center" bordercolor="#0000CC" bgcolor="#EEEEEE">
      <tr>
        <td><pre>varying vec3 N;<br>varying vec3 v;

void main(void)
{
   vec3 L = normalize(gl_LightSource[0].position.xyz - v);   
   vec4 Idiff = gl_FrontLightProduct[0].diffuse * max(dot(N,L), 0.0);  

   gl_FragColor = Idiff;
}
        </pre></td>
      </tr>
      <tr>
        <td bgcolor="#CCCCFF">Fragment Shader Source Code </td>
      </tr>
    </table>
    <p>Lambert's Law is calculated for every fragment. Please note that the normal is an interpolated value and is may not be normalized, this is disregarded because the error is small. </p>
    <p style="font-weight: bold">Specular Reflection</p>
    <p align="center"><img src="lighting-specular.png" width="324" height="255"></p>
    <p align="center">Image: Specular Term </p>
    <p>Specular reflection is the direct reflection            of light by a surface. Shiny surfaces reflect almost all incident light            and therefore have bright specular highlights or hot spots. The location            of a highlight moves as you move your eye, while keeping the light            source and the surface at the stationary positions. In order to make            a surface mirror-like, decrease the diffuse reflection and increase        the specular reflection.</p>
    <p style="font-weight: bold">Ambient Reflection  </p>
    <p align="center" style="font-weight: bold"><img src="lighting-ambient.png" width="324" height="255"></p>
    <p align="center">Image: Ambient Term </p>
    <p>Ambient reflection is a gross approximation            of multiple reflections from indirect light sources (e.g., the surfaces            of walls and tables in a room that reflect off the lights from light            sources). Ambient reflection produces a constant illumination on all            surface, regardless of their orientation. If you look at the faces            of a cube to which only ambient reflection is applied, all the faces            are illuminated by the same amount of light. Ambient reflection itself        produces very little realism in images.</p>
    <p>Some Famous Shading Models you can implement: </p>
    <h3>Phong Shading Model </h3>
    <p>Bui Tuong Phong published his illumination model in 1973: "<a href="http://portal.acm.org/citation.cfm?id=906584&dl=ACM&coll=&CFID=15151515&CFTOKEN=6184618">Illumination for Computer-Generated Images</a>".</p>
    <h3>Blinn-Phong Shading Model </h3>
    <p>This model was introduces by Blinn, James F. Models of Light Reflection for Computer Synthesized Pictures. Computer Graphics (SIGGRAPH 77 Proceedings) 11(2) July 1977, p. 192-198.</p>
    <h3>Cook-Torrance Shading Model </h3>
    <p>Robert L. Cook, Kenneth E. Torrance,  <a href="http://portal.acm.org/citation.cfm?id=357293">A reflectance model for computer graphics</a>, 1982. </p>
    <h3>Schlick Shading Model </h3>
    <p>This lighting model was created by Christophe Schlick, <a href="http://dept-info.labri.fr/~schlick/DOC/ewr3.html" title="http://dept-info.labri.fr/~schlick/DOC/ewr3.html" rel="nofollow">A Customizable Reflectance Model for Everyday Rendering</a>, Fourth Eurographics Workshop on Rendering, 1993.</p>
    <h2>Implementing a Phong Shader (for one Point-Light) </h2>
    <p>&nbsp;</p>
    <table width="44%" border="0" align="center" bordercolor="#0000CC" bgcolor="#EEEEEE">
      <tr>
        <td><pre>varying vec3 N;<br>varying vec3 v;</pre>
          <pre>void main(void)  
{     
   v = vec3(gl_ModelViewMatrix * gl_Vertex);       
   N = normalize(gl_NormalMatrix * gl_Normal);</pre>
          <pre>   gl_Position = gl_ModelViewProjectionMatrix * gl_Vertex;  
}
          </pre>          </td>
      </tr>
      <tr>
        <td bgcolor="#CCCCFF">Vertex Shader Source Code </td>
      </tr>
    </table>
    <br>
    <table width="59%" border="0" align="center" bordercolor="#0000CC" bgcolor="#EEEEEE">
      <tr>
        <td><pre>varying vec3 N;<br>varying vec3 v;    </pre>
          <pre>void main (void)  
{  
   vec3 L = normalize(gl_LightSource[0].position.xyz - v);   
   vec3 E = normalize(-v); // we are in Eye Coordinates, so EyePos is (0,0,0)  
   vec3 R = normalize(-reflect(L,N));  <br> <br>   //calculate Ambient Term:  
   vec4 Iamb = gl_FrontLightProduct[0].ambient;    

   //calculate Diffuse Term:  
   vec4 Idiff = gl_FrontLightProduct[0].diffuse * max(dot(N,L), 0.0);    
   
   // calculate Specular Term:
   vec4 Ispec = gl_FrontLightProduct[0].specular 
                * pow(max(dot(R,E),0.0),0.3*gl_FrontMaterial.shininess);</pre>
          <pre>   // write Total Color:  
   gl_FragColor = gl_FrontLightModelProduct.sceneColor + Iamb + Idiff + Ispec;     
}
          </pre>          </td>
      </tr>
      <tr>
        <td bgcolor="#CCCCFF">Fragment Shader Source Code </td>
      </tr>
    </table>
    <h2>Example Project </h2>
    <p>In this example project the above example shaders are used. You can use this as base to implement it for more lights and/or different shading models. </p>
    <p><a href="downloads/GLSL_Lighting.zip" style="font-weight: bold">Download:
      GLSL_Lighting.zip</a> (Visual Studio 8 Project)<br>
        <span style="font-style: italic">(If you create a project/makefile for a different platform/compiler, please send it to: christen(at)clockworkcoders.com and I will put it here.) </span></p>
    <p>&nbsp; </p>
    <p>&nbsp;</p>
    <!-- InstanceEndEditable -->
    <table width="100%" border="0">
        <tr>
          <td width="50%" align="left" valign="middle"><!-- InstanceBeginEditable name="Link To Previous" -->
            <h3><a href="texturing.php">Previous: Texturing</a></h3>
          <!-- InstanceEndEditable --></td>
          <td width="81%" align="right" valign="middle"><!-- InstanceBeginEditable name="Link To Next" -->
            <h3><a href="discard.php">Next: Discarding Fragments </a></h3>
          <!-- InstanceEndEditable --></td>
        </tr>
      </table>    </td>
  </tr>
</table>
<p align="center"><img src="author.gif" width="377" height="21"></p>
<p><br>
  <?php include("/home/virtual/opengl.org/var/www/html/sdk/inc/sdk_footer.txt"); ?>
</p>
</body>
<!-- InstanceEnd --></html>
