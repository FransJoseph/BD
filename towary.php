<h2>Towary</h2>

<table class="table table-hover table-sm">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Thrust (Vac)</th>
            <th>Isp (Vac)</th>
            <th>Propellant(s)</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include 'dbconfig.php';

        $conn = new mysqli($server, $user, $password, $dbname);
        if ($conn->connect_error) {
            die("Błąd połączenia z BD: " . $conn->connect_error);
        }

        $zapytanie = "SELECT * FROM towary";

        $result = $conn->query($zapytanie);

        if ($result->num_rows > 0) {
            $licznik = 1;
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $licznik++ . "</td><td>" . $row["nazwa"] . "</td><td>" . $row["ilosc"] . "</td><td>" . $row["jm"] . "</td><td>" . $row["cena"] . "</td></tr>\n";
            }
        } else {
            echo "0 results";
        }

        $conn->close();
        ?>
    </tbody>
</table>

<h2>Add engine to database:</h2>

<form action="dodaj_towar.php" method="post">
    <div class="form-group">
        <label for="nazwa">Name</label>
        <input type="text" class="form-control" id="nazwa" name="nazwa" placeholder="Wpisz nazwę" autocomplete="off"
            required>
    </div>
    <div class="form-group">
        <label for="ilosc">Thrust (Vac)</label>
        <input type="number" min="0" step="1" name="ilosc" placeholder="Wpisz ilosc" required>
    </div>
    <div class="form-group">
        <label for="jm">Isp (Vac)</label>
        <input list="units" name="jm" placeholder="Wybierz jednostkę" required>
        <datalist id="units">
            <option value="kg">
            <option value="szt">
            <option value="l">
            <option value="m">
            <option value="cm">
        </datalist>

    </div>
    <div class="form-group">
        <label for="cena">Propellant(s)</label>
        <input type="number" min="0" step="0.01" name="cena" placeholder="Wpisz cenę" placeholder="cena"
            autocomplete="off" required>
        </textarea>
    </div>
    <button type="submit" class="btn btn-primary">Add engine</button>
</form>

</body>

</html>