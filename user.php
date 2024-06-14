<?php
require './script/helper_funcs.php'; ?>
<!doctype html>
<html>
<head>
	<title>Fastboard</title>
	<link rel="stylesheet" type="text/css" href="style.css" />  
</head>
<body>
<?php if($_GET['action'] ?? false =="login_form"): ?>
  <h2>New user</h2>
  <form action="index.php" method="post">
    <input type="text" name="sent_name" />
    <br>
    <input type="password" name="sent_pwd"/>
    <br>
    <button name="action" value="login" />
  </form>
<?php elseif($_GET['action'] ?? false =="register_form"): ?>
 <h2>New user</h2>
  <form action="index.php" method="post">
    <input type="text" name="sent_name" />
    <br>
    <input type="password" name="sent_pwd"/>
    <br>
    <button name="action" value="register" />
  </form>_user
<?php elseif($_GET['action'] ?? false == "view_user" and isset($_GET["uuid"])):?>

<?php else: ?>_user
<a href="?action=login_form">Login</a>
<a href="?action=register_form">Register</a>
<?php endif; ?>
</d>
</body>
</html>
