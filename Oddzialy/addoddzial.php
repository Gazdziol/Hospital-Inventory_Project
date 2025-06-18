<?php 

$host = "localhost";
$user = "root";
$pw = "";
$db = "hospital";

$oddzial = isset($_REQUEST["oddzial"])?$_REQUEST["oddzial"]:"";
$budynek = isset($_REQUEST["budynek"])?$_REQUEST["budynek"]:"";
$pietro = isset($_REQUEST["pietro"])?$_REQUEST["pietro"]:"";



if(empty($oddzial)){
    echo "";
}else if(empty($budynek)){
    echo "";
}else if(empty($pietro)){
    echo "";
}else{

try{

    $conn = mysqli_connect($host,$user,$pw,$db);

    $sql = "INSERT INTO oddzialy(oddzial,budynek,pietro) VALUES ('$oddzial','$budynek', '$pietro')";

    $wynik = mysqli_query($conn,$sql);

    mysqli_close($conn);


}catch (Exception$e){
    echo "Błąd mysqli";
}
}

header("location:/Repos/Hospital-Inventory/Oddzialy/oddzial.php");

?>