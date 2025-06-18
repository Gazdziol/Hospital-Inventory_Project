<?php
session_start();

$host = "localhost";
$user = "root";
$pw = "";
$db = "hospital";

$login = $_POST["login"];
$haslo = $_POST["haslo"];



if(empty($login)){
    echo "<script>alert('Brak loginu, Spróbuj jeszcze raz');</script>";
}else if(empty($haslo)){
    header("Location:login.html");
    echo "<script>alert('Brak hasła, spróbuj jeszcze raz');</script>";
}else{
    try{
        $conn = mysqli_connect($host,$user,$pw,$db);

        $haslo_hash = sha1($haslo);

        $sql = "SELECT * FROM users WHERE BINARY login='$login' AND BINARY haslo='$haslo'";

        $wynik = mysqli_query($conn,$sql);

        if(mysqli_num_rows($wynik) > 0){
            $_SESSION['user'] = $login;
            header("location:/Repos/Hospital-Inventory/index.php");
        }else{
            header("Location:login.html");
        }

    }catch (Exception$e){
        echo "Nie ma";
    }


}

?>