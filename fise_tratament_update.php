<?php
    include "db.php";

    
    $query="SELECT * FROM fise_tratament";
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

    <?php 
    function validareCNP($p_cnp) {
        // CNP must have 13 characters
        if(strlen($p_cnp) != 13) {
            return false;
        }
        $cnp = str_split($p_cnp);
        unset($p_cnp);
        $hashTable = array( 2 , 7 , 9 , 1 , 4 , 6 , 3 , 5 , 8 , 2 , 7 , 9 );
        $hashResult = 0;
        // All characters must be numeric
        for($i=0 ; $i<13 ; $i++) {
            if(!is_numeric($cnp[$i])) {
                return false;
            }
            $cnp[$i] = (int)$cnp[$i];
            if($i < 12) {
                $hashResult += (int)$cnp[$i] * (int)$hashTable[$i];
            }
        }
        unset($hashTable, $i);
        $hashResult = $hashResult % 11;
        if($hashResult == 10) {
            $hashResult = 1;
        }
        // Check Year
        $year = ($cnp[1] * 10) + $cnp[2];
        switch( $cnp[0] ) {
            case 1  : case 2 : { $year += 1900; } break; // cetateni romani nascuti intre 1 ian 1900 si 31 dec 1999
            case 3  : case 4 : { $year += 1800; } break; // cetateni romani nascuti intre 1 ian 1800 si 31 dec 1899
            case 5  : case 6 : { $year += 2000; } break; // cetateni romani nascuti intre 1 ian 2000 si 31 dec 2099
            case 7  : case 8 : case 9 : {                // rezidenti si Cetateni Straini
                $year += 2000;
                if($year > (int)date('Y')-14) {
                    $year -= 100;
                }
            } break;
            default : {
                return false;
            } break;
        }
        return ($year > 1800 && $year < 2099 && $cnp[12] == $hashResult);
    }

    function validareTelefon($nr)
    {
       return preg_match('/^\(?07\d{2}\)?[-\s]?\d{3}[-\s]?\d{3}$/', $nr) ? true : false;
    }
    ?>
    <h1 class="text-center">Modificare fisa de tratament</h1>
    <div class="container">
        <div class="col-sm-6">
            <form action="fise_tratament_update.php" method="post">
        <div class="form-group">
            <select name="id_fise_tratament" id_fise_tratament="">
                <?php 
                while($row = mysqli_fetch_assoc($result)) {
                    $id_fise_tratament = $row['id_fise_tratament'];
                    $nume = $row['nume'];
                    $prenume = $row['prenume'];
                    echo "<option value='$id_fise_tratament'>$id_fise_tratament $nume $prenume</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
        <label for="cnp">CNP:</label><br>
        <input type="text" name="cnp" placeholder="Introdu noul CNP"><br>
        </div>
        <div class="form-group">
        <label for="adresa">Adresa:</label><br>
        <input type="text" name="adresa" placeholder="Introdu noua adresa"><br>
        </div>
        <div class="form-group">
        <label for="telefon">Telefon:</label><br>
        <input type="text" name="telefon" placeholder="Introdu noul numar de telefon"><br>
        </div>
        <div class="form-group">
        <label for="profesie">Profesie:</label><br>
        <input type="text" name="profesie" placeholder="Introdu noua profesie"><br>
        </div>
        <div class="form-group">
        <label for="antecedente_heredo-colaterale">Antecedente heredo-colaterale:</label><br>
        <input type="text" name="antecedente_heredo_colaterale" placeholder="Introdu noile antecedente heredo-colaterale"><br>
        </div>
        <div class="form-group">
        <label for="motivul_prezentarii">Motivul prezentarii:</label><br>
        <input type="text" name="motivul_prezentarii" placeholder="Introdu noul motiv al prezentarii"><br>
        </div>
        <div class="form-group">
        <label for="antecedente_personale">Antecedente personale:</label><br>
        <input type="text" name="antecedente_personale" placeholder="Introdu noile antecedente personale"><br>
        </div>
        <div class="form-group">
        <label for="examen_dento-parodontal">Examen dento-parodontal:</label><br>
        <input type="text" name="examen_dento_parodontal" placeholder="Introdu noul examen dento-parodontal"><br>
        </div>
        <div class="form-group">
        <label for="examen_mucoasa_orala">Examen mucoasa orala:</label><br>
        <input type="text" name="examen_mucoasa_orala" placeholder="Introdu noul examen mucoasa orala"><br>
        </div>
        <div class="form-group">
        <label for="diagnostic">Diagnostic</label><br>
        <input type="text" name="diagnostic" placeholder="Introdu noul diagnostic"><br>
        </div>

        <input class="btn btn-primary" type="submit" name="submit" value="Modifica">
            </form>
        </div>
        </div>
    <?php 
        if(isset($_POST['submit'])) {
    
    $id_fise_tratament=$_POST['id_fise_tratament'];
    $cnp=$_POST['cnp'];
    $adresa=$_POST['adresa'];
    $telefon=$_POST['telefon'];
    $profesie=$_POST['profesie'];
    $antecedente_heredo_colaterale=$_POST['antecedente_heredo_colaterale']; 
    $motivul_prezentarii=$_POST['motivul_prezentarii']; 
    $antecedente_personale=$_POST['antecedente_personale']; 
    $examen_dento_parodontal=$_POST['examen_dento_parodontal']; 
    $examen_mucoasa_orala=$_POST['examen_mucoasa_orala'];
    $diagnostic=$_POST['diagnostic'];


    if($cnp && validareCNP($cnp)){
   $query1="UPDATE fise_tratament SET cnp='$cnp' WHERE id_fise_tratament='$id_fise_tratament'";
   $result=mysqli_query($connection, $query1);
    
    if(!$result) {
        die('Query failed'.mysqli_error($connection));
    }
}
else{
?>
<script>alert("CNP-ul este invalid!");</script>
<?php 
}
   if($adresa){
   $query1="UPDATE fise_tratament SET adresa='$adresa' WHERE id_fise_tratament='$id_fise_tratament'";
   $result=mysqli_query($connection, $query1);
    
    if(!$result) {
        die('Query failed'.mysqli_error($connection));
    }
}

   if($telefon && validareTelefon($telefon)){
   $query1="UPDATE fise_tratament SET telefon='$telefon' WHERE id_fise_tratament='$id_fise_tratament'";
   $result=mysqli_query($connection, $query1);
    
   if(!$result) {
       die('Query failed'.mysqli_error($connection));
   }
}
else {
    ?>
    <script>alert("Numarul de telefon nu este valid");</script>
<?php
}

   if($profesie){
   $query1="UPDATE fise_tratament SET profesie='$profesie' WHERE id_fise_tratament='$id_fise_tratament'";
   $result=mysqli_query($connection, $query1);
    
   if(!$result) {
       die('Query failed'.mysqli_error($connection));
   }
}
   if($antecedente_heredo_colaterale){
   $query1="UPDATE fise_tratament SET  antecedente_heredo_colaterale='$antecedente_heredo_colaterale' WHERE id_fise_tratament='$id_fise_tratament'";
   $result=mysqli_query($connection, $query1);
    
   if(!$result) {
       die('Query failed'.mysqli_error($connection));
   }
}

   if($motivul_prezentarii){
   $query1="UPDATE fise_tratament SET  motivul_prezentarii='$motivul_prezentarii' WHERE id_fise_tratament='$id_fise_tratament'";
   $result=mysqli_query($connection, $query1);
    
   if(!$result) {
       die('Query failed'.mysqli_error($connection));
   }
}
   if($antecedente_personale){
   $query1="UPDATE fise_tratament SET  antecedente_personale='$antecedente_personale' WHERE id_fise_tratament='$id_fise_tratament'";
   $result=mysqli_query($connection, $query1);
    
   if(!$result) {
       die('Query failed'.mysqli_error($connection));
   }
}
   if($examen_dento_parodontal){
   $query1="UPDATE fise_tratament SET  examen_dento_parodontal='$examen_dento_parodontal' WHERE id_fise_tratament='$id_fise_tratament'";
   $result=mysqli_query($connection, $query1);
    
   if(!$result) {
       die('Query failed'.mysqli_error($connection));
   }
}

   if($examen_mucoasa_orala){
   $query1="UPDATE fise_tratament SET  examen_mucoasa_orala='$examen_mucoasa_orala' WHERE id_fise_tratament='$id_fise_tratament'";
   $result=mysqli_query($connection, $query1);
    
   if(!$result) {
       die('Query failed'.mysqli_error($connection));
   }
}

   if($diagnostic){
   $query1="UPDATE fise_tratament SET  diagnostic='$diagnostic' WHERE id_fise_tratament='$id_fise_tratament'";

   $result=mysqli_query($connection, $query1);
    
    if(!$result) {
        die('Query failed'.mysqli_error($connection));
    }
}
}

        include('footer.php')
    ?>
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
        </style>
    </body>
    </html>