<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inwentaryzacja Sprzętu Szpitalnego</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
    session_start();

    if (!isset($_SESSION['user'])) {
        header("Location: index.html");
        exit();
    }
    ?>
    <header>
        <h2>Hospital Inventory</h2>
        

    </header>
   
    <div id="panel-boczny">
         <section id="lewy-gora">
            <p>Zalogowany jako: <?php echo $_SESSION['user']; ?></p>
            <a href="/Repos/Hospital-Inventory/logowanie/logaut.php">Wyloguj</a>
        </section>
        <section id="lewy">
            <a href="Oddzialy/oddzial.php"><p>Dodaj oddział -></p></a><br>
            <p>Lista oddziałów</p>
        </section>
    </div>
    <main>
        <section id="addform">
            <h3>INWENTARYZACJA SPRZĘTU SZPITALNEGO</h3>

            
            
            <h4>Dodaj uządzenie</h4>
            <form action="views/add_equipment.php" method="GET">
                <label for="nazwa">Nazwa urządzenia</label>
                <input type="text" name="nazwa_urz"> <br>
                <label for="lokalizacja">Lokalizacja</label>

                <select name="location" id="selektor">
                    <option value="">-- Wybierz Oddział --</option>
                    <?php  
                        $host = "localhost";
                        $user = "root";
                        $pw = "";
                        $db = "hospital";                   
                        try{                       
                            $conn = mysqli_connect($host,$user,$pw,$db);
                            $sql = "SELECT oddzial FROM oddzialy";
                            $wynik = mysqli_query($conn,$sql);
                            mysqli_close($conn);
                            $rekordy = mysqli_num_rows($wynik);
                            if($rekordy > 0){
                                $rekord = mysqli_fetch_assoc($wynik);          
                                while($rekord != 0){

                                    echo "<option>".$rekord["oddzial"]."</option>";
            
                                    $rekord = mysqli_fetch_assoc($wynik);
                                }        
                            }else{
                                echo "ni ma";
                            }                      
                        }catch (exception$e){
                            echo "Błąd mysqli";
                        }                    
                    ?>
                </select>

                <label for="typ">Typ</label> 
                <input type="text" name="type"> <br><br>
                <input type="submit" value="DODAJ">
            </form>
        </section>    
        
        <section id="tabela">
            <?php 
            $host = "localhost";
            $user = "root";
            $pw = "";
            $db = "hospital";
            
            try{
            
                $conn = mysqli_connect($host,$user,$pw,$db);
            
                $sql = "SELECT * FROM urzadzenia";
            
                $wynik = mysqli_query($conn,$sql);
            
                mysqli_close($conn);
            
                $rekordy = mysqli_num_rows($wynik);

                if($rekordy > 0){
                    $rekord = mysqli_fetch_assoc($wynik);
                    echo "<table >";
                    echo "<th>ID</th>";
                    echo "<th>Nazwa urządzenia</th>";
                    echo "<th>Lokalizacja</th>";
                    echo "<th>Typ</th>";
                    echo "<th>Data dodania</th>";
                    echo "<th>Osoba dodająca</th>";
                    echo "<th>Usuń</th>";
                    echo "<th>Edytuj</th>";

                    while($rekord != 0){
                    
                        echo "<tr>";
                        echo "<td>".$rekord["id_u"]."</td>";
                        echo "<td>".$rekord["nazwa_urzadzenia"]."</td>";
                        echo "<td>".$rekord["lokalizacja"]."</td>";
                        echo "<td>".$rekord["typ"]."</td>";
                        echo "<td>".$rekord["czas"]."</td>";
                        echo "<td>".$rekord["osobaDodajaca"]."</td>";
                        echo "<td>" . "<a href=views/delete_equipment.php?usun=" .$rekord['id_u']. ">Usuń</a>" . "</td>";
                        echo "<td>" . "<a href=views/edit_form.php?edit=" .$rekord['id_u']. ">Edytuj</a>" . "</td>";
                        echo "</tr>";

                        $rekord = mysqli_fetch_assoc($wynik);
                    }
                    echo "</table>";

                }else{
                    echo "ni ma";
                }
            
            }catch (exception$e){
                echo "Błąd mysqli";
            }
            
            ?>
        </section>

    </main>
    
    <footer>
        &copy 2025 Hospital Inventory
    </footer>

</body>
</html>