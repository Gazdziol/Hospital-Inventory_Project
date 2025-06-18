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
    <div id="panel-boczny">
    <section id="lewy">
        <p>Lista odzdziałów</p>
        <select id="oddzialDropdown">
            <option value="">-- Wybierz --</option>
            <option value="pulmonologia">Pulmonologia</option>
            <option value="anestozjologia">Anestozjologia</option>
            <option value="hematologia">Hematologia i Onkologia</option>
            <option value="radiologia">Radiologia</option>
            <option value="diabetologia">Diabetologia</option>
            <option value="urologia">Urologia</option>
            <option value="laboratorium">Laboratorium analityczne</option>
            <option value="zywienie">Sekcja żywienia</option>
            <option value="techniczny">Dział techniczny</option>
        </select>
    </section>
    </div>
    <main>
        <section id="addform">
            <h3>Dodaj oddział szpitalny</h3>
            
            <h4>Dodaj oddział</h4>
            <form action="/Repos/Hospital-Inventory/Oddzialy/addoddzial.php" method="GET">
                <label for="oddzial">Oddział</label>
                <input type="text" name="oddzial"> <br>
                <label for="budynek">Budynek</label>
                <input type="text" name="budynek"> <br>
                <label for="pietro">Piętro</label> 
                <input type="text" name="pietro"> <br><br>
                <input type="submit" value="DODAJ ODDZIAŁ">
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
            
                $sql = "SELECT * FROM oddzialy";
            
                $wynik = mysqli_query($conn,$sql);
            
                mysqli_close($conn);
            
                $rekordy = mysqli_num_rows($wynik);

                if($rekordy > 0){
                    $rekord = mysqli_fetch_assoc($wynik);
                    echo "<table>";
                    echo "<th>Nazwa Oddzialu</th>";
                    echo "<th>Budynek</th>";
                    echo "<th>Piętro</th>";
                    echo "<th>Usuń</th>";
                    echo "<th>Edytuj</th>";


                    while($rekord != 0){
                    
                        echo "<tr>";
                        echo "<td>".$rekord["oddzial"]."</td>";
                        echo "<td>".$rekord["budynek"]."</td>";
                        echo "<td>".$rekord["pietro"]."</td>";
                        echo "<td>" . "<a href=/Repos/Hospital-Inventory/Oddzialy/deleteoddzial.php?usun=" .$rekord['id_o']. ">Usuń</a>" . "</td>";
                        echo "<td>" . "<a href=/Repos/Hospital-Inventory/Oddzialy/edit_form_oddzial.php?edit=" .$rekord['id_o']. ">Edytuj</a>" . "</td>";
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