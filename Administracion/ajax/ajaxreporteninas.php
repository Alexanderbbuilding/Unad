<?php
session_start();
require_once '../../conexion/DBclass.php';
 
 $db = new Cl_DBclass();

 
 $page = $_GET['page']; // get the requested page
 $limit = $_GET['rows']; // get how many rows we want to have into the grid
 $sidx = $_GET['sidx']; // get index row - i.e. user click to sort
 $sord = $_GET['sord']; // get the direction
 if(!$sidx) $sidx =1; // connect to the database






 $result = mysqli_query( $db->con, "SELECT COUNT(*) AS count FROM  reporte_f   ");    
 $row = mysqli_fetch_array($result);


 $count = $row['count'];
 if( $count >0 ) {
 	$total_pages = ceil($count/$limit);
 } else {
 	$total_pages = 0;
 }
 if ($page > $total_pages) $page=$total_pages;
 $start = $limit*$page - $limit; // do not put $limit*($page - 1)
 if($start < 0) $start = 0;

 $SQL = "SELECT Nombres,Nombre,Fecha_Registro,Peso_Actual,Talla_Actual,Observaciones,Numero_Toma,Estado  from reporte_f    LIMIT $start , $limit" ;
 $result = mysqli_query( $db->con, $SQL ) or die("Couldn t execute query.".mysqli_error($db->con));
 $responce = new stdClass();
 $responce->page = $page;
 $responce->total = $total_pages;
 $responce->records = $count; 
 $i=0;


 while($row = mysqli_fetch_array($result)) {
 	$responce->rows[$i]['Nombre']=$row['Nombre']; 
 	$id = $row['Nombre'];
 	$link = '';
 	if(!empty($id))$link = "<a class='text-success' href='".BASE_PATH."addtipo.php?uuid=".$id."'>Editar  </a>";
 	
 
 	$responce->rows[$i]['cell']=array($row['Nombres'],$row['Nombre'],$row['Fecha_Registro'],$row['Peso_Actual'],$row['Talla_Actual'],$row['Numero_Toma'],$row['Estado'],$row['Observaciones']); $i++;  
 }
 echo json_encode($responce);exit;
 
 
 
 
 
 