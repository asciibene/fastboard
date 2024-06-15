<?php 
require './script/helper_funcs.php';

if (isset($_POST['action']) and isset($_POST['sent_name']) and isset($_POST['sent_pwd'])){
  if($_POST["action"]=="login" and isset($_POST["sent_name"]) and isset($_POST['sent_pwd'])){
    if(checksec()){
      notify("You are now logged in.");
    }else{
      print_error("Bad login");
    }
  }
  elseif($_POST["action"]=="register"){
    if($db->new_user($_POST['sent_name'],$_POST['sent_pwd'])){
      if(login_complete()){
        notify("Registration sucess");
      }
    }else{
      print_error("bad register");
    }
  }
}
?>
<!doctype html>
<html>
<head>
	<title>Fastboard</title>
	<link rel="stylesheet" type="text/css" href="style.css" />  
	<script src="./script/misc.js"></script>
</head>
<body>
<h1>Welcome to fastboard! </h1>
<div>
<?php
global $db;
foreach ($db->threads as $t) {
    echo "<sup>".$t->score."</sup>".$t;
}
?>
</div>
</body>
</html>
