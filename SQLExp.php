
<?php
$Connect = mysqli_connect("localhost","root", "","test");
// echo sizeOf($Ac);
    $Cn = mysqli_query($Connect, "SELECT `C1` FROM `tr`");
    $Ac = mysqli_fetch_assoc($Cn);
while($Ac = mysqli_fetch_assoc($Cn)) {
    echo $Ac['C1'];
};
?>


<!-- <script>
    setInterval(() => {
        location.reload()
    }, 8000);
</script> --> 