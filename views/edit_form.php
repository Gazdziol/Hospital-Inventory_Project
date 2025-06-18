<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inwentaryzacja Sprzętu Szpitalnego</title>
    <link rel="stylesheet" href="/Repos/Hospital-Inventory/css/style.css">
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
            
                $sql = "SELECT * FROM urzadzenia WHERE id_u = $edit";
            
                $wynik = mysqli_query($conn,$sql);
            
                mysqli_close($conn);
            
                $rekordy = mysqli_num_rows($wynik);

                if($rekordy > 0){
                    $rekord = mysqli_fetch_assoc($wynik);
            ?>
        
            <h4>Edytuj urządzenie</h4>
            <form action="edit_equipment.php" method="GET">
                <input type="text" name="id" value="<?php echo $edit ?>" hidden>
                <label for="nazwa">Nazwa Urządzenia</label>
                <input type="text" name="nazwa_urz" value="<?php echo $rekord['nazwa_urzadzenia']; ?>"> <br>
                <label for="lokalizacja">Lokalizacja</label>
                <select name="location" id="selektor">
                    <option value="">-- Wybierz Oddział --</option>
                    <?php  
                        $host = "localhost";
                        $user = "root";
                        $pw = "";
                        $db = "hospital";                                       
                        $conn = mysqli_connect($host,$user,$pw,$db);
                        $sql = "SELECT oddzial FROM oddzialy";
                        $wynik = mysqli_query($conn,$sql);
                        //mysqli_close($conn);
                        $rekordys = mysqli_num_rows($wynik);
                        if($rekordys > 0){
                            $oddzial = mysqli_fetch_assoc($wynik);          
                            while($oddzial != 0){
                                echo "<option>".$oddzial["oddzial"]."</option>";
                                $oddzial = mysqli_fetch_assoc($wynik);
                                }        
                            }else{
                                echo "ni ma";
                            }                                         
                    ?>
                </select>
                <label for="typ">Typ</label>
                <input type="text" name="type" value="<?php echo $rekord['typ']; ?>"> <br><br>
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