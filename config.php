<?php
/**
 * General settings, valid for all page requests
 */
 
 /**
  * Start the session.
  *
  */
 session_name(preg_replace('/[:\.\/-_]/', '', __DIR__));
 session_start();
 
// Error reporting
error_reporting(-1);

// Change this to __DIR__ whenever PHP5.3 is supported on production environment
if(!defined('__DIR__')) {
  define('__DIR__', dirname(__FILE__));
}

/**
 * Define Alpha paths.
 *
 */
//this one is for the condig file
define('ALPHA_INSTALL_PATH', __DIR__ . '/.');

//this is for the views
define('ALPHA_THEME_PATH', ALPHA_INSTALL_PATH . '/theme/render.php');


/**
 * Include bootstrapping functions.
 *
 */
include(ALPHA_INSTALL_PATH . '/src/bootstrap.php');


/**
 * Theme related settings.
 *
 */
//$alpha['stylesheet'] = 'css/style.css';
$alpha['stylesheets'] = array('css/style.css');
//favicon
$alpha['favicon']    = './img/favicon.ico';

// The contents of the kmoms navlinks
$alpha['navrelated'] = array(
   'neoclash'   => array('text'=>'neoclash',  'url'=>false),
   'goblin'   => array('text'=>'goblin',  'url'=>false),
   'alpha'   => array('text'=>'alpha',  'url'=>false),
   'project4'   => array('text'=>'project4',  'url'=>false),
   'project5'   => array('text'=>'project5',  'url'=>false),
   'project6'   => array('text'=>'project6',  'url'=>false),
   'project7'   => array('text'=>'project7',  'url'=>false),
   'project8'   => array('text'=>'project8',  'url'=>false),   
);

// The contents of the navbar
$alpha['navbar1'] = array(

);

//create the create menu links for menu 1
$alpha['user_create'] = array('text' => 'Create', 'url' => 'user_create.php?p=user_create');
$alpha['admin'] = array('text' => 'Admin', 'url' => 'admin.php?=p=admin');
$alpha['login'] = array('text' => 'Logout', 'url' => 'logout.php?p=logout');
$alpha['logout'] = array('text' => 'Login', 'url' => 'login.php?p=login');



//append create and admin menu links
$acronym = isset($_SESSION['user']) ? $_SESSION['user']->acronym : null;

if($acronym){

   array_push($alpha['navbar1'], $alpha['admin']);
   array_push($alpha['navbar1'], $alpha['login']);
//    array_push($alpha['navbar1'], $alpha['user_create']);

}else{
//   array_push($alpha['navbar1'], $alpha['user_create']);
   array_push($alpha['navbar1'], $alpha['logout']);
}


$alpha['navbar2'] = array(
        'index'         => array('text'=>'Home',  'url'=>'index.php'),
		'about'         => array('text'=>'Me',  'url'=>'about.php'),
		'cv'            => array('text'=>'CV',  'url'=>'cv.php'),
// 		'viewsource'    => array('text'=>'Source', 'url'=>'viewsource.php'),
        'news'          => array('text' => 'News', 'url' => 'blog_view.php?n=news'),
        'showcase'      => array('text' => 'Showcase', 'url' => 'showcase.php?n=showcase'),
        'interests'     => array('text' => 'Interests', 'url' => 'interests.php?n=interests'),
        'gallery'       => array('text' => 'Gallery', 'url' => 'gallery.php?n=gallery'),
        'contact'      => array('text' => 'Contact', 'url' => 'contact.php?n=contact')
);

/**
 * Settings for the database.
 *
 */
$alpha['database']['dsn']            = 'mysql:host=localhost; dbname=1_gabriel_db;';
$alpha['database']['username']       = '';
$alpha['database']['password']       = '';
$alpha['database']['driver_options'] = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'");


/**
 * Settings for JavaScript.
 */
//for modernizr
$alpha['modernizr'] = './js/modernizr.js';

//for jquery
$alpha['jquery'] = '//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js';
//$alpha['jquery'] = null; // To disable jQuery

//For my own javascript files
$alpha['javascript_include'] = array();
//$alpha['javascript_include'] = array('js/main.js'); // To add extra javascript

// Add js/main.js for inklusion
$alpha['javascript_include'][] = 'js/main.js';
$alpha['javascript_include'][] = 'js/other.js';

/**
 * Google analytics.
 *
 */
$alpha['google_analytics'] = 'UA-22093351-1'; // Set to null to disable google analytics
