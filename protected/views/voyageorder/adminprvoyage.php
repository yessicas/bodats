<?php
$this->breadcrumbs=array(
	'Voyage Orders',
);

$this->menu=array(
	array('label'=>'PR Voyage','url'=>array('create'), 'active'=>true),
);

$TypePR = "PR";
$SubTitle = "Purchase Request (PR)";
if($TypePR  == "IM"){
	$SubTitle = "Internal Memo (IM)";
}

echo PurchaseDisplayer::displayTabLabelPRVoyage($TypePR, $mode, $this, 1);
?>
<div id="content">
<h2>PR <?php echo $mode; ?></h2>
<hr>
</div>

<?php /*
<table  class="items table table-striped table-bordered table-condensed">
<thead>
<tr>
	<th>No.</th>
	<th>Type Order</th>
	<th>Voyage Number</th>
	<th>Tug</th>
	<th>Barge</th>
	<th>Date</th>
	<th>Port Of Loading</th>
	<th>Port Of Unloading</th>
	<th>Status</th>
	<th>PR Voyage</th>
</tr>
</thead>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_viewadminprvoyage',
)); ?>
</table>
*/
?>


<?php 
	echo VoyageOrderDisplayer::displayVOPositionImage($model->status);
	$hour = '';
?>

<?php $this->widget('SpecialTbGridView',array(
'id'=>'grid',
'type' => 'bordered condensed',
'dataProvider'=>$model->search(),
'filter'=>$model,
//'param1'   => 'param1',
'columns'=>array(
		//'id_voyage_order',
		//'VONo',
		//'VOMonth',
		//'VOYear',
		
		//'id_quotation',
		//'id_so',
		//'id_voyage_order_plan',
		//'status',
         array(
        'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            ),
		/*
         array(
        'header'=>'No',    'value'=>'$this->grid->param1',
            ),
        */
        //'VoyageOrderNumber',
		//'bussiness_type_order',
         array(  
                'header'=>'Type',
                'name'=>'bussiness_type_order',
                'value'=>'$data->BussinessTypeOrder->bussiness_type_order',
                'filter'=>CHtml::listData(BussinessTypeOrder::model()->findAll(),'id_bussiness_type_order', 'bussiness_type_order'),
                ),
		'VoyageNumber',
		
		array(  
                'header'=>'Customer',
                //'name'=>'',
               //'value'=>'$data->Quotation->Customer->CompanyName',
			   'value'=>function($data) {
					if(isset($data->Quotation)){
                        return ($data->Quotation->Customer) ? $data->Quotation->Customer->CompanyName : "-";
					}else{
						return "-- QUOTATION DELETE -- ";
					}
                },
                ),
		'VoyageNumber',
		
		//'BargingVesselTug',
		//'BargingVesselBarge',

        array(  'header'=>'Tug',
                'name'=>'BargingVesselTug',
                //'value'=>'$data->VesselTug->VesselName',
				 'value'=>function($data) {
					if(isset($data->VesselTug)){
                        return $data->VesselTug->VesselName;
					}else{
						return " -- TUG NOT FOUND -- (".$data->BargingVesselTug.")";
					}
                },
                'filter'=>CHtml::listData(Vessel::model()->findAll(array(
                       'condition' => 'VesselType = :VesselType',
                       'params' => array(
                           ':VesselType' => "TUG",
                       ),
                   )), 'id_vessel', 'VesselName'),
                           

             ),

         array(  'header'=>'Barge',
                'name'=>'BargingVesselBarge',
                //'value'=>'$data->VesselBarge->VesselName',
				'value'=>function($data) {
					if(isset($data->VesselBarge)){
                        return $data->VesselBarge->VesselName;
					}else{
						return " -- BARGE NOT FOUND -- (".$data->BargingVesselBarge.")";
					}
                },
                'filter'=>CHtml::listData(Vessel::model()->findAll(array(
                       'condition' => 'VesselType = :VesselType',
                       'params' => array(
                           ':VesselType' => "BARGE",
                       ),
                   )), 'id_vessel', 'VesselName'),
                                       

             ),

        //'IdNodeDestination',
    

        array(  'header'=>'Port Of Loading',
                'name'=>'BargingJettyIdStart',
                //'value'=>'$data->JettyOrigin->JettyName',
				'value'=>function($data) {
					if(isset($data->JettyOrigin)){
                        return $data->JettyOrigin->JettyName;
					}else{
						return " -- JETTY NOT FOUND -- (".$data->BargingJettyIdStart.")";
					}
                },
                'filter'=>CHtml::listData(Jetty::model()->findAll(),'JettyId', 'JettyName'),
                ),
        //'IdNodeDestination',
        array(  'header'=>'Port Of Unloading',
                'name'=>'BargingJettyIdEnd',
                //'value'=>'$data->JettyDestination->JettyName',
				'value'=>function($data) {
					if(isset($data->JettyDestination)){
                        return $data->JettyDestination->JettyName;
					}else{
						return " -- JETTY NOT FOUND -- (".$data->BargingJettyIdEnd.")";
					}
                },
                'filter'=>CHtml::listData(Jetty::model()->findAll(),'JettyId', 'JettyName'),
                ),
       
        //array('header'=>'Start Date','name'=>'StartDate'),
		array(  'header'=>'Loading Date',
                'name'=>'StartDate',
                'value'=>'Timeanddate::getDisplayStandardDate($data->StartDate)',
                ),
        //array('header'=>'End Date','name'=>'ActualEndDate'),
		//'BargeSize',
		//'Capacity',
		//'TugPower',
		//'BargingJettyIdStart',
		//'BargingJettyIdEnd',
        /*
        array(  
                'name'=>'Price',
                'value'=>'$data->Price." ".$data->Currency->currency',
                ),
        */
		/*
        array(  'header'=>'Status',
                'name'=>'status',
                'value'=>'VoyageOrderDisplayer::getStatusVoyageOrder($data->status)',
                //'filter' =>array('VO SAILING'=>'VO SAILING','VO FINISH'=>'VO FINISH'),
                ),
			*/
        //array('name'=>'status' , 'filter' =>array('VO SAILING'=>'VO SAILING','VO FINISH'=>'VO FINISH')),
        /*
		'StartDate',
		'EndDate',
		'ActualStartDate',
		'ActualEndDate',
		'period_year',
		'period_month',
		'period_quartal',
		'Price',
		'id_currency',
		'change_rate',
		'fuel_price',
		'created_date',
		'created_user',
		'ip_user_updated',
		*/
	/*
	array('header'=>'PR Voyage',
       'type'=>'raw',
       'htmlOptions'=>array('width'=>'240px'),
        'value'=>'"
		<table class=\"items table table-striped table-bordered table-condensed\">
			<tr>
				<td>PR Agency</td>
				<td>Created</td>
				<td>Create</td>
			</tr>
			<tr>
				<td>PR</td>
				<td>Created</td>
				<td>Update</td>
			</tr>
			<tr>
				<td>Sailing Order</td>
				<td>Created</td>
				<td>Update</td>
			</tr>
		</table>
        "',
	),
	*/
	array('header'=>'PR '.ucwords($mode),
       'type'=>'raw',
       'htmlOptions'=>array('width'=>'240px'),
        'value'=>
		function($data) use ($mode) {
			$datapr = PurchaseRequest::model()->findByAttributes(array('id_voyage_order'=>$data->id_voyage_order));
			if(!empty($datapr)){
				$statusAgency = "created";
			}else{
				$statusAgency = "uncreated";
				$datapr = new PurchaseRequest();
				$datapr->Status ="PR";
			}
			
			if($datapr->Status == "PR"){
				//PR Agency
				//$statusAgency = PurchaseRequestDB::getStatusPRFromVO($data->id_voyage_order);
				if($statusAgency == "created"){
					$updateAgency = CHtml::link('Update',array('purchaserequest/prvoyage', 'id'=>$data->id_voyage_order, 'mode'=>'agency', 'action'=>'update'));
					$viewAgency = CHtml::link('View',array('purchaserequest/additemprvoyage', 'id'=>$datapr->id_purchase_request, 'mode'=>'agency', 'action'=>'view'));
					$navigationAgency = $updateAgency.' | '.$viewAgency;
				}else{
					$navigationAgency = CHtml::link('Create',array('purchaserequest/prvoyage', 'id'=>$data->id_voyage_order, 'mode'=>'agency', 'action'=>'create'));
				}
			
				return 
				'<table class="items table table-striped table-bordered table-condensed">
					<tr>
						<td width="70px">PR '.ucwords($mode).'</td>
						<td width="50px">'.$statusAgency.'</td>
						<td>'.$navigationAgency.'</td>
					</tr>
				</table>';
			}else{
				return 
				'<table class="items table table-striped table-bordered table-condensed">
					<tr>
						<td>PR '.ucwords($mode).' has been '.PurchaseDisplayer::getStatusPurchaseRequest($datapr->Status).'</td>
					</tr>
				</table>';
			}
		}
		,
	),
),
)); ?> 