<html>
<head>
<title>Vertex Arrays - by CodeColony.de</title>
<?php include("http://www.opengl.org/inc/sdk_head.txt"); ?>
</head>

<body>
<?php include("http://www.opengl.org/inc/sdk_body_start.txt"); ?>
<h1>Vertex Arrays</h1>
<h2>Before you start</h2>
<p>
To understand the basics for this tutorial and to learn what you need to compile the source, please visit
<a href="http://www.codecolony.de">www.codecolony.de</a> and read the first tutorial.
</p>
<h2>What can I learn in this tutorial?</h2>
<p>
This tutorial will give you an introduction to an important topic in OpenGL programming: Vertex arrays.
What are vertex arrays? You should have learned the basics of OpenGL already and you should have seen how you can
pass vertices to OpenGL using the glVertex*() function. You can call this function a few times to render a simple object,
but what if you have loaded a complex 3d model from a file? Yes, you can use glVertex* in a loop to pass all vertices.
But there is a way which is both easier and more performant: This is where vertex arrays come in. This is especially true
if you have many values for each vertex, like position, color, normal vector and so on. One more benefit:
Unlike with display lists you can easily change one ore more vertices during the application runs.<br>
In this tutorial you will see how you can include this functionality into an OpenGl program.
</p>
<p>
So we need some vertices to display! Where to get them? I am not a 3d artist, so let's calculate them instead of loading
a model: We will create a sphere -
ok that's nothing exciting. But in order to show you how vertex arrays can be modifed let's move the "northpole" and "southpole"
(i.e. the highest and the lowest vertex) up and down.
</p>

<h2>How can I compute vertices on a sphere?</h2>

<p>Note: If we would simply render a sphere, we could use the glut command. But: you cannot specify different
colors for the vertices. And what I did in this tutorial is also not possible with <i>glutWireSphere():
</i>You cannot move certain points up and down. So it is necessary to compute the
vertices on our own. To do this, you can use several circles ( in the x-z-plane), each with
another radius and y-value. The highest and lowest circles have a radius of zero, so we
can say, it is only one vertex. <br>
The radius of the sphere will be 1.0. This is common, if you want to draw bigger or smaller spheres you call <i>glScale()</i>.
At first, we need the radius of each circle dependent on its y value. After some geometry considerations we find the formula
<i> r = sin ( acos(yValueOfCircle));</i><br>
Now it is quite easy to compute the vertices: You have the y-value
and the radius of the circle, that is parallel to the x-z-plane. Therefore you can simply use sin() and cos() to
compute the x- and z-values. We use the same number of vertices in each circle to make it easier to "connect" vertices to
triangles. </p>

<h2>How can I use vertex arrays?</h2>
<p>
Let's start with the first things first:<br>
Before you can use the vertex array functionality, you have to turn it on. Therefore you must
enable each array type you want to use, this is done by <i>glEnableClientState(). </i>You can use
GL_VERTEX_ARRAY, GL_NORMAL_ARRAY; GL_COLOR_ARRAY, GL_INDEX_ARRAY (this means color
indices, not the vertex indices I mentioned before), GL_TEXTURE_COORD_ARRAY or
GL_EDGE_FLAG_ARRAY as parameter. In this tutorial we will use only two of these:</p>
<pre>
//Enable the vertex array functionality:
glEnableClientState(GL_VERTEX_ARRAY);
//Enable the color array functionality (so we can specify a color for each vertex)
glEnableClientState(GL_COLOR_ARRAY);
</pre>
<p>
Now we can pass the date to render to OpenGl. Note that this does not happen during the rendering operation but before (which
means it need not be done each time the scene is rendered).<br>
For each array type there is a special function to do so: <i>glVertexPointer / glNormalPointer /
glColorPointer / glIndexPointer / glTexCoordPointer / glEdgeFlagPointer</i>. The first
parameter tells OpenGL, how many components there are per vertex. For example you would
use 2 for 2d-vertices, 3 for 3d-vertices and 4 for 4d-vertices in glVertexPointer.
</p>
<p>
The second parameter specifies the data type (values could be GL_BYTE, GL_INT, GL_FLOAT
and so on).The third one is used, when your data is not tightly packed. This is the case, if
you use a &quot;vertex&quot;-struct, where several values for a vertex (position and
normal vector, for example) are stored. Then you pass the size of your vertex struct,
otherwise you take zero. The last parameter is a pointer to the data.
</p>
<p>In this tutorial I defined a simple struct which contains both the position and the color of a vertex:</p>
<pre>
struct SVertex
{
	GLfloat x,y,z;
	GLfloat r,g,b;
};
</pre>
<p>
So we need a call to glVertexPointer and a call to glColorPointer:
</p>
<pre>
//pass the vertex pointer:
glVertexPointer( 3,   //3 components per vertex (x,y,z)
                 GL_FLOAT,
                 sizeof(SVertex),
                 Vertices);
//pass the color pointer
glColorPointer(  3,   //3 components per vertex (r,g,b)
                 GL_FLOAT,
                 sizeof(SVertex),
                 &Vertices[0].r);  //Pointer to the first color
</pre>
<p>
You can see that each array has 3 components (x,y,z or r,g,b), the data type is always GL_FLOAT. As the vertex data is packed
we pass the sizeof(SVertex). The pointer to the color array must point to the first color value in the array, which is the ".r"-value
of the first array element.
</p>
<p>
Now we have set up the functionality and passed the vertices to OpenGl. But we have not yet rendered anything. So let's take
a look at the "DrawSphere" function (which you can find in the code file).<br>
There are two different calls for rendering the sphere as a "wire sphere" or as points. Look at the code and you probably will
understand why:
</p>
<pre>
if (!PointsOnly)
        glDrawElements( GL_TRIANGLES, //mode
                                        NumIndices,  //count, ie. how many indices
                                        GL_UNSIGNED_INT, //type of the index array
                                        Indices);
else
        glDrawArrays(GL_POINTS,0,NumVertices);
</pre>
<p>
In the first call we specify an index array (Indices, filled before). This is an array of integers, e.g. "1,2,3,2,4,5" which
would mean "draw the vertex 1, then vertex 2, vertex 3, then vertex 2 again and so on". This call lets you specify the "mode",
which is the triangle mode here. (In the example this would create a triangle of the vertices 1,2,3 and on triangle of the
vertices 2,4,5.) Note a very important thing: Each vertex in the sphere is part of several triangles. Using vertex arrays
it need not be rendered several times which results in performance gains!<br>
The second call simply renders a sequence of vertices which is suitable for rendering in point mode.
</p>
<p>That's all you need, you should now look at the complete source code:
<li><a href="../../VertexArraysVS2005.zip">Visual Studio 2005 project</a></li>
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