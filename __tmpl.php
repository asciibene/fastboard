<?php
require './script/helper_funcs.php'; ?>
<!doctype html>
<html>
<head>
	<title>Fastboard</title>
	<link rel="stylesheet" type="text/css" href="style.css" />  
</head>
<body>
<?php if (checksec($db->users[$_COOKIE['__uuid']], $_COOKIE['__hash'])) {



} ?>
<h1>Welcome to fastboard!</h1>
<div>
<?php threads_display(); ?>
</div>
</div>
</body>
</html>
