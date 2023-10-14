crack.php
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
<p> This application takes an MD5 hash of a four digit pin and check all about 10000 possible four digit PINs to determine the PIN. Using md5 for hashing with md5 and reversing  </p>
 
<?php
  // Diyar Parwana
  // University of Michigan
  $startTime = microtime(true);
  $isFound= false;
  $hashedInput = "";

  if(isset($_GET['md5']) && !empty($_GET['md5'])) {
        (string)$hashedInput = md5($inputValue);
        echo "<hr>";
      echo $hashedInput;
      echo "<hr>";
      $hasInput=true;
  }
  else {
        $inputValue = "";
        $hasInput=false;
  }

  echo "<h3> Debug output </h3>";
  $startTime = microtime(true);
  for ($x = 0; $x <= 9999; $x++) {

    $x=str_pad($x, 4, '0', STR_PAD_LEFT);

    // Diysplay the first 15 rows
    $md5hash=hash('md5',$x);
    if($x<=15){
    echo "$md5hash  $x <br>";
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




    // Calculation for the Elapsed time
   $timeElapsed = microtime(true) - $startTime;
    echo " <br> Elapsed time:" . $timeElapsed;

   if ($isFound) {
       echo "<br> PIN: Not  Found <br>";
   }

   else {
     echo "<br> PIN:  Found " . $md5hash ." <br>";
   }

?>

 <form action="index.php" method="get">
<input type="text" name="md5" size="40" value="<?= htmlentities($md5) ?>">
<input type="submit" value="Crack MD5"/>
 </form>

 </body>
 </html>
