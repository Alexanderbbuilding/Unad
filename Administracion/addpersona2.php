 

 <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
            
          <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />           
           <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
      
           <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />


<?php
session_start();
if($_SESSION["user"]){
?>

<?php 

require_once("../conexion/Conexion.php");

require_once("../conexion/User.php")   ;

	if( !empty( $_POST )){
		try {
			$user_obj = new Cl_User();
			$data = $user_obj->addinstitucion( $_POST );
				if($data['status']){
				if($data['operation'] == 'update')$_SESSION['success'] = "Persona Actualizada";
				else $_SESSION['success'] = "Persona Agregada";
				header('Location: persona.php');exit;
			}else{
				$_SESSION['success'] = "La Persona No Pudo Ser Actualizada";
				header('Location: persona.php');exit;
			}
			
		} catch (Exception $e) {
			$_SESSION['error'] = $e->getMessage();
		} 
	}elseif (isset($_GET['uuid']) && !empty($_GET['uuid'])){
		try {
			$user = new Cl_User();
			$results = $user->getpersona( $_GET['uuid'] );
		} catch (Exception $e) {
			$_SESSION['error'] = $e->getMessage();
		}
	}



	
	$id = isset($results['idPersona']) ? $results['idPersona']: '';
	if(!empty($id)){
		$head_txt = 'Persona  a editar';
		$txt = 'Actualizar Persona ';
	}else{
		$head_txt = 'Agregar Persona ';
		$txt = 'Agregar';
	} 



        
?>
<div class="container-fluid">

	<div class="col-xs-9 col-sm-10 col-md-10 col-lg-10 col-xs-offset-3 col-sm-offset-2 col-md-offset-2 col-lg-offset-2 main">
	
		<h1 class="page-header"><?php echo $head_txt;?>: <a href="persona.php" class="btn btn-success pull-right"> <i class="fa fa-reply"> </i> Atras</a></h1>
		
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" id="product-form" method="post" class="form-horizontal myaccount" role="form">
			<div class="load-animate">
			
 	<div class="form-group">
					<span for="Nombre" class="col-sm-4 control-span">Nombre </span>
					<div class="col-sm-8">
						<input value="<?php echo isset($results['Nombres']) ? $results['Nombres']: ''; ?>" name="Nombre" id="Nombre" type="text" class="form-control" required>
						<span class="help-block"></span>
					</div>
				</div>



			
				<input type="hidden" id="idPersona" name="idPersona" value="<?php echo $id; ?>">
				
				<div class="form-group">
					<div class="col-sm-offset-4 col-sm-8">
						<button id="submit_btn" type="submit" class="btn btn-primary"><?php echo $txt; ?></button>
					</div>
				</div>
			</div>
		</form>
		
	</div>
</div>	

<?php
}else{
	echo"<script text='text/javascript'>
				alert('Por favor Inicie Sesión para Ingresar');
				window.location = '../index.php';
				</script>";
}
?>