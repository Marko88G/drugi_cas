<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

define('HOST','localhost:3306');
define('USER','root');
define('PASSWORD','');
define('DBNAME','employees');

$konekcija = mysqli_connect(HOST, USER, PASSWORD,DBNAME);  
if(! $konekcija)  
{  
  die('Neuspesno povezivanje ');  
}  
echo 'Uspesno povezan na bazu!';
echo "<br><br><br>";

$sql = "SELECT emp_no, first_name, last_name FROM employees";
$rezultat = mysqli_query($konekcija, $sql);

if (mysqli_num_rows($rezultat) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($rezultat)) {
    echo "id: " . $row["emp_no"]. " - Puno ime: " . $row["first_name"]. " " . $row["last_name"]. "<br>";
  }
} else {
  echo "nema rezultata";
}

// prepare and bind
/*$stmt = $konekcija->prepare("INSERT INTO employees ( emp_no, first_name, last_name, birth_date, 	gender, hire_date) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $emp_no, $firstname, $lastname, $birth_date, 	$gender, $hire_date);*/

// setovanje parametara i izvrsavanje
/*$emp_no = 5;
$firstname = "Branislav";
$lastname = "Jovkovic";
$birth_date ="1960-01-01";
$gender ="M";
$hire_date ="2021-07-07";
$stmt->execute();*/
mysqli_close($konekcija);  
?>