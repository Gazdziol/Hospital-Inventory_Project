<?php

$host = "localhost";
$user = "root";
$pw = "";
$db = "hospital";

$login = $_POST["login"];
$haslo = $_POST["haslo"];


if(empty($login)){
    echo "<script>alert('Brak loginu, Spróbuj jeszcze raz');</script>";
}else if(empty($haslo)){
    echo "<script>alert('Brak hasła, spróbuj jeszcze raz');</script>";
}else{
    try{
        $conn = mysqli_connect($host,$user,$pw,$db);

        $sql = "INSERT INTO users(`login`,`haslo`) VALUES ('$login','$haslo')";

        $wynik = mysqli_query($conn,$sql);

        mysqli_close($conn);

    }catch (Exception$e){
        echo "Nie ma";
    }

}

header("Location:login.html");

?>