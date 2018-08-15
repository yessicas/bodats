

<?php
$this->breadcrumbs=array(
	'Vessel Utilization'=>array('utilitas'),
);
?>


<?php
$this->menu=array(

array('label'=>'Voyage On Sailing','url'=>array('dashboard/onsailing')),
array('label'=>'Approve & Lock Sales Plan','url'=>array('dashboard/vesuti')),
//array('label'=>'Create FuelConsumptionDaily','url'=>array('create')),

);
?>

<div id="content">
<h2>Dashboard </h2>
<hr>
</div>


<style>
table td, table th {
    padding: 5px 5px 0 5px;
    text-align: center;
    border: 1px solid #87A1A2;
    font-size: 9px;
}

th {
	font-weight: bold;
	color:white;
	line-height: 15px;
}

td{
	color: black;
}

.row-fluid .spancenter {
    width: 65.4468%;
}

}

</style>

<?php 
$timestamp = Timeanddate::getCurrentDate();
?>


<h4 style="color:#BD362F; font-size:12px;">	Current Date : <?php echo Yii::app()->dateFormatter->formatDateTime($timestamp,'medium',''); ?> </h4>

<table border="1px solid black" cellspacing=0 cellpadding=0 width=100%>

<tr>
<th width=10%  bgcolor="White" style="border: 0px solid black;"> 1 </th>
<th width=6%   bgcolor="White" style="border: 0px solid black;"> name </th>
<th width=36%  bgcolor="White" style="border: 0px solid black;"> 3 </th>
<th width=20%  colspan="2" bgcolor="#1A354F" style="border: 0px solid black; padding-bottom:4px;"> UTILIZATION</th>
<th width=2%   bgcolor="White" style="border: 0px solid black;"> 3 </th>
<th width=18%  colspan="2" bgcolor="#1A354F" style="border: 0px solid black; padding-bottom:4px;"> FUEL </th>

</tr>

<tr>
<th width=10%  bgcolor="White" style="border: 0px solid black;"> 1 </th>
<th width=6%   bgcolor="White" style="border: 0px solid black;"> name </th>
<th width=36%  bgcolor="White" style="border: 0px solid black;"> 3 </th>
<th width=9%  bgcolor="white" style="border: 0px solid black; color:#000 "> of current day </th>
<th width=9%  bgcolor="white" style="border: 0px solid black; color:#000 "> of month </th>
<th width=2%  bgcolor="White" style="border: 0px solid black;"> 3 </th>
<th width=6%   bgcolor="white" style="border: 0px solid black; color:#fff; text-align:left;">  </th>
<th width=12%   bgcolor="white" style="border: 0px solid black; color:#fff; text-align:left;">  </th>

</tr>

<tr>

<th width=10%  bgcolor="green" style="vertical-align:middle; border: 0px solid white;">  <font style="font-size:11px;"> PATRIA 1 - AURIGA </font> <br> 
<font style="font-size:9px;"> 300 feet, 1800 </font> <br>
TBN - MBH [SGI] </th>

<th width=6%  bgcolor="White" style="border: 0px solid white; color:#000; "> 
	<div style="margin-bottom:10px; text-align:left;"> Voyage </div>
	<div style="margin-bottom:10px; text-align:left;"> Idle </div>
	<div style="margin-bottom:0px; text-align:left;"> Breakdown </div>

	</th>

<th width=36%  bgcolor="#fff" style="vertical-align:top; border:0px solid black;"> 

			   
			    <div style="width:100%">
			        <div class="panjangmerah">
			                   <span class="bar_name">100%</span>
			        </div>
			    </div>

			     
			    <div style="width:20%">
			        <div class="panjangkuning">
			                  <span class="bar_name">20%</span>
			        </div>
			    </div>

			     
			    <div style="width:50%">
			        <div class="panjanghijau" style="margin-bottom:5px;">
			        <span class="bar_name">50%</span>     
			        </div>
			    </div>
	
</th>

<th width=9%   bgcolor="#66ADF3" style="font-size:25px; vertical-align:middle; border-right:5px solid white;"> 62.5% </th>
<th width=9%   bgcolor="red" style="font-size:25px; vertical-align:middle;"> 32.5% </th>

<th width=2%  bgcolor="White" style="border: 0px solid black;"> 3 </th>

<th width=6%   bgcolor="white" style="border: 0px solid black; color:#000; text-align:left;"> 

<div class="enter">	ROB </div>
<div class="enter">	Bunker </div>
<div class="enter">	Consumpt </div>

</th>

<th width=12%  bgcolor="#fff" style="vertical-align:top; border:0px solid black;"> 

			   
			    <div style="width:70%">
			        <div class="panjanghijaumuda">
			                   <span class="bar_name">3000</span>
			        </div>
			    </div>

			 
			    <div style="width:100%">
			        
			              <div class="panjangbiru">
			                   <span class="bar_name">5000</span>
			        </div>
			    </div>

			    <div style="width:90%">
			    <img src="repository/icon/alertmerah.png" width=20px style="float:right; margin: -3px -15px 0px 0px;" > 
			     <div class="panjangmerah" style="width:90%; margin-right:3px;">
			    	 <div class="panjangkuning" style="width:70%;"> 
			    	 	 <div class="panjanghijau" style="width:60%;"> 
			    	 	 	
			        	 	 
			        		 	<span class="bar_name">4300</span> 
			    </div>   		 	
			    </div>
			    </div>
			    </div>
	
</th>

</tr>






</table>
