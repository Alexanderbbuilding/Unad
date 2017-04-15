 

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

require_once("../conexion/Conexion.php");

require_once("../conexion/User.php")   ;

	if( !empty( $_POST )){
		try {
			$user_obj = new Cl_User();
			$data = $user_obj->addpersona( $_POST );
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


	$user2 = new Cl_User();
			$result1 = $user2->gettdocu(isset($results['idTipo_Documento']) ? $results['idTipo_Documento']: '');
//$settings = $user_obj->getSettings();





 $valor=isset($results['genero']) ? $results['genero']: '';
            $selectedM="";
            $selectedF="";
            if( $valor== 'M' ){
             	$selectedM='selected="selected"';
          }else{
             	$selectedF='selected="selected"';
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
					<span for="Nombres" class="col-sm-4 control-span">Nombres </span>
					<div class="col-sm-8">
						<input value="<?php echo isset($results['Nombres']) ? $results['Nombres']: ''; ?>" name="Nombres" id="Nombres" type="text" class="form-control" required>
						<span class="help-block"></span>
					</div>
				</div>

				
				<div class="form-group">
					<span for="Apellidos" class="col-sm-4 control-span">Apellidos</span>
					<div class="col-sm-8">
						<input value="<?php echo isset($results['Apellidos']) ? $results['Apellidos']: ''; ?>" name="Apellidos" id="Apellidos" type="text" class="form-control"required >
						<span class="help-block"></span>
					</div>
				</div>
				
				</div>
				<div class="form-group">
					<span for="fecha_nacimiento" class="col-sm-4 control-span"> Fecha de Nacimiento </span>
					<div class="col-sm-8">
						<input  type="date" value="<?php echo isset($results['fecha_nacimiento']) ? $results['fecha_nacimiento']: ''; ?>" name="fecha_nacimiento" id="fecha_nacimiento" type="text" class="form-control"required >
						<span class="help-block"></span>
					</div>
				</div>
<div class="form-group">
					<span for="genero" class="col-sm-4 control-span">Genero </span>
					<div class="col-sm-8">
						<SELECT  name="genero" id="genero"  class="form-control"required >
            
				<OPTION VALUE="M" <?php echo $selectedM;?> >MASCULINO</OPTION> 
              <OPTION VALUE="F" <?php echo $selectedF;?>>FEMENINO</OPTION>


                        </SELECT> 


						<span class="help-block"></span>
					</div>
				</div>

			
				<div class="form-group">
					<span for="peso_nacimiento" class="col-sm-4 control-span"> Peso de Nacimiento </span>
					<div class="col-sm-8">
						<input   value="<?php echo isset($results['peso_nacimiento']) ? $results['peso_nacimiento']: ''; ?>" name="peso_nacimiento" id="peso_nacimiento" type="text" class="form-control"required>
						<span class="help-block"></span>
					</div>
				</div>
				<div class="form-group">
					<span for="talla" class="col-sm-4 control-span"> Talla</span>
					<div class="col-sm-8">
						<input   value="<?php echo isset($results['talla']) ? $results['talla']: ''; ?>" name="talla" id="talla" type="text" class="form-control"required >
						<span class="help-block"></span>
					</div>
				</div>
<div class="form-group">
					<span for="idTipo_Documento" class="col-sm-4 control-span"> Tipo de documento</span>
					<div class="col-sm-8">
					<select name="idTipo_Documento" id="idTipo_Documento" required>

						<?php print(isset($result1) ? $result1: ''); ?>
					
					</select>

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