 

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
				if($data['operation'] == 'update')$_SESSION['success'] = "Institucion Actualizada";
				else $_SESSION['success'] = "Institucion Agregada";
				header('Location: institucion.php');exit;
			}else{
				$_SESSION['success'] = "La Institucion No Pudo Ser Actualizada";
				header('Location: institucion.php');exit;
			}
			
		} catch (Exception $e) {
			$_SESSION['error'] = $e->getMessage();
		} 
	}elseif (isset($_GET['uuid']) && !empty($_GET['uuid'])){
		try {
			$user = new Cl_User();
			$results = $user->getinstitucion( $_GET['uuid'] );
		} catch (Exception $e) {
			$_SESSION['error'] = $e->getMessage();
		}
	}



	
	$id = isset($results['idInstitucion']) ? $results['idInstitucion']: '';
	if(!empty($id)){
		$head_txt = 'Institucion  a editar';
		$txt = 'Actualizar Institucion ';
	}else{
		$head_txt = 'Agregar Institucion ';
		$txt = 'Agregar';
	} 
?>

<?php require_once 'includes/menu.php';?>  
<div class="container-fluid">

	<div class="col-xs-9 col-sm-10 col-md-10 col-lg-10 col-xs-offset-3 col-sm-offset-2 col-md-offset-2 col-lg-offset-2 main">
	
		<h1 class="page-header"><?php echo $head_txt;?>: <a href="institucion.php" class="btn btn-success pull-right"> <i class="fa fa-reply"> </i> Atras</a></h1>
		
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" id="product-form" method="post" class="form-horizontal myaccount" role="form">
			<div class="load-animate">
			


				<div class="form-group">
					<span for="Nombre" class="col-sm-4 control-span">Nombre </span>
					<div class="col-sm-8">
						<input value="<?php echo isset($results['Nombre']) ? $results['Nombre']: ''; ?>" name="Nombre" id="Nombre" type="text" class="form-control" required>
						<span class="help-block"></span>
					</div>
				</div>
				
				<div class="form-group">
					<span for="Direccion" class="col-sm-4 control-span">Direccion</span>
					<div class="col-sm-8">
						<input value="<?php echo isset($results['Direccion']) ? $results['Direccion']: ''; ?>" name="Direccion" id="Direccion" type="text" class="form-control"required >
						<span class="help-block"></span>
					</div>
				</div>
				
				</div>
				<div class="form-group">
					<span for="Ciudad" class="col-sm-4 control-span"> Ciudad</span>
					<div class="col-sm-8">
						<input value="<?php echo isset($results['Ciudad']) ? $results['Ciudad']: ''; ?>" name="Ciudad" id="Ciudad" type="text" class="form-control"required >
						<span class="help-block"></span>
					</div>
				</div>

			
				<div class="form-group">
					<span for="Telefono" class="col-sm-4 control-span"> Telefono </span>
					<div class="col-sm-8">
						<input   type="number" value="<?php echo isset($results['Telefono']) ? $results['Telefono']: ''; ?>" name="Telefono" id="Telefono" type="text" class="form-control"required>
						<span class="help-block"></span>
					</div>
				</div>
				<div class="form-group">
					<span for="Nit" class="col-sm-4 control-span"> Nit</span>
					<div class="col-sm-8">
						<input type="number"  value="<?php echo isset($results['Nit']) ? $results['Nit']: ''; ?>" name="Nit" id="Nit" type="text" class="form-control"required >
						<span class="help-block"></span>
					</div>
				</div>
			
				<input type="hidden" id="idInstitucion" name="idInstitucion" value="<?php echo $id; ?>">
				
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
<?php require_once 'includes/pie_add.php';?>