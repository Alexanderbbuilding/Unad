<?php
session_start();
require_once '../../conexion/DBclass.php';
 
 $db = new Cl_DBclass();

 
 $page = $_GET['page']; // get the requested page
 $limit = $_GET['rows']; // get how many rows we want to have into the grid
 $sidx = $_GET['sidx']; // get index row - i.e. user click to sort
 $sord = $_GET['sord']; // get the direction
 if(!$sidx) $sidx =1; // connect to the database






 $result = mysqli_query( $db->con, "SELECT COUNT(*) AS count FROM cargo");
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

 $SQL = "SELECT idCargo,Descripcion  from cargo LIMIT $start , $limit" ;
 $result = mysqli_query( $db->con, $SQL ) or die("Couldn t execute query.".mysqli_error($db->con));
 $responce = new stdClass();
 $responce->page = $page;
 $responce->total = $total_pages;
 $responce->records = $count; 
 $i=0;


 while($row = mysqli_fetch_array($result)) {
 	$responce->rows[$i]['idCargo']=$row['idCargo']; 
 	$id = $row['idCargo'];
 	$link = '';
 	if(!empty($id))$link = "<a class='text-success' href='".BASE_PATH."addcargo.php?uuid=".$id."'>Editar  </a>";
 	
 
 	$responce->rows[$i]['cell']=array($row['idCargo'],$row['Descripcion'], $link); $i++;  
 }
 echo json_encode($responce);exit;
 
 
 
 
 
 