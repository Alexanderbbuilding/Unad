
<?php
session_start();
if($_SESSION["user"]){
?>


<?php 

?>
<!DOCTYPE html>
<html>
  <head>
    
      <meta charset="UTF-8">
      <title>Reporte de Niños |</title>
       <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
            
         <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
            
          <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />           
           <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
      
           <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
           <link href="clientes/css/barra.css" rel="stylesheet" type="text/css" />
        
                <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
                <script src="//code.jquery.com/ui/1.11.1/jquery-ui.min.js" type="text/javascript"></script>
  <?php require_once 'includes/menu.php';?>  

<div class="container-fluid">
	
	<div class="col-xs-9 col-sm-10 col-md-10 col-lg-10 col-xs-offset-3 col-sm-offset-2 col-md-offset-2 col-lg-offset-2 main">
		<?php require_once 'templates/ads.php';?>
		<h1 class="page-header">Reporte Niños Valorados</h1>
		<?php require_once 'templates/message.php';?>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="text-center">
					<table id="list2"></table> 
					<div id="pager2" ></div>

				</div>
			</div>
		</div>	
		<?php require_once 'templates/ads_bottom.php';?>	
	</div>
</div>


<link rel='stylesheet' type='text/css' href='jq_tables/jquery-ui.css' />
<link rel='stylesheet' type='text/css' href='jq_tables/ui.jqgrid.css' />

<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script type='text/javascript' src='jq_tables/jquery-ui-custom.min.js'></script>        
<script type='text/javascript' src='jq_tables/grid.locale-en.js'></script>
<script type='text/javascript' src='jq_tables/jquery.jqGrid.js'></script>

<style>
	
	#pager2{height: 45px !important;}
	


</style>




<script>
   jQuery("#list2").jqGrid({ 
   url:'ajax/ajaxreporteninos.php', 
   datatype: "json",
   colNames:['Nombre','Apellidos','Fecha de Ingreso ', 'Peso Actual', 'Talla Actual','Numero de Toma','Estado','Observaciones'], 
   colModel:[ 
      	   {name:'Nombres',index:'Nombres', align:"center",key : true, sorttype:'integer', searchoptions:{sopt:['eq','ne','le','lt','gt','ge']}}, 
		   {name:'Nombre',index:'Nombre'}, 
		   {name:'Fecha_Ingreso',index:'Fecha_Ingreso'}, 
       {name:'Peso_Actual',index:'Peso_Actual'},
       {name:'Talla_Actual',index:'Talla_Actual'},
	   {name:'Numero_Toma',index:'Numero_Toma'},
	   {name:'Estado',index:'Estado'},
       {name:'Observaciones',index:'Observaciones'}  
   ],
   rowNum:200000000000000,
   rowTotal:200,
   width:800, 
   rowList:[10,30,50], 

loadonce:true,
    mtype: "GET",
  rownumbers: true,
  rownumWidth: 40,
  gridview: true,



   pager: '#pager2', 
   sortname: 'id', 

   
    

   viewrecords: true, 
   sortorder: "desc",
   
  caption: "Tipo de Documento", 
   height: '100%'
   });



  jQuery("#list2").jqGrid('navGrid','#pager2',
{edit:false,add:false,del:false},
{},
{},
{},
{multipleSearch:true, multipleGroup:true}
);

 </script>


</html>
<?php
}else{
  echo"<script text='text/javascript'>
        alert('Por favor Inicie Sesión para Ingresar');
        window.location = '../index.php';
        </script>";
}
?>

      <?php require_once 'includes/pie.php';?>