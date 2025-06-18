<?php 

$host = "localhost";
$user = "root";
$pw = "";
$db = "hospital";

$usun = isset($_REQUEST['usun'])?$_REQUEST['usun']:"";

try{

    $conn = mysqli_connect($host,$user,$pw,$db);

    $sql = "DELETE FROM urzadzenia WHERE id_u = $usun";

    $wynik = mysqli_query($conn,$sql);

    mysqli_close($conn);


}catch (exception$e){
    echo "Błąd mysqli";
}

header("location:/Repos/Hospital-Inventory/index.php");
?>