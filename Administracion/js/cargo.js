$(document).ready(function(){
	
	$("#product-form").validate({
		submitHandler : function(form) {
			$('#submit_btn').attr('disabled','disabled');
			$('#submit_btn').button('loading');
			form.submit();
		},
		rules : {
			productCode : {
				required : true
			},
			productName : {
				required : true
			},
			productDescription : {
				required : true
			


			mrp : {
				required : true,
				number: true
			}
		},
		messages : {
			productCode : {
				required : "ingrese un codigo del producto"
			productName : {
				required : "ingrese un nombre del producto"
			},
			productDescription : {
				required : "ingrese la descripcion"
			},
			quantityInStock : {
				required : "ingrese la cantidad de stock",
				digits: "cantidad de producto incorrecta"
			},
			buyPrice : {
				required : "ingresar el precio de venta",
				number: "precio de venta incorrecta utilizar . "
			},
iva : {
				required : "ingresar iva",
				number: "ingresar iva sin % . "
			},


			mrp : {
				required : "ingrese stock minimo",
				number: "digitar 1"
			}
		},
		errorPlacement : function(error, element) {
			$(element).closest('div').find('.help-block').html(error.html());
		},
		highlight : function(element) {
			$(element).closest('div').removeClass('has-success').addClass('has-error');
		},
		unhighlight: function(element, errorClass, validClass) {
			 $(element).closest('div').removeClass('has-error').addClass('has-success');
			 $(element).closest('div').find('.help-block').html('');
		}
	});
	
	
});