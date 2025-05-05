<h4>Klient:</h4>

<form method="POST" action="zapiszOperacje.php">
<select name="klientID">
    
    <?php
        include 'dbconfig.php';
        $conn = new mysqli($server, $user, $password, $dbname);
        if ($conn->connect_error) {
            die("Błąd połączenia z BD: " . $conn->connect_error);
        }

        $zapytanie = "SELECT id,nazwa,adres FROM klienci";

        $result = $conn->query($zapytanie);

        if ($result->num_rows > 0) {
            $licznik = 1;
            while ($row = $result->fetch_assoc()) {
              echo "<option value='".$row['id']."'>".$row['nazwa']." [".$row['adres']."]</option>\n"; 
            }
        };

        $conn->close();
        ?>



</select>

<h4>Pozycje:</h4>
<select name="towar1ID">
    
    <?php
        include 'dbconfig.php';
        $conn = new mysqli($server, $user, $password, $dbname);
        if ($conn->connect_error) {
            die("Błąd połączenia z BD: " . $conn->connect_error);
        }

        $zapytanie = "SELECT id,nazwa FROM towary";

        $result = $conn->query($zapytanie);

        if ($result->num_rows > 0) {
            $licznik = 1;
            while ($row = $result->fetch_assoc()) {
              echo "<option value='".$row['id']."'>".$row['nazwa']."</option>\n"; 
            }
        };

        $conn->close();
        ?>



</select>

</form>