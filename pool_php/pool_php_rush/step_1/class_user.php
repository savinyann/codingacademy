<?php


abstract class User{

   protected $_id;
   protected $_username;
   protected $_password;
   protected $_email;
   protected $_admin;

   function __construct($id, $username, $password, $email, $admin)
   {
      $this->_id = $id;
      $this->_username = $username;
      $this->_password = $password;
      $this->_email = $email;
      $this->_admin = $admin;
   }

   public function getId(){
      return $this->_id;
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

   public function setId(){
      return $this->_id;
   }

   public function setUsername(){
      return $this->_username = $username;
   }

   public function setPassword(){
      return $this->_password = $password;
   }

   public function setEmail(){
      return $this->_email = $email;
   }

   public function setAdmin(){
      return $this->_admin = $admin;
   }
}

?>
