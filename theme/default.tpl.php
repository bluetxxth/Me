<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!-- Consider adding a manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" lang="sv"> <!--<![endif]-->
<head>
  <meta charset="utf-8">

  <!-- Use the .htaccess and remove these lines to avoid edge case issues.
       More info: h5bp.com/i/378 -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title><?=$title?></title>
  <meta name="description" content="<?=$meta_description?>">

  <!-- Mobile viewport optimized: h5bp.com/viewport -->
  <meta name="viewport" content="width=device-width, initial-scale =1">

  <!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->
<!-- my custome style -->
  <link rel="stylesheet" href="theme/style.css">
 
 <!--boostrap style -->
<link rel="stylesheet" href="theme/css/bootstrap/css/bootstrap.css">

 <!--boostrap mini style -->
 <link rel="stylesheet" href="theme/css/bootstrap/css/bootstrap-min.css"> 
 
 <!-- my bootsrap style -->
  <link rel="stylesheet" href="theme/bootstrapstyle.css">
 
  <!-- More ideas for your <head> here: h5bp.com/d/head-Tips -->

  <!-- All JavaScript at the bottom, except this Modernizr build.
       Modernizr enables HTML5 elements & feature detects for optimal performance.
       Create your own custom Modernizr build: www.modernizr.com/download/ -->
  <script src="js/libs/modernizr-2.5.0.min.js"></script>
  <style>
    <?=$style?>
  </style>
  

</head>
<body>
  <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you support IE 6.
       chromium.org/developers/how-tos/chrome-frame-getting-started -->
  <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
  <header id="above">

    <?//=getHTMLForNavigation($navrelated, "navrelated")?>
  </header>
  
  
  <header id="header">
     <div class ="container">
         
     </div>
      
     <div id ="headerPartLeft">
        <div id="banner">
         <a href="index.php">
             <div class="site-title"> 
               <img src="./img/gabriel_nieva.png" alt="name" width="300 height="200" />
             </div>
             
            <small> <div class="slogan2">Attention to detail, dedication to excellence, hard work!</div></small>
         </a>
   
       </div>
     </div>
     
      <div id ="headerPartCenter">
        <!-- <img class="site-logo" src="./img/logo_gabriel.png" alt="logo" width="50" height="50" /> -->
        
  
     </div>
     
     <div id ="underConstruction">
        <!--<img  src="./img/tmp/UnderConstruction.png" alt="construction banner" width="140" height="140" />-->
              <!--  <img  src="./img/tmp/work_in_progress.jpg" alt="construction banner" width="150" height="150" /> -->  
     </div>
     
      <div id ="headerPartRight">
     <?//=getHTMLForNavigation($navbar1, "navbar1")?>
         <div class ="workInProgress">
         
      
    <div class ="workInProgressHeading"><b> Work in progress:</b></div> 
      <ol>      
          <li> Mobile compatiblity</li>
          <li> Proof Reading</li>
          <li> Testing</li>
      </ol>
         
         </div>
    
     </div>
  
  </header>
 
  <!--Navbar-->
      <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
          
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">                 
                     <?=getHTMLForNavigation($navbar2, "navbar2")?>
                </ul>
           
            </div>
        </div>
    </div>
  
  
  <!--body-->
  <div class="container body-content">
    <?=$main?>  
  </div>
  
  
    <!-- byline -->
    <div class="container-fluid">
        <div class=" row-fluid">
         <div class ="wrapper">
             <div class="byline">
                <div class="col-md-10"> 
                  <div class="box shadow">
                      <p>
                            Gabriel Nieva works at Neoclash Systems, he currently works in the development 
                            of e-comerce systems developed with ASP.NET and PHP.
                            Occasionally he spends time developing desktop applications in 
                            Java and C# These are the programming languages that he can use: 
                            Java, PHP, ASP.NET C#, C, C++, . Other technologies that he utilizes: 
                            SQL, MySQL, SqlLite, XML and XHTML, ASP.NET JQuery and ASP.NET Ajax, 
                            LINQ, Entity Framework, MVC. 
                      </p>
                    </div>
                 </div>        
                <div class="col-md-1"> 
                  <figure class="small-pic">
                     <img height="110" alt="Gabriel Small Picture" src="img/me_small.jpg">
                   </figure>
                </div>  
            </div>
         </div>
      </div>
   </div>
      
      

  	<!-- footer section-->
    <div class="row-fluid"></div>
     
    <footer>
        <div class=" row"></div>
        <div class="footer">
            <div class="container narrow row-fluid">
            <span class='sitefooter'> Copyright &copy; Gabriel Nieva, <a href="mailto:contactme@neoclash.com" target = "_top"> Mail me</a> | <a href='https://github.com/bluetxxth'>Alpha på GitHub</a> | <a href='http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance'>Unicorn</a></span>
            <?php  include("./incl/counter.php");?>
          
           
            
            </div>
        </div> 
    </footer>
  
    
    
  <!-- JavaScript at the bottom for fast page loading -->

  <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.1.min.js"><\/script>')</script>

  <!-- scripts concatenated and minified via build script -->
  <script src="js/plugins.js"></script>
  <script src="js/script.js"></script>
  <!-- end scripts -->

  <!-- Asynchronous Google Analytics snippet. Change UA-XXXXX-X to be your site's ID.
       mathiasbynens.be/notes/async-analytics-snippet -->
  <script>
    var _gaq=[['_setAccount','UA-22093351-1'],['_trackPageview']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
  </script>
</body>
</html> 