<?php


require_once("DBclass.php");
class Cl_User
{
	/**
	 * @var will going contain database connection
	 */
	protected $_con;
	
	/**
	 * it will initalize DBclass
	 */
	public function __construct()
	{
		$db = new Cl_DBclass();
		$this->_con = $db->con;
	}
	
	/**
	 * this will handles user registration process
	 * @param array $data
	 * @return boolean true or false based success 
	 */
	






	public function registration( array $data )
	{
		if( !empty( $data ) ){
			// Trim all the incoming data:
			$trimmed_data = array_map('trim', $data);
			
			
			
			
			// escape variables for security
	
		   $Nickname = mysqli_real_escape_string( $this->_con, $trimmed_data['Nickname']);

			$Nombres = mysqli_real_escape_string( $this->_con, $trimmed_data['Nombres'] );
			$Apellidos = mysqli_real_escape_string( $this->_con, $trimmed_data['Apellidos'] );
			$Cargo = mysqli_real_escape_string( $this->_con, $trimmed_data['Cargo'] );
			$password = mysqli_real_escape_string( $this->_con, $trimmed_data['password'] );
			$cpassword = mysqli_real_escape_string( $this->_con, $trimmed_data['confirm_password'] );
   	
	
			
			
		if((!$Nickname)  ||  (!$password) || (!$cpassword) ) {
				throw new Exception( FIELDS_MISSING );
			}


			if ($password !== $cpassword) {
				throw new Exception( "Contraseñas no Coinciden" );
			}

			$password = md5( $password );
			$query = "INSERT INTO funcionario (idFuncionario, Usuario, Clave, Fecha_Registro, idPersona, idCargo) VALUES (NULL, '$Nickname', '$password',CURRENT_TIMESTAMP,'$Apellidos', '$Nombres')";
			if(mysqli_query($this->_con, $query)){
				mysqli_close($this->_con);
				return true;
			};
		} else{
			throw new Exception( FIELDS_MISSING_ERROR);
		}
	}








	public function addcargo( array $data){
		if( !empty( $data ) ){
			// escape variables for security
			
			$productDescription = mysqli_real_escape_string( $this->_con, trim( $data['productDescription'] ) );
		
			
			$id = NULL;
			if(!empty($data['idCargo']))$id = mysqli_real_escape_string( $this->_con, trim( $data['idCargo'] ) );
			$result = array();
	
	      
			if($id!=NULL && !empty($id)){
				$query = "UPDATE cargo SET Descripcion = '$productDescription' WHERE idCargo = $id";
				$result['operation'] = 'update';
			}else{
				
				$result['operation'] = 'insert';
				$query = "INSERT INTO cargo (idCargo, Descripcion) VALUES (NULL, '$productDescription');";


			}
			if(mysqli_query($this->_con, $query)){
				mysqli_close($this->_con);
				$result['status'] = true;
				return $result;
			}else{
				$result['status'] = false;
				return $result;
			}
		} else{
			throw new Exception( FIELDS_MISSING );
		}
	}


	public function addnivel( array $data){
		if( !empty( $data ) ){
			// escape variables for security
			
			$productDescription = mysqli_real_escape_string( $this->_con, trim( $data['productDescription'] ) );
		
			
			$id = NULL;
			if(!empty($data['idNiveles']))$id = mysqli_real_escape_string( $this->_con, trim( $data['idNiveles'] ) );
			$result = array();
	
	      
			if($id!=NULL && !empty($id)){
				$query = "UPDATE niveles  SET Descripcion = '$productDescription' WHERE idNiveles = $id";
				$result['operation'] = 'update';
			}else{
				
				$result['operation'] = 'insert';
				$query = "INSERT INTO niveles (idNiveles, Descripcion) VALUES (NULL, '$productDescription');";


			}
			if(mysqli_query($this->_con, $query)){
				mysqli_close($this->_con);
				$result['status'] = true;
				return $result;
			}else{
				$result['status'] = false;
				return $result;
			}
		} else{
			throw new Exception( FIELDS_MISSING );
		}
	}






public function addtresultado( array $data){
		if( !empty( $data ) ){
			// escape variables for security
			
			$productDescription = mysqli_real_escape_string( $this->_con, trim( $data['productDescription'] ) );
		
			
			$id = NULL;
			if(!empty($data['idTipo_Resultado']))$id = mysqli_real_escape_string( $this->_con, trim( $data['idTipo_Resultado'] ) );
			$result = array();
	
	      
			if($id!=NULL && !empty($id)){
				$query = "UPDATE tipo_resultado  SET Descripcion = '$productDescription' WHERE idTipo_Resultado = $id";
				$result['operation'] = 'update';
			}else{
				
				$result['operation'] = 'insert';
				$query = "INSERT INTO tipo_resultado (idTipo_Resultado, Descripcion) VALUES (NULL, '$productDescription');";


			}
			if(mysqli_query($this->_con, $query)){
				mysqli_close($this->_con);
				$result['status'] = true;
				return $result;
			}else{
				$result['status'] = false;
				return $result;
			}
		} else{
			throw new Exception( FIELDS_MISSING );
		}
	}









	

	public function addtipo( array $data){
		if( !empty( $data ) ){
			// escape variables for security
			
			$productDescription = mysqli_real_escape_string( $this->_con, trim( $data['Description'] ) );
		
			
			$id = NULL;
			if(!empty($data['idTipo_Documento']))$id = mysqli_real_escape_string( $this->_con, trim( $data['idTipo_Documento'] ) );
			$result = array();
	
	      
			if($id!=NULL && !empty($id)){
				$query = "UPDATE tipo_documento SET Descripcion = '$productDescription' WHERE idTipo_Documento = $id";
				$result['operation'] = 'update';
			}else{
				
				$result['operation'] = 'insert';
				$query = "INSERT INTO tipo_documento (idTipo_Documento, Descripcion) VALUES (NULL, '$productDescription');";


			}
			if(mysqli_query($this->_con, $query)){
				mysqli_close($this->_con);
				$result['status'] = true;
				return $result;
			}else{
				$result['status'] = false;
				return $result;
			}
		} else{
			throw new Exception( FIELDS_MISSING );
		}
	}
	





	public function addinstitucion( array $data){
		if( !empty( $data ) ){
			// escape variables for security
			
			$Nombre = mysqli_real_escape_string( $this->_con, trim( $data['Nombre'] ) );
			$Direccion = mysqli_real_escape_string( $this->_con, trim( $data['Direccion'] ) );
			$Ciudad = mysqli_real_escape_string( $this->_con, trim( $data['Ciudad'] ) );
			$Telefono = mysqli_real_escape_string( $this->_con, trim( $data['Telefono'] ) );
			$Nit = mysqli_real_escape_string( $this->_con, trim( $data['Nit'] ) );
		
			
			$id = NULL;
			if(!empty($data['idInstitucion']))$id = mysqli_real_escape_string( $this->_con, trim( $data['idInstitucion'] ) );
			$result = array();
	
	      
			if($id!=NULL && !empty($id)){
				$query = "UPDATE institucion SET Nombre = '$Nombre',Direccion= '$Direccion',Ciudad= '$Ciudad',Telefono= '$Telefono',Nit= '$Nit' WHERE idInstitucion = $id";
				$result['operation'] = 'update';
			}else{
				
				$result['operation'] = 'insert';



				$query = "INSERT INTO institucion (idInstitucion,Nombre,Direccion,Ciudad,Telefono,Nit) VALUES (NULL, '$Nombre', '$Direccion', '$Ciudad', '$Telefono', '$Nit');";


			}
			if(mysqli_query($this->_con, $query)){
				mysqli_close($this->_con);
				$result['status'] = true;
				return $result;
			}else{
				$result['status'] = false;
				return $result;
			}
		} else{
			throw new Exception( FIELDS_MISSING );
		}
	}
	



	public function addpersona( array $data){
		if( !empty( $data ) ){
			// escape variables for security
			
			$Nombre = mysqli_real_escape_string( $this->_con, trim( $data['Nombres'] ) );
			$Apellidos = mysqli_real_escape_string( $this->_con, trim( $data['Apellidos'] ) );
			$fecha_nacimiento = mysqli_real_escape_string( $this->_con, trim( $data['fecha_nacimiento'] ) );
			$genero = mysqli_real_escape_string( $this->_con, trim( $data['genero'] ) );
			$peso_nacimiento = mysqli_real_escape_string( $this->_con, trim( $data['peso_nacimiento'] ) );
		$talla = mysqli_real_escape_string( $this->_con, trim( $data['talla'] ) );
		$idTipo_Documento = mysqli_real_escape_string( $this->_con, trim( $data['idTipo_Documento'] ) );
			
			$id = NULL;
			if(!empty($data['idPersona']))$id = mysqli_real_escape_string( $this->_con, trim( $data['idPersona'] ) );
			$result = array();
	
	      
			if($id!=NULL && !empty($id)){
				$query = "UPDATE persona SET Nombres = '$Nombre',Apellidos= '$Apellidos',fecha_nacimiento= '$fecha_nacimiento',genero= '$genero',peso_nacimiento= '$peso_nacimiento',talla= '$talla',idTipo_Documento= '$idTipo_Documento' WHERE idPersona = $id";
				$result['operation'] = 'update';
			}else{
				
				$result['operation'] = 'insert';



				$query = "INSERT INTO persona (idPersona,Nombres,Apellidos,fecha_nacimiento,genero,peso_nacimiento,talla,idTipo_Documento) VALUES (NULL, '$Nombre', '$Apellidos', '$fecha_nacimiento', '$genero', '$peso_nacimiento', '$talla', '$idTipo_Documento');";
}
			if(mysqli_query($this->_con, $query)){
				mysqli_close($this->_con);
				$result['status'] = true;
				return $result;
			}else{
				$result['status'] = false;
				return $result;
			}
		} else{
			throw new Exception( FIELDS_MISSING );
		}
	}
	

	public function addvaloracion( array $data){
		if( !empty( $data ) ){
			// escape variables for security
			$Fecha_Ingreso= mysqli_real_escape_string( $this->_con, trim( $data['Fecha_Ingreso'] ) );
			$Peso= mysqli_real_escape_string( $this->_con, trim( $data['Peso'] ) );
			$Talla= mysqli_real_escape_string( $this->_con, trim( $data['Talla'] ) );
			$Observaciones= mysqli_real_escape_string( $this->_con, trim( $data['Observaciones'] ) );
			$Fecha_Registro= mysqli_real_escape_string( $this->_con, trim( $data['Fecha_Registro'] ) );
			$toma= mysqli_real_escape_string( $this->_con, trim( $data['toma'] ) );
			$idInstitucion= mysqli_real_escape_string( $this->_con, trim( $data['idInstitucion'] ) );
			$idTipo_Resultado= mysqli_real_escape_string( $this->_con, trim( $data['idTipo_Resultado'] ) );
			$idPersona = mysqli_real_escape_string( $this->_con, trim( $data['idPersona'] ) );
			$idFuncionario= mysqli_real_escape_string( $this->_con, trim( $data['idFuncionario'] ) );
			$idNiveles= mysqli_real_escape_string( $this->_con, trim( $data['idNiveles'] ) );
			$id = NULL;
			if(!empty($data['idValoracion']))$id = mysqli_real_escape_string( $this->_con, trim( $data['idValoracion'] ) );
			$result = array();
	
	      
			if($id!=NULL && !empty($id)){
				$query = "UPDATE valoracion SET Fecha_Ingreso = '$Fecha_Ingreso',Peso_Actual= '$Peso',Talla_Actual= '$Talla',Observaciones= '$Observaciones',Fecha_Registro= '$Fecha_Registro',Numero_Toma= '$toma',idInstitucion= '$idInstitucion',idTipo_Resultado= '$idTipo_Resultado',idPersona= '$idPersona',idFuncionario= '$idFuncionario',idNiveles= '$idNiveles' WHERE idValoracion = $id";
				$result['operation'] = 'update';
			}else{
				
				$result['operation'] = 'insert';



				$query = "INSERT INTO valoracion (idValoracion,Fecha_Ingreso,Peso_Actual,Talla_Actual,Observaciones,Fecha_Registro,Numero_Toma,idInstitucion,idTipo_Resultado,idPersona,idFuncionario,idNiveles) VALUES (NULL, '$Fecha_Ingreso', '$Peso', '$Talla', '$Observaciones', '$Fecha_Registro', '$toma', '$idInstitucion', '$idTipo_Resultado', '$idPersona', '$idFuncionario', '$idNiveles');";
}
			if(mysqli_query($this->_con, $query)){
				mysqli_close($this->_con);
				$result['status'] = true;
				return $result;
			}else{
				$result['status'] = false;
				return $result;
			}
		} else{
			throw new Exception( FIELDS_MISSING );
		}
	}









public function gettdocu($valor)
	{
		$query = "SELECT * FROM tipo_documento";
		$result1 = mysqli_query($this->_con, $query);
		$data = "";
		
		
		while($row = mysqli_fetch_array($result1)) {
			$seleccionar = "";
			if($valor == $row['idTipo_Documento']){
			$seleccionar = 'Selected = "Selected"';
		}
			$data.="<option value ='$row[idTipo_Documento]' $seleccionar>$row[Descripcion]</option>";
			
		}

		
		
		mysqli_close($this->_con);
		return $data;
	}

public function gettnino($valor)
	{
		$query = "SELECT DISTINCT p.idPersona idpersona,concat(p.Nombres,' ',p.Apellidos) as Nombres FROM persona p, funcionario f WHERE f.idPersona != p.idPersona";
		$result1 = mysqli_query($this->_con, $query);
		$data = "";
		
		
		while($row = mysqli_fetch_array($result1)) {
			$seleccionar = "";
			if($valor == $row['idpersona']){
			$seleccionar = 'Selected = "Selected"';
		}
			$data.="<option value ='$row[idpersona]' $seleccionar>$row[Nombres]</option>";
			
		}

		
		
		mysqli_close($this->_con);
		return $data;
	}

public function gettinstitucion($valor)
	{
		$query = "SELECT * FROM institucion";
		$result1 = mysqli_query($this->_con, $query);
		$data = "";
		
		
		while($row = mysqli_fetch_array($result1)) {
			$seleccionar = "";
			if($valor == $row['idInstitucion']){
			$seleccionar = 'Selected = "Selected"';
		}
			$data.="<option value ='$row[idInstitucion]' $seleccionar>$row[Nombre]</option>";
			
		}

		
		
		mysqli_close($this->_con);
		return $data;
	}

public function gettresultado($valor)
	{
		$query = "SELECT * FROM tipo_resultado";
		$result1 = mysqli_query($this->_con, $query);
		$data = "";
		
		
		while($row = mysqli_fetch_array($result1)) {
			$seleccionar = "";
			if($valor == $row['idTipo_Resultado']){
			$seleccionar = 'Selected = "Selected"';
		}
			$data.="<option value ='$row[idTipo_Resultado]' $seleccionar>$row[Descripcion]</option>";
			
		}

		
		
		mysqli_close($this->_con);
		return $data;
	}
	public function gettfuncionario($valor)
	{
		$query = "select f.idFuncionario, concat(p.Nombres,' ',p.Apellidos) as nombres
               from persona p,funcionario f 
               where f.idPersona = p.idPersona";
		$result1 = mysqli_query($this->_con, $query);
		$data = "";
		
		
		while($row = mysqli_fetch_array($result1)) {
			$seleccionar = "";
			if($valor == $row['idFuncionario']){
			$seleccionar = 'Selected = "Selected"';
		}
			$data.="<option value ='$row[idFuncionario]' $seleccionar>$row[nombres]</option>";
			
		}

		
		
		mysqli_close($this->_con);
		return $data;
	}
public function gettnivel($valor)
	{
		$query = "SELECT * FROM niveles";
		$result1 = mysqli_query($this->_con, $query);
		$data = "";
		
		
		while($row = mysqli_fetch_array($result1)) {
			$seleccionar = "";
			if($valor == $row['idNiveles']){
			$seleccionar = 'Selected = "Selected"';
		}
			$data.="<option value ='$row[idNiveles]' $seleccionar>$row[Descripcion]</option>";
			
		}

		
		
		mysqli_close($this->_con);
		return $data;
	}


public function gettfuncargo()
	{
		$query = "SELECT * FROM cargo";
		$result1 = mysqli_query($this->_con, $query);
		
		
		
		while($row = mysqli_fetch_array($result1)) {
		
			$data.="<option value ='$row[idCargo]' >$row[Descripcion]</option>";
			
	}

		
		
		mysqli_close($this->_con);
		return $data;
	}






public function gettfunc()
	{
		$query = "SELECT * FROM persona";
		$result1 = mysqli_query($this->_con, $query);
		
		
		
		while($row = mysqli_fetch_array($result1)) {
		
			$data.="<option value ='$row[idPersona]' >$row[Nombres]</option>";
			
	}

		
		
		mysqli_close($this->_con);
		return $data;
	}




public function getpersona($id='')
	{
		if( !empty( $id ) ){
			$query = "SELECT * FROM persona where idPersona ='$id'";
			$result = mysqli_query($this->_con, $query);
			$data = mysqli_fetch_assoc($result);
			mysqli_close($this->_con);
			return $data;
		}else{
			
		}
	}


public function getvaloracion($id='')
	{
		if( !empty( $id ) ){
			$query = "SELECT * FROM valoracion where idValoracion ='$id'";
			$result = mysqli_query($this->_con, $query);
			$data = mysqli_fetch_assoc($result);
			mysqli_close($this->_con);
			return $data;
		}else{
			
		}
	}





public function getcargo($id='')
	{
		if( !empty( $id ) ){
			$query = "SELECT * FROM cargo where idCargo ='$id'";
			$result = mysqli_query($this->_con, $query);
			$data = mysqli_fetch_assoc($result);
			mysqli_close($this->_con);
			return $data;
		}else{
			
		}
	}


public function getresultado($id='')
	{
		if( !empty( $id ) ){
			$query = "SELECT * FROM tipo_resultado where idTipo_Resultado ='$id'";
			$result = mysqli_query($this->_con, $query);
			$data = mysqli_fetch_assoc($result);
			mysqli_close($this->_con);
			return $data;
		}else{
			
		}
	}




public function getnivel($id='')
	{
		if( !empty( $id ) ){
			$query = "SELECT * FROM 	niveles  where idNiveles ='$id'";
			$result = mysqli_query($this->_con, $query);
			$data = mysqli_fetch_assoc($result);
			mysqli_close($this->_con);
			return $data;
		}else{
			
		}
	}
















public function gettipo($id='')
	{
		if( !empty( $id ) ){
			$query = "SELECT * FROM tipo_documento  where idTipo_Documento ='$id'";
			$result = mysqli_query($this->_con, $query);
			$data = mysqli_fetch_assoc($result);
			mysqli_close($this->_con);
			return $data;
		}else{
			
		}
	}



public function getinstitucion($id='')
	{
		if( !empty( $id ) ){
			$query = "SELECT * FROM institucion where idInstitucion ='$id'";
			$result = mysqli_query($this->_con, $query);
			$data = mysqli_fetch_assoc($result);
			mysqli_close($this->_con);
			return $data;
		}else{
			
		}
	}







	}