<?php

include "db.php";


class programari {
    
    var $id_pacient;
    var $nume;
    var $prenume;
    var $id_serviciu;
    var $denumire;
    var $pret;
    var $datap;
    var $ora;
    var $achitat;
}

function __construct()
{

}
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
    <h1 class="text-center">Creare programare</h1>
    <div class="container">
        <div class="col-sm-6">
        <form action="programari_create.php" method="post">
            <select name="id_pacient" id_pacient="">
                <?php 
                 $query="SELECT * FROM pacienti";
                 $result=mysqli_query($connection, $query);
                 if(!$result) {
                     die('Query failed'.mysqli_error($connection));
                 }
             
                while($row = mysqli_fetch_assoc($result)) {
                    $id_pacient = $row['id_pacient'];
                    $nume = $row['nume'];
                    $prenume = $row['prenume'];
                    echo "<option value='$id_pacient'>$id_pacient $nume $prenume</option>";
                }
                ?>
                 </select><br><br>
                <select name="id_serviciu" id_serviciu="">
                <?php 
                 $query1="SELECT * FROM servicii";
                 $result1=mysqli_query($connection, $query1);
                 if(!$result1) {
                     die('Query failed'.mysqli_error($connection));
                 }
             
                while($row1 = mysqli_fetch_assoc($result1)) {
                    $id_serviciu = $row1['id_serviciu'];
                    $denumire = $row1['denumire'];
                    echo "<option value='$id_serviciu'>$id_serviciu $denumire</option>";
                }
                ?>
                 </select><br><br>

        <div class="form-group">
        <label for="datap">Data</label>
        <input type="date" name="datap"><br>
        </div>
        <div class="form-group">
        <label for="ora">Ora</label>
        <input type="time" name="ora"><br>
        </div>
        <div class="form-group">
        <label for="achitat">Achitat</label>
        <input type="number" name="achitat"><br>
        </div>

        <input class="btn btn-primary" type="submit" name="submit" value="Adauga">
        
        </form>
    </div>
    </div>

    <?php 


if(isset($_POST['submit'])) {

    $programare= new programari();
    $programare->id_pacient=$_POST['id_pacient'];
    $programare->id_serviciu=$_POST['id_serviciu'];
    // $fisa_tratament->nume=$_POST['nume'];
    // $fisa_tratament->prenume=$_POST['prenume'];
    $query2="SELECT * FROM pacienti WHERE id_pacient='$programare->id_pacient'";

    $result2=mysqli_query($connection, $query2);

     if(!$result2) {
         echo "Nu s-au putut adauga numele si prenumele pacientului";
         die('Query failed'.mysqli_error($connection));
     }

     $row2 = mysqli_fetch_assoc($result2);


    //$programare->id_pacient=$row2['id_pacient'];

    $programare->nume=$row2['nume'];
    $programare->prenume=$row2['prenume'];

    $query3="SELECT * FROM servicii WHERE id_serviciu='$programare->id_serviciu'";

    $result3=mysqli_query($connection, $query3);

     if(!$result3) {
         echo "Nu s-au putut adauga numele si prenumele pacientului";
         die('Query failed'.mysqli_error($connection));
     }

     $row3 = mysqli_fetch_assoc($result3);


    //$programare->id_serviciu=$row2['id_serviciu'];
    $programare->denumire=$row3['denumire'];
    $programare->pret=$row3['pret'];
    $programare->datap=$_POST['datap'];
    $programare->ora=$_POST['ora'];
    $programare->achitat=$_POST['achitat'];

    $query3="SELECT * FROM programari WHERE datap='$programare->datap' AND ora='$programare->ora'";

    $result3=mysqli_query($connection, $query3);

     if(!$result3) {

    $query4="INSERT INTO programari (id_pacient, id_serviciu, nume, prenume, datap, ora, denumire, pret, achitat) ";
    $query4.="VALUES ('$programare->id_pacient', '$programare->id_serviciu', '$programare->nume', '$programare->prenume', '$programare->datap', '$programare->ora', '$programare->denumire', '$programare->pret', '$programare->achitat')";

    $result4 = mysqli_query($connection, $query4);


    if(!$result4) {
        echo "Programarea nu a fost adaugata";
        die('Query failed'.mysqli_error($connection));
    }
}

else{
    ?>
    <script>alert("Ora si data selectate sunt ocupate cu o alta progrmare");</script>
    <?php
}
}
        include('footer.php')
    ?>


    </body>
    </html> 