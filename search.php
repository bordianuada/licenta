
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
    <h1 class="text-center">Cautare</h1>
    <div class="container">
        <div class="col-sm-6">
        <form action="search.php" method="post">  
        <input type="text" name="search" class="form-control">
        <input class="btn btn-primary" type="submit" name="submit" value="Cauta"> 
        </form>  
        </div>
        </div>

<style>
        form {
  border: 3px solid #f1f1f1;
}

/* Full-width inputs */
input[type=text], input[type=password], select {
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


tr:nth-child(even) {
  background-color: #dddddd;
}

table, th, td {
  border: 1px solid black;
}
        </style><br>
    <div class="container">
        <div class="col-sm-6">
        <table>
  <tr>
    <th>Id Programare</th>
    <th>Id Pacient</th>
    <th>Id Serviciu</th>
    <th>Nume</th>
    <th>Prenume</th>
    <th>Serviciu</th>
    <th>Data</th>
    <th>Ora</th>
    <th>Pret</th>
    <th>Achitat</th>
  </tr>  
<?php
include "db.php";

if(isset($_POST['submit'])){

$search = $_POST['search'];

$query2 = "SELECT * FROM programari WHERE nume LIKE '%$search%' ";

$result2 = mysqli_query($connection, $query2);

if(!$result2){
    die("Query failed".mysqli_error($connection));
}

$count = mysqli_num_rows($result2);

if($count == 0)
{
    echo "<h1> NO RESULTS </h1>";
}
else{
    while($row1=mysqli_fetch_assoc($result2)) {
        $id_programare=$row1['id_programare'];
        $id_pacient=$row1['id_pacient'];
        $nume=$row1['nume'];
        $prenume=$row1['prenume'];
        $id_serviciu=$row1['id_serviciu'];
        $denumire=$row1['denumire'];
        $datap=$row1['datap'];
        $ora=$row1['ora'];
        $pret=$row1['pret'];
        $achitat=$row1['achitat'];
?>
    
    <tr>
    <td><?php echo $id_programare; ?></td>
    <td><?php echo $id_pacient; ?></td>
    <td><?php echo $id_serviciu; ?></td>
    <td><?php echo $nume; ?></td>
    <td><?php echo $prenume; ?></td>
    <td><?php echo $denumire; ?></td>
    <td><?php echo $datap; ?></td>
    <td><?php echo $ora; ?></td>
    <td><?php echo $pret; ?></td>
    <td><?php echo $achitat; ?></td>
    </tr>
<?php
}
}
}
?>
</table>
</div>
</div>
<?php 

include('footer.php')
?>
</body>
</html>