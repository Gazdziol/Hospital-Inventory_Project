<?php 
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: /Repos/Hospital-Inventory/logowanie/login.php");
    exit();
}


$host = "localhost";
$user = "root";
$pw = "";
$db = "hospital";

$urzadzenia = isset($_REQUEST["nazwa_urz"])?$_REQUEST["nazwa_urz"]:"";
$lokalizacja = isset($_REQUEST["location"])?$_REQUEST["location"]:"";
$typ = isset($_REQUEST["type"])?$_REQUEST["type"]:"";
$czas = date("y-m-d");
$osobaDod = $_SESSION['user'];


if(empty($urzadzenia)){
    echo "";
}else if(empty($typ)){
    echo "";
}else if(empty($lokalizacja)){
    echo "";
}else{

try{

    $conn = mysqli_connect($host,$user,$pw,$db);

    $sql = "INSERT INTO urzadzenia(nazwa_urzadzenia,lokalizacja,typ,czas,osobaDodajaca) VALUES ('$urzadzenia','$lokalizacja', '$typ','$czas','$osobaDod')";

    $wynik = mysqli_query($conn,$sql);

    mysqli_close($conn);


}catch (Exception$e){
    echo "Błąd mysqli";
}
}

header("location:/Repos/Hospital-Inventory/index.php");

?>