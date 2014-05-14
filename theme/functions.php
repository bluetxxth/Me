<?php
/**
 * Helpers for the template file.
 */

/**
 * Create HTML for a navbar.
 */
function getHTMLForNavigation($items, $id) {
  $p = basename($_SERVER['SCRIPT_NAME'], '.php');
  foreach($items as $key => $item) {
    $selected = ($p == $key) ? " class='selected'" : null; 
    @$html .= "<a href='{$item['url']}'{$selected}>{$item['text']}</a>\n";
  }
  return "<nav id='$id'>\n{$html}</nav>\n";
}


/**
 * Create HTML for navigation links among kmoms.
 */
function getHTMLForKmomNavlinks($items, $id) {
  foreach($items as $key => $item) {
    @$html .= empty($item['url']) ? $item['text'] : "<a href='{$item['url']}'{$selected}>{$item['text']}</a>\n" ;
  }
  return "<nav id='$id'>\n{$html}</nav>\n";
}


/**
 * Get URL to current page.
 */
function getCurrentUrl() {
  $url = "http";
  $url .= (@$_SERVER["HTTPS"] == "on") ? 's' : '';
  $url .= "://";
  $serverPort = ($_SERVER["SERVER_PORT"] == "80") ? '' :
    (($_SERVER["SERVER_PORT"] == 443 && @$_SERVER["HTTPS"] == "on") ? '' : ":{$_SERVER['SERVER_PORT']}");
  $url .= $_SERVER["SERVER_NAME"] . $serverPort . htmlspecialchars($_SERVER["REQUEST_URI"]);
  return $url;
}