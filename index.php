<?php
require('./script/helper_funcs.php');
?>
<!doctype html>
<html>
<head>
	<title>Fastboard</title>
	<link rel="stylesheet" type="text/css" href="style.css" />  
</head>
<body>
<?php if(checksec($_COOKIE["uindex"],$_COOKIE["uhash"])){
  # login Verified
  }
?>
<h1>Welcome to fastboard!</h1>
<?php show_threads(); ?>
</div>
</body>
</html>
