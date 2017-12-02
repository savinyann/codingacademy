<?php


abstract class Inscription{

   protected $_id;
   protected $_username;
   protected $_password;
   protected $_email;
   protected $_admin;

   function __construct($username, $password, $email, $admin)
   {
      
   }

   public function getUsername(){
      return $this->_username;
   }

   public function getPassword(){
      return $this->_password;
   }

   public function getEmail(){
      return $this->_email;
   }

   public function getAdmin(){
      return $this->_admin;
   }

   public function setUsername($username){
      $this->_username = $username;
   }

   public function setPassword($password){
      $this->_password = $password;
   }

   public function setEmail($email){
      $this->_email = $email;
   }

   public function setAdmin($admin){
      $this->_admin = $admin;
   }

   private function create_form($array, $submit, $action = NULL){
      echo '<form action=$action method="post">';
      foreach ($array as $key => $value)
      {
         echo '<p><label for='.$key.'>'.$value.'</label><input type="text" name='.$key.' id='.$key.' required/></p>';
      }
      echo '<p><button type="submit">'.$submit.'</button></form></p>';
   }
}

?>
