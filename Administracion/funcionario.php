

<?php
session_start();
if($_SESSION["user"]){
?>

<?php 

require_once("../conexion/Conexion.php");

require_once("../conexion/User.php")   ;


	$user2 = new Cl_User();
			$result1 = $user2->gettfunc();


			$user3 = new Cl_User();
			$result2 = $user3->gettfuncargo();


	if(!empty($_POST)){
		try {
			$user_obj = new Cl_User();

						$data = $user_obj->registration( $_POST );



			if($data){
				$_SESSION['success'] = "Funcionario agregado";
				header('Location: ../index.php');exit;
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
<?php require_once 'includes/menu.php';?>  
                  


		<div class="container">
		<div class="text-center" style="margin-top:50px;">
				
		</div>
		<div class="login-form">

			
		
		
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-register" role="form" id="register">

				<div>
					<input name="Nickname" id="Nickname" type="Nickname" class="form-control" placeholder="USUARIO" > 
					<span class="help-block"></span>
				</div>

		
				<div>

					<span for="Apellidos" class="col-sm-4 control-span"> Persona </span>


<select name="Apellidos" id="Apellidos" class="form-control" required>

						<?php print(isset($result1) ? $result1: ''); ?>
					
					</select>

					
					<span class="help-block"></span>
				</div>
		<div>

	<span for="Nombres" class="col-sm-4 control-span"> cargo </span>

<select name="Nombres" id="Nombres" class="form-control" required>

						<?php print(isset($result2) ? $result2: ''); ?>
					
					</select>




			
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

				<button id="submit_btn" class="btn btn-block bt-login" type="submit">Agregar Funcionario</button>
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

	
  </body>
  <?php require_once 'includes/pie.php';?>  
                        
</html>
<?php
}else{
	echo"<script text='text/javascript'>
				alert('Por favor Inicie Sesión para Ingresar');
				window.location = '../index.php';
				</script>";
}
?>