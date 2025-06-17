<?php 

$host = "localhost";
$user = "root";
$pw = "";
$db = "hospital";

$usun = isset($_REQUEST['usun'])?$_REQUEST['usun']:"";

try{

    $conn = mysqli_connect($host,$user,$pw,$db);

    $sql = "DELETE FROM oddzialy WHERE id_o = $usun";

    $wynik = mysqli_query($conn,$sql);

    mysqli_close($conn);


}catch (exception$e){
    echo "Błąd mysqli";
}

header("location:/GitHub/Szpital-projekt/Oddzialy/oddzial.php");
?>