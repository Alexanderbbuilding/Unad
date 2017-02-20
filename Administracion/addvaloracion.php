 
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd"> 
 <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=yes' name='viewport'>
            
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
			$data = $user_obj->addvaloracion( $_POST );
				if($data['status']){
				if($data['operation'] == 'update')$_SESSION['success'] = "Valoracion Actualizada";
				else $_SESSION['success'] = "Valoracion Agregada";
				header('Location: valoracion.php');exit;
			}else{
				$_SESSION['success'] = "La Valoracion No Pudo Ser Actualizada";
				header('Location: valoracion.php');exit;
			}
			
		} catch (Exception $e) {
			$_SESSION['error'] = $e->getMessage();
		} 
	}elseif (isset($_GET['uuid']) && !empty($_GET['uuid'])){
		try {
			$user = new Cl_User();
			$results = $user->getvaloracion( $_GET['uuid'] );
			
		} catch (Exception $e) {
			$_SESSION['error'] = $e->getMessage();
		}
	}


	$user2 = new Cl_User();
			$result1 = $user2->gettnino(isset($results['idPersona']) ? $results['idPersona']: '');
	$user3 = new Cl_User();
			$result2 = $user3->gettinstitucion(isset($results['idInstitucion']) ? $results['idInstitucion']: '');
	$user4 = new Cl_User();
			$result3 = $user4->gettresultado(isset($results['idTipo_Resultado']) ? $results['idTipo_Resultado']: '');
	$user5 = new Cl_User();
			$result4 = $user5->gettfuncionario(isset($results['idFuncionario']) ? $results['idFuncionario']: '');
	$user6 = new Cl_User();
			$result5 = $user6->gettnivel(isset($results['idNiveles']) ? $results['idNiveles']: '');
//$settings = $user_obj->getSettings();





 $valor=isset($results['Numero_Toma']) ? $results['Numero_Toma']: '';
            $selected1="";
            $selected2="";
            $selected3="";
            if( $valor== '1' ){
             	$selected1='selected="selected"';
          }elseif( $valor== '2' ){
             	$selected2='selected="selected"';
          }elseif( $valor== '3' ){
             	$selected3='selected="selected"';
          }




	
	
	$id = isset($results['idValoracion']) ? $results['idValoracion']: '';
	if(!empty($id)){
		$head_txt = 'Valoracion  a editar';
		$txt = 'Actualizar Valoracion ';
	}else{
		$head_txt = 'Agregar Valoracion ';
		$txt = 'Agregar';
	} 


?> 
<?php require_once 'includes/menu.php';?> 
<div class="container-fluid">

	<div class="col-xs-9 col-sm-10 col-md-10 col-lg-10 col-xs-offset-3 col-sm-offset-2 col-md-offset-2 col-lg-offset-2 main">
	
		<h1 class="page-header"><?php echo $head_txt;?>: <a href="valoracion.php" class="btn btn-success pull-right"> <i class="fa fa-reply"> </i> Atras</a></h1>
		
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" id="product-form" method="post" class="form-horizontal myaccount" role="form">
			<div class="load-animate">
			
 
<div class="form-group">
					<span for="toma" class="col-sm-4 control-span">Numero de Toma </span>
					<div class="col-sm-8">
						<SELECT  name="toma" id="toma"  class="form-control"required >
            
				<OPTION VALUE="1" <?php echo $selected1;?>> 1</OPTION> 
              <OPTION VALUE="2" <?php echo $selected2;?>>2</OPTION>
              <OPTION VALUE="3" <?php echo $selected3;?>>3</OPTION>


                        </SELECT> 


						
					</div>
				</div>
				<div class="form-group">
					<span for="idPersona" class="col-sm-4 control-span"> Tomado a</span>
					<div class="col-sm-8">
					<select name="idPersona" id="idPersona" required>

						<?php print(isset($result1) ? $result1: ''); ?>
					
					</select>

						
					</div>
				</div>
				<div class="form-group">
					<span for="Fecha_Ingreso" class="col-sm-4 control-span"> Fecha de Ingreso </span>
					<div class="col-sm-8">
						<input  type="date" value="<?php echo isset($results['Fecha_Ingreso']) ? $results['Fecha_Ingreso']: ''; ?>" name="Fecha_Ingreso" id="Fecha_Ingreso" type="text" class="form-control"required >
						
					</div>
				</div>
				<div class="form-group">
					<span for="Fecha_Registro" class="col-sm-4 Fcontrol-span"> Fecha de Registro </span>
					<div class="col-sm-8">
						<input  type="date" value="<?php echo isset($results['Fecha_Registro']) ? $results['Fecha_Registro']: ''; ?>" name="Fecha_Registro" id="Fecha_Registro" type="text" class="form-control"required >
						
					</div>
				</div>
				<div class="form-group">
					<span for="Peso" class="col-sm-4 control-span">Peso </span>
					<div class="col-sm-8">
						<input value="<?php echo isset($results['Peso_Actual']) ? $results['Peso_Actual']: ''; ?>" name="Peso" id="Peso" type="text" class="form-control" required>
						
					</div>
				</div>

				
				<div class="form-group">
					<span for="Talla" class="col-sm-4 control-span">Talla</span>
					<div class="col-sm-8">
						<input value="<?php echo isset($results['Talla_Actual']) ? $results['Talla_Actual']: ''; ?>" name="Talla" id="Talla" type="text" class="form-control"required >
						
					</div>
				</div>
				
				</div>
			
				<div class="form-group">
					<span for="Observaciones" class="col-sm-4 control-span"> Observaciones </span>
					<div class="col-sm-8">
						<input   value="<?php echo isset($results['Observaciones']) ? $results['Observaciones']: ''; ?>" name="Observaciones" id="Observaciones" type="text" class="form-control"required>
						
					</div>
				</div>
<div class="form-group">
					<span for="idInstitucion" class="col-sm-4 control-span"> Institucion</span>
					<div class="col-sm-8">
					<select name="idInstitucion" id="idInstitucion" required>

						<?php print(isset($result2) ? $result2: ''); ?>
					
					</select>
					</div>
				</div>
<div class="form-group">
					<span for="idTipo_Resultado" class="col-sm-4 control-span"> Resultado</span>
					<div class="col-sm-8">
					<select name="idTipo_Resultado" id="idTipo_Resultado" required>

						<?php print(isset($result3) ? $result3: ''); ?>
					
					</select>
					</div>
				</div>
				
				<div class="form-group">
					<span for="idFuncionario" class="col-sm-4 control-span"> Funcionario</span>
					<div class="col-sm-8">
					<select name="idFuncionario" id="idFuncionario" required>

						<?php print(isset($result4) ? $result4: ''); ?>
					
					</select>

					</div>
				</div>
				<div class="form-group">
					<span for="idNiveles" class="col-sm-4 control-span"> Nivel</span>
					<div class="col-sm-8">
					<select name="idNiveles" id="idNiveles" required>

						<?php print(isset($result5) ? $result5: ''); ?>
					
					</select>
					</div>
				</div>

			
			<input type="hidden" id="idValoracion" name="idValoracion" value="<?php echo $id; ?>">
				
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
