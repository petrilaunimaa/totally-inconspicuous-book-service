<?php
try {
    $tietokanta = new PDO('mysql:host=localhost;dbname=bookservice;charset=utf8','testuser','testpass');
    $tietokanta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $kysely = $tietokanta->query($sql);
    
    print "<table class='kirjahaku'>";
    print "<tr>";
    print "<th>id</th><th>Kirjan nimi</th><th>Kirjoittaja</th><th>Kategoria</th><th>Vuosi</th><th>URL</th>";
    print "</tr>";
    while ($tietue = $kysely->fetch()) {
        print "<tr>";
        print "<td>" . $tietue["id"] . "</td>";
        print "<td>" . $tietue["name"] . "</td>";
        print "<td>" . $tietue["author"] . "</td>";
        print "<td>" . $tietue["category"] . "</td>";
        print "<td>" . $tietue["year"] . "</td>";
        print "<td>" . $tietue["url"] . "</td>";
        print "</tr>";
    }
    
    print "</table>";
    
}
catch (PDOException $pdovirhe) {
 print "<div class='alert alert-danger' role='alert'>Tietokantavirhe!" . $pdovirhe ."</div>";
}
?>