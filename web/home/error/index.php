<?php
  if(isset($_GET['error_message'])){
    $error_message = $_GET['error_message'];
  }
  else{
    $error_message = 'Access Forbidden';
  }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Error</title>
    <?php
    include "../header/header.php";
    ?>
</head>

    <body>
      <?php
      include "../header/navigation.php";
      ?>
        <div class="wrapper-page">
            <div class="ex-page-content text-center">
              <br/><br/><br/>
                <div class="text-error">404</div>
                <h3 class="text-uppercase font-600"><?php echo $error_message; ?></h3>
                <p class="text-muted">
                    Try going back!
                </p>
                <br>
                <a class="btn btn-success waves-effect waves-light" href="../index.php">Go to Home</a>

            </div>
        </div>
        <!-- End wrapper page -->

        <?php
        include "../footer/footer.php";
        ?>

	</body>
</html>
