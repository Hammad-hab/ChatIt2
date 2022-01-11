<?php
if (!empty($_POST['Mess'])) {
$ContentFromServer = $_POST['Mess'];
}
$UserName = $_POST["client"];
$UserA = "User 1";
$UserB = "User 2";
$Method = $_POST['method'];
$SomeThing = $UserName;
if ($UserName === "User1") { 
    $SomeThing =  "Message by User 1";
    $UserA = 'You';
}
elseif ($UserName === "User2") {
    $SomeThing = "Message by User 2";
    $UserB = "You";
};

$Link = mysqli_connect("127.0.0.1","root", "","server");
if ($Method === "Fetch") {
    for ($i= 0; $i < 1000; $i++) { 
        $Veiw1 = mysqli_query($Link, "SELECT `Message by User 1`FROM `message holder` WHERE `id` = '{$i}' ");
        $Veiw2 = mysqli_query($Link, "SELECT `Message by User 2`FROM `message holder` WHERE `id` = '{$i}'");
        $Fetch1 = mysqli_fetch_assoc($Veiw1);
        $Fetch2 = mysqli_fetch_assoc($Veiw2);
        if (empty($Fetch1["Message by User 1"]) === FALSE && isset($Fetch1["Message by User 1"]) === TRUE) {
            echo '<br><div class="alert alert-dark" autofocus><a href=""><b>'.$UserA.': </b></a><br>'.$Fetch1["Message by User 1"].'</div>';
        };
        if (empty($Fetch2["Message by User 2"]) === FALSE && isset($Fetch2["Message by User 2"]) === TRUE) {
            echo '<br><div class="alert alert-dark" autofocus>'.'<a href=""><b>'.$UserB.' : </b></a><br>'.$Fetch2["Message by User 2"].'</div>';
        };
    };
  

}
else {
   mysqli_query($Link, "INSERT INTO `message holder` SET `".$SomeThing."` = '{$ContentFromServer}' "); 
//    $Veiw1 = mysqli_query($Link, 'SELECT `Message by User 1`FROM `message holder`');
//    $Veiw2 = mysqli_query($Link, 'SELECT `Message by User 2`FROM `message holder`');
//    $Fetch1 = mysqli_fetch_assoc($Veiw1);
//    $Fetch2 = mysqli_fetch_assoc($Veiw2);
// echo '<br><div class="alert alert-dark"><a href=""><b>'. $UserA .': </b></a><br>'.$Fetch1["Message by User 1"].'</div><br><div class="alert alert-dark">'.'<a href=""><b>'.$UserB.' : </b></a><br>'.$Fetch2["Message by User 2"].'</div>';
};

?>
