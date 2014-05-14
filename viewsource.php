 <?php
/**
 * An page to display the sourcecode.
 */
include("config.php");

// Create the data array which is to be used in the template file.
$alpha['title'] = "Sourcecode";
$alpha['meta_description'] = "Show source for all the files in the catalog.";
$alpha['main'] = <<<EOD
<h1>Mall</h1>

<p>Här skriver man nåt vackert. Bara för att visa hur en tom sida kan se ut. Kolla källkoden för 
detaljer.</p>

EOD;

// User src/source.php to display the source of the files
$sourceBasedir=__DIR__;
$sourceNoEcho=true;
include(__DIR__."/src/source.php");
$alpha['style'] = $sourceStyle;
$alpha['main']  = $sourceBody;


// Hand over to the template engine.
include(__DIR__."/theme/template.php");
