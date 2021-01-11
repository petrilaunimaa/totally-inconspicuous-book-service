
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2 sidelist">

      <h2 class="font-titillium">blendit</h2>
      <ul class="nav nav-pills flex-column">
        
        
        <?php
        $sql="SELECT DISTINCT blend, owninguser FROM books";
        try {
            $kysely = $tietokanta->query($sql);
            while ($tietue = $kysely->fetch()) {
                print '<li class="nav-item"><a class="nav-link" href="'.$_SERVER['PHP_SELF'].'?blend='.$tietue["blend"].'">' . "tiedosto: " . $tietue["blend"] . "<br>käyttäjältä: " . $tietue["owninguser"] . '</a></li>';
            }
        }
        catch (PDOException $pdovirhe) {
         print "<div class='alert alert-danger' role='alert'>Tietokantavirhe!" . $pdovirhe ."</div>";
        } ?>
        
        
      </ul>

      <hr class="d-sm-none">
    </div>
    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
      <?php
      if (filter_input(INPUT_GET,'query',FILTER_SANITIZE_SPECIAL_CHARS)) {
        print "<h3>Haku: ".filter_input(INPUT_GET,'query',FILTER_SANITIZE_SPECIAL_CHARS)."</h3>";
        require_once 'inc/search.php';
      } 
      if (filter_input(INPUT_GET,'kategoria',FILTER_SANITIZE_SPECIAL_CHARS)){
        print "<h3>Kategoria: ".filter_input(INPUT_GET,'kategoria',FILTER_SANITIZE_SPECIAL_CHARS)."</h3>";
        require_once 'inc/search.php';
      }
      
      
      ?>
      
      <?php if ($rekuesti === 'index.php' or $rekuesti == '') { ?>
        <h3>Selaa</h3>
        <?php 
        $sql="SELECT * FROM books LIMIT 0, 8";
        require_once 'inc/kirjahakuV2.php';
        ?>
        <!--index osion sisältö tähän (voi linkittää muualta)-->
                
      <?php }
      if ($rekuesti === 'index.php?wishlist') {?>
        <h3>Toivelista</h3>
         <!--toivelista-osion sisältö tähän (voi linkittää muualta)-->
        
      <?php }
      if ($rekuesti === 'index.php?library') {?>
        <h3>Oma kirjasto</h3>
        
         <!--käyttäjän kirjaston sisältö tähän (voi linkittää muualta)-->
        <?php 
        require_once 'inc/library.php';      
      }
      if ($rekuesti === 'index.php?paymentcomplete') {?>
        <div class='alert alert-success' role='alert'>Maksu onnistui</div>
        <?php
        $sql="SELECT * FROM books LIMIT 0, 8";
        require_once 'inc/kirjahakuV2.php';
        ?>
      <?php }
      if (filter_input(INPUT_GET,'kirja',FILTER_SANITIZE_SPECIAL_CHARS)) {
        require_once 'inc/bookplayer.php';
      }      
      if (filter_input(INPUT_GET,'productid',FILTER_SANITIZE_SPECIAL_CHARS)) {
        require_once 'inc/product.php';
      }
      ?>

    </div>
  </div>
</div>
</div>

<footer class="text-center">
  <p class="mt-5 mb-3 text-muted">&copy; <?php echo date("Y");?></p>
</footer>