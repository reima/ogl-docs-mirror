<html>
<head>
<title>The Fountain Simulation - by CodeColony.de</title>
<?php include("http://www.opengl.org/sdk/inc/sdk_head.txt"); ?>
</head>

<body>
<?php include("http://www.opengl.org/sdk/inc/sdk_body_start.txt"); ?>
<h1>The Fountain Simulation</h1>
<h2>Before you start</h2>
<p>
To understand the basics for this tutorial and to learn what you need to compile the source, please visit
<a href="http://www.codecolony.de">www.codecolony.de</a> and read the first tutorials.
</p>
<h2>What can I learn in this tutorial?</h2>
<p>
This tutorial will show you
  <ul>
    <li>some basics of physical simulation (simulation of a water drop)</li>
    <li>how to get antialiased points</li>
    <li>how to use blending</li>
  </ul>
</p>


<h2>Some basic physics...</h2>
<p>
Simulation of physics is a very interesting topic. If you are planning a project where
you need lots of physics you should consider using a so called "physics engine". See
<a href="http://www.codecolony.de/Tokamak/">www.codecolony.de/Tokamak</a> for an example.<br>
What we want to do in this tutorial is much simpler: The target is to display a nice looking fountain, so we have to calculate
the movement of the water. To make this easy, let's assume the following points:
<ul>
<li>the water consists of discrete water drops</li>
<li>each drop is considered to have a certain mass and a size of zero (we will use a size>0 for displaying, of course)</li>
<li>the drops do not influence each other</li>
</ul>
This makes the simulation fairly simple. Sir Isaac Newton has given us his laws of motion to do so. We need these two laws:
<ul>
<li>An object at rest tends to stay in rest and an object in motion tends to stay in motion in a straight line at constant speed
unless acted upon by an outside force.</li>
<li>The alteration of motion is proportional to the motive force impressed; and is made in the direction of the right line in which that force is impressed.</li>
</ul>
These laws must be applied to our drops: Therefore they get a constant starting speed which is affected by the gravity force,
which means an acceleration towards the ground. As soon as the drops reach the water surface (ground), they can be "reset", i.e.
we assign them a starting speed again (this is what the pump would do in the real system).
</p>
<p>
Knowing the acceleration and starting speed we can calculate the position at each point in time by using integration over time.
</p>

<h2>How can I render antialiased points?</h2>
<p>
When I wrote the example, I realized, that the foutain and its
surrounding was drawn bigger or smaller, when I resized the window, but the drops' size
remained the same. This didn't look too good, so I thought I could place a <i>glPointSize()
</i>in my resize-function. But this command is only sensible, when you use antialiasing.
This is only possible, when blending is enabled. Then the pixels next to the point's
center do not get the point's color, but are blended with the color in the color buffer.
</p>
<h2>How can I use blending?</h2>
<p>
Blending means that a pixel's color isn't replaced by another color,
but they are &quot;mixed&quot;. Therefore you can use the alpha value of colors, it
indicates how much of the color of the consisting pixel is used for the new color - for
antialiasing of points, OpenGL computes this alpha value. After calling <i>glEnable(GL_BLEND);
</i>you have to tell OpenGL how to use the alpha values. It isn't specified, that a
higher alpha-value means more transparency or something like that. You can use them as you
want. To tell OpenGL <i>what</i> you want, you must use <i>glBlendFunc(). </i>It takes two
parameters, one for the source factor and the second for the destination factor. I used
GL_SRC_ALPHA, GL_ONE_MINUS_SRC_ALPHA as parameters. This combination is used quite often.
Its effect is, that a higher alpha value means less transparency of the
incoming fragment, i.e. the source.
</p>

<p>The code contains several comments and further hints, so take a look at it:
<li><a href="../../FountainVS2005.zip">Visual Studio 2005 project</a></li>
</p>

<hr noshade size="1">
<p>
<h2>Contact</h2>
Any comments? Contact me!<br>
<a href="mailto:philipp.crocoll@web.de">philipp.crocoll@web.de</a><br>
<a href="http://www.codecolony.de">www.codecolony.de</a>
</p>
<?php include("http://www.opengl.org/sdk/inc/sdk_footer.txt"); ?>
</body>
</html>