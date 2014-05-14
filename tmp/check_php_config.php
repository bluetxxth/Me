<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Test PHP-configuration, what works and whats not</title>
<style></style>
<!--[if IE]> 
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>		
	<![endif]-->
</head>
<body>
	<h1>Test a PHP-configuration to check whats installed</h1>
	<p>This file is a part of the Utility project which can be downloaded
		from GitHub.
	
	
	<p>
		<a href="http://github.com/mosbth/Utility">http://github.com/mosbth/Utility</a>
	</p>
	<h2>Report</h2>
	<p>Current level of error-reporting is: 30711</p>
	<p>This means: E_USER_NOTICE E_USER_WARNING E_USER_ERROR
		E_COMPILE_WARNING E_COMPILE_ERROR E_CORE_WARNING E_CORE_ERROR E_PARSE
		E_WARNING E_ERROR</p>
	<p>display_startup_errors =</p>
	<p>display_errors = 1</p>
	<p>Current length of session is ini_get('session.gc_maxlifetime') :
		1440
	
	
	<p>
	
	
	<p>get_magic_quotes_gpc() is : 0</p>
	<p>get_magic_quotes_runtime() is : 0</p>
	<p>output_buffering is :</p>
	<p>implicit_flush is :</p>
	<p>phpversion is : 5.3.3-7+squeeze14</p>
	<p>MySQL server is: 5.0.51a-24+lenny5</p>
	<p>MySQL client is: 50166</p>
	<p>MySQL protocol is: 10</p>
	<p style='color: green'>LDAP IS enabled.</p>
	<p style='color: green'>GD is enabled (version = 2.0)
	
	
	<p style='color: green'>sqlite IS enabled
	
	
	<p style='color: red'>sqlite3 IS NOT enabled
	
	
	<p style='color: green'>sqlite PDO driver IS enabled
	
	
	<p>
		phpinfo() might be enabled. <a href='?phpinfo=1'>Click to view</a>
	</p>
	<p>in_array('mod_rewrite', apache_get_modules());</p>
	
	<p> my pdo drivers  are: </p>
	<?php print_r(pdo_drivers());?>
	
</body>
</html>