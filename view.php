<?php
require './script/helper_funcs.php';
?>
<!doctype html>
<html>
<head>
	<title>Fastboard</title>
	<link rel="stylesheet" type="text/css" href="style.css" />  
</head>
<body>
<?php if(isset($_GET['tuid']) and array_key_exists($_GET['tuid'],$db->threads)): ?>
<div class="thread"> 
<?php 
$tobj = $db->threads[$_GET['tuid']];
$tobj->echo_title();
$tobj->echo_body();
?>
</div>
<?php endif; ?>
</div>
</body>
</html>
