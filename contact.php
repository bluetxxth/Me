<?php

/**
 * An page to display the sourcecode.
 */
// Include the essential config-file which also creates the $alpha variable with its defaults.
include(__DIR__.'/config.php'); 
 



if(isset($_POST['email'])) {


   // EDIT THE 2 LINES BELOW AS REQUIRED

   $email_to = "contactme@neoclash.com";
   $email_subject = "Your email subject";

   
   function died($error) {

      // your error code can go here

      echo "We are very sorry, but there were error(s) found with the form you submitted. ";
      echo "These errors appear below.<br /><br />";
      echo $error."<br /><br />";
      echo "Please go back and fix these errors.<br /><br />";
      die();

   }
   

   // validation expected data exists

   if(!isset($_POST['first_name']) ||
   !isset($_POST['last_name']) ||
   !isset($_POST['email']) ||
   !isset($_POST['telephone']) ||
   !isset($_POST['comments'])) {
      died('Sorry, but there appears to be a problem with the form you submitted. Please review these problems and try again');
   }else {
      header("Location:  contact_email_sent.php");
   }
   
//    $output = null;
//    if(isset($_POST['Submit']) && $first_name != null && $last_name != null && $email_from != null && $comments != null){     
//       $output = "Thank you for you email I will get back to you as soon as possible";
//       header("Location:  contact_email_sent.php");
    
//    }
    
   //get some params
   $first_name = $_POST['first_name']; // required
   $last_name = $_POST['last_name']; // required
   $email_from = $_POST['email']; // required
   $telephone = $_POST['telephone']; // not required
   $comments = $_POST['comments']; // required

    

   $error_message = "";
   $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
   if(!preg_match($email_exp,$email_from)) {
      $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
   }

   $string_exp = "/^[A-Za-z .'-]+$/";
   if(!preg_match($string_exp,$first_name)) {
      $error_message .= 'The First Name you entered does not appear to be valid.<br />';
   }

   if(!preg_match($string_exp,$last_name)) {
      $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
   }

   if(strlen($comments) < 2) {
      $error_message .= 'The Comments you entered do not appear to be valid.<br />';
   }

   if(strlen($error_message) > 0) {
      died($error_message);
   }

   $email_message = "Form details below.\n\n";

   function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
   }

   
   $email_message .= "First Name: ".clean_string($first_name)."\n";
   $email_message .= "Last Name: ".clean_string($last_name)."\n";
   $email_message .= "Email: ".clean_string($email_from)."\n";
   $email_message .= "Telephone: ".clean_string($telephone)."\n";
   $email_message .= "Comments: ".clean_string($comments)."\n";

   // create email headers
   $headers = 'From: '.$email_from."\r\n".
         'Reply-To: '.$email_from."\r\n" .
         'X-Mailer: PHP/' . phpversion();
   @mail($email_to, $email_subject, $email_message, $headers);
}
   
	
	// Create the data array which is to be used in the template file.
	$alpha ['title'] = "Contact me";
	$alpha ['meta_description'] = "this is the homepage";
	$alpha ['main'] = <<<EOD

	<h1>{$alpha ['title']}</h1>
	<article class="justify border" style="width:80%">
	      
	 <fieldset> <legend>Contact form</legend>
         <form name="contactform" method="post" ">
            <table width="450px">
               <tr>
                  <td valign="top">
                     <label for="first_name">First Name *</label>
                  </td>
                  <td valign="top">
                     <input  type="text" name="first_name" maxlength="50" size="30">
                  </td>
               </tr>
               <tr>
                  <td valign="top"">
                     <label for="last_name">Last Name *</label>
                  </td>
                  <td valign="top">
                     <input  type="text" name="last_name" maxlength="50" size="30">
                  </td>
               </tr>
               <tr>
                  <td valign="top">
                     <label for="email">Email Address *</label>
                  </td>
                  <td valign="top">
                     <input  type="text" name="email" maxlength="80" size="30">
                  </td>
               </tr>
               <tr>
                  <td valign="top">
                     <label for="telephone">Telephone Number</label>
                  </td>
                  <td valign="top">
                     <input  type="text" name="telephone" maxlength="30" size="30">
                  </td>
               </tr>
               <tr>
                  <td valign="top">
                     <label for="comments">Comments *</label>
                  </td>
                  <td valign="top">
                     <textarea  name="comments" maxlength="1000" cols="25" rows="6"></textarea>
                  </td>
               </tr>
               <tr>
                  <td colspan="2" style="text-align:center">
                
                       <div class = "row-fluid" > 
                       <br/>
                       <div class="col-md-6" style="margin-left:150px;">
                       <p>
                         <input type ="submit" name="Send" value ="Submit" class="btn btn-default  btn-block"/>
                        </p>
                        </div>
                       </div>
                 
                  </td>
               </tr>
            </table>
         </form>
	     {$output} 
	       </fieldset>    
	</article>

EOD;
	
$alpha['footer3'] = <<<EOD

EOD;

// Hand over to the template engine.
include (__DIR__ . "/theme/template.php"); 