<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Emada Dent</title>
    <?php 
    include('header.php');
    include('db.php');
    ?>
</head>

<body>

<style>form {
  border: 3px solid #f1f1f1;
}

/* Full-width inputs */
input[type=text], input[type=password] {
  width: 30%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
input[type=submit] {
  background-color: darkblue;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 10%;
}

/* Add a hover effect for buttons */
input[type=submit]:hover {
  opacity: 0.6;
}
</style>

<form action="login.php" method="post">
    
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <input type="submit" name="submit">
    
</form>
<?php 
    if(isset($_POST['submit'])) {

$username = $_POST['username'];
$password = $_POST['password'];

$username = mysqli_real_escape_string($connection, $username);
$password = mysqli_real_escape_string($connection, $password);


$query = "SELECT * FROM conturi WHERE username = '{$username}'";
$select_user_query = mysqli_query($connection, $query);

if(!$select_user_query){

    die("QUERY FAILED".mysqli_error($connection));

}

while($row = mysqli_fetch_array($select_user_query)){

    $db_id = $row['id_cont'];
    $db_username = $row['username'];
    $db_password = $row['password'];

}

if($username == $db_username && $password == $db_password){

    header("Location: http://localhost:8080/Licenta/cont.php");
}

else { ?>
  <script>
    alert("Datele introduse sunt incorecte");
   </script>
 <?php }

    }

    include('footer.php')
?>
</body>
</html>