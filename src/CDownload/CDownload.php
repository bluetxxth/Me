<?php

class CDownload{
   
   
  function downloadMusic(){
     // put this below somewhere
    /* <a href="<?php bloginfo('url'); ?>/filedownload.php?download=<?php echo get_post_meta($post->ID, 'mymp3_value', true) ?>">resume</a>*/
     
     
     //then goes this
      $name_of_file = $_GET["download"];
      
      header('Content-Description: File Transfer');
      // We'll be outputting a MP3
      header('Content-type: application/mp3');
      // It will be called file.mp3
      header('Content-Disposition: attachment; filename=' .$name_of_file);
      header('Content-Length: '.filesize($name_of_file));
      header('Content-Transfer-Encoding: binary');
      header('Expires: 0');
      header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
      header('Pragma: public');
      // The MP3 source is in somefile.pdf
      //readfile("somefile.mp3");
      
      readfile_chunked($name_of_file);
      
      function readfile_chunked($filename) {
         $chunksize = 1*(1024*1024); // how many bytes per chunk
         $buffer = '';
         $handle = fopen($filename, 'rb');
      
         if ($handle === false) {
            return false;
         }
      
         while (!feof($handle)) {
            $buffer = fread($handle, $chunksize);
            print $buffer;
         }
      
         return fclose($handle);
      }
     
   }
   
   /**
    * Download pdf files
    */
   public function pdfDownload($fileName){
      header("Content-Type: application/octet-stream");
      
      $file = $_GET["{$filename}"] .".pdf";
      header("Content-Disposition: attachment; filename=" . urlencode($file));
      header("Content-Type: application/octet-stream");
      header("Content-Type: application/download");
      header("Content-Description: File Transfer");
      header("Content-Length: " . filesize($file));
      flush(); // this doesn't really matter.
      $fp = fopen($file, "r");
      while (!feof($fp))
      {
         echo fread($fp, 65536);
         flush(); // this is essential for large downloads
      }
      fclose($fp);
      
      return $file;
   }
   

}