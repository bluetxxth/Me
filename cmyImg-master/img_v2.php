<?php 
/**
 * This is a PHP skript to process images using PHP GD.
 *
 */

//
// Ensure error reporting is on
//
error_reporting(-1);              // Report all type of errors
ini_set('display_errors', 1);     // Display all errors 
ini_set('output_buffering', 0);   // Do not buffer outputs, write directly



//
// Define some constant values, append slash
// Use DIRECTORY_SEPARATOR to make it work on both windows and unix.
//
define('IMG_PATH', __DIR__ . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR);
define('CACHE_PATH', __DIR__ . '/cache/');



/**
 * Display error message.
 *
 * @param string $message the error message to display.
 */
function errorMessage($message) {
  header("Status: 404 Not Found");
  die('img.php says 404 - ' . htmlentities($message));
}



/**
 * Display log message.
 *
 * @param string $message the log message to display.
 */
function verbose($message) {
  echo "<p>$message</p>";
}



//
// Get the incoming arguments
//
$src      = isset($_GET['src'])     ? $_GET['src']      : null;
$verbose  = isset($_GET['verbose']) ? true              : null;
$saveAs   = isset($_GET['save-as']) ? $_GET['save-as']  : null;
$quality  = isset($_GET['quality']) ? $_GET['quality']  : 60;

$pathToImage = realpath(IMG_PATH . $src);



//
// Validate incoming arguments
//
is_dir(IMG_PATH) or errorMessage('The image dir is not a valid directory.');
is_writable(CACHE_PATH) or errorMessage('The cache dir is not a writable directory.');
isset($src) or errorMessage('Must set src-attribute.');
preg_match('#^[a-z0-9A-Z-_\.\/]+$#', $src) or errorMessage('Filename contains invalid characters.');
substr_compare(IMG_PATH, $pathToImage, 0, strlen(IMG_PATH)) == 0 or errorMessage('Security constraint: Source image is not directly below the directory IMG_PATH.');
is_null($saveAs) or in_array($saveAs, array('png', 'jpg', 'jpeg')) or errorMessage('Not a valid extension to save image as');
is_null($quality) or (is_numeric($quality) and $quality > 0 and $quality <= 100) or errorMessage('Quality out of range');



//
// Start displaying log if verbose mode & create url to current image
//
if($verbose) {
  $query = array();
  parse_str($_SERVER['QUERY_STRING'], $query);
  unset($query['verbose']);
  $url = '?' . http_build_query($query);


  echo <<<EOD
<html lang='en'>
<meta charset='UTF-8'/>
<title>img.php verbose mode</title>
<h1>Verbose mode</h1>
<p><a href=$url><code>$url</code></a><br>
<img src='{$url}' /></p>
EOD;
}



//
// Get information on the image
//
$imgInfo = list($width, $height, $type, $attr) = getimagesize($pathToImage);
!empty($imgInfo) or errorMessage("The file doesn't seem to be an image.");
$mime = $imgInfo['mime'];

if($verbose) {
  $filesize = filesize($pathToImage);
  verbose("Image file: {$pathToImage}");
  verbose("Image information: " . print_r($imgInfo, true));
  verbose("Image width x height (type): {$width} x {$height} ({$type}).");
  verbose("Image file size: {$filesize} bytes.");
  verbose("Image mime type: {$mime}.");
}



//
// Creating a filename for the cache
//
$parts      = pathinfo($pathToImage);
$saveAs     = is_null($saveAs) ? $fileExtension : $saveAs;
$quality_   = is_null($quality) ? null : "_q{$quality}";
$dirName    = preg_replace('/\//', '-', dirname($src));
$cacheFileName = CACHE_PATH . "-{$dirName}-{$parts['filename']}_{$width}_{$height}{$quality_}.{$saveAs}";
$cacheFileName = preg_replace('/^a-zA-Z0-9\.-_/', '', $cacheFileName);

if($verbose) { verbose("Cache file is: {$cacheFileName}"); }



//
// Open up the image from file
//
$fileExtension  = $parts['extension'];
if($verbose) { verbose("File extension is: {$fileExtension}"); }

switch($fileExtension) {  
  case 'jpg':
  case 'jpeg': 
    $image = imagecreatefromjpeg($pathToImage);
    if($verbose) { verbose("Opened the image as a JPEG image."); }
    break;  
  
  case 'png':  
    $image = imagecreatefrompng($pathToImage); 
    if($verbose) { verbose("Opened the image as a PNG image."); }
    break;  

  default: errorPage('No support for this file extension.');
}



//
// Save the image
//
switch($saveAs) {
  case 'jpeg':
  case 'jpg':
    if($verbose) { verbose("Saving image as JPEG to cache using quality = {$quality}."); }
    imagejpeg($image, $cacheFileName, $quality);
  break;  

  case 'png':  
    if($verbose) { verbose("Saving image as PNG to cache."); }
    imagepng($image, $cacheFileName);  
  break;  

  default:
    errorMessage('No support to save as this file extension.');
  break;
}

if($verbose) { 
  clearstatcache();
  $cacheFilesize = filesize($cacheFileName);
  verbose("File size of cached file: {$cacheFilesize} bytes."); 
  verbose("Cache file has a file size of " . round($cacheFilesize/$filesize*100) . "% of the original size.");
}



//
// Output the resulting image
//
if($verbose) {
  verbose("Memory peak: " . round(memory_get_peak_usage() /1024/1024) . "M");
  verbose("Memory limit: " . ini_get('memory_limit'));
}
else {
  $info = getimagesize($cacheFileName);
  !empty($info) or errorMessage("The file doesn't seem to be an image.");
  $mime = $info['mime'];
  header('Content-type: ' . $mime);  
  readfile($cacheFileName);
}
