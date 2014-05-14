<?php

/**
 * An page to display the sourcecode.
 */
// Include the essential config-file which also creates the $alpha variable with its defaults.
include(__DIR__ . '/config.php');


$db             = new CDatabase($alpha['database']); //DB
$items          = new CItem($db); // Items to show
$content        = new CContent($db); // News Content
$user           = new CUser($db); // User
$textFilter     = new CTextFilter(); //text filter
$specialActions = new CSpecialActions();



$someKnowledge= '
        
       <p>These are some of the technologies I can work with</p>
       
          <b>Programming languages</b>:
                   
               <ul>
                  <li>Java</li>
                  <li>C#</li>
                  <li>PHP</li>
                  <li>C & C++</li>
               </ul>
         
      
            
                <b>Web development</b>:
               <ul>
                  <li>PHP</li>
                  <li>ASP.NET</li>
                  <li>HTML</li>
                  <li>XML</li>
                  <li>CSS</li>
               </ul>
           
           
               <b> Database</b>:
               <ul>
                  <li>MySql</li>
                  <li>SqlLite</li>
                  <li>SQL</li>
               </ul>
         
        
                <b>Web design</b>:
               <ul>
                  <li>Typography</li>
                  <li>Grids</li>
                  <li>Accessibility</li>
                  <li>Responsive design</li>
               </ul>
       
      '; 

/*
 * Here the items section
 */

$res = $items->selectLatestItemsIndex();

// Put results into a HTML-table
// $tr = "<tr><th>Row</th><th>Id " . $films->orderby('id') . "</th><th>Picture</th><th>Title " . $films->orderby('title') . "</th><th>Year " . $films->orderby('YEAR') . "</th><th>Genre</th></tr>";

$itemsHtml         = null;
$synopsys          = null;
$descriptionLength = 15;
// $tr1 = "<p><tr><th>Latest Films</th><th></p>";

foreach ($res as $key => $val) {
   
   $str = "finished";
   $string = "{$val->status}";
   $stringInLower =  strtolower ( $string );
   
   
   $htmlStatus = $specialActions-> statusMarker($string , 'statusProgressIndex', 'statusFinishedIndex');
    
    
    // trunkate the description parameter 
    $synopsys = $specialActions->truncate_string($val->description, $descriptionLength);
    // here will go the orderby statement
    
    // $image.="<a href='movie_single.php?id={$movie->id}'><img src='img.php?src={$movie->image}&amp;width=200&amp;height=200&amp;crop-to-fit' alt='Bild'/></a>";
    
    $itemsHtml .= "<div class ='itemIndex'>

   <!-- here using image -->
   <b>{$val->title}</b><div class ='language'>{$val->language}</div><a href='item.php?id={$val->id}'><img src='img.php?src={$val->image}&amp;width=50&amp;height=50' alt='Picture' /><div class ='status'>{$htmlStatus}</div></a>
   	
   </div>";
}

/*
 * Here the Blogg section
 */

$newsExcerptLength = 55;

$res = $content->selectLatestBlogEntriesIndex();

// Put results into a HTML-table
// $tr = "<tr><th>Row</th><th>Id " . $films->orderby('id') . "</th><th>Picture</th><th>Title " . $films->orderby('title') . "</th><th>Year " . $films->orderby('YEAR') . "</th><th>Genre</th></tr>";

$blogEntry = null;
$blogHtml  = null;

$tr2 = "<p><tr><th>Latest Blog Entries</th><th></p>";

foreach ($res as $key => $val) {
    
    $blogEntry = $textFilter->doFilter(htmlentities($val->DATA, null, 'UTF-8'), $val->FILTER);
    
    // truncate
    // $blogEntry = truncate_string($val -> DATA, 100);
    
    $filteredBlogEntry = $specialActions->truncate_string($blogEntry, $newsExcerptLength);
    
    $blogHtml .= "
   <div class ='postItems'>
  <small> <b><a href ='blog_view.php?slug={$val -> slug}'>{$val->title}</a></b></small><br/>
  <small> <b>{$val-> user}</b>
   {$val-> updated}
   <div>{$filteredBlogEntry}<a href ='blog_view_full.php?slug={$val -> slug}'></a></div></small>
   <hr class = 'postHorizontalLine'/>
	</div>";
}

$workInProgressHtml= '<div class ="hero-unit">

<h2>Work is in progress</h2>

<p> <b>Please take notice:</b> I am currently implementing a few changes in this site, so for a short while your experience might not be as intended. These changes consist on: </p>

      
      <ol>

          <li> Testing and implemtentation of the Boootstrap framework, </li>
          <li> New typography, </li>
          <li> Markdown, </li>            
          <li> Mobile compatiblity</li>
      </ol>
</div>';


// Create the data array which is to be used in the template file.
$alpha['title']            = "Home";
$alpha['meta_description'] = "this is the homepage";
$alpha['main']             = <<<EOD


<div class = "container-fluid">            
   <div class="row">
          <div class="col-md-6">
                   <h2>Gabriel Nieva</h2>
               <p>
                   <article class="justify border" style="width:100%">
                       <h4>An intro about me</h4>
                       <figure class="right top">
                           <img src="img/me.jpg" height="100">
                           <figcaption>
                               Recent picture of me
                           </figcaption>
                       </figure>
                       <p>Hi my name is Gabriel, I am a software developer and I am currently available for recruiting or contracting.</p>
                                      
                       <p>Due to time constraints I have improvised this Web (written in php & MySql). Its intended purpose is to <a href ="showcase.php?n=showcase">show case</a> some of the stuff I do and to complement and support my resume with technical information. This technical information comes in the form of code at <a href ="https://github.com/bluetxxth?tab=repositories">GitHub</a>, and eventual show case of my end products.</p>
                       <p>If you are a programmer you might find that <a href = "https://github.com/bluetxxth?tab=repositories">GitHub</a> is a good point to start with. If you are a recruiter you might want to take a look at the end products and my <a href ="http://www.neoclash.com/cv.php">CV. </a></p>
                       
                       <p> </p>
           
               <p><a class="btn btn-primary" href="about.php">Learn more &raquo;</a></p>
                   </article>
               </p>
         
          </div>
                      
         <div class="col-md-6">
             <h2>Hire me</h2>
             
            <p>I am accepting jobs as of right now, if you have a project big or small here or abroad and you want me to help you, contact me! I will be glad to be of help and I will offer you a price within your range.</p>
            <p>I am bilingual in Spanish and English and fluent in Swedish, you can use any of these three languages to communicate with me.</p>
            <p>I am used to work in virtual teams so it should not be a problem if you are in another corner of the planet.</p>
           <div class ="contactme">
              <a href ="contact.php" <button type="button" class="btn btn-info btn-lg btn-block" >Contact me now and let's arrange a meeting</button>  </a> 
             </div>    
        </div>
    </div>
 </div>
 
 <div class = "row"> </div>

<div class = "container">
 <div class ="row">     
    <div class="hero-unit">

       </div>
   </div>
</div>


  <div class ="row" > </div>
  

<div class = "container-fluid">
   <div class="row">
       <div class="col-md-4">
           <h2>News</h2>
           <p>Here you can read the news about the new release and the plans for future development. </p> 
               {$blogHtml}
                   <p><a class="btn btn-primary" href="blog_view.php">More news &raquo;</a></p>
       </div>
    
       <div class="col-md-4">
           <h2>Applications & projects</h2>
           <p>
               Below you can see some of the latest applications I am working on right now. Most of them are
               under development but there will be more to come.
         
               <div class ="row">{$itemsHtml}</div>
           <p><a class="btn btn-primary" href="showcase.php">More applications &raquo;</a></p>
           </p>
       </div>
       <div class="col-md-4">
           <h2>Areas of expertise</h2>
           <p>
               I can do all kinds of applications. Because of my business background I focus on the development of E-Commerce
               applications, applications to manage logistics, and business oriented applications.
           </p>
           {$someKnowledge}
           <p><a class="btn btn-primary" href="cv.php">Learn more &raquo;</a></p>
       </div>
   </div>
 </div>     
                 
<div class = "container-fluid" >
    <div class ="row">
         <div class = "unit-hero"> </div>
                 
                 
    </div>                         
</div>
             
<div class = "container-fluid">            
   <div class="row">                               
        <div class="col-md-4">                 
           <h2>Contact</h2>
           <article class="justify border" style="width:90%">
   
               <p> You can contact me here:</p>
               <ul>
                   <li>
                       Email: <a href="mailto:contactme@neoclash.com">conctactme@neoclash.com</a>
            
                   </li>
                   <li>
                       <a href=" https://www.linkedin.com/profile/view?id=269413781&trk=nav_responsive_tab_profile_pic"> LinkedIn</a>
                   </li>
               </ul>
                 <p>If you are not located in the Oresund's region and you want to contact me. It is also possible to arrange a skype meeting. </p>
           </article>
             <div class ="contactme">
              <a href ="contact.php" <button type="button" class="btn btn-success btn-lg btn-block" >Contact me now</button>  </a> 
             </div>    
       </div>       
          <div class="col-md-4">
              <h2>About this web</h2>
              <article class="justify border" style="width:90%">
                  <p>There is much functionality that I would need to add to it and a much better one will come in the near future but I feel that it serves the purpose for now. I update it from time to time.</p>
                 <p><a class="btn btn-primary" href="web.php">Learn more &raquo;</a></p>
      
              </article>
          </div>

                
         <div class="col-md-4">
              <h2>Gallery about me</h2>
              <p>A little gallery with various pictures of me doing what I like best. You can also visit my <a href="http://www.neoclash.com/interests.php?n=interests">interest section</a></p>
                
      
              <p><a class="btn btn-primary" href="gallery.php">See gallery &raquo;</a></p>
      
          </div>
    </div>
 </div>
 
 <div class = "container-fluid">   
    <div class ="row">
      
   </div>
</div>
	
	    
EOD;

$alpha['footer3'] = <<<EOD

EOD;


// Hand over to the template engine.
include(__DIR__ . "/theme/template.php");