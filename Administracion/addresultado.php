 

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
			$data = $user_obj->addtresultado( $_POST );
				if($data['status']){
				if($data['operation'] == 'update')$_SESSION['success'] = "resultado Actualizado";
				else $_SESSION['success'] = "resultado Agregado";
				header('Location: resultado.php');exit;
			}else{
				$_SESSION['success'] = "El resultado No Pudo Ser Actualizado";
				header('Location: resultado.php');exit;
			}
			
		} catch (Exception $e) {
			$_SESSION['error'] = $e->getMessage();
		} 
	}elseif (isset($_GET['uuid']) && !empty($_GET['uuid'])){
		try {
			$user = new Cl_User();
			$results = $user->getresultado( $_GET['uuid'] );
		} catch (Exception $e) {
			$_SESSION['error'] = $e->getMessage();
		}
	}



	
	$id = isset($results['idTipo_Resultado']) ? $results['idTipo_Resultado']: '';
	if(!empty($id)){
		$head_txt = 'Resultado  a editar';
		$txt = 'Actualizar Resultado ';
	}else{
		$head_txt = 'Agregar Resultado ';
		$txt = 'Agregar';
	} 
?>

<?php require_once 'includes/menu.php';?>  
<div class="container-fluid">

	<div class="col-xs-9 col-sm-10 col-md-10 col-lg-10 col-xs-offset-3 col-sm-offset-2 col-md-offset-2 col-lg-offset-2 main">
	
		<h1 class="page-header"><?php echo $head_txt;?>: <a href="resultado.php" class="btn btn-success pull-right"> <i class="fa fa-reply"> </i> Atras</a></h1>
		
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" id="product-form" method="post" class="form-horizontal myaccount" role="form">
			<div class="load-animate">
			
				<div class="form-group">
					<span for="productDescription" class="col-sm-4 control-span">Descripcion</span>
					<div class="col-sm-8">
						<textarea name="productDescription" id="productDescription" class="form-control" rows="3"  required ><?php echo isset($results['Descripcion']) ? $results['Descripcion']: ''; ?></textarea>
						<span class="help-block"></span>
					</div>
				</div>
				
	
				<input type="hidden" id="idTipo_Resultado" name="idTipo_Resultado" value="<?php echo $id; ?>">
				
				<div class="form-group">
					<div class="col-sm-offset-4 col-sm-8">
						<button id="submit_btn" type="submit" class="btn btn-primary"><?php echo $txt; ?></button>
					</div>
				</div>
			</div>
		</form>
		
	</div>
</div>	
<div >
							
							<br><br><br><br><br><br><br><br><br><br>
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