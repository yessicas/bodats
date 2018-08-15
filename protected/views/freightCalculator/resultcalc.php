
<?php 
if(isset($_POST['yt0'])) {	
		$id_barge_fix= $_POST['Barge']*1 ;
		$BargeVesselFixCapacity = VesselDB::getVessel($id_barge_fix)->Capacity;
	}else{
		$id_barge_fix= ' ' ;
		$BargeVesselFixCapacity = 0;
	}

?>


<script>
$(document).ready(function(){

var formatcurrencynya = function(num){
    var str = num.toString().replace("$", ""), parts = false, output = [], i = 1, formatted = null;
    if(str.indexOf(".") > 0) {
        parts = str.split(".");
        str = parts[0];
    }
    str = str.split("").reverse();
    for(var j = 0, len = str.length; j < len; j++) {
        if(str[j] != ",") {
            output.push(str[j]);
            if(i%3 == 0 && j < (len - 1)) {
                output.push(",");
            }
            i++;
        }
    }
    formatted = output.reverse().join("");
    var formatedCurrency= (formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
    return formatedCurrency; 
};



var totalCostCount = function(){
   var Fuel = parseFloat($('#FuelCostCount').val());
   var Agency = parseFloat($('#AgencyCostCount').val());
   var Depreciation = parseFloat($('#DepreciationCostCount').val());
   var CrewCost = parseFloat($('#CrewCostCount').val());
   var CrewSubcontCost = parseFloat($('#CrewSubcontCostCount').val());
   var Insurance = parseFloat($('#InsuranceCostCount').val());
   var Repair = parseFloat($('#RepairCostCount').val());
   var Docking = parseFloat($('#DockingCostCount').val());
   var Brokerage = parseFloat($('#BrokerageCostCount').val());
   var Others = parseFloat($('#OthersCostCount').val());

   var total = Fuel+Agency+Depreciation+CrewCost+CrewSubcontCost+Insurance+Repair+Docking+Brokerage+Others;

   var datas = [];
   datas['totalnotFormated']=total;
   datas['totalFormatedCurrency']=formatcurrencynya(total);
   return datas;
};




 $('#FuelCostMargin').keyup(function () {  
	      // setiap karakter yang diketik selain angka akan langsung dihapus   
	      this.value = this.value.replace(/[^0-9\.\-]/g,'');
	    });

 $('#FuelCostMargin').blur(function () {  

	     if(this.value==''){
	      this.value=0;
	     }
	     var contsVal= parseFloat($('#fuelCostDiv').val()) ;
	     var percentCount = parseFloat(( this.value * contsVal ) / 100);
	     var resultCount = contsVal  + percentCount;
	     var formatedCount =formatcurrencynya(resultCount);

	     $('#FuelCost').val(formatedCount);
	     $('#FuelCostCount').val(resultCount);
	     

	     // total cost sales
	     var totalCostCountVar=totalCostCount()['totalFormatedCurrency'];
	     $('#TotalCost').val(totalCostCountVar);

	     var totalCostCountVarinput=totalCostCount()['totalnotFormated'];
	     $('#TotalCostinput').val(totalCostCountVarinput);

	     // jumlah cost per mt sales
	    var totalCostCountNotFormated=totalCostCount()['totalnotFormated'];
		var costperMt=totalCostCountNotFormated / $('#Quantity').val();
		var costperMtFormated=formatcurrencynya(costperMt);
		$('#costPerMtSales').val(costperMtFormated);

		// jumlah gp sales
		var totalCostCountNotFormatedSales=totalCostCount()['totalnotFormated'];
		var totalCostCountNotFormatedStd=$('#TotalCostCountNotFormatedStd').val();
		var gpsales=((parseFloat(totalCostCountNotFormatedSales)-parseFloat(totalCostCountNotFormatedStd))/parseFloat(totalCostCountNotFormatedStd)) * 100;

		$('#gpSales').val(gpsales.toFixed(2));
		$('#gpStd').val(gpsales.toFixed(2));
		$("#gpStd").trigger("change");
	    //alert(gpsales.toFixed(2));

	    });


 $('#AgencyCostMargin').keyup(function () {  
	      // setiap karakter yang diketik selain angka akan langsung dihapus   
	      this.value = this.value.replace(/[^0-9\.\-]/g,'');
	    });

 $('#AgencyCostMargin').blur(function () {  

	     if(this.value==''){
	      this.value=0;
	     }
	     var contsVal= parseFloat($('#agency_costDiv').val()) ;
	     var percentCount = parseFloat(( this.value * contsVal ) / 100);
	     var resultCount = contsVal  + percentCount;
	     var formatedCount =formatcurrencynya(resultCount);
	     $('#AgencyCost').val(formatedCount);
	     $('#AgencyCostCount').val(resultCount);

	     var totalCostCountVar=totalCostCount()['totalFormatedCurrency'];
	     $('#TotalCost').val(totalCostCountVar);

	     var totalCostCountVarinput=totalCostCount()['totalnotFormated'];
	     $('#TotalCostinput').val(totalCostCountVarinput);

	     var totalCostCountNotFormated=totalCostCount()['totalnotFormated'];
		var costperMt=totalCostCountNotFormated / $('#Quantity').val();
		var costperMtFormated=formatcurrencynya(costperMt);
		$('#costPerMtSales').val(costperMtFormated);

		// jumlah gp sales
		var totalCostCountNotFormatedSales=totalCostCount()['totalnotFormated'];
		var totalCostCountNotFormatedStd=$('#TotalCostCountNotFormatedStd').val();
		var gpsales=((parseFloat(totalCostCountNotFormatedSales)-parseFloat(totalCostCountNotFormatedStd))/parseFloat(totalCostCountNotFormatedStd)) * 100;

		$('#gpSales').val(gpsales.toFixed(2));
		$('#gpStd').val(gpsales.toFixed(2));
		$("#gpStd").trigger("change");

	    //alert(percentCount);

	    });

 $('#DepreciationCostMargin').keyup(function () {  
	      // setiap karakter yang diketik selain angka akan langsung dihapus   
	      this.value = this.value.replace(/[^0-9\.\-]/g,'');
	    });

 $('#DepreciationCostMargin').blur(function () {  

	     if(this.value==''){
	      this.value=0;
	     }
	     var contsVal= parseFloat($('#depreciation_costDiv').val()) ;
	     var percentCount = parseFloat(( this.value * contsVal ) / 100);
	     var resultCount = contsVal  + percentCount;
	     var formatedCount =formatcurrencynya(resultCount);
	     $('#DepreciationCost').val(formatedCount);
	     $('#DepreciationCostCount').val(resultCount);

	     var totalCostCountVar=totalCostCount()['totalFormatedCurrency'];
	     $('#TotalCost').val(totalCostCountVar);

	     var totalCostCountVarinput=totalCostCount()['totalnotFormated'];
	     $('#TotalCostinput').val(totalCostCountVarinput);

	     var totalCostCountNotFormated=totalCostCount()['totalnotFormated'];
		var costperMt=totalCostCountNotFormated / $('#Quantity').val();
		var costperMtFormated=formatcurrencynya(costperMt);
		$('#costPerMtSales').val(costperMtFormated);

		// jumlah gp sales
		var totalCostCountNotFormatedSales=totalCostCount()['totalnotFormated'];
		var totalCostCountNotFormatedStd=$('#TotalCostCountNotFormatedStd').val();
		var gpsales=((parseFloat(totalCostCountNotFormatedSales)-parseFloat(totalCostCountNotFormatedStd))/parseFloat(totalCostCountNotFormatedStd)) * 100;

		$('#gpSales').val(gpsales.toFixed(2));
		$('#gpStd').val(gpsales.toFixed(2));
		$("#gpStd").trigger("change");


	    //alert(percentCount);

	    });

 $('#CrewCostMargin').keyup(function () {  
	      // setiap karakter yang diketik selain angka akan langsung dihapus   
	      this.value = this.value.replace(/[^0-9\.\-]/g,'');
	    });

 $('#CrewCostMargin').blur(function () {  

	     if(this.value==''){
	      this.value=0;
	     }
	     var contsVal= parseFloat($('#crew_own_costDiv').val()) ;
	     var percentCount = parseFloat(( this.value * contsVal ) / 100);
	     var resultCount = contsVal  + percentCount;
	     var formatedCount =formatcurrencynya(resultCount);
	     $('#CrewCost').val(formatedCount);
	     $('#CrewCostCount').val(resultCount);

	     var totalCostCountVar=totalCostCount()['totalFormatedCurrency'];
	     $('#TotalCost').val(totalCostCountVar);

	     var totalCostCountVarinput=totalCostCount()['totalnotFormated'];
	     $('#TotalCostinput').val(totalCostCountVarinput);

	     var totalCostCountNotFormated=totalCostCount()['totalnotFormated'];
		var costperMt=totalCostCountNotFormated / $('#Quantity').val();
		var costperMtFormated=formatcurrencynya(costperMt);
		$('#costPerMtSales').val(costperMtFormated);

		// jumlah gp sales
		var totalCostCountNotFormatedSales=totalCostCount()['totalnotFormated'];
		var totalCostCountNotFormatedStd=$('#TotalCostCountNotFormatedStd').val();
		var gpsales=((parseFloat(totalCostCountNotFormatedSales)-parseFloat(totalCostCountNotFormatedStd))/parseFloat(totalCostCountNotFormatedStd)) * 100;

		$('#gpSales').val(gpsales.toFixed(2));
		$('#gpStd').val(gpsales.toFixed(2));
		$("#gpStd").trigger("change");

	    //alert(percentCount);

	    });



 $('#CrewSubcontCostMargin').keyup(function () {  
	      // setiap karakter yang diketik selain angka akan langsung dihapus   
	      this.value = this.value.replace(/[^0-9\.\-]/g,'');
	    });

 $('#CrewSubcontCostMargin').blur(function () {  

	     if(this.value==''){
	      this.value=0;
	     }
	     var contsVal= parseFloat($('#crew_subcont_costDiv').val()) ;
	     var percentCount = parseFloat(( this.value * contsVal ) / 100);
	     var resultCount = contsVal  + percentCount;
	     var formatedCount =formatcurrencynya(resultCount);
	     $('#CrewSubcontCost').val(formatedCount);
	     $('#CrewSubcontCostCount').val(resultCount);

	     var totalCostCountVar=totalCostCount()['totalFormatedCurrency'];
	     $('#TotalCost').val(totalCostCountVar);

	     var totalCostCountVarinput=totalCostCount()['totalnotFormated'];
	     $('#TotalCostinput').val(totalCostCountVarinput);

	     var totalCostCountNotFormated=totalCostCount()['totalnotFormated'];
		var costperMt=totalCostCountNotFormated / $('#Quantity').val();
		var costperMtFormated=formatcurrencynya(costperMt);
		$('#costPerMtSales').val(costperMtFormated);

		// jumlah gp sales
		var totalCostCountNotFormatedSales=totalCostCount()['totalnotFormated'];
		var totalCostCountNotFormatedStd=$('#TotalCostCountNotFormatedStd').val();
		var gpsales=((parseFloat(totalCostCountNotFormatedSales)-parseFloat(totalCostCountNotFormatedStd))/parseFloat(totalCostCountNotFormatedStd)) * 100;

		$('#gpSales').val(gpsales.toFixed(2));
		$('#gpStd').val(gpsales.toFixed(2));
		$("#gpStd").trigger("change");

	    //alert(percentCount);

	    });


$('#InsuranceCostMargin').keyup(function () {  
	      // setiap karakter yang diketik selain angka akan langsung dihapus   
	      this.value = this.value.replace(/[^0-9\.\-]/g,'');
	    });

 $('#InsuranceCostMargin').blur(function () {  

	     if(this.value==''){
	      this.value=0;
	     }
	     var contsVal= parseFloat($('#insurance_costDiv').val()) ;
	     var percentCount = parseFloat(( this.value * contsVal ) / 100);
	     var resultCount = contsVal  + percentCount;
	     var formatedCount =formatcurrencynya(resultCount);
	     $('#InsuranceCost').val(formatedCount);
	     $('#InsuranceCostCount').val(resultCount);

	     var totalCostCountVar=totalCostCount()['totalFormatedCurrency'];
	     $('#TotalCost').val(totalCostCountVar);

	     var totalCostCountVarinput=totalCostCount()['totalnotFormated'];
	     $('#TotalCostinput').val(totalCostCountVarinput);

	     var totalCostCountNotFormated=totalCostCount()['totalnotFormated'];
		var costperMt=totalCostCountNotFormated / $('#Quantity').val();
		var costperMtFormated=formatcurrencynya(costperMt);
		$('#costPerMtSales').val(costperMtFormated);

		// jumlah gp sales
		var totalCostCountNotFormatedSales=totalCostCount()['totalnotFormated'];
		var totalCostCountNotFormatedStd=$('#TotalCostCountNotFormatedStd').val();
		var gpsales=((parseFloat(totalCostCountNotFormatedSales)-parseFloat(totalCostCountNotFormatedStd))/parseFloat(totalCostCountNotFormatedStd)) * 100;

		$('#gpSales').val(gpsales.toFixed(2));
		$('#gpStd').val(gpsales.toFixed(2));
		$("#gpStd").trigger("change");

	    //alert(percentCount);

	    });


 $('#RepairCostMargin').keyup(function () {  
	      // setiap karakter yang diketik selain angka akan langsung dihapus   
	      this.value = this.value.replace(/[^0-9\.\-]/g,'');
	    });

 $('#RepairCostMargin').blur(function () {  

	     if(this.value==''){
	      this.value=0;
	     }
	     var contsVal= parseFloat($('#repair_costDiv').val()) ;
	     var percentCount = parseFloat(( this.value * contsVal ) / 100);
	     var resultCount = contsVal  + percentCount;
	     var formatedCount =formatcurrencynya(resultCount);
	     $('#RepairCost').val(formatedCount);
	     $('#RepairCostCount').val(resultCount);

	     var totalCostCountVar=totalCostCount()['totalFormatedCurrency'];
	     $('#TotalCost').val(totalCostCountVar);

	     var totalCostCountVarinput=totalCostCount()['totalnotFormated'];
	     $('#TotalCostinput').val(totalCostCountVarinput);

	     var totalCostCountNotFormated=totalCostCount()['totalnotFormated'];
		var costperMt=totalCostCountNotFormated / $('#Quantity').val();
		var costperMtFormated=formatcurrencynya(costperMt);
		$('#costPerMtSales').val(costperMtFormated);

		// jumlah gp sales
		var totalCostCountNotFormatedSales=totalCostCount()['totalnotFormated'];
		var totalCostCountNotFormatedStd=$('#TotalCostCountNotFormatedStd').val();
		var gpsales=((parseFloat(totalCostCountNotFormatedSales)-parseFloat(totalCostCountNotFormatedStd))/parseFloat(totalCostCountNotFormatedStd)) * 100;

		$('#gpSales').val(gpsales.toFixed(2));
		$('#gpStd').val(gpsales.toFixed(2));
		$("#gpStd").trigger("change");

	    //alert(percentCount);

	    });


$('#DockingCostMargin').keyup(function () {  
	      // setiap karakter yang diketik selain angka akan langsung dihapus   
	      this.value = this.value.replace(/[^0-9\.\-]/g,'');
	    });

 $('#DockingCostMargin').blur(function () {  

	     if(this.value==''){
	      this.value=0;
	     }
	     var contsVal= parseFloat($('#docking_costDiv').val()) ;
	     var percentCount = parseFloat(( this.value * contsVal ) / 100);
	     var resultCount = contsVal  + percentCount;
	     var formatedCount =formatcurrencynya(resultCount);
	     $('#DockingCost').val(formatedCount);
	     $('#DockingCostCount').val(resultCount);

	     var totalCostCountVar=totalCostCount()['totalFormatedCurrency'];
	     $('#TotalCost').val(totalCostCountVar);

	     var totalCostCountVarinput=totalCostCount()['totalnotFormated'];
	     $('#TotalCostinput').val(totalCostCountVarinput);

	     var totalCostCountNotFormated=totalCostCount()['totalnotFormated'];
		var costperMt=totalCostCountNotFormated / $('#Quantity').val();
		var costperMtFormated=formatcurrencynya(costperMt);
		$('#costPerMtSales').val(costperMtFormated);

		// jumlah gp sales
		var totalCostCountNotFormatedSales=totalCostCount()['totalnotFormated'];
		var totalCostCountNotFormatedStd=$('#TotalCostCountNotFormatedStd').val();
		var gpsales=((parseFloat(totalCostCountNotFormatedSales)-parseFloat(totalCostCountNotFormatedStd))/parseFloat(totalCostCountNotFormatedStd)) * 100;

		$('#gpSales').val(gpsales.toFixed(2));
		$('#gpStd').val(gpsales.toFixed(2));
		$("#gpStd").trigger("change");

	    //alert(percentCount);

	    });

 $('#BrokerageCostMargin').keyup(function () {  
	      // setiap karakter yang diketik selain angka akan langsung dihapus   
	      this.value = this.value.replace(/[^0-9\.\-]/g,'');
	    });

 $('#BrokerageCostMargin').blur(function () {  

	     if(this.value==''){
	      this.value=0;
	     }
	     var contsVal= parseFloat($('#brokerage_costDiv').val()) ;
	     var percentCount = parseFloat(( this.value * contsVal ) / 100);
	     var resultCount = contsVal  + percentCount;
	     var formatedCount =formatcurrencynya(resultCount);
	     $('#BrokerageCost').val(formatedCount);
	     $('#BrokerageCostCount').val(resultCount);

	     var totalCostCountVar=totalCostCount()['totalFormatedCurrency'];
	     $('#TotalCost').val(totalCostCountVar);

	     var totalCostCountVarinput=totalCostCount()['totalnotFormated'];
	     $('#TotalCostinput').val(totalCostCountVarinput);

	     var totalCostCountNotFormated=totalCostCount()['totalnotFormated'];
		var costperMt=totalCostCountNotFormated / $('#Quantity').val();
		var costperMtFormated=formatcurrencynya(costperMt);
		$('#costPerMtSales').val(costperMtFormated);

		// jumlah gp sales
		var totalCostCountNotFormatedSales=totalCostCount()['totalnotFormated'];
		var totalCostCountNotFormatedStd=$('#TotalCostCountNotFormatedStd').val();
		var gpsales=((parseFloat(totalCostCountNotFormatedSales)-parseFloat(totalCostCountNotFormatedStd))/parseFloat(totalCostCountNotFormatedStd)) * 100;

		$('#gpSales').val(gpsales.toFixed(2));
		$('#gpStd').val(gpsales.toFixed(2));
		$("#gpStd").trigger("change");

	    //alert(percentCount);

	    });


 $('#OthersCostMargin').keyup(function () {  
	      // setiap karakter yang diketik selain angka akan langsung dihapus   
	      this.value = this.value.replace(/[^0-9\.\-]/g,'');
	    });

 $('#OthersCostMargin').blur(function () {  

	     if(this.value==''){
	      this.value=0;
	     }
	     var contsVal= parseFloat($('#other_costDiv').val()) ;
	     var percentCount = parseFloat(( this.value * contsVal ) / 100);
	     var resultCount = contsVal  + percentCount;
	     var formatedCount =formatcurrencynya(resultCount);
	     $('#OthersCost').val(formatedCount);
	     $('#OthersCostCount').val(resultCount);

	     var totalCostCountVar=totalCostCount()['totalFormatedCurrency'];
	     $('#TotalCost').val(totalCostCountVar);

	     var totalCostCountVarinput=totalCostCount()['totalnotFormated'];
	     $('#TotalCostinput').val(totalCostCountVarinput);

	     var totalCostCountNotFormated=totalCostCount()['totalnotFormated'];
		var costperMt=totalCostCountNotFormated / $('#Quantity').val();
		var costperMtFormated=formatcurrencynya(costperMt);
		$('#costPerMtSales').val(costperMtFormated);

		// jumlah gp sales
		var totalCostCountNotFormatedSales=totalCostCount()['totalnotFormated'];
		var totalCostCountNotFormatedStd=$('#TotalCostCountNotFormatedStd').val();
		var gpsales=((parseFloat(totalCostCountNotFormatedSales)-parseFloat(totalCostCountNotFormatedStd))/parseFloat(totalCostCountNotFormatedStd)) * 100;

		$('#gpSales').val(gpsales.toFixed(2));
		$('#gpStd').val(gpsales.toFixed(2));
		$("#gpStd").trigger("change");

	    //alert(percentCount);

	    });



		$('#gpStd').keyup(function () {  
			      // setiap karakter yang diketik selain angka akan langsung dihapus   
			      this.value = this.value.replace(/[^0-9\.\-]/g,'');
			    });

		$('#gpStd').blur(function () {  

			     if(this.value==''){
			      this.value=0;
			     }

		var totalCostCountNotFormatedStd=$('#TotalCostCountNotFormatedStd').val();
		var contsVal= parseFloat(totalCostCountNotFormatedStd) ;
		var percentCount = parseFloat(( this.value * contsVal ) / 100);
		var resultCount = contsVal  + percentCount;
		var formatedCount =formatcurrencynya(resultCount);
		var costperMt = parseFloat(resultCount) / $('#Quantity').val();
		var costperMtFormated=formatcurrencynya(costperMt);
		$('#TotalCostStd').val(formatedCount);
		$('#TotalCostStdinput').val(resultCount);


		$('#costPerMtStd').val(costperMtFormated);

		// update margin sesuai dengan gpstd 
		$('#FuelCostMargin').val(this.value);
		$("#FuelCostMargin").trigger("blur");

		$('#AgencyCostMargin').val($('#FuelCostMargin').val()); // pake nilainya fuel karena semua nya sama nilainya
		$("#AgencyCostMargin").trigger("blur");

		$('#DepreciationCostMargin').val($('#FuelCostMargin').val());
		$("#DepreciationCostMargin").trigger("blur");

		$('#CrewCostMargin').val($('#FuelCostMargin').val());
		$("#CrewCostMargin").trigger("blur");

		$('#CrewSubcontCostMargin').val($('#FuelCostMargin').val());
		$("#CrewSubcontCostMargin").trigger("blur");

		$('#InsuranceCostMargin').val($('#FuelCostMargin').val());
		$("#InsuranceCostMargin").trigger("blur");

		$('#RepairCostMargin').val($('#FuelCostMargin').val());
		$("#RepairCostMargin").trigger("blur");

		$('#DockingCostMargin').val($('#FuelCostMargin').val());
		$("#DockingCostMargin").trigger("blur");

		$('#BrokerageCostMargin').val($('#FuelCostMargin').val());
		$("#BrokerageCostMargin").trigger("blur");

		$('#OthersCostMargin').val($('#FuelCostMargin').val());
		$("#OthersCostMargin").trigger("blur");

		// hitung ulang gpstd
		$('#gpStd').val($('#FuelCostMargin').val());
		$("#gpStd").trigger("change"); // tambahin ini biar ga berubah nilai nya (di hitung ulang)

		//alert(cost);
		});


		// on change 
		$('#gpStd').change(function () {  

		var totalCostCountNotFormatedStd=$('#TotalCostCountNotFormatedStd').val();
		var contsVal= parseFloat(totalCostCountNotFormatedStd) ;
		var percentCount = parseFloat(( this.value * contsVal ) / 100);
		var resultCount = contsVal  + percentCount;
		var formatedCount =formatcurrencynya(resultCount);
		var costperMt = parseFloat(resultCount) / $('#Quantity').val();
		var costperMtFormated=formatcurrencynya(costperMt);
		$('#TotalCostStd').val(formatedCount);
		$('#TotalCostStdinput').val(resultCount);


		$('#costPerMtStd').val(costperMtFormated);
		//alert(cost);
		});



		$('#Quantity').keyup(function () {  
			      // setiap karakter yang diketik selain angka akan langsung dihapus   
			      this.value = this.value.replace(/[^0-9\.\-]/g,'');
			    });

		$('#Quantity').blur(function () { 
		var fixQuantity="<?php echo $BargeVesselFixCapacity ?>" ;

			     if(this.value==''){
			      this.value=0;
			     }

			     if(this.value > fixQuantity){
			      alert('Cannot Bigger Than Capacity Of Barge ');
			      this.value=0;
			     }



		var totalCostCountNotFormatedStd=$('#TotalCostCountNotFormatedStd').val();
		var costperMt = parseFloat(totalCostCountNotFormatedStd) / $('#Quantity').val();
		var costperMtFormated=formatcurrencynya(costperMt);
		$('#costPerMtStd').val(costperMtFormated);

		var totalCostCountSalesNotFormated=totalCostCount()['totalnotFormated'];
		var costperMtSales=parseFloat(totalCostCountSalesNotFormated) / $('#Quantity').val();
		var costperMtSalesFormated=formatcurrencynya(costperMtSales);
		$('#costPerMtSales').val(costperMtSalesFormated);

		});



		$('#price').keyup(function () {  
			      // setiap karakter yang diketik selain angka akan langsung dihapus   
			      this.value = this.value.replace(/[^0-9\.\-]/g,'');
			    });

		$('#price').blur(function () {  

			     if(this.value==''){
			      this.value=0;
			     }

		});

// total cost formated awal 
//var totalCostCountFormated=totalCostCount()['totalFormatedCurrency'];
//$('#TotalCost').val(totalCostCountFormated);

// cost per mt awal
//var totalCostCountNotFormated=totalCostCount()['totalnotFormated'];
//var costperMt=totalCostCountNotFormated / $('#Quantity').val();
//var costperMtFormated=formatcurrencynya(costperMt);
//$('#costPerMtSales').val(costperMtFormated);

//var totalCostCountNotFormatedSales=totalCostCount()['totalnotFormated'];
//var totalCostCountNotFormatedStd=$('#TotalCostCountNotFormatedStd').val();
//var gpsales=((parseFloat(totalCostCountNotFormatedSales)-parseFloat(totalCostCountNotFormatedStd))/ totalCostCountNotFormatedStd)*100
//$('#gpSales').val(costperMtFormated);



});

</script>

<?php
$this->breadcrumbs=array(
	'Result'=>array('result'),
	'Check',
);

$this->menu=array(

array('label'=>'Calculator','url'=>array('demand/caculat')),
array('label'=>'Calculator Result','url'=>array('demand/result'), 'active'=>true),
);
?>
<style>
table td, table th {
    padding: 5px 5px 5px 5px;
    border: 1px solid #87A1A2;
}

th {
	font-weight: bold;
	color:white;
}

td{
	color: black;
}


</style>
<?php
	$this->widget('ext.tooltipster.tooltipster',
		array(
		'options' => array(
			//'theme' => 'tooltipster-light'
		))
	);
?>

<h3>Cost Plan Calculator Result</h3>
<hr>


<div class="view">
	<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'result',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>


<?php 
	//if(isset($_POST['PortLoading']) && isset($_POST['PortUnLoading']) && isset($_POST['Tug']) && isset($_POST['Barge'])){
	if(isset($_POST['yt0'])) {
		$id_load= $_POST['PortLoading']*1 ; 
		
		$id_unload= $_POST['PortUnLoading']*1 ;
		
		$id_tug= $_POST['Tug']*1;
		
		$id_barge= $_POST['Barge']*1 ;
		
		$Quan= $_POST['quantity'];
		if($id_load > 0 && $id_unload > 0 && $id_tug > 0 && $id_barge > 0){
			$LoadJetty = JettyDB::getJetty($id_load);
			$UnLoadJetty = JettyDB::getJetty($id_unload);
			$TugVessel = VesselDB::getVessel($id_tug);
			$BargeVessel = VesselDB::getVessel($id_barge);
			
			$fuelprice = FuelDB::getCurrentFuelPrice();
			$STD = StandardCostDB::getStandardCost(
				$TugVessel->id_vessel, 
				$BargeVessel->id_vessel, 
				$LoadJetty->JettyId , 
				$UnLoadJetty->JettyId ,
				$fuelprice
			);
		
			/*
			//Ini untuk Tester Data saja
			echo $STD["fuel"]->value;
			echo $STD["fuel"]->notes;
			echo '<Br>';
			echo $STD["fix_cost"]->value;
			echo '<Br>';
			echo $STD["var_cost"]->value;
			echo '<Br>';
			echo NumberAndCurrency::formatCurrency($STD["depreciation_cost"]->value);
			echo $STD["depreciation_cost"]->notes;
			echo '<Br>';
			echo NumberAndCurrency::formatCurrency($STD["crew_own_cost"]->value);
			echo $STD["crew_own_cost"]->notes;
			echo '<Br>';
			echo NumberAndCurrency::formatCurrency($STD["crew_subcont_cost"]->value);
			echo $STD["crew_subcont_cost"]->notes;
			echo '<Br>';
			echo NumberAndCurrency::formatCurrency($STD["insurance_cost"]->value);
			echo $STD["insurance_cost"]->notes;
			echo '<Br>';
			echo NumberAndCurrency::formatCurrency($STD["repair_cost"]->value);
			echo $STD["repair_cost"]->notes;
			echo '<Br>';
			echo NumberAndCurrency::formatCurrency($STD["docking_cost"]->value);
			echo $STD["docking_cost"]->notes;
			echo '<Br>';
			echo NumberAndCurrency::formatCurrency($STD["brokerage_cost"]->value);
			echo $STD["brokerage_cost"]->notes;
			echo '<Br>';
			echo NumberAndCurrency::formatCurrency($STD["other_cost"]->value);
			echo $STD["other_cost"]->notes;
			*/
		}
		
		//if($id_load == "" || $id_unload == "" || $id_tug == "" || $id_barge == ""){
		if($id_load <= 0 && $id_unload <= 0 && $id_tug <= 0 && $id_barge <= 0){
			echo '<div class="alert">Please complete the choices first!.</div>'; 
		}else{
?>



<div class="view">		
	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="freightCalculator_PortLoading"><?php echo "PortLoading &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
		<?php echo CHtml::textField('PortLoading',$LoadJetty->JettyName,array('class'=>'span4', 'maxLength'=>10, 'readonly'=>'readonly')); ?>
		<?php echo $form->hiddenField($model,'JettyIdStart',array('class'=>'span5','value'=>$id_load)); ?>
	</div>
	</div>

	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="freightCalculator_PortUnloading"><?php echo "PortUnloading &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
	<?php echo CHtml::textField('PortUnloading',$UnLoadJetty->JettyName,array('class'=>'span4', 'maxLength'=>10,'readonly'=>'readonly')); ?>
	<?php echo $form->hiddenField($model,'JettyIdEnd',array('class'=>'span5','value'=>$id_unload)); ?>
	</div>
	</div>

	
	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="freightCalculator_Tug"><?php echo "Tug &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
	<?php echo CHtml::textField('Tug',$TugVessel->VesselName,array('class'=>'span4', 'maxLength'=>10,'readonly'=>'readonly')); ?>
	<?php echo "Tug Power : <b>".$TugVessel->Power."</b> HP";?>
	</div>
	</div>


	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="freightCalculator_Barge"><?php echo "Barge &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
	<?php echo CHtml::textField('Barge',$BargeVessel->VesselName,array('class'=>'span4', 'maxLength'=>10,'readonly'=>'readonly')); ?>
	<?php echo "Barge Capacity : <b>".$BargeVessel->Capacity."</b> MT";?>
	<?php echo $form->hiddenField($model,'BargeSize',array('class'=>'span5','value'=>$BargeVessel->BargeSize)); ?>
	<?php echo $form->hiddenField($model,'Capacity',array('class'=>'span5','value'=>$BargeVessel->Capacity)); ?>
	</div>
	</div>

	
	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="freightCalculator_Quantity"><?php echo "Quantity &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
		<?php echo $form->textField($model,'TotalQuantity',array('class'=>'span3', 'value'=>$Quan, 'maxLength'=>10,'id'=>'Quantity')); ?>
		MT
		<?php echo $form->hiddenField($model,'QuantityUnit',array('class'=>'span5','value'=>'MT')); ?>
	</div>
	</div>

	<div class="form-horiz ">
	<label class="control-label required" for="freightCalculator_PriceUnit"><?php echo "Price"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
		<?php echo $form->textField($model,'PriceUnit',array('class'=>'span3','id'=>'price','value'=>0)); ?> 
		<?php echo $form->dropDownList($model, 'id_currency',CHtml::listData(Currency::model()->findAll(array('order'=>'id_currency ASC')), 'id_currency', 'currency'),array('class'=>'span2')); ?>
	</div>
	</div>

</div>

	<h3>Cost Standard</h3>
	<?php
		//Cost Standard Calculation
		
		echo "1 LTR HSD Solar = IDR ".NumberAndCurrency::formatCurrency($fuelprice);
	?>

	<div class="view">
	<table border="1">
		<tr>
			<td colspan="3" width="50%"><h4>Standard Cost <?php echo $STD["cycle_time"]->value; ?></h4></td>
			<td colspan="3" width="50%"><h4>Sales Cost</h4></td>
		</tr>
		<tr>
			<td>Standard Fuel Consumption
			<?php 
				if($STD["fuel"]->notes != "")
					echo Alert::displayTooltipLink($STD["fuel"]->notes, $STD["fuel"]->url);
			?>
			</td>
			<td style="text-align:right;">
				<?php echo NumberAndCurrency::formatCurrency($STD["fuel"]->value); ?>
				<?php //echo CHtml::hiddenField('fuelCostDiv',$STD["fuel"]->value,array('class'=>'span3','maxLength'=>10)); ?>
				<?php echo $form->hiddenField($model,'FuelConsumpt',array('class'=>'span3','maxLength'=>10,'id'=>'FuelConsumpt','value'=>$STD["fuel"]->value)); ?>
			</td>
			<td>LTR</td>
			
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>Cycle Time
			<?php 
				if($STD["cycle_time"]->notes != "")
					echo Alert::displayTooltipLink($STD["cycle_time"]->notes, $STD["cycle_time"]->url);
			?>
			</td>
			<td style="text-align:right;">
				<?php echo NumberAndCurrency::formatCurrency($STD["cycle_time"]->value); ?>
				<?php //echo CHtml::hiddenField('fuelCostDiv',$STD["fuel"]->value,array('class'=>'span3','maxLength'=>10)); ?>
				<?php echo $form->hiddenField($model,'CycleTime',array('class'=>'span3','maxLength'=>10,'id'=>'CycleTime','value'=>$STD["cycle_time"]->value)); ?>
			</td>
			<td>days</td>
			
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>Fuel Cost
			<?php 
				$fuel_cost = ($STD["fuel"]->value)*$fuelprice;
				if($STD["fuel"]->notes != "")
					echo Alert::displayTooltipLink($STD["fuel"]->notes, $STD["fuel"]->url);
			?>
			</td>
			<td style="text-align:right;">
				<?php echo NumberAndCurrency::formatCurrency($fuel_cost); ?>
				<?php //echo CHtml::hiddenField('fuelCostDiv',$STD["fuel"]->value,array('class'=>'span3','maxLength'=>10)); ?>
				<?php echo $form->hiddenField($model,'FuelCost',array('class'=>'span3','maxLength'=>10,'id'=>'fuelCostDiv','value'=>$fuel_cost)); ?>
			</td>
			<td>IDR</td>
			
			<td style="text-align:right;">
				<?php //echo CHtml::textField('FuelCostMargin',0,array('class'=>'span3','maxLength'=>10)); % ?>
				<?php echo $form->textField($model,'MarginFuelCost',array('class'=>'span3','maxLength'=>10,'id'=>'FuelCostMargin','value'=>0)); ?> %
			</td>
			<td style="text-align:right;">
				<?php echo CHtml::textField('FuelCost',
					NumberAndCurrency::formatCurrency($fuel_cost),
					array('class'=>'span10', 
						'maxLength'=>10,
						'readonly'=>'readonly',
						'style'=>'text-align:right',
					)); 
				?>
				<?php echo CHtml::hiddenField('FuelCostCount',$fuel_cost,array('class'=>'span10','maxLength'=>10)); ?>
			</td>
			<td>IDR</td>
		</tr>
		<tr>
			<td>Agency Cost
			<?php 
				if($STD["agency_cost"]->notes != "")
					echo Alert::displayTooltipLink($STD["agency_cost"]->notes, $STD["agency_cost"]->url);
			?>
			</td>
			<td style="text-align:right;">
				<?php echo NumberAndCurrency::formatCurrency($STD["agency_cost"]->value); ?>
				<?php //echo CHtml::hiddenField('agency_costDiv',$STD["agency_cost"]->value,array('class'=>'span3','maxLength'=>10)); ?>
				<?php echo $form->hiddenField($model,'AgencyCost',array('class'=>'span3','maxLength'=>10,'id'=>'agency_costDiv','value'=>$STD["agency_cost"]->value)); ?>
			
			</td>
			<td>IDR</td>
			
			<td style="text-align:right;">
				<?php //echo CHtml::textField('AgencyCostMargin',0,array('class'=>'span3','maxLength'=>10)); ?>
				<?php echo $form->textField($model,'MarginAgencyCost',array('class'=>'span3','maxLength'=>10,'id'=>'AgencyCostMargin','value'=>0)); ?> %
			</td>
			<td style="text-align:right;">
				<?php echo CHtml::textField('AgencyCost',
					NumberAndCurrency::formatCurrency($STD["agency_cost"]->value),
					array('class'=>'span10', 
						'maxLength'=>10,
						'readonly'=>'readonly',
						'style'=>'text-align:right',
					)); 
				?>
				<?php echo CHtml::hiddenField('AgencyCostCount',$STD["agency_cost"]->value,array('class'=>'span10','maxLength'=>10)); ?>
			</td>
			<td>IDR</td>
		</tr>
		
		<tr>
			<td>Depreciation Cost
			<?php 
				if($STD["depreciation_cost"]->notes != "")
					echo Alert::displayTooltipLink($STD["depreciation_cost"]->notes, $STD["depreciation_cost"]->url);
			?>
			</td>
			<td style="text-align:right;">
				<?php echo NumberAndCurrency::formatCurrency($STD["depreciation_cost"]->value); ?>
				<?php //echo CHtml::hiddenField('depreciation_costDiv',$STD["depreciation_cost"]->value,array('class'=>'span3','maxLength'=>10)); ?>
				<?php echo $form->hiddenField($model,'DepreciationCost',array('class'=>'span3','maxLength'=>10,'id'=>'depreciation_costDiv','value'=>$STD["depreciation_cost"]->value)); ?>
				</td>
			<td>IDR</td>
			
			<td style="text-align:right;">
				<?php //echo CHtml::textField('DepreciationCostMargin',0,array('class'=>'span3','maxLength'=>10)); ?> 
				<?php echo $form->textField($model,'MarginDepreciationCost',array('class'=>'span3','maxLength'=>10,'id'=>'DepreciationCostMargin','value'=>0)); ?> %
			
			</td>
			<td style="text-align:right;">
				<?php echo CHtml::textField('DepreciationCost',
					NumberAndCurrency::formatCurrency($STD["depreciation_cost"]->value),
					array('class'=>'span10', 
						'maxLength'=>10,
						'readonly'=>'readonly',
						'style'=>'text-align:right',
					)); 
				?>
				<?php echo CHtml::hiddenField('DepreciationCostCount',$STD["depreciation_cost"]->value,array('class'=>'span10','maxLength'=>10)); ?>
			</td>
			<td>IDR</td>
		</tr>
		
		<tr>
			<td>Crew Cost
			<?php 
				if($STD["crew_own_cost"]->notes != "")
					echo Alert::displayTooltipLink($STD["crew_own_cost"]->notes, $STD["crew_own_cost"]->url);
			?>
			</td>
			<td style="text-align:right;">
				<?php echo NumberAndCurrency::formatCurrency($STD["crew_own_cost"]->value); ?>
				<?php //echo CHtml::hiddenField('crew_own_costDiv',$STD["crew_own_cost"]->value,array('class'=>'span3','maxLength'=>10)); ?>
				<?php echo $form->hiddenField($model,'CrewCost',array('class'=>'span3','maxLength'=>10,'id'=>'crew_own_costDiv','value'=>$STD["crew_own_cost"]->value)); ?>
				
			</td>
			<td>IDR</td>
			
			<td style="text-align:right;">
				<?php //echo CHtml::textField('CrewCostMargin',0,array('class'=>'span3','maxLength'=>10)); ?>
				<?php echo $form->textField($model,'MarginCrewCost',array('class'=>'span3','maxLength'=>10,'id'=>'CrewCostMargin','value'=>0)); ?> %
			
			</td>
			<td style="text-align:right;">
				<?php echo CHtml::textField('CrewCost',
					NumberAndCurrency::formatCurrency($STD["crew_own_cost"]->value),
					array('class'=>'span10', 
						'maxLength'=>10,
						'readonly'=>'readonly',
						'style'=>'text-align:right',
					)); 
				?>
				<?php echo CHtml::hiddenField('CrewCostCount',$STD["crew_own_cost"]->value,array('class'=>'span10','maxLength'=>10)); ?>
			</td>
			<td>IDR</td>
		</tr>
		
		<tr>
			<td>Crew Subcont Cost
			<?php 
				if($STD["crew_subcont_cost"]->notes != "")
					echo Alert::displayTooltipLink($STD["crew_subcont_cost"]->notes, $STD["crew_subcont_cost"]->url);
			?>
			</td>
			<td style="text-align:right;">
				<?php echo NumberAndCurrency::formatCurrency($STD["crew_subcont_cost"]->value); ?>
				<?php // echo CHtml::hiddenField('crew_subcont_costDiv',$STD["crew_subcont_cost"]->value,array('class'=>'span3','maxLength'=>10)); ?>
				<?php echo $form->hiddenField($model,'SubconCost',array('class'=>'span3','maxLength'=>10,'id'=>'crew_subcont_costDiv','value'=>$STD["crew_subcont_cost"]->value)); ?>
				
			</td>
			<td>IDR</td>
			
			<td style="text-align:right;">
				<?php //echo CHtml::textField('CrewSubcontCostMargin',0,array('class'=>'span3','maxLength'=>10)); ?>
				<?php echo $form->textField($model,'MarginSubconCost',array('class'=>'span3','maxLength'=>10,'id'=>'CrewSubcontCostMargin','value'=>0)); ?> %
			
			</td>
			<td style="text-align:right;">
				<?php echo CHtml::textField('CrewSubcontCost',
					NumberAndCurrency::formatCurrency($STD["crew_subcont_cost"]->value),
					array('class'=>'span10', 
						'maxLength'=>10,
						'readonly'=>'readonly',
						'style'=>'text-align:right',
					)); 
				?>
				<?php echo CHtml::hiddenField('CrewSubcontCostCount',$STD["crew_subcont_cost"]->value,array('class'=>'span10','maxLength'=>10)); ?>
			</td>
			<td>IDR</td>
		</tr>
		
		<tr>
			<td>Insurance Cost
			<?php 
				if($STD["insurance_cost"]->notes != "")
					echo Alert::displayTooltipLink($STD["insurance_cost"]->notes, $STD["insurance_cost"]->url);
			?>
			</td>
			<td style="text-align:right;">
				<?php echo NumberAndCurrency::formatCurrency($STD["insurance_cost"]->value); ?>
				<?php //echo CHtml::hiddenField('insurance_costDiv',$STD["insurance_cost"]->value,array('class'=>'span3','maxLength'=>10)); ?>
				<?php echo $form->hiddenField($model,'IncuranceCost',array('class'=>'span3','maxLength'=>10,'id'=>'insurance_costDiv','value'=>$STD["insurance_cost"]->value)); ?>
				
			</td>
			<td>IDR</td>
			
			<td style="text-align:right;">
				<?php //echo CHtml::textField('InsuranceCostMargin',0,array('class'=>'span3','maxLength'=>10)); ?>
				<?php echo $form->textField($model,'MarginIncuranceCost',array('class'=>'span3','maxLength'=>10,'id'=>'InsuranceCostMargin','value'=>0)); ?> %
			
			</td>
			<td style="text-align:right;">
				<?php echo CHtml::textField('InsuranceCost',
					NumberAndCurrency::formatCurrency($STD["insurance_cost"]->value),
					array('class'=>'span10', 
						'maxLength'=>10,
						'readonly'=>'readonly',
						'style'=>'text-align:right',
					)); 
				?>
				<?php echo CHtml::hiddenField('InsuranceCostCount',$STD["insurance_cost"]->value,array('class'=>'span10','maxLength'=>10)); ?>
			</td>
			<td>IDR</td>
		</tr>
		
		<tr>
			<td>Repair Cost
			<?php 
				if($STD["repair_cost"]->notes != "")
					echo Alert::displayTooltipLink($STD["repair_cost"]->notes, $STD["repair_cost"]->url);
			?>
			</td>
			<td style="text-align:right;">
				<?php echo NumberAndCurrency::formatCurrency($STD["repair_cost"]->value); ?>
				<?php //echo CHtml::hiddenField('repair_costDiv',$STD["repair_cost"]->value,array('class'=>'span3','maxLength'=>10)); ?>
				<?php echo $form->hiddenField($model,'RepairCost',array('class'=>'span3','maxLength'=>10,'id'=>'repair_costDiv','value'=>$STD["repair_cost"]->value)); ?>
				
			</td>
			<td>IDR</td>
			
			<td style="text-align:right;">
				<?php //echo CHtml::textField('RepairCostMargin',0,array('class'=>'span3','maxLength'=>10)); ?>
				<?php echo $form->textField($model,'MarginRepairCost',array('class'=>'span3','maxLength'=>10,'id'=>'RepairCostMargin','value'=>0)); ?> %
			
			</td>
			<td style="text-align:right;">
				<?php echo CHtml::textField('RepairCost',
					NumberAndCurrency::formatCurrency($STD["repair_cost"]->value),
					array('class'=>'span10', 
						'maxLength'=>10,
						'readonly'=>'readonly',
						'style'=>'text-align:right',
					)); 
				?>
				<?php echo CHtml::hiddenField('RepairCostCount',$STD["repair_cost"]->value,array('class'=>'span10','maxLength'=>10)); ?>
			</td>
			<td>IDR</td>
		</tr>
		
		<tr>
			<td>Docking Cost
			<?php 
				if($STD["docking_cost"]->notes != "")
					echo Alert::displayTooltipLink($STD["docking_cost"]->notes, $STD["docking_cost"]->url);
			?>
			</td>
			<td style="text-align:right;">
				<?php echo NumberAndCurrency::formatCurrency($STD["docking_cost"]->value); ?>
				<?php //echo CHtml::hiddenField('docking_costDiv',$STD["docking_cost"]->value,array('class'=>'span3','maxLength'=>10)); ?>
				<?php echo $form->hiddenField($model,'DockingCost',array('class'=>'span3','maxLength'=>10,'id'=>'docking_costDiv','value'=>$STD["docking_cost"]->value)); ?>
				
			</td>
			<td>IDR</td>
			
			<td style="text-align:right;">
				<?php //echo CHtml::textField('DockingCostMargin',0,array('class'=>'span3','maxLength'=>10)); ?>
				<?php echo $form->textField($model,'MarginDockingCost',array('class'=>'span3','maxLength'=>10,'id'=>'DockingCostMargin','value'=>0)); ?> %
			
			</td>
			<td style="text-align:right;">
				<?php echo CHtml::textField('DockingCost',
					NumberAndCurrency::formatCurrency($STD["docking_cost"]->value),
					array('class'=>'span10', 
						'maxLength'=>10,
						'readonly'=>'readonly',
						'style'=>'text-align:right',
					)); 
				?>
				<?php echo CHtml::hiddenField('DockingCostCount',$STD["docking_cost"]->value,array('class'=>'span10','maxLength'=>10)); ?>
			</td>
			<td>IDR</td>
		</tr>
		
		<tr>
			<td>Brokerage Cost
			<?php 
				if($STD["brokerage_cost"]->notes != "")
					echo Alert::displayTooltipLink($STD["brokerage_cost"]->notes, $STD["brokerage_cost"]->url);
			?>
			</td>
			<td style="text-align:right;">
				<?php echo NumberAndCurrency::formatCurrency($STD["brokerage_cost"]->value); ?>
				<?php //echo CHtml::hiddenField('brokerage_costDiv',$STD["brokerage_cost"]->value,array('class'=>'span3','maxLength'=>10)); ?>
				<?php echo $form->hiddenField($model,'BrokerageCost',array('class'=>'span3','maxLength'=>10,'id'=>'brokerage_costDiv','value'=>$STD["brokerage_cost"]->value)); ?>
				
			</td>
			<td>IDR</td>
			
			<td style="text-align:right;">
				<?php //echo CHtml::textField('BrokerageCostMargin',0,array('class'=>'span3','maxLength'=>10)); ?>
				<?php echo $form->textField($model,'MarginBrokerageCost',array('class'=>'span3','maxLength'=>10,'id'=>'BrokerageCostMargin','value'=>0)); ?> %
			
			</td>
			<td style="text-align:right;">
				<?php echo CHtml::textField('BrokerageCost',
					NumberAndCurrency::formatCurrency($STD["brokerage_cost"]->value),
					array('class'=>'span10', 
						'maxLength'=>10,
						'readonly'=>'readonly',
						'style'=>'text-align:right',
					)); 
				?>
				<?php echo CHtml::hiddenField('BrokerageCostCount',$STD["brokerage_cost"]->value,array('class'=>'span10','maxLength'=>10)); ?>
			</td>
			<td>IDR</td>
		</tr>
		
		<tr>
			<td>Others Cost
			<?php 
				if($STD["other_cost"]->notes != "")
					echo Alert::displayTooltipLink($STD["other_cost"]->notes, $STD["other_cost"]->url);
			?>
			</td>
			<td style="text-align:right;">
				<?php echo NumberAndCurrency::formatCurrency($STD["other_cost"]->value); ?>
				<?php //echo CHtml::hiddenField('other_costDiv',$STD["other_cost"]->value,array('class'=>'span3','maxLength'=>10)); ?>
				<?php echo $form->hiddenField($model,'OthersCost',array('class'=>'span3','maxLength'=>10,'id'=>'other_costDiv','value'=>$STD["other_cost"]->value)); ?>
				
			</td>
			<td>IDR</td>
			
			<td style="text-align:right;">
				<?php //echo CHtml::textField('OthersCostMargin',0,array('class'=>'span3','maxLength'=>10)); ?>
				<?php echo $form->textField($model,'MarginOthersCost',array('class'=>'span3','maxLength'=>10,'id'=>'OthersCostMargin','value'=>0)); ?> %
			
			</td>
			<td style="text-align:right;">
				<?php echo CHtml::textField('OthersCost',
					NumberAndCurrency::formatCurrency($STD["other_cost"]->value),
					array('class'=>'span10', 
						'maxLength'=>10,
						'readonly'=>'readonly',
						'style'=>'text-align:right',
					)); 
				?>
				<?php echo CHtml::hiddenField('OthersCostCount',$STD["other_cost"]->value,array('class'=>'span10','maxLength'=>10)); ?>
			</td>
			<td>IDR</td>
		</tr>
		
		<tr>
			<td colspan="6"></td>
		</tr>
		

		<tr>
			<td style="text-align:right;"><b>STANDARD COST</b>
			</td>
			<td style="text-align:right;">
				<?php echo NumberAndCurrency::formatCurrency($STD["TOTAL_COST"]->value); ?>
				<?php echo CHtml::hiddenField('TotalCostCountNotFormatedStd',$STD["TOTAL_COST"]->value,array('class'=>'span10','maxLength'=>10)); ?>
			</td>
			<td>IDR</td>
			
			<td style="text-align:right;" colspan='3'></td>
			<!--<td style="text-align:right;"></td>
			<td></td>-->
		</tr>


		<tr>
			<td style="text-align:right;"><b>GP</b>
			</td>
			<td style="text-align:right;">
				<?php /* echo CHtml::textField('gpStd',
					0, //Ini belum dihitung
					array('class'=>'span4', 
						'maxLength'=>10,
						//'readonly'=>'readonly',
						'style'=>'text-align:right',
					)); 
					*/
				?>

				<?php echo $form->textField($model,
					'GP_COGM', 
					array('class'=>'span5', 
						  'id'=>'gpStd',
						'maxLength'=>10,
						'value'=>0,
						//'readonly'=>'readonly',
						'style'=>'text-align:right',
					)); 
				?>
			</td>
			<td>%</td>
			
			<td style="text-align:right;"><b>GP</b>
			</td>
			<td style="text-align:right;">
				<?php /*echo CHtml::textField('gpSales',
					0,
					array('class'=>'span4', 
						'maxLength'=>10,
						'readonly'=>'readonly',
						'style'=>'text-align:right',
					)); */
				?>

				<?php echo $form->textField($model,
					'GP_COGS', 
					array('class'=>'span4', 
						  'id'=>'gpSales',
						'maxLength'=>10,
						'value'=>0,
						'readonly'=>'readonly',
						'style'=>'text-align:right',
					)); 
				?>
			</td>
			<td>%</td>
		</tr>

		
		
		
		<tr>
			<td style="text-align:right;" colspan="3"><?php /*<b>FREIGHT COST</b> */ ?>
			</td>
			
			<?php /*<td style="text-align:right;"> */ ?>
				<?php echo CHtml::hiddenField('TotalCostStd',
					NumberAndCurrency::formatCurrency($STD["TOTAL_COST"]->value),
					array('class'=>'span10', 
						'maxLength'=>10,
						'readonly'=>'readonly',
						'style'=>'text-align:right',
					)); 
				?>
			<?php echo $form->hiddenField($model,
					'TotalStandardCost', 
					array('class'=>'span5', 
						'id'=>'TotalCostStdinput',
						'maxLength'=>10,
						'readonly'=>'readonly',
						'value'=>$STD["TOTAL_COST"]->value,
						'style'=>'text-align:right',
					)); 
				?>
			<?php /*</td>*/ ?>

			<?php /*<td>IDR</td> */ ?>
			
			<td style="text-align:right;">FREIGHT COST </td>
			<td style="text-align:right;">
				<?php echo CHtml::textField('TotalCost',
					//NumberAndCurrency::formatCurrency(0), 
					NumberAndCurrency::formatCurrency($STD["TOTAL_COST"]->value),
					array('class'=>'span10', 
						'maxLength'=>10,
						'readonly'=>'readonly',
						'style'=>'text-align:right',
					)); 
				?>

				<?php echo $form->hiddenField($model,
					'TotalSalesCost', 
					array('class'=>'span5', 
						'id'=>'TotalCostinput',
						'maxLength'=>10,
						'readonly'=>'readonly',
						'value'=>$STD["TOTAL_COST"]->value,
						'style'=>'text-align:right',
					)); 
				?>
			</td>
			<td>IDR</td>
		</tr>
		
		<tr>
			<td style="text-align:right;" colspan="3"><?php /*<b>FREIGHT COST PER MT</b>*/ ?>
			</td>
			<?php /*<td style="text-align:right;">*/ ?>
				<?php echo CHtml::hiddenField('costPerMtStd',
					NumberAndCurrency::formatCurrency($STD["TOTAL_COST"]->value / $Quan), 
					array('class'=>'span10', 
						'maxLength'=>10,
						'readonly'=>'readonly',
						'style'=>'text-align:right',
					)); 
				?>
			<?php /*</td>*/ ?>
			<?php /*<td>IDR</td>*/ ?>
			
			<td style="text-align:right;">FREIGHT COST PER MT</td>
			<td style="text-align:right;">
				<?php echo CHtml::textField('costPerMtSales',
					NumberAndCurrency::formatCurrency($STD["TOTAL_COST"]->value / $Quan), 
					array('class'=>'span10', 
						'maxLength'=>10,
						'readonly'=>'readonly',
						'style'=>'text-align:right',
					)); 
				?>
			</td>
			<td>IDR</td>
		</tr>
		</tr>
	</table>

</div>





</div>
<?php
	}
	}
?>


<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>



<?php $this->endWidget(); ?>