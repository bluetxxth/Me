 <?php
// include them helper functions from functions.php
include("functions.php");

// Get url to current page
$alpha['currentUrl'] = getCurrentUrl();

// Extract the variables from the $alpha-array if available
if(isset($alpha)) {
  extract($alpha);
}

// process the template file
include("default.tpl.php"); 