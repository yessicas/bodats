<?php
$this->breadcrumbs=array(
	'Sales Costs'=>array('index'),
	'Manage',
);

$this->menu=array(
//array('label'=>'List SalesCost','url'=>array('index')),
//array('label'=>'Create SalesCost','url'=>array('create')),
array('label'=>'Calculator History','url'=>array('demand/salescost')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('sales-cost-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<div id="content">
<h2>Calculator History</h2>
<hr>

</div>


<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php //$this->renderPartial('/salescost/_search',array(
	//'model'=>$model,
//)); ?>
</div><!-- search-form -->



<?php 

// Header 

$header="
<thead>
<tr>
<th style='width:1%;' rowspan='2'>No</th>
<th rowspan='2'>Port Of Loading</th>
<th rowspan='2'>Port Of Unloading</th>
<th rowspan='2'>Barge Size</th>
<th rowspan='2'>Capacity</th>
<th rowspan='2'>Total Quantity</th>
<th rowspan='2'>Quantity Unit</th>
<th rowspan='2'>Price Unit</th>
<th rowspan='2'>Currency</th>
<th rowspan='2'>Total Revenue</th>
<th rowspan='2'>Fuel Ltr</th>
<th colspan = '12'>Standard Cost</th>
<th colspan = '12'>Sales Cost</th>
</tr>
";
$header.='<tr>';
$label= SalesCost::model()->attributeLabelsManualy();
// standard label
for ($i = 0; $i < count($label); $i++){
	$header.='<th>'.$label[$i].'</th>' ;
}
// statis standard Label
$header.='<th>GP</th>';
$header.='<th>Total Cost</th>';
// margin label 
for ($i = 0; $i < count($label); $i++){
	$header.='<th>'.$label[$i].'</th>' ;
}
// statis Margin Label
$header.='<th>GP</th>';
$header.='<th>Total Cost</th>';
$header.='</tr>';
$header.='</thead>';

// end of header 
?>



<?php $this->widget('components.TbGridViewNew',array(
'id'=>'sales-cost-grid',
'type' => 'striped bordered condensed',
'htmlOptions'=>array('style'=>'width:3500px'),
'dataProvider'=>$model->search(),
'headerCustom'=>true, // tambahan default nya false
'contentHeaderCustom'=>$header, // tambahan untuk  custom header
'filter'=>$model,
//'enableSorting'=>false,
'columns'=>array(
		//'id_sales_cost',
		array(
        'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
                ),
		//'JettyIdStart',
		//'JettyIdEnd',

		array(  'header'=>'Port Of Loading',
                'name'=>'JettyIdStart',
                'value'=>'$data->JettyOrigin->JettyName',
                'filter'=>CHtml::listData(Jetty::model()->findAll(),'JettyId', 'JettyName'),
                'htmlOptions'=>array('style'=>'width:100px'),
                ),
       
        array(  'header'=>'Port Of Unloading',
                'name'=>'JettyIdEnd',
                'value'=>'$data->JettyDestination->JettyName',
                'filter'=>CHtml::listData(Jetty::model()->findAll(),'JettyId', 'JettyName'),
                'htmlOptions'=>array('style'=>'width:100px'),
                ),

		array('name'=>'BargeSize','value'=>'NumberAndCurrency::formatCurrency($data->BargeSize)','htmlOptions'=>array('style'=>'text-align:right;width:100px')),
		array('name'=>'Capacity','value'=>'NumberAndCurrency::formatCurrency($data->Capacity)','htmlOptions'=>array('style'=>'text-align:right;width:100px')),
		array('name'=>'TotalQuantity','value'=>'NumberAndCurrency::formatCurrency($data->TotalQuantity)','htmlOptions'=>array('style'=>'text-align:right;width:100px'),'filter'=>false),
		array('name'=>'QuantityUnit','htmlOptions'=>array('style'=>'text-align:center;width:50px'),'filter'=>false),
		array('name'=>'PriceUnit','value'=>'NumberAndCurrency::formatCurrency($data->PriceUnit)','htmlOptions'=>array('style'=>'text-align:right;width:100px'),'filter'=>false),
		array(  'header'=>'Currency',
                'name'=>'id_currency',
                'value'=>'$data->Currency->currency',
                'filter'=>CHtml::listData(Currency::model()->findAll(),'id_currency', 'currency'),
                'htmlOptions'=>array('style'=>'text-align:center;width:50px'),
                'filter'=>false
                ),
		//'id_currency',
		//'change_rate',


		array('name'=>'TotalRevenue','value'=>'NumberAndCurrency::formatCurrency($data->TotalRevenue)','htmlOptions'=>array('style'=>'text-align:right'),'filter'=>false),
		array('name'=>'FuelLtr','value'=>'NumberAndCurrency::formatCurrency($data->FuelLtr)','htmlOptions'=>array('style'=>'text-align:right'),'filter'=>false),
		

		array('name'=>'FuelCost','value'=>'NumberAndCurrency::formatCurrency($data->FuelCost)','htmlOptions'=>array('style'=>'text-align:right'),'filter'=>false),
		array('name'=>'AgencyCost','value'=>'NumberAndCurrency::formatCurrency($data->AgencyCost)','htmlOptions'=>array('style'=>'text-align:right'),'filter'=>false),
		array('name'=>'DepreciationCost','value'=>'NumberAndCurrency::formatCurrency($data->DepreciationCost)','htmlOptions'=>array('style'=>'text-align:right'),'filter'=>false),
		array('name'=>'CrewCost','value'=>'NumberAndCurrency::formatCurrency($data->CrewCost)','htmlOptions'=>array('style'=>'text-align:right'),'filter'=>false),
		array('name'=>'SubconCost','value'=>'NumberAndCurrency::formatCurrency($data->SubconCost)','htmlOptions'=>array('style'=>'text-align:right'),'filter'=>false),
		array('name'=>'IncuranceCost','value'=>'NumberAndCurrency::formatCurrency($data->IncuranceCost)','htmlOptions'=>array('style'=>'text-align:right'),'filter'=>false),
		array('name'=>'RepairCost','value'=>'NumberAndCurrency::formatCurrency($data->RepairCost)','htmlOptions'=>array('style'=>'text-align:right'),'filter'=>false),
		array('name'=>'DockingCost','value'=>'NumberAndCurrency::formatCurrency($data->DockingCost)','htmlOptions'=>array('style'=>'text-align:right'),'filter'=>false),
		array('name'=>'BrokerageCost','value'=>'NumberAndCurrency::formatCurrency($data->BrokerageCost)','htmlOptions'=>array('style'=>'text-align:right'),'filter'=>false),
		array('name'=>'OthersCost','value'=>'NumberAndCurrency::formatCurrency($data->OthersCost)','htmlOptions'=>array('style'=>'text-align:right'),'filter'=>false),
		array('name'=>'GP_COGM','value'=>'NumberAndCurrency::formatCurrency($data->GP_COGM)." %"','htmlOptions'=>array('style'=>'text-align:right'),'filter'=>false),
		array('name'=>'TotalStandardCost','value'=>'NumberAndCurrency::formatCurrency($data->TotalStandardCost)','htmlOptions'=>array('style'=>'text-align:right'),'filter'=>false),
		
		/*
		'FuelCost',
		'AgencyCost',
		'DepreciationCost',
		'CrewCost',
		'SubconCost',
		'IncuranceCost',
		'RepairCost',
		'DockingCost',
		'BrokerageCost',
		'OthersCost',
		'GP_COGM',
		'TotalStandardCost',
		*/

		array('name'=>'MarginFuelCost','value'=>'NumberAndCurrency::formatCurrency($data->MarginFuelCost)." % | ".NumberAndCurrency::formatCurrency(addvaluepercented($data->MarginFuelCost,$data->FuelCost) )','htmlOptions'=>array('style'=>'text-align:right'),'filter'=>false),
		array('name'=>'MarginAgencyCost','value'=>'NumberAndCurrency::formatCurrency($data->MarginAgencyCost)." % | ".NumberAndCurrency::formatCurrency(addvaluepercented($data->MarginAgencyCost,$data->AgencyCost) )','htmlOptions'=>array('style'=>'text-align:right'),'filter'=>false),
		array('name'=>'MarginDepreciationCost','value'=>'NumberAndCurrency::formatCurrency($data->MarginDepreciationCost)." % | ".NumberAndCurrency::formatCurrency(addvaluepercented($data->MarginDepreciationCost,$data->DepreciationCost) )','htmlOptions'=>array('style'=>'text-align:right'),'filter'=>false),
		array('name'=>'MarginCrewCost','value'=>'NumberAndCurrency::formatCurrency($data->MarginCrewCost)." % | ".NumberAndCurrency::formatCurrency(addvaluepercented($data->MarginCrewCost,$data->CrewCost) )','htmlOptions'=>array('style'=>'text-align:right'),'filter'=>false),
		array('name'=>'MarginSubconCost','value'=>'NumberAndCurrency::formatCurrency($data->MarginSubconCost)." % | ".NumberAndCurrency::formatCurrency(addvaluepercented($data->MarginSubconCost,$data->SubconCost) )','htmlOptions'=>array('style'=>'text-align:right'),'filter'=>false),
		array('name'=>'MarginIncuranceCost','value'=>'NumberAndCurrency::formatCurrency($data->MarginIncuranceCost)." % | ".NumberAndCurrency::formatCurrency(addvaluepercented($data->MarginIncuranceCost,$data->IncuranceCost) )','htmlOptions'=>array('style'=>'text-align:right'),'filter'=>false),
		array('name'=>'MarginRepairCost','value'=>'NumberAndCurrency::formatCurrency($data->MarginRepairCost)." % | ".NumberAndCurrency::formatCurrency(addvaluepercented($data->MarginRepairCost,$data->RepairCost) )','htmlOptions'=>array('style'=>'text-align:right'),'filter'=>false),
		array('name'=>'MarginDockingCost','value'=>'NumberAndCurrency::formatCurrency($data->MarginDockingCost)." % | ".NumberAndCurrency::formatCurrency(addvaluepercented($data->MarginDockingCost,$data->DockingCost) )','htmlOptions'=>array('style'=>'text-align:right'),'filter'=>false),
		array('name'=>'MarginBrokerageCost','value'=>'NumberAndCurrency::formatCurrency($data->MarginBrokerageCost)." % | ".NumberAndCurrency::formatCurrency(addvaluepercented($data->MarginBrokerageCost,$data->BrokerageCost) )','htmlOptions'=>array('style'=>'text-align:right'),'filter'=>false),
		array('name'=>'MarginOthersCost','value'=>'NumberAndCurrency::formatCurrency($data->MarginOthersCost)." % | ".NumberAndCurrency::formatCurrency(addvaluepercented($data->MarginOthersCost,$data->OthersCost) )','htmlOptions'=>array('style'=>'text-align:right'),'filter'=>false),
		array('name'=>'GP_COGS','value'=>'NumberAndCurrency::formatCurrency($data->GP_COGS)." %"','htmlOptions'=>array('style'=>'text-align:right'),'filter'=>false),
		array('name'=>'TotalSalesCost','value'=>'NumberAndCurrency::formatCurrency($data->TotalSalesCost)','htmlOptions'=>array('style'=>'text-align:right'),'filter'=>false),
		


		/*
		'MarginFuelCost',
		'MarginAgencyCost',
		'MarginDepreciationCost',
		'MarginCrewCost',
		'MarginSubconCost',
		'MarginIncuranceCost',
		'MarginRepairCost',
		'MarginDockingCost',
		'MarginBrokerageCost',
		'MarginOthersCost',
		'GP_COGS',
		'TotalSalesCost',
		*/
		//'created_date',
		//'created_user',
		//'ip_user_updated',
	

	
/*
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),

*/

),
)); ?>



<?php 

/*


<div style="width:4000px" id="sales-cost-grid-manual" class="grid-view">
<!--<div class="summary">Displaying 1-2 of 2 results.</div>-->
<table class="items table table-striped table-bordered table-condensed">
<thead>
<tr>
<th style='width:1%;' rowspan='2'>No</th>
<th rowspan='2'>Port Of Loading</th>
<th rowspan='2'>Port Of Unloading</th>
<th rowspan='2'>Barge Size</th>
<th rowspan='2'>Capacity</th>
<th rowspan='2'>Total Quantity</th>
<th rowspan='2'>Price Unit</th>
<th rowspan='2'>Total Revenue</th>
<th rowspan='2'>Fuel Ltr</th>
<th colspan = '12'>Standard Cost</th>
<th colspan = '22'>Sales Cost</th>
</tr>


<?php
echo'<tr>';

$label= SalesCost::model()->attributeLabelsManualy();



// standard label
for ($i = 0; $i < count($label); $i++){
	echo '<th>'.$label[$i].'</th>' ;
}

// statis standard Label
echo'<th>GP</th>';
echo'<th>Total Cost</th>';




// margin label 
for ($i = 0; $i < count($label); $i++){
	echo '<th colspan="2">'.$label[$i].'</th>' ;
}

// statis Margin Label
echo'<th>GP</th>';
echo'<th>Total Cost</th>';

echo'</tr>';

?>

</thead>



<tbody>

<?php 
$dataSalesCost= SalesCost::model()->findAll();
$no=0;
foreach ($dataSalesCost as $list_dataSalesCost) {
	$no++;
	echo'<tr class="odd">';


	// statis field
	echo'<td style="text-align:center">'.$no.'</td>';
	echo'<td>'.$list_dataSalesCost->JettyOrigin->JettyName.'</td>';
	echo'<td>'.$list_dataSalesCost->JettyDestination->JettyName.'</td>';
	echo'<td style="text-align:right" >'.NumberAndCurrency::formatCurrency($list_dataSalesCost->BargeSize).'</td>';
	echo'<td style="text-align:right" >'.NumberAndCurrency::formatCurrency($list_dataSalesCost->Capacity).'</td>';
	echo'<td style="text-align:right" >'.NumberAndCurrency::formatCurrency($list_dataSalesCost->TotalQuantity).' '.$list_dataSalesCost->QuantityUnit.'</td>';
	echo'<td style="text-align:right" >'.NumberAndCurrency::formatCurrency($list_dataSalesCost->PriceUnit).' '.$list_dataSalesCost->Currency->currency.'</td>';	
	echo'<td style="text-align:right" >'.NumberAndCurrency::formatCurrency($list_dataSalesCost->TotalRevenue).'</td>';
	echo'<td style="text-align:right" >'.NumberAndCurrency::formatCurrency($list_dataSalesCost->FuelLtr).'</td>';




	// standard cost
	$field= SalesCost::model()->fieldSTDandSales();

	for ($iF = 0; $iF < count($field); $iF++){
		echo '<td style="text-align:right" >'.NumberAndCurrency::formatCurrency($list_dataSalesCost->$field[$iF]).'</td>' ;
	}

	// statis standard cost
	echo'<td style="text-align:right" >'.NumberAndCurrency::formatCurrency($list_dataSalesCost->GP_COGM).' % </td>';
	echo'<td style="text-align:right" >'.NumberAndCurrency::formatCurrency($list_dataSalesCost->TotalStandardCost).'</td>';



	// margin cost
	$fieldMargin= SalesCost::model()->fieldSTDandSales();

	for ($iFM = 0; $iFM < count($fieldMargin); $iFM++){
		$idField='Margin'.$fieldMargin[$iFM];
		echo '<td style="text-align:right" >'.NumberAndCurrency::formatCurrency($list_dataSalesCost->$idField).' % </td>';
		echo '<td style="text-align:right" >'.NumberAndCurrency::formatCurrency(addvaluepercented($list_dataSalesCost->$idField,$list_dataSalesCost->$fieldMargin[$iFM]) ).'</td>' ;
	}

	// statis margin cost
	echo'<td style="text-align:right" >'.NumberAndCurrency::formatCurrency($list_dataSalesCost->GP_COGS).' % </td>';
	echo'<td style="text-align:right" >'.NumberAndCurrency::formatCurrency($list_dataSalesCost->TotalSalesCost).'</td>';

	echo'</tr>';

}


?>



</tbody>
</table>
</div>

*/

?>




<?php
	function addvaluepercented($margin,$standar){

	$data = (($margin*$standar)/100)+$standar;
	return $data;
	}
?>
