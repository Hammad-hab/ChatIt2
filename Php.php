<?php

$ContentFromServer = $_POST['Mess'];
$UserName = $_POST["client"];
$UserA = "User 1";
$UserB = "User 2";
$SomeThing = $UserName;
if ($UserName === "User1") { 
    $SomeThing =  "Message by User 1";
    $UserA = 'You';
}
elseif ($UserName === "User2") {
    $SomeThing = "Message by User 2";
    $UserB = "You";
};

$Link = mysqli_connect("localhost","root", "","server");
if ($ContentFromServer === "") {
   $Veiw1 = mysqli_query($Link, 'SELECT `Message by User 1`FROM `message holder`');
   $Veiw2 = mysqli_query($Link, 'SELECT `Message by User 2`FROM `message holder`');
   $Fetch1 = mysqli_fetch_assoc($Veiw1);
   $Fetch2 = mysqli_fetch_assoc($Veiw2);
      
echo '<br><div class="alert alert-dark"><a href=""><b>'.$UserA.': </b></a><br>'.$Fetch1["Message by User 1"].'</div><br><div class="alert alert-dark">'.'<a href=""><b>'.$UserB.' : </b></a><br>'.$Fetch2["Message by User 2"].'</div><br>';
}
else {
   mysqli_query($Link, "UPDATE `message holder` SET `".$SomeThing."` = '{$ContentFromServer}' "); 
   $Veiw1 = mysqli_query($Link, 'SELECT `Message by User 1`FROM `message holder`');
   $Veiw2 = mysqli_query($Link, 'SELECT `Message by User 2`FROM `message holder`');
   $Fetch1 = mysqli_fetch_assoc($Veiw1);
   $Fetch2 = mysqli_fetch_assoc($Veiw2);
echo '<br><div class="alert alert-dark"><a href=""><b>'. $UserA .': </b></a><br>'.$Fetch1["Message by User 1"].'</div><br><div class="alert alert-dark">'.'<a href=""><b>'.$UserB.' : </b></a><br>'.$Fetch2["Message by User 2"].'</div>';
};

?>