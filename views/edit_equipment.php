<?php 

$host = "localhost";
$user = "root";
$pw = "";
$db = "hospital";

$id = isset($_REQUEST["id"])?$_REQUEST["id"]:"";
$urzadzenia = isset($_REQUEST["nazwa_urz"])?$_REQUEST["nazwa_urz"]:"";
$lokalizacja = isset($_REQUEST["location"])?$_REQUEST["location"]:"";
$typ = isset($_REQUEST["type"])?$_REQUEST["type"]:"";
$czas = date("y-m-d");
try{

    $conn = mysqli_connect($host,$user,$pw,$db);

    $sql = "UPDATE urzadzenia SET id_u='$id', nazwa_urzadzenia='$urzadzenia',lokalizacja= '$lokalizacja',typ = '$typ',czas='$czas' WHERE id_u = '$id'";

    $wynik = mysqli_query($conn,$sql);

    mysqli_close($conn);


}catch (exception$e){
    echo "Błąd mysqli";
}

header("location:/Repos/Hospital-Inventory/index.php");
?>