<?php
require_once 'inc/top.php';

if (isset($_SESSION['user_account_id'])) {
header('location:index.php');
}

try {
    $db = new PDO('mysql:host=localhost;dbname=bookservice;charset=utf8','testuser','testpass');
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (Exception $ex) {
    header('location: error.php?error=' . urlencode($ex->getMessage()));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = filter_input(INPUT_POST,'username');
    $password = password_hash(filter_input(INPUT_POST,'password'),PASSWORD_DEFAULT);


    try { 
        
        $sql = "insert into user_account (username, password) values (:username,:password)";
        $statement = $db->prepare($sql);
        $statement->bindValue(':username',$username,PDO::PARAM_STR);
        $statement->bindValue(':password',$password,PDO::PARAM_STR); 
        $statement->execute();
        header('location:login.php');
        exit;
    } catch (Exception $ex) 
        { 
        print "<div class='alert alert-danger' role='alert'>Virhe rekisteröinnissä." . $ex->getMessage() . "</div>";
    }
} 
?> 
<main class="container row middle">
<div class="text-center col-lg-6 col-12 middle bg-light paddy roundy">
    <h1 class="h3 mb-3 font-weight-normal">Rekisteröidy</h1>
    
    <form action="<?php print $_SERVER['PHP_SELF']?>" method="post" enctype-"multipart/form-data">
        <div class="form-group">
            <label>Sähköpostiosoite</label>
            <input type="text" class="form-control" name="username" placeholder="Sähköpostiosoite" id="username" required autofocus>
        </div>
        <div class="form-group">
            <label>Salasana</label>
            <input type="password" class="form-control" name="password" placeholder="Salasana" required>
        </div>
        <small class="form-text text-muted">Emme jaa tietojasi ulkopuolisten tahojen kanssa.</small><br>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="terms" required>
            <label class="form-check-label" for="terms">Hyväksyn palvelun käyttöehdot.</label>
        </div>
    <button class="btn btn-lg btn-primary" type="submit">Rekisteröidy</button>
    <p><br><a href="login.php">Kirjaudu sisään</a></p>
    <p class="mt-5 mb-3 text-muted">&copy; <?php echo date("Y"); ?></p>
    </form>
</div>
<?php require_once 'inc/bottom.php';?>