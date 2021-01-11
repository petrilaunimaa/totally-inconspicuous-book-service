<?php
require_once 'inc/top.php';

try {
    $db = new PDO('mysql:host=localhost;dbname=bookservice;charset=utf8','testuser','testpass');
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (Exception $ex) {
    header('location: error.php?error=' . urlencode($ex->getMessage()));
}



if (isset($_SESSION['user_account_id'])) {
header('location:index.php');
}

if ($_SERVER['REQUEST_METHOD']  === 'POST') {
    
     $username = filter_input(INPUT_POST, 'username');
     $pass_input = filter_input(INPUT_POST,'password');
     $sql = "select userid, password from user_account where username='$username'";
     
     $statement = $db->query($sql);
     if ($statement) {
         $user_account = $statement->fetch();
         if($user_account) {
            if (password_verify($pass_input,$user_account['password'])){ 
            $_SESSION['user_account_id'] = $user_account['userid'];
            header('location:index.php');
            exit;
            } else {
             print "<div class='alert alert-danger' role='alert'>Väärä sähköpostiosoite tai salasana.</div>";
            }
         }
         else {
             print "<div class='alert alert-danger' role='alert'>Väärä sähköpostiosoite tai salasana.</div>";
         }
     }
     else {
         print "<div class='alert alert-danger' role='alert'>Virhe tietojen hakemisessa.</div>";
     }
}
?>

<main class="container row middle">

<div class="text-center col-lg-6 col-12 middle bg-light paddy roundy">
    <form class="form-signin" action="<?php $_SERVER['PHP_SELF']?>" method="post">
      <h1 class="h3 mb-3 font-weight-normal">Kirjaudu sisään</h1>
      <div class="form-group">
          <label>Sähköpostiosoite</label>
          <input type="text" id="inputusername" name="username" class="form-control" placeholder="Sähköpostiosoite" required autofocus>
      </div>
      <div class="form-group">
          <label>Salasana</label>
          <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Salasana" required>
      </div>
      <button class="btn btn-lg btn-primary" type="submit">Kirjaudu sisään</button>
          <p><br><a href="register.php">Rekisteröidy</a></p>
      <p class="mt-5 mb-3 text-muted">&copy; <?php echo date("Y"); ?></p>
    </form>
</div>
<?php require_once 'inc/bottom.php';?>