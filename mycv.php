<?php
	/**
 * An page to display the sourcecode.
 */
	include ("config.php");
	
	//declare the buttons
	$html = null;
	$html2 = null;
	$pdfResumeEnglish = null;
	
	$html .= '<div id = \'EnglishCV\' > <p><h3>English</h3><form method="post" action = "CV.php" >
    <input type="submit" name="CVEng" value="CV">
    <input type="submit" name="CoverEng" value="Cover">
	<input type="submit" name="AttachmentEng" value="Attachment">
	</div>
	
	
	<div id = \'SwedishCV\'>
	 <h3>Swedish</h3>
	 <input type="submit" name="CVSwe" value="CV">
    <input type="submit" name="CoverSwe" value="Personliga Brev">
	<input type="submit" name="AttachmentSwe" value="Bilaga">
    </form></p></div>';
	
	
	$pdfResumeEnglish = <<<EOD
	
<div id = 'pdf'>
<object data="/pdf/gabriel_nieva_resume.pdf" type="application/pdf" width="100%" height="100%">
	
  <p>It appears you don't have a PDF plugin for this browser.
  No biggie... you can <a href="myfile.pdf">click here to
  download the PDF file.</a></p>
	
</object>
</div>
	
EOD;
	
	$pdfCoverEnglish = <<<EOD
	
<div id = 'pdf'>
<object data="/pdf/gabriel_nieva_cover_letter.pdf" type="application/pdf" width="100%" height="100%">
	
  <p>It appears you don't have a PDF plugin for this browser.
  No biggie... you can <a href="myfile.pdf">click here to
  download the PDF file.</a></p>
	
</object>
</div>
	
EOD;
	
	$pdfAttachmentEnglish = <<<EOD
	
<div id = 'pdf'>
<object data="/pdf/gabriel_nieva_resume_attachment.pdf" type="application/pdf" width="100%" height="100%">
	
  <p>It appears you don't have a PDF plugin for this browser.
  No biggie... you can <a href="myfile.pdf">click here to
  download the PDF file.</a></p>
	
</object>
</div>
	
EOD;
	
	
	$pdfResumeSwedish = <<<EOD
	
<div id = 'pdf'>
<object data="/pdf/gabriel_nieva_cv.pdf" type="application/pdf" width="100%" height="100%">
	
  <p>It appears you don't have a PDF plugin for this browser.
  No biggie... you can <a href="myfile.pdf">click here to
  download the PDF file.</a></p>
	
</object>
</div>
	
EOD;
	
	$pdfCoverSwedish = <<<EOD
	
<div id = 'pdf'>
<object data="/pdf/gabriel_nieva_brev.pdf" type="application/pdf" width="100%" height="100%">
	
  <p>It appears you don't have a PDF plugin for this browser.
  No biggie... you can <a href="myfile.pdf">click here to
  download the PDF file.</a></p>
	
</object>
</div>
	
EOD;
	
	
	$pdfAttachmentSwedish = <<<EOD
	
<div id = 'pdf'>
<object data="/pdf/gabriel_nieva_cv_bilaga.pdf" type="application/pdf" width="100%" height="100%">
	
  <p>It appears you don't have a PDF plugin for this browser.
  No biggie... you can <a href="myfile.pdf">click here to
  download the PDF file.</a></p>
	
</object>
</div>
	
EOD;
	
	// if (isset($_SESSION['pointCounter'])) {
	
	// $pointCounter = $_SESSION['pointCounter'];
	
	// } else {
	// $pointCounter = new CDPointCounter();
	
	// }
	
	//English CV
	if (isset($_POST['CVEng'])):
	
	$html .= $pdfResumeEnglish;
	
	endif;
	
	//English Cover
	if (isset($_POST['CoverEng'])):
	
	$html .= $pdfCoverEnglish;
	
	endif;
	
	
	//English Attachment
	if (isset($_POST['AttachmentEng'])):
	
	$html .= $pdfAttachmentEnglish;
	
	endif;
	
	
	//Swedish CV
	if (isset($_POST['CVSwe'])):
	
	$html .= $pdfResumeSwedish;
	
	endif;
	
	
	//Swedish Cover
	if (isset($_POST['CoverSwe'])):
	
	$html .= $pdfCoverSwedish;
	
	endif;
	
	
	//Swedish Attachment
	if (isset($_POST['AttachmentSwe'])):
	
	$html .= $pdfAttachmentSwedish;
	
	endif;
	
	
	// Create the data array which is to be used in the template file.
	$alpha ['title'] = "CV";
	$alpha ['meta_description'] = "this is the homepage";
	$alpha ['main'] = <<<EOD

	<h1>{$alpha ['title']}</h1>
	<article class="justify border" style="width:80%">

         <div id = 'resumeOptions'>{$html}</div>
	</article>

EOD;
	
$alpha['footer3'] = <<<EOD

EOD;


	// Hand over to the template engine.
	include (__DIR__ . "/theme/template.php"); 