<?php
    include "db.php";

    
    $query="SELECT * FROM pacienti";
    $result=mysqli_query($connection, $query);
    if(!$result) {
        die('Query failed'.mysqli_error($connection));
    }
    // else {
    //     echo "Informatiile pacientului au fost modificate in baza de date.";
    // }


?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Emada Dent</title>
 
    
<header class="header">
  <img src="logo%20EMADA%20-%20Family%20Dental%20Clinic.jpg" alt="logo" width="70" height="70">
  <div class="header-right">
    <a href="/Licenta/login.php">Log out</a>
  </div>
  
</header>
   
<style>

.header {
  background-color: skyblue;
  padding: 20px 10px;
}

.header {
  background-color: skyblue;
  padding: 20px 10px;
}

.header a {
  float: left;
  color: darkblue;
  padding: 14px;
  text-decoration: none;
  font-size: 22px; 
}

.header a:hover {
  background-color: aliceblue;
  color: darkblue;
}

.header div{
  float: right;
}

/* Navbar container */
.navbar {
  overflow: hidden;
  font-family:  Arial, Helvetica, sans-serif;
  background-color: darkblue;;
}

/* Links inside the navbar */
.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* The dropdown container */
.dropdown {
  float: left;
  overflow: hidden;
}

/* Dropdown button */
.dropdown .dropbtn {
  font-size: 16px;
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit; /* Important for vertical align on mobile phones */
  margin: 0; /* Important for vertical align on mobile phones */
}

/* Add a red background color to navbar links on hover */
.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: aliceblue;;
  color: darkblue;
}

/* Dropdown content (hidden by default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: aliceblue;
  color: darkblue;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

/* Add a grey background color to dropdown links on hover */
.dropdown-content a:hover {
  background-color: aliceblue;
}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
  display: block;
}


</style>
</head>
<body>

<div class="navbar">
  <div class="dropdown">
    <button class="dropbtn">Pacienti
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="/Licenta/pacienti_create.php">Adaugare Pacient</a>
      <a href="/Licenta/pacienti_update.php">Modificare Pacient</a>
      <a href="/Licenta/pacienti_read.php">Lista Pacienti</a>
      <a href="/Licenta/pacienti_delete.php">Stergere Pacient</a>
    </div>
  </div>
  <div class="dropdown">
    <button class="dropbtn">Fise Tratament
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="/Licenta/fise_tratament_create.php">Creare Fisa Tratament</a>
      <a href="/Licenta/fise_tratament_update.php">Modificare Fisa Tratament</a>
      <a href="/Licenta/fise_tratament_read.php">Lista Fise Tratament</a>
      <a href="/Licenta/fise_tratament_delete.php">Stergere Fisa Tratament</a>
    </div>
  </div>
  <div class="dropdown">
    <button class="dropbtn">Servicii
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="/Licenta/servicii_create.php">Creare Servicii</a>
      <a href="/Licenta/servicii_update.php">Modificare Servicii</a>
      <a href="/Licenta/servicii_read.php">Lista Servicii</a>
      <a href="/Licenta/servicii_delete.php">Stergere Servicii</a>
    </div>
  </div>

  <div class="dropdown">
    <button class="dropbtn">Programari
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="/Licenta/programari_create.php">Creare Programare</a>
      <a href="/Licenta/programari_update.php">Modificare Programare</a>
      <a href="/Licenta/programari_read.php">Lista Programari</a>
      <a href="/Licenta/programari_delete.php">Stergere Programare</a>
      <a href="/Licenta/search.php">Cautare</a>
    </div>
  </div>
</div>
</body>
</html>
    <h1 class="text-center">Modificare informatii pacient</h1>
    <div class="container">
        <div class="col-sm-6">
            <form action="pacienti_update.php" method="post">
        <div class="form-group">
            <select name="id_pacient" id_pacient="">
                <?php 
                while($row = mysqli_fetch_assoc($result)) {
                    $id_pacient = $row['id_pacient'];
                    $nume = $row['nume'];
                    $prenume = $row['prenume'];
                    echo "<option value='$id_pacient'>$id_pacient $nume $prenume</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
        <label for="nume">Nume</label>
        <input type="text" name="nume"><br>
        </div>
        <div class="form-group">
        <label for="prenume">Prenume</label>
        <input type="text" name="prenume"><br>
        </div>
        <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email"><br>
        </div>

        <input class="btn btn-primary" type="submit" name="submit" value="Modifica">
            </form>
        </div>
        </div>
<?php 
if(isset($_POST['submit']))
{
    $nume=$_POST['nume'];
    $prenume=$_POST['prenume'];
    $email=$_POST['email'];


    if($nume){

   $query1="UPDATE pacienti SET nume='$nume' WHERE id_pacient='$id_pacient'";
   $query2="UPDATE fise_tratament SET nume='$nume' WHERE id_pacient='$id_pacient'";
    }

   if($prenume){

   $query1="UPDATE pacienti SET prenume='$prenume' WHERE id_pacient='$id_pacient'";
   $query2="UPDATE fise_tratament SET prenume='$prenume' WHERE id_pacient='$id_pacient'";
   }


   if($email)
   $query1="UPDATE pacienti SET email='$email' WHERE id_pacient='$id_pacient'";

   $result=mysqli_query($connection, $query1);
    
   if(!$result) {
       die('Query failed'.mysqli_error($connection));
   }

   $result=mysqli_query($connection, $query2);
    
   if(!$result) {
       die('Query failed'.mysqli_error($connection));
   }
   else {
    header("Location: http://localhost:8080/Licenta/pacienti_read.php");
   }
}

       include('footer.php')
   ?>

<style>
form {
  border: 3px solid #f1f1f1;
}

/* Full-width inputs */
input[type=text], input[type=password] {
  width: 70%;
  padding: 7px 2px;
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
  width: 30%;
}

/* Add a hover effect for buttons */
input[type=submit]:hover {
  opacity: 0.6;
}
</style>

   </body>
   </html>




?>