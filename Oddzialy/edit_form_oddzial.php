<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inwentaryzacja Sprzętu Szpitalnego</title>
    <link rel="stylesheet" href="/GitHub/Szpital-projekt/css/style.css">
</head>
<body>
    <header>
        <h2>Hospital Inventory</h2>
    </header>
        <section id="editform">
            <h3>INWENTARYZACJA SPRZĘTU SZPITALNEGO</h3>
            
            

            <?php 
            $host = "localhost";
            $user = "root";
            $pw = "";
            $db = "hospital";
            
            $edit = isset($_REQUEST["edit"])?$_REQUEST["edit"]:"";

            try{
            
                $conn = mysqli_connect($host,$user,$pw,$db);
            
                $sql = "SELECT * FROM oddzialy WHERE id_o = $edit";
            
                $wynik = mysqli_query($conn,$sql);
            
                mysqli_close($conn);
            
                $rekordy = mysqli_num_rows($wynik);

                if($rekordy > 0){
                    $rekord = mysqli_fetch_assoc($wynik);
            ?>
        
            <h4>Edytuj oddział</h4>
            <form action="/GitHub/Szpital-projekt/Oddzialy/edit_oddzial.php" method="GET">
                <input type="text" name="id_o" value="<?php echo $edit ?>" hidden>
                    <label for="oddzial">Oddział</label>
                <input type="text" name="oddzial" value="<?php echo $rekord['oddzial']; ?>"> <br>
                    <label for="budynek">Budynek</label>
                <input type="text" name="budynek" value="<?php echo $rekord['budynek']; ?>"> <br>
                    <label for="pietro">Piętro</label>
                <input type="text" name="pietro" value="<?php echo $rekord['pietro']; ?>"> <br><br>
                <input type="submit" value="EDYTUJ">
            </form>

                
            <?php    

                }else{
                    echo "ni ma";
                }
            
            }catch (exception$e){
                echo "Błąd mysqli";
            }
            
            ?>
        </section>
    
    <footer>
        &copy 2025 Hospital Inventory
    </footer>


</body>
</html>