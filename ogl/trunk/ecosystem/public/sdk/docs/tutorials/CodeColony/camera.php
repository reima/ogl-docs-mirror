<html>
<head>
<title>Camera - by CodeColony.de</title>
<?php include("http://www.opengl.org/inc/sdk_head.txt"); ?>
</head>

<body>
<?php include("http://www.opengl.org/inc/sdk_body_start.txt"); ?>
<h1>The CodeColony Camera</h1>
<h2>Before you start</h2>
<p>
To understand the basics for this tutorial and to learn what you need to compile the source, please visit
<a href="http://www.codecolony.de">www.codecolony.de</a> and read the first tutorials.
</p>
<h2>How can the CodeColony camera be useful for me?</h2>
<p>
To display a scene using OpenGL you have to specify what your scene contains <i>and</i> from which point this
scene should be rendered. This point can be considered as the position of a camera. But such a position is not enough.
You have to tell OpenGL in which direction this camera "looks". Also: What's the up vector of the camera?
</p>
<p>
In some cases you might be happy with functions like <i>gluLookAt()</i>. In other cases you are not. Imagine the user of your
OpenGL application wants to "fly" through your scene like a ghost: It will give the camera commands like "move forward",
"turn right", "roll", "strafe left" and so on. You would have to compute the position of the camera, it's view point
and the up-vector after each command.<br>
Well, don't reinvent the wheel - better use the code of others. CodeColony's camera does exactly what you need
in this case.

</p>
<h2>Usage of the CodeColony camera</h2>
<p>
The interface of the Camera class looks like this:
<pre>
void RotateX ( GLfloat Angle );
void RotateY ( GLfloat Angle );
void RotateZ ( GLfloat Angle );

void MoveForward ( GLfloat Distance );
void MoveUpward ( GLfloat Distance );
void StrafeRight ( GLfloat Distance );

void Move ( SF3dVector Direction );

void Render ( void );
</pre>
To understand what these functions do you should know that all (ok, nearly all) moves and rotations are done relative
to a kind of local coordinate system of the camera. Put yourself in the position of the camera. Your "up-vector" is now called
the z-axis. The direction from you to the view point (the point you look at) is called the z-Axis and the cross product between
these vectors is, of course, the x-axis.
</p>
<p>
Now the RotateX/Y/Z functions are easy to understand: "RotateX" rotates the camera around the "local x-axis", you might say the
camera turns its head up or down. "RotateY" rotates the camera around the local y-axis, which means that the camera turns left
or right.
Both rotations change the view point. The third does not: Here, the camera is rotated around the local z-axis.
</p>
<p>In all RotateX/Y/Z functions the position of the camera remains where it is. If you want to change this position, you can use
MoveForward to move the camera in the direction of the local z-axis, MoveUpward to move it in the direction of the local y-axis
and StrafeRight to move it in the direction of the local x-axis. (Negative values mean "move backward", "move downward" and
"strafe left", of course).<br>
If you need to move the camera relative to the "outside world", you can call "Move" to add a vector the camera's position.
</p>
<p>
The last call is probably the most important one: The calls I described above do not have any effect if the camera is not
"rendered". To do this, you can use such a Display function:
<pre>
void Display(void)
{
    glClear(GL_COLOR_BUFFER_BIT);
    glLoadIdentity();

    Camera.Render();

    //Draw the "world" (which consists of six "nets" forming a cuboid
    ...

    //finish rendering:
    glFlush();
    glutSwapBuffers();
}
</pre>
As you can easily see: After glLoadIdentity() you call Camera.Render() which makes the required OpenGL calls.
</p>

<p>You can test the camera before using it in your own projects with the following files:
<li><a href="../../CameraVS2005.zip">Visual Studio 2005 project</a></li>
</p>

<hr noshade size="1">
<p>
<h2>Contact</h2>
Any comments? Contact me!<br>
<a href="mailto:philipp.crocoll@web.de">philipp.crocoll@web.de</a><br>
<a href="http://www.codecolony.de">www.codecolony.de</a>
</p>
<?php include("http://www.opengl.org/inc/sdk_footer.txt"); ?>
</body>

</html>