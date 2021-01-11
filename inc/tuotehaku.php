<?php
try {
    $kysely = $tietokanta->query($sql);
    
    print "<div class='kirjahaku row'>\n";
    while ($tietue = $kysely->fetch()) {
        
        $productimage="img/covers/id".$tietue["productid"].".jpg";
        if (file_exists($productimage)) {
            $bookcoverfile=$productimage;
        } else {
            $bookcoverfile="/img/products/placeholder.jpg";
        }
        print "<div class='kirjat'><div class='card col text-white bg-dark'>\n";
        print "<div class='card-header'><a href='/?kirja=".$tietue["productid"]."-".strtolower(str_replace(' ', '_',$tietue["author"])."-".str_replace(' ', '_',$tietue["name"]))."'> " . $tietue["author"]." - ".$tietue["name"] . "</a></div>\n";
        print "<a href='/?kirja=".$tietue["productid"]."-".$tietue["url"]."'><img class='bookcover card-img-top' src='".$bookcoverfile."' alt='book cover'></a><div class='card-body'>\n";
        print "<p>Kirjoittaja: " . $tietue["author"] . "</p>\n";
        print "<p>Kategoria: " . $tietue["category"] . "</p>\n";
        print "<p>Vuosi: " . $tietue["year"] . "</p>\n";
        $ajat=$tietue["length"];
        //print "<p>Kesto: "; if (intval(date("H", $ajat))>0){echo intval(date("H", $ajat)); print " tuntia,";}  print " " . intval(date("i", $ajat)) . " minuuttia ja " . intval(date("s", $ajat)) . " sekuntia.</p>\n";
        print "<p>Kesto: " . intval($tietue["length"]/60) . " minuuttia.</p>\n";
        
        print "</div></div></div>\n";
    }
    
    print "</table>";
    
}
catch (PDOException $pdovirhe) {
 print "<div class='alert alert-danger' role='alert'>Tietokantavirhe!" . $pdovirhe ."</div>";
}
?>