<?php


$stats  =  new CStats();


     
 //Display the count on my site
 $setCiews = $stats -> setCount();
 $getViews = $stats -> getCount();
 
 
 $loadTime = $stats -> getLoadtime();

 
  echo "Views:". $getViews;
  echo $loadTime;
 



