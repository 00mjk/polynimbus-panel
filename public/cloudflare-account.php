<?php

if (preg_match('/^([a-zA-Z0-9._-]+)$/', $_GET["account"], $tmp))
	$account = $tmp[1];
else
	die("Missing arguments...");

require "include/config.php";
require "include/page.php";
$file = "$_data_path/inventory/raw-cloudflare-user-$account.json";

if (!file_exists($file))
	die("Invalid account...");

$date = date("Y-m-d H:i:s", filemtime($file));
$json = file_get_contents($file);

page_header("Polynimbus - Cloudflare account");
echo "Cloudflare account <strong>$account</strong>, domain <strong>$domain</strong> dump as of $date:<br /><br />\n";
echo "<pre>$json</pre>\n";
page_end();
