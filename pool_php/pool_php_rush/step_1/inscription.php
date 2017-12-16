<?php
session_start();
if (isset($_POST["username"]))
{
   $i = true;
   $username = $_POST["username"];
   $password = $_POST["password"];
   $password_conf = $_POST["password_conf"];
   $email = $_POST["email"];
   $admin = 0;

   if ((strlen($username) < 3) || (strlen($username) > 20)) {
      echo "Invalid name <br>";
      $i = false;
   }

   if (!filter_var(strtolower($email), FILTER_VALIDATE_EMAIL)) {
      echo "Invalid email <br>";
      $i = false;
   }

   if ((strlen($password) < 4) || (strlen($password) > 12) || ($password != $password_conf)) {
      echo "Invalid password or password confirmation.<br>";
      $i = false;
   }

   if ($i == true) {
      $host ="coding-academy.com";
      $port =3306;
      $db ="pool_php_rush";
      $my_username ="root";
      $my_password ="root";
      $password = password_hash($password, PASSWORD_DEFAULT);
      try
      {
         $dbh = new PDO("mysql:host=$host;port=$port;dbname=$db", $my_username, $my_password);
         $req= $dbh->prepare("INSERT INTO users(username, password, email, admin) VALUES ('$username','$password','$email','0')");
         $req->execute();
         echo "User created<br>";
         header("Location: index.php");
      }
      catch (PDOException $e) {
         echo $req . "<br>" . $e->getMessage();
      }
   }
}
?>
<form action="inscription.php" method="post">
   <div> <label for="username">Name: </label><input type="text" name="username" required/></div>
   <div> <label for="email">Email: </label><input type="email" name="email" required/></div>
   <div> <label for="password">Password: </label><input type="password" name="password" required/></div>
   <div> <label for="password_conf">Password Confirmation: </label><input type="password" name="password_conf" required/></div>
   <div> <button type="submit">Submit</button></div>
</form>
