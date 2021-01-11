<?php require_once 'inc/top.php';?>
<main role="main" class="container-fluid bg-light text-dark">

<?php 
$rekuesti=substr($_SERVER['REQUEST_URI'],1);
?>
    <div class="col-12 text-center">
    <h1 style="font-size:1500%;">404</h1>
    <a onclick="window.history.back();"><button class="btn btn-primary">Go back</button></a>
</div>

<footer class="text-center">

  <p class="mt-5 mb-3 text-muted">&copy; <?php echo date("Y");?> The Geisarit</p>
</footer>
<?php require_once 'inc/bottom.php';?>