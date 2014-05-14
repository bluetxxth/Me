 <?php
	/**
 * An page to display the sourcecode.
 */
// 	include ("config.php");
    include(__DIR__.'/config.php');
	$alpha['stylesheets'][] = 'css/style.css';
	
	
	// Create the data array which is to be used in the template file.
	$alpha ['title'] = "About me";
	$alpha ['meta_description'] = "this is the homepage";
	$alpha ['main'] = <<<EOD

<h1>{$alpha['title']}</h1>

        
<div class ="container" >
   <div class = "row">
      <div class = "col-md-6">
         <figure class="right top">
            <a href ="http://www.neoclash.com/gallery.php?path=me33.jpg" target="_blank" > <img src="img/me.jpg"  height="150"></a>
            <figcaption>
               <p>Recent picture of me</p>
            </figcaption>
         </figure>
       <h3>Please allow me to introduce myself</h3>
         <p>My name is Gabriel, I am originally from Madrid, Spain, I lived in the US for a great part of my life and now I live in Sweden.</p>
         <p>I am a Software Developer, and I have a degree in public accountancy by the City University of New York, Bernard Baruch College. I have also studied Computer Science at Umea 
            University in Sweden.
             <p>So long...</p>
         <p>Gabriel</p>
         </p>
      </div>
      <div class = "col-md-6">
        <h3>Strong business foundation</h3>
         <p>Back in New York I worked as an accountant in a couple of cpa firms. When I met my wife I came to Europe and started a computer hardware importing company in Madrid Spain. We imported 
            container loads from China and
            other material, mainly semiconductors to make memory from the US. The exposure to this type of activity made me interested in the Internet and more particularly in Web programming. All the thousands of references which were sold then,
            were sold through my website.
         </p>
      </div>
   </div>
</div>

<div class ="row"> </div>
      

      
<div class = "container">
   <div class ="row">
       
      <div class = "col-md-6">
      <h3>Extensive experience in E-Commerce</h3>
         <figure class="right top">
           <a href ="http://www.neoclash.com/gallery.php?path=mywarehouse20.jpg" target="_blank">  <img src='img.php?src=mywarehouse20.jpg&amp;width=300&amp;height=300' alt='Picture with img' id='movieimg' ></a>
            <figcaption>
               <p>Detail small shelf picking and packing at my warehouse</p>
            </figcaption>
         </figure>
         <p>It was essential to manage, market and deal with such large quantities of references, I mean millions of Euros worth of material, and sell them online through the Internet. Due to the rapidly changing prices for these products and their short life cycle, this undertaking 
            required managing a large inventory in an orderly, efficient and effective way and quickly market the products and presdent them to consumers. In addition, working with different departments, logistics, accounting, legal, marketing, amongst other,  and 
            being involved in large logistic
            operations, brought about the need to structure an intranet and a public web with the objective of dealing with all these matters in a more or less automatic way.
         </p>
      </div>
      <div class = "col-md-6">
      <h3>Challenge and responsibility </h3>
         <figure class="right top">
           <a href ="http://www.neoclash.com/gallery.php?path=mywarehouse3.jpg" target="_blank">  <img src='img.php?src=mywarehouse3.jpg&amp;width=300&amp;height=300' alt='Picture with img' id='movieimg' ></a>
            <figcaption>
               <p>Detail large shelf storage at my warehouse</p>
            </figcaption>
         </figure>	 
       
         <p>In many ways all this was a big challenge, and it is something which fascinated me and has impacted my perception of the business world out there. </p>
         <p>Placing an order directly from a manufacturer in China means to get into large monetary transactions. These large purhcasing transactions can saturate a company's liquidity, and oftentimes there will be large insurance brokerage firms and banks extending credit.<p>
         <p>Because of this, the selling process should start while the product is still at sea, well before the containers dock at port.</p>
         <p>Having an effective CRM means increasing your inventory turnover ratio, and to avoid loses due to accumulation of obsolete material.</p>
      </div>	
   </div>
</div>

<div class ="row"></div>
      
 
      

<div class = "container">
   <div class ="row">
      <div class = "col-md-6">
      <h3>Applied experience to programming  </h3>
         <figure class="right top">
           <a href ="http://www.neoclash.com/gallery.php?path=mywarehouse13.jpg" target="_blank">  <img src='img.php?src=mywarehouse13.jpg&amp;width=300&amp;height=300' alt='Picture with img' id='movieimg' ></a>
            <figcaption>
               <p>Me welcoming one of our 5 40ft high cube containers that day</p>
            </figcaption>
         </figure>	 
       
         <p> Despite I no longer work in such field I am aware that the same needs are applicable to many other companies in the market regardless of their activity. 
			I hope that in the foreseeable future I can streamline the things I already know and the experience which I have gained together with the knowledge that I have, 
			into a successful enterprise. </p>
       
      </div>	   
      <div class = "col-md-6">	  
      <h3>Programming skills</h3>
         <figure class="right top">
            <a href ="http://www.neoclash.com/gallery.php?path=myworkstation.jpg" target="_blank"> <img src='img.php?src=myworkstation.jpg&amp;width=250&amp;height=250' alt='Picture with img' id='movieimg' > </a>
            <figcaption>
               <p>My workstration</p>
            </figcaption>
         </figure>
         <p> As a programmer I can do all kinds of applications. I will welcome any new challenge that contributes to my development, personally and professionally. However, because of my background, I have many years of experience in the field of E-Commerce and this activity has become to me second in nature, I enjoy in the development of E-Commerce applications, Applications that deal with logistics management, 
            financial applications and CRM systems. <p>Please take notice, as said, if you have a project to build other applications, I will also come aboard.</p>
         </p>
        
      </div>
   </div>
</div>
      
      



EOD;
	

// Hand over to the template engine.
include (__DIR__ . "/theme/template.php"); 