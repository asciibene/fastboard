<?php
constant("DB_FILE","./main.db");


class Database{
  
  public $threads={};
  public $users={};
  
  function save(){
    file_put_contents(DB_FILE,serialize($this));
  }
  
  function init(){
    $this=unserialize(file_get_contents(DB_FILE));
  }
   
}

class Thread{

}

class User{
  public $name;
  private $pwd_hash;
  public $uid;
}
