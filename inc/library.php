<?php
if (isset($_SESSION['user_account_id'])){
    try {
        $userid=$_SESSION['user_account_id'];  
        $sql="SELECT DISTINCT books.* FROM books, user_account WHERE books.owninguser=".$userid.";";
        $kysely = $tietokanta->query($sql);
        print "<div class='kirjahaku row'>\n";
        while ($tietue = $kysely->fetch()) {
            $bookcover="img/covers/id".$tietue["id"].".jpg";
            if (file_exists($bookcover)) {
                $bookcoverfile=$bookcover;
            } else {
                $bookcoverfile="img/covers/placeholder.jpg";
            }

        }
    }
    catch (PDOException $pdovirhe) {
     print "<div class='alert alert-danger' role='alert'>Tietokantavirhe! " . $pdovirhe ."</div>";
    }
}
else {print "<a href='/login.php'><p>Kirjaudu sisään</p></a>";}
