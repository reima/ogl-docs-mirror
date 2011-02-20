<html>
  <head>
    <title>OpenGL Samples Pack SDK contribution</title>
    <?php include("/home/virtual/opengl.org/var/www/html/sdk/inc/sdk_head.txt"); ?>
		<script type="text/javascript">

		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-20182250-4']);
		  _gaq.push(['_trackPageview']);

		  (function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();

		</script>
  </head>

  <body>
    <?php include("/home/virtual/opengl.org/var/www/html/sdk/inc/sdk_body_start.txt"); ?>

    <h1>OpenGL Samples Pack</h1>

	  <p>
		  The OpenGL Samples Pack is a collection of <a href="http://www.opengl.org/">OpenGL</a> samples written in C++ based on the OpenGL "core profile" specifications.
	  </p>
	  <p>
		  The project aims to promote the new OpenGL features making easier version transitions
		  for OpenGL programmers with a code form of documentation for the OpenGL specification.
		  Despite the fact that the OpenGL Samples Pack provides as simple (and dumb) as possible samples,
		  it's not a tutorial for beginners but a project for programmers already familiar with OpenGL
		  The OpenGL Samples Pack is also a good OpenGL drivers feature test.
	  </p>
	  <p>
		  These samples use
		  <a href="http://freeglut.sf.net/">FreeGLUT</a> to create window and an OpenGL context,
		  <a href="http://www.opengl.org/sdk/libs/GLEW/">GLEW</a> to load the OpenGL implementation,
		  <a href="http://www.opengl.org/sdk/libs/GLM/">GLM</a> as math library and to replace OpenGL fixed pipeline functions and
		  <a href="http://www.g-truc.net/project-0024.html">GLI</a> to load images.
	  </p>
	  <p>
		  The source code is under the <a href="http://en.wikipedia.org/wiki/MIT_License">MIT licence</a>.
		  It build with Visual C++ 2005 - 2010 only through <a href="http://www.cmake.org/cmake/resources/software.html">CMake</a> at the moment.
	  </p>

	  <ul>
		  <li>
			  <a href="http://www.g-truc.net/project-0026.html#menu">G-Truc Creation project page</a>
		  </li>
		  <li>
			  <a href="https://sourceforge.net/projects/ogl-samples/">SourceForge.net project page</a>
		  </li>
		  <li>
			  <a href="https://sourceforge.net/apps/trac/ogl-samples/report/1">View active tickets</a>
		  </li>
		  <li>
			  <a href="https://sourceforge.net/apps/trac/ogl-samples/newticket">Submit a ticket</a>
		  </li>
		  <li>
			  <a href="http://ogl-samples.git.sourceforge.net/git/gitweb.cgi?p=ogl-samples/ogl-samples;a=summary">Browse Git repository</a>
		  </li>
		  <li>
			  <a href="https://sourceforge.net/apps/trac/ogl-samples/newticket">OpenGL Samples Pack HEAD snapshot</a>
		  </li>
	  </ul>
  	
    <?php include("/home/virtual/opengl.org/var/www/html/sdk/inc/sdk_footer.txt"); ?>
  </body>
</html>
