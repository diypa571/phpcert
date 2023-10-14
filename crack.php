<!DOCTYPE html>
<html lang="sv">
<head>
<meta charset="UTF-8">
<title>Diyar Parwana</title>
<meta name="description" content="Tes description">
<meta name="keywords" content="test1,test2">
<meta name="viewport" content="width=device-width, initial-scale=1">
 </head>
 <body>

<h1>Diyar Parwana</h1>
<p> Building Web Applications in PHP <em> University of Michigan </em></p>
<p> This application takes an MD5 hash of a four digit pin and check all about 10000 possible four digit PINs to determine the PIN.
  </p>
<p>Try enter this hash <br>81dc9bdb52d04dc20036dbd8313ed055 </p>
<?php
   // Diyar Parwana
  // PHP University of Michigan
  $startTime = microtime(true);
  $isFound= false;
  $hashedInput = "";

  if(isset($_GET['md5']) && !empty($_GET['md5'])) {
  $input = $_GET['md5'];
  $hashedInput = (string)$_GET['md5'];
   echo "<hr>";
  }
  echo "<h3> Debug output </h3>";
  $startTime = microtime(true);
  // Creating a loop
  for ($x = 0; $x <= 9999; $x++) {
    // For the 4 digits
   while (strlen($x) < 4) {

        $x =  '0'.$x;
    }
    // Diysplay the first 15 rows


      $md5hash = hash('md5', $x);
      if ($x <= 15) {  // Corrected the syntax here
          echo "$md5hash   $x";
          echo "<br>";
      }


    if ($md5hash == $_GET["md5"]){
    $isFound = true;
    $timeElapsed = microtime(true) - $startTime;
    echo "<br> Total checks: $x <br>";
    echo "Ellapsed time: $timeElapsed <br> ";
    echo "PIN is: $x <br>";
    break;
    }
   }


   if (!$isFound) {
      $timeElapsed = microtime(true) - $startTime;
       echo "<br> PIN: Not  Found <br>";
   }

?>

<form action="index.php" method="get">
<input type="text" name="md5" size="40" value="<?= htmlentities($md5) ?>">
<input type="submit" value="Crack MD5"/>
</form>

 </body>
 </html>
