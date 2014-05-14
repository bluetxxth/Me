<?php

/**
 * An page to display the sourcecode.
 */
// Include the essential config-file which also creates the $alpha variable with its defaults.
include(__DIR__.'/config.php'); 
 
	
	// Create the data array which is to be used in the template file.
	$alpha ['title'] = "Interests";
	$alpha ['meta_description'] = "These are the things I am interested in";
	$alpha ['main'] = <<<EOD

	<h1>{$alpha ['title']}</h1>
	     
 <div class ="hero-unit">
      This section is dedicated to some of my interests, I am interested in many more things, but these are some of the things I like best.   
 </div>
      
<div class = "container">
   <div class ="row">
      <div class = "col-lg-12">
         <h3>Ocean Navigation</h3>
         <figure class="right top">
            <img src='img.php?src=me4.jpg&amp;width=500&amp;height=500' alt='Picture with img' id='movieimg' >
            <figcaption>
               <p>Me on a not so much fun day at sea, that day I understood the meaning of fear</p>
            </figcaption>
         </figure>
         <p>
            I love sailing and I love the sea, that includes sea food, all kinds of crustaceans and the sun. Now and then, when I have the time, I go with my friends to fantastic voyages round the islands of Spain.
         <p> My dream is to be able to sail around the Swedish coast line, more concretely through Skagerrak and Kattegat a little bit like the Vikings did back then.</p>
         
	 	<hr/>    
	       <div class ="col-md-2">
            <figure class="right top">
               <a href="http://www.neoclash.com/gallery.php?path=seasunset.jpg" target="_blank" ><img src='img.php?src=seasunset.jpg&amp;width=140&amp;height=140' alt='Picture with img' id='movieimg' ></a>
               <figcaption>
                  <p>Sunset at sea</p>
               </figcaption>
            </figure>	      
	      </div> 
	      <div class ="col-md-2">
            <figure class="right top">
               <a href="http://www.neoclash.com/gallery.php?path=boat_approach.jpg" target="_blank"><img src='img.php?src=boat_approach.jpg&amp;width=140&amp;height=140' alt='Picture with img' id='movieimg' ></a>
               <figcaption>
                  <p>Approaching from bow</p>
               </figcaption>
            </figure>	      
	      </div> 
		 <div class ="col-md-2">
            <figure class="right top">
               <a href="http://www.neoclash.com/gallery.php?path=me14.jpg" target="_blank"><img src='img.php?src=me14.jpg&amp;width=140&amp;height=140' alt='Picture with img' id='movieimg' ></a>
               <figcaption>
                  <p>Me onboard</p>
               </figcaption>
            </figure>	      
	      </div> 
	      
	      
		<hr/>
		 
		 <div class ="col-md-2">
            <figure class="right top">
              <a href="http://www.neoclash.com/gallery.php?path=stone_fish_1.jpg" target="_blank"> <img src='img.php?src=stone_fish_1.jpg&amp;width=140&amp;height=140' alt='Picture with img' id='movieimg' ></a>
               <figcaption>
                  <p>Rosada before being cooked</p>
               </figcaption>
            </figure>	      
	      </div> 
	      <div class ="col-md-2">
            <figure class="right top">
              <a href="http://www.neoclash.com/gallery.php?path=stone_fish_2.jpg" target="_blank"> <img src='img.php?src=stone_fish_2.jpg&amp;width=140&amp;height=140' alt='Picture with img' id='movieimg' ></a>
               <figcaption>
                  <p>Nice Rosada (a stone fish)</p>
               </figcaption>
            </figure>	      
	      </div> 
		 <div class ="col-md-2">
            <figure class="right top">
               <a href="http://www.neoclash.com/gallery.php?path=big_fish_2.jpg" target="_blank"><img src='img.php?src=big_fish_2.jpg&amp;width=140&amp;height=140' alt='Picture with img' id='movieimg' ></a>
               <figcaption>
                  <p>Big to be cooked</p>
               </figcaption>
            </figure>	      
	      </div> 
		 
      </div>
   </div>
</div>
	      

	      
	      
<h3>History</h3>
<div class ="row">
   <div class ="col-md-12">
      <p>I come close to anything and anyone that has to do with history. I am interested in all kinds of history but more particularly in Medieval History.
      I find Scandinavian history particularly interesting, more concretely, the Viking age.</p>
   </div>
</div>
	      
<div class ="row"></div>
	      
<div class = "container">
	<div class ="row">
	   <div class = "col-md-6">
		  <figure class="right top">
			<a href="http://www.neoclash.com/gallery.php?path=Vikings.jpg" target="_blank"> <img src='img.php?src=Vikings.jpg&amp;width=500&amp;height=500' alt='Picture with img' id='movieimg' ></a>
			 <figcaption>
				<p>At Foteviken with a Viking</p>
			 </figcaption>
		  </figure>
	   </div>
	   <div class = "col-md-6">
		  <figure class="right top">
			<a href="http://www.neoclash.com/gallery.php?path=runes.jpg" target="_blank"> <img src='img.php?src=runes.jpg&amp;width=500&amp;height=500' alt='Picture with img' id='movieimg' ></a>
			 <figcaption>
				<p>Rune stones at Footeviken</p>
			 </figcaption>
		  </figure>
	   </div>
	</div>
</div>

<div class ="row"></div>

<h3>Gourme food</h3>
<div class ="container">
   <div class ="row">
	<div class ="col-md-12">
		  <p>
			 I love to cook, I can make just about anything that comes from Spain. I find it interesting to test new things.
		  </p>
	 </div>
   </div>
</div>

<div class = "container">
   <div class ="row">
      <div class="col-md-6">
         <figure class="right top">
         <a href="http://www.neoclash.com/gallery.php?path=cooking.jpg" target="_blank"><img src='img.php?src=cooking.jpg&amp;width=500&amp;height=500' alt='Picture with img' id='movieimg' ></a>
         <figcaption>
            <p>Me making a Paella</p>
         </figcaption>
      </div>
      <div class = "col-md-6">
         <figure class="right top">
           <a href="http://www.neoclash.com/gallery.php?path=paella.jpg" target="_blank"> <img src='img.php?src=paella.jpg&amp;width=500&amp;height=500' alt='Picture with img' id='movieimg' ></a>
            <figcaption>
               <p>Ready to eat Paella</p>
            </figcaption>
         </figure>
      </div>
   </div>
</div>

	           

EOD;
	
$alpha['footer3'] = <<<EOD

EOD;


	// Hand over to the template engine.
	include (__DIR__ . "/theme/template.php"); 