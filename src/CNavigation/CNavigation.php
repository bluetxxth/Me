<?php

 //----------------------------------------------
 //
 //
 //----------------------------------------------
class CNavigation {
	
	
  public static function GenerateMenu1($items, $class) {
    $html = "<nav class='$class'>\n";
    foreach($items as $key => $item) {
      $selected = (isset($_GET['p'])) && $_GET['p'] == $key ? 'selected' : null; 
      $html .= "<a href='{$item['url']}' class='{$selected}'>{$item['text']}</a>\n";
    }
    $html .= "</nav>\n";
    return $html;
  }
  
  
//   /**
//    * Create HTML for a navbar.
//    */
//   public static function GenerateMenu1($items, $id) {
//   	$p = basename($_SERVER['SCRIPT_NAME'], '.php');
//   	foreach($items as $key => $item) {
//   		$selected = ($p == $key) ? " class='selected'" : null;
//   		@$html .= "<a href='{$item['url']}'{$selected}>{$item['text']}</a>\n";
//   	}
//   	return "<nav id='$id'>\n{$html}</nav>\n";
//   }
  
  
  
  
  public static function GenerateMenu2($items, $class) {
  	$html = "<nav class='$class'>\n";
  	foreach($items as $key => $item) {
  		$selected = (isset($_GET['n'])) && $_GET['n'] == $key ? 'selected' : null;
  		$html .= "<a href='{$item['url']}' class='{$selected}'>{$item['text']}</a>\n";
  	}
  	$html .= "</nav>\n";
  	return $html;
  }
  
  
  /**
   * Create links for hits per page.
   *
   * @param array $hits a list of hits-options to display.
   * @param array $current value.
   * @return string as a link to this page.
   */
  function getHitsPerPage($hits, $current=null) {
     $nav = "Hits per page: ";
     foreach($hits AS $val) {
        if($current == $val) {
           $nav .= "$val ";
        }
        else {
           $nav .= "<a href='" . $this->getQueryString(array('hits' => $val)) . "'>$val</a> ";
        }
     }
     return $nav;
  }
  
  /**
   * Create navigation among pages.
   *
   * @param integer $hits per page.
   * @param integer $page current page.
   * @param integer $max number of pages.
   * @param integer $min is the first page number, usually 0 or 1.
   * @return string as a link to this page.
   */
  function getPageNavigation($hits, $page, $max, $min=1) {
     $nav  = ($page != $min) ? "<a href='" . $this->getQueryString(array('page' => $min)) . "'>&lt;&lt;</a> " : '&lt;&lt; ';
     $nav .= ($page > $min) ? "<a href='" . $this->getQueryString(array('page' => ($page > $min ? $page - 1 : $min) )) . "'>&lt;</a> " : '&lt; ';
  
     for($i=$min; $i<=$max; $i++) {
        if($page == $i) {
           $nav .= "$i ";
        }
        else {
           $nav .= "<a href='" . $this->getQueryString(array('page' => $i)) . "'>$i</a> ";
        }
     }
  
     $nav .= ($page < $max) ? "<a href='" . $this->getQueryString(array('page' => ($page < $max ? $page + 1 : $max) )) . "'>&gt;</a> " : '&gt; ';
     $nav .= ($page != $max) ? "<a href='" . $this->getQueryString(array('page' => $max)) . "'>&gt;&gt;</a> " : '&gt;&gt; ';
     return $nav;
  }
  
  /**
   * Create a breadcrumb of the gallery query path.
   *
   * @param string $path to the current gallery directory.
   * @return string html with ul/li to display the thumbnail.
   */
  function createBreadcrumb($path) {
     $parts = explode('/', trim(substr($path, strlen(GALLERY_PATH) + 1), '/'));
     $breadcrumb = "<ul class='breadcrumb'>\n<li><a href='?'>Movies</a> >></li>\n";
  
     if(!empty($parts[0])) {
        $combine = null;
        foreach($parts as $part) {
           $combine .= ($combine ? '/' : null) . $part;
           $breadcrumb .= "<li><a href='?path={$combine}'>$part</a> » </li>\n";
        }
     }
  
     $breadcrumb .= "</ul>\n";
     return $breadcrumb;
  }
  
};