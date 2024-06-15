<?php
require 'classes.php';
global $db;
$db = new Database();

function login_complete(){
  //called from : index.php
  //verify submitted data and if okay set cookies
  if(isset($_POST['sent_name']) and isset($_POST['sent_pwd'])){
    if($uobj=checksec()){

    }
  }
}

function checksec()
{
  //Here we check if the cookies contains the good password hash
  global $db;
  global $__login;
  if(!isset($_COOKIE['_uuid']) or !isset($_COOKIE['_hash'])){
    if (isset($_POST["sent_name"]) and isset($_POST["sent_pwd"]) ){
      setcookie('_uuid',$uobj->uid);
      setcookie('_hash',$uobj->pwd_hash);
    }
    return false; 
  }
  $__login = $db->users[$_COOKIE["_uuid"]];
  if (password_verify($_COOKIE["_hash"],$__login->pwd_hash)){
    return $__login;
  }else{
    unset($__login);
    return false;
  }
}

function mkhtml($tag, $cnt, $attrlist = null)
{
  #Creates an html element and RETURNS the string
  if ($attrlist == null) {
    return "<$tag>" . $cnt . "</{$tag}>";
  } else {
    
  }
}


function echohtml($tag, $cnt)
{
  #like mkhtml but the string will be echoed
  echo "<$tag>" . $cnt . "</{$tag}>";
}

function print_error($msg){
  echo '<p class="error">'.$msg.'</p>';
}

function notify($str){
  echo '<p class="notify">'.$str.'</p>';
}

// --------------------------------------------------

