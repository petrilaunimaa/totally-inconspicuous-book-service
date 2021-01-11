<?php
try {
    $kysely = $tietokanta->query($sql);
    print "<div class='kirjahaku row'>\n";
    while ($tietue = $kysely->fetch()) {
        
        $bookcover="img/covers/id".$tietue["id"].".jpg";
        if (file_exists($bookcover)) {
            $bookcoverfile=$bookcover;
        } else {
            $bookcoverfile="img/covers/placeholder.jpg";
        }
        $booklink=$tietue["id"]."-".strtolower(str_replace(" ", "_",$tietue["author"])."-".str_replace(" ", "_",str_replace("'", "",$tietue["name"])));
        print "<a href='/?kirja=".$booklink."'><div class='kirjat'><div class='card col text-dark bg-light'>
        <div class='card-header'> " . $tietue["author"]." - ".$tietue["name"] . "</div>
        <img class='bookcover card-img-top' src='".$bookcoverfile."' alt='book cover'><div class='card-body'>
        <p>Kirjoittaja: " . $tietue["author"] . "</p>
        <p>Kategoria: " . $tietue["category"] . "</p>
        <p>Vuosi: " . $tietue["year"] . "</p>
        <p>Kesto: " . intval($tietue["length"]/60) . " minuuttia.</p>
        
        </div></div></div></a>\n";
    }
    
    
}
catch (PDOException $pdovirhe) {
 print "<div class='alert alert-danger' role='alert'>Tietokantavirhe! " . $pdovirhe ."</div>";
}
?>