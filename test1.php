<?php 

echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; 

$cli = (php_sapi_name() == 'cli');
$eol = "\n";
$gle = get_loaded_extensions();
$rows = array();
$le = '';
$wide = 4;
$j = count($gle);
$pad = $wide - $j % $wide;
$len = max(array_map('strlen', $gle));
$func = create_function('$a', 'return str_pad($a, ' . intval($len) . ');');
$gle = array_map($func, $gle);
for($i = 0; $i < $j; $i += $wide)
{$le .= ' ' . implode(' ', array_slice($gle, $i, $wide)) . $eol;}
if (!$cli)
{ echo '<html><head><title>quick info</title></head><body><pre>', $eol; }
echo 'Loaded Extensions:', $eol, $le, $eol;
if (!$cli)
{ echo '</pre></body></html>', $eol; }

phpinfo();