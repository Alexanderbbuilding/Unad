

<?php
session_start();
if($_SESSION["user"]){
?>

<?php 

require_once("../conexion/Conexion.php");

require_once("../conexion/User.php")   ;
	if(!empty($_POST)){
		try {
			$user_obj = new Cl_User();

						$data = $user_obj->registration( $_POST );



			if($data){
				$_SESSION['success'] = USER_REGISTRATION_SUCCESS;
				header('Location: index.php');exit;
			}
		} catch (Exception $e) {
			$_SESSION['error'] = $e->getMessage();
		}
	}
?>
 

      <meta charset="UTF-8">
 <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
            
          <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />           
           <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
      
           <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />


  </head>
  <body>
	<div class="container">
		<div class="text-center" style="margin-top:50px;">
		
		</div>
		<div class="login-form">

			
		
			<div class="form-header">
				<i class="fa fa-user"></i>
			</div>
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-register" role="form" id="register">
				<div>
					<input name="first_name" id="first_name" type="text" class="form-control" placeholder="NOMBRE"> 
					<span class="help-block"></span>
				</div>
				<div>
					<input name="last_name" id="last_name" type="text" class="form-control" placeholder="APELLLIDOS"> 
					<span class="help-block"></span>
				</div>
				<div>
					<input name="email" id="email" type="email" class="form-control" placeholder="CORREO ELECTRONICO" > 
					<span class="help-block"></span>
				</div>
				<div>
					<input name="password" id="password" type="password" class="form-control" placeholder="CONTRASEÑA"> 
					<span class="help-block"></span>
				</div>
				<div>
					<input name="confirm_password" id="confirm_password" type="password" class="form-control" placeholder=" REPITA LA CONTRASEÑA"> 
					<span class="help-block"></span>
				</div>

<div>






<span class="help-block"></span>

				

					
				</div>

				<button id="submit_btn" class="btn btn-block bt-login" type="submit">Agregar Vendedor</button>
			</form>
			<div class="form-footer">
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
					
					</div>
					
					<div class="col-xs-6 col-sm-6 col-md-6">
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /container -->

	
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/register.js"></script>
  </body>
</html>
