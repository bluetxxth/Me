 <?php
	/**
 * An page to display the sourcecode.
 */
	include ("config.php");
	
	// Create the data array which is to be used in the template file.
	$alpha ['title'] = "Report";
	$alpha ['meta_description'] = "this is the homepage";
	$alpha ['main'] = <<<EOD

	<article class="justify border" style="width:90%">
			
		<h2>Kmom01: HTML5 Boilerplate</h2>
		
		<p>Here is my report on course level 1.</p>

		<p>The development of the framework in this level was in my opinion a reminiscence of the last course's anax in the sense
			that the project is classified in folders where the corresponding files are placed. I think it is interesting because 
			in this way it speeds up the process of setting up a project.</p>
			
		<p>As to what it concerns the HTML boilerplate in particular I am used to deal with XHTML and I naturally find the tags slightly different,
			However HTML5 is, in my opinion, quite intuitive.</p>

		  <p>During the development of the boilerplate I had in mind to take advantage of all the things I learned in the previous course (oophp). Everything is thrown inside an array which is later on accessed from where it is needed.
			There are some parts that do not change from page to page, for example the logo and even some information on the footer, that are okay to hard-code on the template. Other which were more likely to change, however, I found more helpful to 
			put in the config file inside the array, for example the navigation and the main section. What was central, however, is to make the HTML5 boilerplate work with PHP so a few folders and files were created, that is, in addition to what the boilerplate contained. For the most part, however, I pretty much followed Mikael's way.
		   </p>

		<p>Aside of being a very interesting because it speeds up the development process, the HTML5 boilerplate is of particular interest because it comes loaded with very useful tools and enhancements, i.e optimized for google analytics, has a number of high performance enhancements for Apache and it does help in browser cross compatibility. These are just a few features that I highlited but I am sure there will be much moore. </p>  

		<p>I have also created a GitHub account but due to a time constraint (I am running a bit late) I am pending further testing in order to put my actual files over there. As it is right now it contains old files.</p>

		<p>Regarding my development envioronment  I use a combination, I use windows 7 and then I am connected to a debian development server with putty, it can be sumarized as follows: </p>
		
		 Operating environment: <h4>Windows 7 | Firefox | Note++ | WinSCP | Eclipse PDT </h4>
		 Development server:  <h4>SMP Debian 3.2.51-1 x86_64 GNU/Linux </h4>
		 
	</article>

EOD;
	
$alpha['footer3'] = <<<EOD

EOD;


	// Hand over to the template engine.
	include (__DIR__ . "/theme/template.php"); 