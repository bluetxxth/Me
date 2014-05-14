<?php

class CStats {
   
   private $db;

   
   public function __construct($db) {
      
      $this -> db = $db;
   }
   
   public function setCount() {
      
      if (isset ( $_SESSION ['views'] )) {
         $_SESSION ['views'] = $_SESSION ['views'] + 1;
      } else {
         $_SESSION ['views'] = 1;
      }
       
      $views = $_SESSION ['views'];
      
     // echo $views;
        
      // Adds one to the counter
    $sqlUpdate =  "UPDATE aCounter SET counter = aCounter + {$views}";
    
    $params = array(
    	 
          $views         
    );
    
     $res = $this -> db -> ExecuteQuery($sql, $params);
     
   }
   
   
   
   public function getCount(){
      
      // Retreives the current count
      $sqlCount  =  "SELECT aCounter FROM aCounter" ;
      
      $res = $this -> db -> ExecuteQueryAndFetchAll( $sql, array($sql));
      
      //*echo "Views:". $views;
      
      return $res;
   }
   

   public function getLoadTime(){
      
      if(isset($pageTimeGeneration)){
         echo 'Page generated in' . round(microtime(true)-$pageTimeGeneration, 5) . 'seconds';
      }
   } 
}