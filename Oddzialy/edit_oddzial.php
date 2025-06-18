<?php 

$host = "localhost";
$user = "root";
$pw = "";
$db = "hospital";

$id = isset($_REQUEST["id_o"])?$_REQUEST["id_o"]:"";
$oddzial = isset($_REQUEST["oddzial"])?$_REQUEST["oddzial"]:"";
$budynek = isset($_REQUEST["budynek"])?$_REQUEST["budynek"]:"";
$pietro = isset($_REQUEST["pietro"])?$_REQUEST["pietro"]:"";

try{

    $conn = mysqli_connect($host,$user,$pw,$db);

    $sql = "UPDATE oddzialy SET id_o='$id',oddzial='$oddzial',budynek='$budynek',pietro='$pietro' WHERE id_o = '$id'";

    $wynik = mysqli_query($conn,$sql);

    mysqli_close($conn);


}catch (exception$e){
    echo "Błąd mysqli";
}

header("location:/Repos/Hospital-Inventory/Oddzialy/oddzial.php");
?>