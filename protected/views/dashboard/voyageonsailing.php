

<?php
$this->breadcrumbs=array(
	'Voyage On Sailing'=>array('voyageonsailing'),
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
<th width=10%  align="center" bgcolor="White" style="border: 0px solid white;"> 1 </th>
<th width=6%  align="left" bgcolor="White" style="border: 0px solid white;"> name </th>
<th width=57%  align="center" bgcolor="White" style="border: 0px solid white;"> 2 </th>
<th width=7%  align="center" bgcolor="White" style="border: 0px solid white;"> 3 </th>
<th width=7%  align="center" bgcolor="White" style="border: 0px solid white; color:#000"> GP</th>
<th width=3%  align="center" bgcolor="White" style="border: 0px solid white; color:#000"> Day </th>

</tr>


<tr>

<th width=10%  bgcolor="#BD362F" style="vertical-align:middle; border: 0px solid white;">  <font style="font-size:11px;"> PATRIA 1 - AURIGA </font> <br> 
<font style="font-size:9px;"> 300 feet, 1800 </font> <br>
TBN - MBH [SGI] </th>

<th width=6%  bgcolor="White" style="border: 0px solid white; color:#000; "> 
	<div style="margin-bottom:10px; text-align:left;"> Revenue </div>
	<div style="margin-bottom:10px; text-align:left;"> Std.Cost </div>
	<div style="margin-bottom:0px; text-align:left;"> Actual Cost </div>

	</th>

<th width=57%  bgcolor="#fff" style="vertical-align:top; border:0px solid black;"> 

			   <!-- <span class="bar_value">100%</span> -->
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

<th width=7%  bgcolor="#fff"    style="vertical-align:middle; border: 0px solid white;"> <img src="repository/icon/alertkuning.png" width=45px > </th>
<th width=7%   bgcolor="#E0AE03" style="font-size:25px; vertical-align:middle;"> 32.5% </th>

<th width=3%   bgcolor="#fff"    style="vertical-align:middle; border: 0px solid white;"> 
		<div style="background-color:white; margin-bottom:7px;"> 4 </div> 
		<div style="background-color:gray; margin-bottom:7px;"> 4 </div>
		<div style="background-color:red; margin-bottom:-2px;"> 4 </div> </th>
</tr>


<tr>
<th width=10%  align="center" bgcolor="White" style="border: 0px solid white;"> 1 </th>
<th width=6%   align="left" bgcolor="White" style="border: 0px solid white;"> name </th>
<th width=57%  align="center" bgcolor="White" style="border: 0px solid white;"> 2 </th>
<th width=7%   align="center" bgcolor="White" style="border: 0px solid white;"> 3 </th>
<th width=7%   align="center" bgcolor="White" style="border: 0px solid white; color:#000"> GP</th>
<th width=3%   align="center" bgcolor="White" style="border: 0px solid white; color:#000"> Day </th>

</tr>


<tr>

<th width=10%  bgcolor="#BD362F" style="vertical-align:middle; border: 0px solid white;">  <font style="font-size:11px;"> PATRIA 4 - ALYA </font> <br> 
<font style="font-size:9px;"> 300 feet, 1800 </font> <br>
TBN - MBH [SGI] </th>

<th width=6%  bgcolor="White" style="border: 0px solid white; color:#000; "> 
	<div style="margin-bottom:10px; text-align:left;"> Revenue </div>
	<div style="margin-bottom:10px; text-align:left;"> Std.Cost </div>
	<div style="margin-bottom:0px; text-align:left;"> Actual Cost </div>

	</th>

<th width=57%  bgcolor="#fff" style="vertical-align:top; border:0px solid black;"> 

			 <!--   <span class="bar_value">100%</span> ---->
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

<th width=7%  bgcolor="#fff" style="vertical-align:middle; border: 0px solid white;"> <img src="repository/icon/alertmerah.png" width=45px > </th>
<th width=7%  bgcolor="red"  style="font-size:25px; vertical-align:middle;"> -14.5% </th>

<th width=3%  bgcolor="#fff" style="vertical-align:middle; border: 0px solid white;"> 
		<div class="enter" style="background-color:white; "> 4 </div> 
		<div class="enter" style="background-color:gray; "> 4 </div>
		<div style="background-color:red; margin-bottom:-2px;"> 4 </div> </th>

</tr>

</table>








<?php /*

$KoolControlsFolder = "KoolPHPSuite/KoolControls";//Relative path to "KoolPHPSuite/KoolControls" folder
	
	require $KoolControlsFolder."/KoolChart/koolchart.php";
 
	$chart = new KoolChart("chart");
	$chart->scriptFolder=$KoolControlsFolder."/KoolChart";
	$chart->Height = 100;
    $chart->Width = 400;
    $chart->FontSize = "11px";
    $chart->Padding = 2;
	//$chart->Title->Text = "";
	$chart->Title->Appearance->Visible = false;
	//$chart->Legend->Appearance->Position = "top";
	$chart->Legend->Appearance->Visible = false;
	$chart->PlotArea->XAxis->MajorGridLines->Visible = false;
    $chart->PlotArea->XAxis->MinorGridLines->Visible = false;
    $chart->PlotArea->XAxis->Color = "#fff";
   // $chart->PlotArea->XAxis->LabelsAppearance->Visible = true;
    $chart->PlotArea->Appearance->BackgroundColor = "#ffffff";
	$chart->PlotArea->YAxis->MajorGridLines->Visible = false;
    $chart->PlotArea->YAxis->MinorGridLines->Visible = false;
	$chart->PlotArea->XAxis->Title = "";
	$chart->PlotArea->XAxis->Set(array(""));
	$chart->PlotArea->YAxis->Title = "";
	$chart->PlotArea->YAxis->Color = "#fff";
	$chart->PlotArea->YAxis->LabelsAppearance->DataFormatString = "$ {0}";
	//$chart->PlotArea->YAxis->LabelsAppearance->Visible = false;
	$chart->PlotArea->YAxis->LabelsAppearance->Color = "#fff";
	$chart->PlotArea->YAxis->TitleAppearance->Visible = false;
   
	$series1 = new BarSeries();
	$series1->TooltipsAppearance->DataFormatString = " {0} ayee";
	$series1->ArrayData(array(100));
	$series1->Appearance->BackgroundColor = "blue";
	$chart->PlotArea->AddSeries($series1);

   
	$series2 = new BarSeries();
	$series2->TooltipsAppearance->DataFormatString = " {0} ayee";
	$series2->ArrayData(array(90));
	$series2->Appearance->BackgroundColor = "green";
	$chart->PlotArea->AddSeries($series2);


	$series2 = new BarSeries();
	$series2->TooltipsAppearance->DataFormatString = " {0} ayee";
	$series2->ArrayData(array(150));
	$series2->Appearance->BackgroundColor = "red";
	$chart->PlotArea->AddSeries($series2);  

<form id="form1" method="post">
 	<?php //echo $chart->Render();?>	</form> 

	*/



?> 




