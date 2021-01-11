<?php
session_start();
session_regenerate_id();
try {
    $tietokanta = new PDO('mysql:host=localhost;dbname=bookservice;charset=utf8','testuser','testpass');
    $tietokanta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $pdovirhe) {
     print "<div class='alert alert-danger' role='alert'>Tietokantavirhe!" . $pdovirhe ."</div>";
}
?>
<!DOCTYPE html>
<html lang="fi">
    <head>
        <meta charset="utf-8">
        <title>bookservice</title>
        
        <link rel="manifest" href="/manifest.json">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.css" />

        <link rel="stylesheet" href="/css/style.css">
        
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <?php if($rekuesti==='login.php' or $rekuesti==='register.php'){print '<link rel="stylesheet" href="/css/reg.css">';}; ?>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">

        <link rel="icon" type="image/png" href="/img/favicon.png">
    </head>
    <body class="tausta">
        
<div class="navback">
<nav class="navbar navbar-expand-lg navbar-light bg-nav">
      <a class="navbar-brand font-titillium" href="/">perse</a>
 

 
  <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
<?php if ($rekuesti === 'login.php' or $rekuesti === 'register.php'){} else {?>       
    <div class="navbar-nav">
    <?php if (isset($_SESSION['user_account_id'])) {?>
        <ul class="navbar-nav">
            <a class="nav-link inline <?php if ($rekuesti === 'index.php?library') { print 'active'; }?>" href="/index.php?library">
                <li class="nav-item">
                  Oma kirjasto&ensp;<i class="fas fa-book text-muted"></i>
                </li>
            </a>
        </ul>
    <?php }?>  
    </div>
    <div class="navbar-nav ml-auto">
        <form class="form-inline" action="/index.php">
            <input class="form-control navinputs" type="search" name="query" placeholder="Hae äänikirjoja" value="<?php $hakusana=filter_input(INPUT_GET, 'query', FILTER_SANITIZE_SPECIAL_CHARS); if ($hakusana) {print $hakusana;} ?>" required>
            <button class="btn btn-outline-primary navinputs" type="submit">Hae nimellä&ensp;<i class="fas fa-search"></i></button>
        </form> 
    </div>
    
    <?php if (isset($_SESSION['user_account_id'])) {?>  
    <div class="navbar-nav ml-auto">
        <ul class="navbar-nav">
            <a class="nav-link inline" href="/logout.php">
                <li class="nav-item">
                  Kirjaudu ulos&ensp;<i class="fas fa-sign-out-alt"></i>
                </li>
            </a>
        </ul>
    </div>
    <?php }
    
    if (!isset($_SESSION['user_account_id'])) {?>
    <div class="navbar-nav ml-auto">
        <?php print '<a class="nav-link inline" href="/login.php"><ul class="navbar-nav ml-auto"><li class="nav-item">Kirjaudu sisään&ensp;<i class="fas fa-sign-in-alt"></i></li></ul></a>';}?>
    </div>
<?php }?> 
    </div>  
</nav>
</div>      
<div class="container-fluid">