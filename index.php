<html>
  <head>
    <title>Yuutub</title>
	<link rel="stylesheet" href="index.css">
  </head>
<body>
<?php 
if (isset($_GET["v"]) && str_starts_with($_SERVER["REQUEST_URI"], "/watch")) {
	echo "
		<iframe src='https://www.youtube.com/embed/{$_GET["v"]}'></iframe>
	";
} else {
	$headers = array(
	    'Origin: www.youtube.com',
	);
	$useragent = "Opera/9.80 (J2ME/MIDP; Opera Mini/4.2.14912/870; U; id) Presto/2.4.15";
	$c = curl_init();
	curl_setopt($c, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($c, CURLOPT_USERAGENT, $useragent);
	//curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($c, CURLOPT_FOLLOWLOCATION, TRUE);
	//$q = preg_replace("#[^0-9a-z]#i","",$_GET["q"]); 
	curl_setopt($c, CURLOPT_URL, "https://www.youtube.com{$_SERVER["REQUEST_URI"]}");
	curl_exec($c);
}
?>
<script defer>
	if (document.querySelector(".content-error")) {
		document.querySelector(".content-error").style.display = "none";
	}
</script>
  </body>
</html>