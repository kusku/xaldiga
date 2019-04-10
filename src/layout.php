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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <meta name="description" content="Entitat manresana organitzadora d'actes festius, entre ells El Correfoc de Manresa.">
    </head>
  
  <body>
	<!-- Header -->
	<?php require_once(getPath('/src/components/navbar.html')); ?>

	<!-- Content -->
    <?php require_once(getPath('/src/routing.php')); ?>

	<!-- Footer -->
	<?php require_once(getPath('/src/components/footer.html')); ?>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
  <script src="js/jquery-1.11.3.min.js"></script>

  <!-- Include all compiled plugins (below), or include individual files as needed --> 
  <script src="js/bootstrap.js"></script>

  </body>
</html>