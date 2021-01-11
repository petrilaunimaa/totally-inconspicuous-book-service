<a onclick="window.history.back();"><button class="btn">Takaisin</button></a>
<?php


$productid=filter_input(INPUT_GET,'productid',FILTER_SANITIZE_SPECIAL_CHARS);

if (isset($_SESSION['user_account_id'])) {
    $qproductid=trim(explode('-',$productid)[0]);
    try {
        $userid=$_SESSION['user_account_id'];
        $sql="SELECT count(orders.productid) as ownproduct FROM orders, products, user_account WHERE products.productid=orders.productid AND orders.userid=".$userid." AND orders.productid=".$qproductid.";";
        $kysely = $tietokanta->query($sql);
            while ($tietue2 = $kysely->fetch()) {
                    $ownsproduct=$tietue2["ownproduct"];
            }
    }
    catch (PDOException $pdovirhe) {
       print "<div class='alert alert-danger' role='alert'>Tietokantavirhe! " . $pdovirhe ."</div>";
    }
} 

    
    //if (isset($_SESSION['user_account_id'])) {
        if ($productid) {
            try {
                $sql = "SELECT * FROM products WHERE productid LIKE " . trim(explode('-',$productid)[0]);
                $kysely = $tietokanta->query($sql);
                while ($tietue = $kysely->fetch()) {
                $productimage="img/products/".$tietue["shortname"].".jpg";
   		?>
	
		<div class="container">
			<div class="card">
				<div class="row">
<?php	
require_once 'inc/productdesc/'.$tietue['descurl'];

// if ($ownsproduct >0 and $ownsproduct <2) {
//     print "<p>Sinulla on jo tämä tuote.</p>";
// }
// if ($ownsproduct > 1) {
//     print "<p>Sinulla on jo ".$ownsproduct." kappaletta tätä tuotetta.</p>";
// }

print "
    
    <input type='hidden' name='token' value='".$form_token."' />
     <input type='hidden' name='productid' value='".$tietue['productid']."'>
    <button class='btn btn-lg btn-outline-primary'>Lisää ostoskoriin&ensp;<i class='fas fa-cart-plus'></i></button>
</form>";
		?>
					</article> <!-- card-body.// -->
				</aside> <!-- col.// -->
				
				</div> <!-- row.// -->
			</div> <!-- card.// -->
<?php
				}
            }
            catch (PDOException $pdovirhe) {
             print "<div class='alert alert-danger' role='alert'>Tietokantavirhe!" . $pdovirhe ."</div>";
            }
    } else {
        print "<div class='alert alert-danger' role='alert'>Tuotetta ei löydy.</div>";
    }
?>