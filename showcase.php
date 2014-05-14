<?php

/**
 * An page to display the sourcecode.
 */
// Include the essential config-file which also creates the $alpha variable with its defaults.
include(__DIR__.'/config.php'); 

$db = new CDatabase ( $alpha ['database'] );
$items = new CItem( $db );
$content = new CContent ( $db );
$user = new CUser ( $db );
$textFilter = new CTextFilter ();
$specialActions = new CSpecialActions();

$type = isset ( $_GET ['type'] ) ? $_GET ['type'] : null;

/*
 * Type
*/
// $category = $items->selectCategory($type);

// if($type){
//    //echo $name;
//    $sql = "SELECT * FROM aItem WHERE type LIKE '%{$type}%' ORDER BY $orderby $order LIMIT $hits OFFSET " .(($page - 1) * $hits);
//    $params = array(
//          $type,
//    );
// }

/*
 * Here the item section
*/
$res = $items->selectLatestItems();

$output = null;

if($res == null){
  
   $output = "nothing to display";
}

// show only a portion of the text
function truncate_string($str, $length) {
   if (!(strlen ( $str ) <= $length)) {
      $str = substr ( $str, 0, strpos ( $str, ' ', $length ) ) . '...';
   }

   return $str;
}

// Put results into a HTML-table
// $tr = "<tr><th>Row</th><th>Id " . $films->orderby('id') . "</th><th>Picture</th><th>Title " . $films->orderby('title') . "</th><th>Year " . $films->orderby('YEAR') . "</th><th>Genre</th></tr>";

$itemHtml = null;
$description = null;
// $tr1 = "<p><tr><th>Latest Films</th><th></p>";

foreach ( $res as $key => $val ) {

   // trunkate the synopsys parameter
   $description = truncate_string ( $val->description, 10 );
   
   $echo = "description: " . $description;
   // here will go the orderby statement

   // $image.="<a href='movie_single.php?id={$movie->id}'><img src='img.php?src={$movie->image}&amp;width=200&amp;height=200&amp;crop-to-fit' alt='Bild'/></a>";

   $string = "{$val->status}";
   $htmlStatus = $specialActions -> statusMarker($string , 'statusProgressIndex', 'statusFinishedIndex');
   
   
   $itemHtml .= "<div class ='itemShowcase'> 
   <!-- here using image -->
   <b>{$val->title}</b><div class ='language'>{$val->language}</div><a href='item.php?id={$val->id}'><img src='img.php?src={$val->image}&amp;width=100&amp;height=100' alt='Picture' /> {$htmlStatus}</a>
   </div>";
}

/*
* Here the Blogg section
 */
$res = $content->selectLatestBlogEntries();

// Put results into a HTML-table
// $tr = "<tr><th>Row</th><th>Id " . $films->orderby('id') . "</th><th>Picture</th><th>Title " . $films->orderby('title') . "</th><th>Year " . $films->orderby('YEAR') . "</th><th>Genre</th></tr>";

$blogEntry = null;
$blogHtml = null;

$tr2 = "<p><tr><th>Latest Blog Entries</th><th></p>";

foreach ( $res as $key => $val ) {

$blogEntry = $textFilter->doFilter ( htmlentities ( $val->DATA, null, 'UTF-8' ), $val->FILTER );

// truncate
// $blogEntry = truncate_string($val -> DATA, 100);

$filteredBlogEntry = truncate_string ($blogEntry, 150 );

$blogHtml .= "
<div class ='postItems'>
<h3><a href ='blog_view.php?slug={$val -> slug}'>{$val->title}</a></h3>
<p><b> {$val-> user}</b>
{$val-> updated}</p>
<div>{$filteredBlogEntry}<a href ='blog_view_full.php?slug={$val -> slug}'>(more)</a></div>

</div>";
}

$res = $user->selectLatestUsers();

$userHtml = null;
$img = null;

/*
* Here the user part
*/
foreach ( $res as $key => $val ) {

/* present male or female icon according to salute */
   $salute = $val->salute;

   if ($val->salute == strtolower ( "mr" )){
   $avatar = "<img src='img.php?src=male_user_icon.jpg&amp;width=50&amp;height=50' alt='Picture with img' />";
	} else {
		$avatar = "<img src='img.php?src=female_user_icon.jpg&amp;width=50&amp;height=50' alt='Picture with img' />";
	}

	$userHtml .= "<div class ='userItems'>
	<p><a href='user.php?id={$val->id}'>$avatar</a></p>
	{$val -> acronym}<br/>

	</div>";
	}

	// Create the data array which is to be used in the template file.
	$alpha ['title'] = "Application showcase";
	$alpha ['meta_description'] = "this is the application showcase";
	$alpha ['main'] = <<<EOD

	<h1>{$alpha ['title']}</h1>
	
  
      	<div class = 'mainWrapper'>
      
      	<!--here will go the categories-->
      			
      	<div class ='resumeCategories'>
      	      			 <article class="justify border" style="width:90%">
      			 <p>These are some applications in which I am working on. My portfolio currently consists on E-Commerce sites, 
      			 one written in ASP.NET and the other in PHP that I have done. Right now I am creating a web log for the webshop, using MVC, when it is done 
      			 I will move on to the payment gateway. Some of the applications listed here are course related. There will more to come, but for right now this is what I have.</p></article>
      	</div>
      	
      		<div class ='resumeCategories'>
      		    <h4>Applications and projects</h4>
      			<!-- Latest applications-->	
      			<div id = 'categoryWrapper'>
      				<div id = 'mainItems'>
      					
      						 {$itemHtml}
      						 {$output}
      				</div>
      			</div>
      		 </div> 	
      		
      </div>
      						       
  
EOD;
	
$alpha['footer3'] = <<<EOD

EOD;


	// Hand over to the template engine.
	include (__DIR__ . "/theme/template.php"); 