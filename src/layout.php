<?php
    include_once ('utils/utils.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Xàldiga. Taller de festes</title>
        <!-- Bootstrap -->
        <link href=<?php echo getCSSPath("/css/bootstrap.css");?> rel="stylesheet">
        <link href=<?php echo getCSSPath("/css/variables.css");?> rel="stylesheet" type="text/css">
        <link href=<?php echo getCSSPath("/css/main.css");?> rel="stylesheet" type="text/css">
        <link href=<?php echo getCSSPath("/css/header.css");?> rel="stylesheet" type="text/css">
        <link href=<?php echo getCSSPath("/css/pages.css");?> rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>

        <meta name="description" content="Entitat manresana organitzadora d'actes festius, entre ells El Correfoc de Manresa.">
    </head>
  
  <body>
	<!-- Header -->
	<?php require_once(getPath('/src/components/navbar.html')); ?>

	<!-- Content -->
  <?php require_once(getPath('/src/routing.php')); ?>

	<!-- Footer -->
	<?php require_once(getPath('/src/components/footer.html')); ?>

  <!-- Return to Top -->
  <!--<button onclick="returnToTop()" id="return-to-top-button" class="return-to-top-button fas fa-angle-up" title="Go to top"></button>-->
  <a href="javascript:void(0)" onclick="returnToTop();" id="return-to-top-button" class="return-to-top-button"><i class='fas fa-chevron-up' style='font-size:22px'></i></a>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
  <script src="js/jquery-1.11.3.min.js"></script>

  <!-- Include all compiled plugins (below), or include individual files as needed --> 
  <script src="js/bootstrap.js"></script>
  <script src="js/scroll.js"></script>

  </body>
</html>