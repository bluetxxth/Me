<?php
class CSpecialActions {
   
   
   function __construct() {
   }
   
   // show only a portion of the text
   public function truncate_string($str, $length) {
      if (! (strlen ( $str ) <= $length)) {
         $str = substr ( $str, 0, strpos ( $str, ' ', $length ) ) . '...';
      }
      
      return $str;
   }
   
   /**
    * Mark red or green depending if finished or in proresss
    * @param unknown $stringInput
    * @return string
    */
   public  function statusMarker($stringInput, $progress, $finished){
      
      $str = "finished";
      $string = "{$stringInput}";
      $stringInLower =  strtolower ( $string );
      

      if(strpos($stringInLower, $str) === FALSE){
         $htmlStatus = "<div class ='{$progress}'>{$string}</div>";
      }else{
         $htmlStatus = "<div class = '$finished'>{$string}</div>";
      }
      
      return $htmlStatus;
   }
   
   
   /**
    * Make text url strings clickable
    * @param string $text
    * @return url string - the clickable target
    */
   function makeClickableLinks($text) {
      $text = html_entity_decode ( $text );
      $text = " " . $text;
      $text = eregi_replace ( '(((f|ht){1}tp://)[-a-zA-Z0-9@:%_\+.~#?&//=]+)', '<a href="\\1" target=_blank>\\1</a>', $text );
      $text = eregi_replace ( '(((f|ht){1}tps://)[-a-zA-Z0-9@:%_\+.~#?&//=]+)', '<a href="\\1" target=_blank>\\1</a>', $text );
      $text = eregi_replace ( '([[:space:]()[{}])(www.[-a-zA-Z0-9@:%_\+.~#?&//=]+)', '\\1<a href="http://\\2" target=_blank>\\2</a>', $text );
      $text = eregi_replace ( '([_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3})', '<a href="mailto:\\1" target=_blank>\\1</a>', $text );
      return $text;
   }
   
//     function makeClickableLinks($text)
//    {
//       $text = preg_replace('/(((f|ht){1}tp:\/\/)[-a-zA-Z0-9@:%_\+.~#?&\/\/=]+)/i',
//             '<a href="\\1">\\1</a>', $text);
//       $text = preg_replace('/([[:space:]()[{}])(www.[-a-zA-Z0-9@:%_\+.~#?&\/\/=]+)/i',
//             '\\1<a href="http://\\2">\\2</a>', $text);
//       $text = preg_replace('/([_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3})/i',
//             '<a href="mailto:\\1">\\1</a>', $text);
//       return $text;
//    }

   
}
