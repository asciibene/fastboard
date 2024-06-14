<?php
define('DB_FILE','./db/main.db');

class Database
{
  public $threads = [];
  public $users = [];
  
  function __construct(){
    $newdb = unserialize(file_get_contents(DB_FILE));
    $this->threads = $newdb->threads;
    $this->users = $newdb->users;
    $this->save();
  }
  function save()
  {
    file_put_contents(DB_FILE, serialize($this));
    return true;
  }

  function new_user($userlogin, $userpwd)
  {
    $user_obj = new User($userlogin, $userpwd);
    $this->users[$user_obj->uid] = $user_obj;
    $this->save();
  }
  
  function new_thread($nttl,$nbody){
    $thread_obj = new thread($nttl,$nbody);
    $this->threads[$thread_obj->uid] = $thread_obj;
    $this->save();
  }
  
  function get_uid_from_name($name){
    foreach($this->users as $uobj){
      if($uobj->name == $name){
        return $uobj->uid;
      }
    }
  }
  
  function get_name_from_uid($uuid){
    return $this->users[$uuid];
  }
}

class Thread
{
  public $title;
  public $body;
  public $views;
  public $replies;
  public $uid;
  public $score;
  
  function __construct($ttl, $inbod)
  {
    $this->uid = uniqid('t');
    $this->title = $ttl;
    $this->body = $inbod;
    $this->replies = [];
    $this->score = 0;
    
  }
  function __toString(){
    return '<a href="view.php?tuid='.$this->uid.'">'.$this->title.'</a>';
  }
  
  function echo_body(){
    echo '<p>'.$this->body.'</p>';
  }
  
  function echo_title(){
    // Echoes a HTML string containing the title and tags
    // i.e. does NOT return anything ; it just echoes
    echo '<h3>'.$this->title.'</h3>';
  }
  
}

class User
{
  public $name;
  public $pwd_hash;
  public $uid;
  public $votes;

  function __construct($nm, $pwd)
  {
    $this->name = $nm;
    $this->uid = uniqid('u');
    $this->voted_list = [];
    //So votes are stored as such ; the key is the thread tuid and an upvote is True
    //while a downvote is false. null should represent threads that are not voted on yet
  }

  function storepwd($inpwd)
  {
    # stores a new or initial password as a hash (and returns it)
    return $this->pwd_hash = password_hash($inpwd,PASSWORD_DEFAULT);
  }
  
  function cast_vote()
  {
    global $db;
    if(isset($_POST["tuid"]) and key_exists($_POST["tuid"],$db->threads) and is_integer($_POST["voteval"] ?? false)){
      if (!key_exists($_POST["tuid"],$this->voted_list)){
        $this->voted_list[$_POST["tuid"]] = $_POST; //use ternary op here ?:
        $db->threads[$_POST["tuid"]]->score += $vote;
      }else{
        print_error("You have already voted on this thread.");
      }
    }    
} 
}
class Vote
{
  
}
