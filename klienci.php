<h2>Klienci</h2>

<table class="table table-hover table-sm">
    <thead>
        <tr>
            <th>Id</th>
            <th>Manufacturer</th>
            <th>Country of origin</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include 'dbconfig.php';
        session_start();
        $conn = new mysqli($server, $user, $password, $dbname);
        if ($conn->connect_error) {
            die("Błąd połączenia z BD: " . $conn->connect_error);
        }

        $zapytanie = "SELECT * FROM klienci";

        $result = $conn->query($zapytanie);

        if ($result->num_rows > 0) {
            $licznik = 1;
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $licznik++ . "</td><td>" . $row["nazwa"] . "</td><td>" . $row["adres"] . "</td><td>" . $row["opis"] . "</td>";
                echo "<td>";
                if(isset($_SESSION['login'])){
                    echo "<a class='del' href='delklient.php?id=".$row["id"]."'> X </a>";
                    echo "<a class='edit' href='editklient.php?id=".$row["id"]."'> E </a>";
                };
                echo "</td></tr>\n";
            }
        } else {
            echo "0 results";
        }

        $conn->close();
        ?>
    </tbody>
</table>

<?php

if(isset($_SESSION['login'])){
?>

<h2>Add manufacturer</h2>

<form action="dodaj_klienta.php" method="post">
    <div class="form-group">
        <label for="nazwa">Manufacturer name</label>
        <input type="text" class="form-control" id="nazwa" name="nazwa" placeholder="Insert name" autocomplete="off">
    </div>
    <div class="form-group">
        <label for="adres">Country of origin</label>
        <input type="text" class="form-control" id="adres" name="adres" placeholder="Insert country" autocomplete="off">
    </div>
    <div class="form-group">
        <label for="opis">Description</label>
        <textarea type="text" class="form-control" id="opis" name="opis" placeholder="Not needed"
            autocomplete="off"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Add</button>
</form>

<?php
} else {
    echo "<h2>Nie masz uprawnień do dodawania klientów</h2>";
}
?>
</body>

</html>