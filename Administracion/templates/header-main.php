<?php 
ob_start();
session_start();
error_reporting(0);
require_once 'config.php'; 
$url=strtok($_SERVER["REQUEST_URI"],'?');
$url_arr = explode("/", $url);

if(!isset($_SESSION['logged_in']) && !in_array("quiz-result", $url_arr)){
	$_SESSION['error'] = "Inicia sesión para acceder a esta página ";
	header('Location: index.php');exit;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="factura">
	
    <title>Facturaci&oacute;n</title>
    <!-- Bootstrap -->
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,200' rel='stylesheet' type='text/css'>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="css/admin.css" rel="stylesheet">
    
  	<!-- Script -->
    <script src="js/jquery.min.js"></script>
    <script src="js/wayfinder.js" ></script>
   
    <script>
		$(document).ready(function() {
			jQuery('.load-animate').waypoint({
				triggerOnce: true,
				offset: '80%',
				handler: function() {
					jQuery(this).addClass('animated fadeInUp');
				}
			});
		});
	</script>
  </head>
 <body>
    <!-- Static navbar -->
	<div role="navigation" class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" data-toggle="collapse"
					data-target=".navbar-collapse" class="navbar-toggle collapsed">
					<span class="sr-only">barra de navegaci&oacute;n</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Facturación </a>
			</div>
			<?php 
			
			$page = end( $url_arr );
			?>
			<div class="collapse navbar-collapse">
				<?php if(isset( $_SESSION['logged_in']) ) { ?>
				<ul class="nav navbar-nav navbar-right">
					<li><a href='invoices.php'>Ar&eacutea de trabajo</a></li>
					<li class="dropdown">
						<a href="#" data-toggle="dropdown" class="dropdown-toggle">
							Bienvenido 	
							<?php echo $_SESSION['first_name']; ?>
							<span class="caret"></span>
						</a>
						<ul role="menu" class="dropdown-menu account-menu">
							<li> <a href="account.php"> <i class="fa fa-user"></i>Cuenta</a> </li>
							<li class="divider"></li>
							<li style="background: #e67e22; color:#fff"> <a class="logout" href="logout.php"> <i class="fa fa-power-off"></i> Salir </a> </li>
						</ul>
					</li>
				</ul>
				<?php }?>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
	