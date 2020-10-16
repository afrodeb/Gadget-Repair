jQuery(document).ready(function(){
	$("#studentName").hide();
	$("#studentClass").hide();
	$("#pay").hide();
	$("#amo").hide();
	$("#btnPay").hide();
	$("#reset").hide();
	$("#testID").hide();
$('#classroom').change(function() { 
   var classroom=$("#classroom").val();
   window.location=classroom;
});

$('#student').change(function() { 
   var classroom=$("#student").val();
   window.location=classroom;
});

 $("#btnPay").on("click", function() {
var idNumber=$("#idNumber").val();
var charge=$("#charge").val();
var amount=$("#amount").val(); 
var login=$("#login").val(); 
alert(login);
  $.ajax({
                    type: "POST",
                    url: "accountpayments",
                    data: "idNumber=" +idNumber+" &charge="+charge+" &amount="+amount+"&login="+login,
                    contentType:"application/x-www-form-urlencoded",
                    success: function(result) {
                    	alert(result);
                   }  
                   
                    }); 	
 	
 //alert(idNumber +" "+charge +" "+amount);
 	
 });
$("#btnSearch").on("click", function() {
 var idNumber=$("#idNumber").val();
 var details=Array();
  $.ajax({
                    type: "POST",
                    url: "searchstudent",
                    data: "idNumber=" +idNumber,
                    contentType:"application/x-www-form-urlencoded",
                    success: function(result) {
                    	//details=result[0];                    	
                    	details=result.split(",");
                    	$("#studentName").text(details[0] +" "+details[1]+" : ");
                  	$("#studentClass").text(details[2]);
                  	$("#studentName").show();
                  	$("#studentClass").show();
                  	$("#pay").show();
                  	$("#amo").show();
                  	$("#btnPay").show();
                  	$("#btnSearch").hide();
                  	$("#reset").show();

                    	//alert(details[0]);
                   }
                   
                     
                   
                    }); 
  
});

$("#btnPrint").on("click", function() {
	//alert("hhh");
var fxapp = document.getElementById("schoolManagementSystem");
var r = new fxapp.Packages.view.View.names("delon");
$("#testID").text(r);
$("#testID").show();
//alert(r);
});

 $("#btnClass").on("click", function() {
var classes=$(".newClass").val(); 	
alert(classes.toString());
 	});

});
function assignTeacher(id) {
var theId="#theClass"+id; 	
var theClass=$(theId+" option:selected").text();
$.ajax({
                    type: "POST",
                    url: "assignteacher",
                    data: "id=" +id+"&class="+theClass,
                    contentType:"application/x-www-form-urlencoded",
                    success: function(result) {
                    	alert(result);
                   }
                   
                     
                   
                    }); 
 
}