<html>

<head>

<title>Hello OpenGL</title>

<?php include("http://www.opengl.org/inc/sdk_head.txt"); ?>

</head>

<body>

<?php include("http://www.opengl.org/inc/sdk_body_start.txt"); ?>

<h1>OpenGL: Hello World using GLUT</h1>

This is a temporary demo to test subversion and php!
<br/>
<br/>

<table width="90%" border="0" bordercolor="#0000CC" bgcolor="#EEEEEE">
<tr>
<td>
<pre>
#if defined(__APPLE__) && defined(__MACH__)
#  include &#60;OpenGL/gl.h&#62;
#  include &#60;OpenGL/glu.h&#62;
#  include &#60;GLUT/glut.h&#62;
#else
#  include &#60;GL/gl.h&#62;
#  include &#60;GL/glu.h&#62;
#  include &#60;GL/glut.h&#62;
#endif

void Display(void)
{   
   glClear ( GL_COLOR_BUFFER_BIT );    
   glutWireSphere(1.0,32,32);   
   glutSwapBuffers();
}

void Reshape(int w, int h)
{
   glViewport(0,0, (GLsizei) w, (GLsizei) h);
   glMatrixMode(GL_PROJECTION);
   glLoadIdentity();

   GLdouble aspect = (GLdouble) w/((h)?h:1.0);
   gluPerspective(45.0f, aspect, 1.0f, 100.0f);

   glMatrixMode(GL_MODELVIEW);
   glLoadIdentity();

   gluLookAt(0.0, 0.0, 5.0, 0.0, 0.0, 0.0, 0.0, 1.0, 0.0);

   glutPostRedisplay();
}

int main(int argc, char *argv[])
{   
  glutInitWindowSize(640, 480);
  glutInitWindowPosition ( 100, 100 );
  glutInitDisplayMode(GLUT_RGB | GLUT_DOUBLE );
  glutInit(&argc, argv);
  
  glutCreateWindow( "Hello World" );
  glutDisplayFunc( Display );
  glutReshapeFunc( Reshape );
   
  glutMainLoop();
  
  return 0; 
}
</pre>
</td>
</tr>
</table>  
<br/>
<br/>
This is a temporary demo to test subversion and php!


<?php include("http://www.opengl.org/inc/sdk_footer.txt"); ?>

</body>

</html>
