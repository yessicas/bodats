<?php
$this->breadcrumbs=array(
	'Voyage Orders'=>array('index'),
	'Manage',
);

/*
$this->menu=array(
array('label'=>'New Shipping Order','url'=>array('voyageorder/propose')),
array('label'=>'NEW VO','url'=>array('voyageorder/new_vo')),
array('label'=>'Running VO','url'=>array('voyageorder/running_vo')),
array('label'=>'Finished VO','url'=>array('voyageorder/finished_vo')),
);
*/

VoyageOrderDisplayer::displayTabLabelSailingOrder($this,1);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('voyage-order-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<div id="content">
<h2>Create Sailing Order</h2>
<hr>
</div>

<?php
if(Yii::app()->user->hasFlash('success')):?>

<div class = "animated flash">
	<?php
    $this->widget('bootstrap.widgets.TbAlert', array(
    'block' => true,
    'fade' => true,
    'closeText' => '&times;', // false equals no close link
    'alerts' => array( // configurations per alert type
        // success, info, warning, error or danger
        'success' => array('closeText' => '&times;'), 

    ),
	));
	?>
</div>

<?php endif; ?>

<?php 
	echo VoyageOrderDisplayer::displayVOPositionImage($model->status, "You may create sailing order to make voyage change status into sailing.
	");
?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'voyage-order-grid',
'type' => 'striped bordered condensed',
'dataProvider'=>$model->searchbystatucreate(),
'filter'=>$model,
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
        
        'VoyageOrderNumber',
		'VoyageNumber',
		//'bussiness_type_order',
         array(  
                'name'=>'bussiness_type_order',
                'value'=>'$data->BussinessTypeOrder->bussiness_type_order',
                'filter'=>CHtml::listData(BussinessTypeOrder::model()->findAll(),'id_bussiness_type_order', 'bussiness_type_order'),
                ),
		array(  
                'header'=>'Customer',
                //'name'=>'',
                'value'=>'$data->Quotation->Customer->CompanyName',
                ),
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
						return " -- Barge NOT FOUND -- (".$data->BargingVesselBarge.")";
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
						return " -- Jetty NOT FOUND -- (".$data->BargingJettyIdStart.")";
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
						return " -- Barging NOT FOUND -- (".$data->BargingJettyIdEnd.")";
					}
				},
                'filter'=>CHtml::listData(Jetty::model()->findAll(),'JettyId', 'JettyName'),
                ),
		//'BargeSize',
		//'Capacity',
        array(  
				'header'=>'Capacity (MT)',
                'name'=>'Capacity',
                'value'=>'NumberAndCurrency::formatNumber($data->Capacity)',
                ),
		//'TugPower',
		//'BargingJettyIdStart',
		//'BargingJettyIdEnd',
		/*
        array(  
                'name'=>'Price',
                'value'=>'$data->Price." ".$data->Currency->currency',
                ),
		*/	
		array(  'header'=>'Loading Date',
                'name'=>'StartDate',
                'value'=>'Timeanddate::getDisplayStandardDate($data->StartDate)',
                ),
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
		array(
		'header'=>'Create Sailing Order',
		'htmlOptions'=>array('width'=>'140px'),
		'class'=>'bootstrap.widgets.TbButtonColumn',
		'template'=>'{create_so}',
		'buttons'=>array(
                'create_so'=>
                    array(
                        'label'=>'Create Sailing Order',
                        'url'=> 'Yii::app()->createUrl("sailingorder/create",array("id"=>$data->id_voyage_order))',
                        'options'=>array(
                            'class'=>'',
                            'rel'=>'',
                        ),
                    ),

                    ),
		),
		*/
		
		array('header'=>'Sailing Order Preparation',
		   'type'=>'raw',
		   'htmlOptions'=>array('width'=>'250px'),
			'value'=>
			function($data)  {			
				//PR Agency
				$datapr = PurchaseRequest::model()->findByAttributes(array('id_po_category'=>'20100','id_voyage_order'=>$data->id_voyage_order));
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
						$navigationAgency = CHtml::link('Create PR Agency',array('purchaserequest/prvoyage', 'id'=>$data->id_voyage_order, 'mode'=>'agency', 'action'=>'create'));
					}
				
				}else{
					$navigationAgency = 'PR Agency has been '.PurchaseDisplayer::getStatusPurchaseRequest($datapr->Status);
				}
				
				//Sailing Order	
				$status_so = VoyageOrderDB::getSailingOrder($data->id_voyage_order);
				if(!$status_so){
					$status_so_text = "Not Yet";
					$url_so = Yii::app()->createUrl("sailingorder/create",array("id"=>$data->id_voyage_order));
					$nav_so = CHtml::link("Create Sailing Order",$url_so);
				}else{
					$status_so_text = 'Created';
					$nav_so= "Created";
				}
				
				//Bunkering
				$url_bunkering = Yii::app()->createUrl("purchaserequest/prvessel",array("mode"=>"bunkering", 'idv'=>$data->BargingVesselTug, "idvo"=>$data->id_voyage_order));
				$nav_bunkering = CHtml::link("PR Bunkering",$url_bunkering);
				
				//ConsumableStock
				$url_cs = Yii::app()->createUrl("purchaserequest/prvessel",array("mode"=>"consumable_stock", 'idv'=>$data->BargingVesselTug, "idvo"=>$data->id_voyage_order));
				$nav_cs = CHtml::link("PR Consumable Stock",$url_cs);
				
				//Survey Bunkering
				$url_bunkering_survey = Yii::app()->createUrl("purchaserequest/prvessel",array("mode"=>"survey_bunker", 'idv'=>$data->BargingVesselTug, "idvo"=>$data->id_voyage_order));
				$nav_bunkering_survey = CHtml::link("PR Survey Bunkering",$url_bunkering_survey);
				
				return 
				'<table class="items table table-striped table-bordered table-condensed">
					
					<tr>
						<td>PR Survey Bunker</td>
						<td>'.$nav_bunkering_survey.'</td>
					</tr>
					<tr>
						<td>PR Bunkering</td>
						<td>'.$nav_bunkering.'</td>
					</tr>
					<tr>
						<td>PR Consumable Stock</td>
						<td>'.$nav_cs.'</td>
					</tr>
					<tr>
						<td>PR Agency (Rev.1)</td>
						<td>'.$navigationAgency.'</td>
					</tr>
					<tr>
						<td width="100px">Sailing Order</td>
						<td width="90px">'.$nav_so.'</td>
					</tr>
				</table>';
			}
			,
		),

),
)); ?> 

<?php 
$this->widget('application.extensions.fancybox.EFancyBox', array(
    'target'=>'.popup_foto',
    'config'=>array(
        'maxWidth'    => 800,
        'maxHeight'   => 600,
        'fitToView'   => false,
        'width'       => 400,
        'height'      => 'auto',
        'autoSize'    => false,
        'closeClick'  => false,
        'closeBtn'    =>true,  
      
       //'title'=>'dfsf',
        
        'helpers'=>array(
            'title'=>array( 'type' => 'inside' ), // inside or outside
            'overlay'=>array( 'closeClick' => false ), 
         
        ),
        'openEffect'  => 'elastic',
        'closeEffect' => 'elastic',
      

    ),
));
?>

<?php

$this->widget('application.extensions.fancybox.EFancyBox', array(
    'target'=>'.various',
    'config'=>array(
        'maxWidth'    => 800,
        'maxHeight'   => 600,
        'fitToView'   => false,
        'width'       => 400,
        'height'      => 'auto',
        'autoSize'    => false,
        'closeClick'  => false,
        'closeBtn'    =>true,  
      
       //'title'=>'dfsf',
        
        'helpers'=>array(
            'title'=>false, // inside or outside
            'overlay'=>array( 'closeClick' => false ), 
         
        ),
        'openEffect'  => 'elastic',
        'closeEffect' => 'elastic',
      

    ),
));
?>

