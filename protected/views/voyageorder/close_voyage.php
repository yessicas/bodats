<?php
	$this->breadcrumbs=array(
		'Voyage Orders'=>array('index'),
		'Manage',
	);

	/*
	$this->menu=array(
	array('label'=>'Close Voyage Order','url'=>array('voyageorder/close_voyage')),
	//array('label'=>'NEW VO','url'=>array('voyageorder/new_vo')),
	//array('label'=>'Running VO','url'=>array('voyageorder/running_vo')),
	//array('label'=>'Finished VO','url'=>array('voyageorder/finished_vo')),
	);
	*/

	VoyageOrderDisplayer::displayTabLabelVoyageClosed($this,1);

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
<h2>Voyage Closing</h2>
<hr>
</div>

<?php 
	echo VoyageOrderDisplayer::displayVOPositionImage($model->status);
	$hour = '';
?>

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
if(Yii::app()->user->hasFlash('error')):?>

<div class = "animated flash">
    <?php
    $this->widget('bootstrap.widgets.TbAlert', array(
    'block' => true,
    'fade' => true,
    'closeText' => '&times;', // false equals no close link
    'alerts' => array( // configurations per alert type
        // success, info, warning, error or danger
        'error' => array('closeText' => '&times;'), 

    ),
    ));
    ?>
</div>

<?php endif; ?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'voyage-order-grid',
'type' => 'striped bordered condensed',
'dataProvider'=>$model->searchbystatusrunningANDfinish(),
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
		array(  
                'header'=>'Type',
                'name'=>'bussiness_type_order',
                'value'=>'$data->BussinessTypeOrder->bussiness_type_order',
                'filter'=>CHtml::listData(BussinessTypeOrder::model()->findAll(),'id_bussiness_type_order', 'bussiness_type_order'),
                ),
		array(  
                'header'=>'Customer',
                'name'=>'CompanyNameFull',
                'value'=>'$data->Quotation->Customer->CompanyName',
                ),
         'VoyageNumber',
        //'VoyageOrderNumber',
		//'bussiness_type_order',
         
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
                'value'=>'$data->JettyOrigin->JettyName',
                'filter'=>CHtml::listData(Jetty::model()->findAll(),'JettyId', 'JettyName'),
                ),
        //'IdNodeDestination',
        array(  'header'=>'Port Of Unloading',
                'name'=>'BargingJettyIdEnd',
                'value'=>'$data->JettyDestination->JettyName',
                'filter'=>CHtml::listData(Jetty::model()->findAll(),'JettyId', 'JettyName'),
                ),
       
        
         array(
         		'header'=>'Start Date',
                'name'=>'ActualStartDate',
                'value'=>'Yii::app()->dateFormatter->formatDateTime($data->ActualStartDate, "medium","short")',
                ),
        //array('header'=>'End Date','name'=>'ActualEndDate'),
		//'BargeSize',
		array(
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
		/*
        array(
			'name'=>'status' , 
			//'filter' =>array('VO SAILING'=>'VO SAILING','VO FINISH'=>'VO FINISH')
			'filter'=>false,
		),
		*/
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
		array('header'=>'Closed Voyage Feature',
			   'type'=>'raw',
			   'htmlOptions'=>array('width'=>'140px'),
				'value'=>'"
				Closed Voyage Report <br>
				Timesheet <br>
				PR Intencive <br>
				PR Agency <br>
				Cost actual Agency <br>
				PR Outbond <br>
				Debit Note <br>
				Closed Voyage Document <br>
				"',
				),

		array('header'=>'Status Created',
			   'type'=>'raw',
			   'htmlOptions'=>array('width'=>'50px'),
				'value'=>'
				VoyageCloseDB::GetStatusClosedVoyageReport($data->status)."<br>".
				VoyageCloseDB::GetviewstatusvoyageTimeSheet($data->id_voyage_order)."<br>".
				""."<br>".
				""."<br>".
				""."<br>".
				""."<br>".
				""."<br>".
				VoyageCloseDB::Getviewstatusvoyageclosedocument($data->id_voyage_order)."<br>"
				',
			),
		*/

	array('header'=>'Voyage Closing Requirement',
       'type'=>'raw',
       'htmlOptions'=>array('width'=>'250px'),
        'value'=>
		function($data)  {			
			//Close Voyage Report
			$status_close_voy_report = VoyageCloseDB::getVoyageCloseReportStatus($data->id_voyage_order);
			if(!$status_close_voy_report){
				$status_close_voy_report_text = "Not Yet";
				$nav_voy_closed = CHtml::link("Create",Yii::app()->createUrl("voyageclose/create",array("id"=>$data->id_voyage_order)));
			}else{
				$status_close_voy_report_text = "Created";
				$nav_voy_closed = CHtml::link("View",Yii::app()->createUrl("voyageclose/view",array("id"=>$data->id_voyage_order)));
				$nav_voy_closed .= ' | '.CHtml::link("Update",Yii::app()->createUrl("voyageclose/update",array("id"=>$data->id_voyage_order)));
			}
			
			//Close Voyage Document
			$number_doc = VoyageCloseDB::getNumberOfVoyageDocumentStatus($data->id_voyage_order);
			if($number_doc <= 0){
				$status_close_voy_doc_text = "Not Yet";
				$nav_voy_closed_doc = CHtml::link("Create",Yii::app()->createUrl("voyageclose/create_voyage_document",array("id"=>$data->id_voyage_order)));
			}else{
				$status_close_voy_doc_text = "Uploaded <br>(".$number_doc." docs)";
				$nav_voy_closed_doc = CHtml::link("View",Yii::app()->createUrl("voyageclose/view_voyage_document",array("id"=>$data->id_voyage_order)));
				$nav_voy_closed_doc .= ' | '.CHtml::link("Update",Yii::app()->createUrl("voyageclose/create_voyage_document",array("id"=>$data->id_voyage_order)));
			}
			
			//TimeSheet
			$number_activity_timesheet = VoyageCloseDB::getNumberOfTimesheetActivity($data->id_voyage_order);
			$nav_timesheet_update = CHtml::link("Update",Yii::app()->createUrl("timesheet/update_daily",array("id"=>$data->id_voyage_order,"inVoyageClose"=>1)));
			$nav_timesheet_update .= ' | '. CHtml::link("View",Yii::app()->createUrl("timesheet/update_daily",array("id"=>$data->id_voyage_order,"inVoyageClose"=>1,"inView"=>1)));
			
			//Debit Note
			$number_activity_timesheet = VoyageCloseDB::getNumberOfTimesheetActivity($data->id_voyage_order);
			$nav_timesheet_update = CHtml::link("Update",Yii::app()->createUrl("timesheet/update_daily",array("id"=>$data->id_voyage_order,"inVoyageClose"=>1)));
			$nav_timesheet_update .= ' | '. CHtml::link("View",Yii::app()->createUrl("timesheet/update_daily",array("id"=>$data->id_voyage_order,"inVoyageClose"=>1,"inView"=>1)));
			
			//Demurage Cost
			$status_demurage_cost = DemurageCost::getDemurageCostStatus($data->id_voyage_order);
			if(!$status_demurage_cost){
				$status_demurage_cost_text = "Not Yet";
				$nav_demurage = CHtml::link("Create",Yii::app()->createUrl("demurageCost/create",array("idvo"=>$data->id_voyage_order)));
			}else{
				$model_demu_cost = DemurageCost::getDemurageCostValue($data->id_voyage_order);
				$status_demurage_cost_text = "Set (".NumberAndCurrency::formatCurrency($model_demu_cost->amount).")";
				//Tidak Perlu Pakai View
				$nav_demurage = CHtml::link("Update",Yii::app()->createUrl("demurageCost/update",array("id"=>$model_demu_cost->id_demurage_cost)));
			}

			//Debit Note
			$number_data_note = VoyageCloseDB::getNumberOfDebitNote($data->id_voyage_order);
			if($number_data_note <= 0){
				$status_debit_note_text = "Not Yet";
				$nav_debit_mote = CHtml::link("Create",Yii::app()->createUrl("voyageclose/listDN",array("id"=>$data->id_voyage_order)));
			}else{
				$status_debit_note_text = "(".$number_data_note." datas)";
				$nav_debit_mote = CHtml::link("View",Yii::app()->createUrl("voyageclose/listDN",array("id"=>$data->id_voyage_order,'mode'=>'view')));
				$nav_debit_mote .= ' | '.CHtml::link("Update",Yii::app()->createUrl("voyageclose/listDN",array("id"=>$data->id_voyage_order)));
			}


			// Intencive
			$number_intencive = VoyageCloseDB::getNumberOfIntencive($data->id_voyage_order);
			if($number_intencive <= 0){
				$status_intencive_text = "Not Yet";
				$nav_intencive = CHtml::link("Create",Yii::app()->createUrl("voyageclose/listincentive",array("id"=>$data->id_voyage_order)));
			}else{
				$status_intencive_text = "Created";
				$nav_intencive = CHtml::link("View",Yii::app()->createUrl("voyageclose/listincentive",array("id"=>$data->id_voyage_order,'mode'=>'view')));
				$nav_intencive .= ' | '.CHtml::link("Update",Yii::app()->createUrl("voyageclose/listincentive",array("id"=>$data->id_voyage_order)));
			}
			
			return 
			'<table class="items table table-striped table-bordered table-condensed">
				<tr>
					<td width="100px">Closed Voyage Report</td>
					<td width="60px">'.$status_close_voy_report_text.'</td>
					<td width="90px">'.$nav_voy_closed.'</td>
				</tr>
				<tr>
					<td>Closed Voyage Document</td>
					<td>'.$status_close_voy_doc_text.'</td>
					<td>'.$nav_voy_closed_doc.'</td>
				</tr>
				<tr>
					<td>Timesheet</td>
					<td>'.$number_activity_timesheet.' activities</td>
					<td>'.$nav_timesheet_update.'</td>
				</tr>
				<tr>
					<td>Cost Actual Update</td>
					<td>Not Yet</td>
					<td>-</td>
				</tr>
				<tr>
					<td>PR Agency (Rev.1)</td>
					<td>Not Yet</td>
					<td>-</td>
				</tr>
				<tr>
					<td>IM - Fuel & EHS Incentive</td>
					<td>'.$status_intencive_text.'</td>
					<td>'.$nav_intencive.'</td>
				</tr>
				<tr>
					<td>Debit Note</td>
					<td>'.$status_debit_note_text.'</td>
					<td>'.$nav_debit_mote.'</td>
				</tr>
				<tr>
					<td>Demurage Cost</td>
					<td>'.$status_demurage_cost_text.'</td>
					<td>'.$nav_demurage.'</td>
				</tr>
			</table>';
		}
		,
	),

	/*
	array(
		 'class'=>'bootstrap.widgets.TbButtonColumn',
		 'header'=>'Action',
		 //'template'=>'{close_voyage}{view_closed_voyage}{update_closed_voyage}{create_timesheet}{upload_document}{pr_intentive_fuel}{pr_intentive_ehs}{pr_outband}',
		'template'=>'
		 {close_voyage}{view_closed_voyage} | {update_closed_voyage}<br>
		 {create_timesheet}{view_timesheet} | {update_timesheet}<br>
		 {-}<br>
		 {-}<br>
		 {-}<br>
		 {-}<br>
		 {-}<br>
		 {create_voyage_document}{view_voyage_document} | {update_voyage_document}<br>',
		 
		 'htmlOptions'=>array('width'=>'120px'),
		'buttons'=>array(
						'close_voyage'=>
							array(
								'label'=>'Create',
								'url'=> 'Yii::app()->createUrl("voyageclose/create",array("id"=>$data->id_voyage_order))',
								'visible'=>'$data->status=="VO SAILING"',
								'options'=>array(
									'class'=>'',
									'rel'=>'',
									 'title'=>'Create Close Voyage',
								),
							),

							'view_closed_voyage'=>
							array(
								'label'=>'View',
								'url'=> 'Yii::app()->createUrl("voyageclose/view",array("id"=>$data->id_voyage_order))',
								'visible'=>'$data->status=="VO FINISH"',
								'options'=>array(
									'class'=>'',
									'rel'=>'',
									'title'=>'View Closed Voyage',
								),
							),

							'update_closed_voyage'=>
							array(
								'label'=>'Update',
								'url'=> 'Yii::app()->createUrl("voyageclose/update",array("id"=>$data->id_voyage_order))',
								'visible'=>'$data->status=="VO FINISH"',
								'options'=>array(
									'class'=>'',
									'rel'=>'',
									'title'=>'Update Closed Voyage',
								),
							),

							'create_voyage_document'=>
							array(
								'label'=>'Create',
								'url'=> 'Yii::app()->createUrl("voyageclose/create_voyage_document",array("id"=>$data->id_voyage_order))',
								'visible'=>'VoyageCloseDB::Getviewbottonvoyageclosedocument($data->id_voyage_order) == 0',
								'options'=>array(
									'class'=>'',
									'rel'=>'',
									 'title'=>'Create Close VoyageClosed Voyage Document',
								),
							),

							'update_voyage_document'=>
							array(
								'label'=>'Update',
								'url'=> 'Yii::app()->createUrl("voyageclose/create_voyage_document",array("id"=>$data->id_voyage_order))',
								'visible'=>'VoyageCloseDB::Getviewbottonvoyageclosedocument($data->id_voyage_order) == 1',
								'options'=>array(
									'class'=>'',
									'rel'=>'',
									 'title'=>'Update Close VoyageClosed Voyage Document',
								),
							),

							'view_voyage_document'=>
							array(
								'label'=>'View',
								'url'=> 'Yii::app()->createUrl("voyageclose/view_voyage_document",array("id"=>$data->id_voyage_order))',
								'visible'=>'VoyageCloseDB::Getviewbottonvoyageclosedocument($data->id_voyage_order) == 1',
								'options'=>array(
									'class'=>'',
									'rel'=>'',
									 'title'=>'View Close VoyageClosed Voyage Document',
								),
							),


							 'create_timesheet'=>
							array(
								'label'=>'Create',
								'url'=> 'Yii::app()->createUrl("timesheet/update_daily",array("id"=>$data->id_voyage_order,"inVoyageClose"=>1))',
								'visible'=>'VoyageCloseDB::GetviewbottonTimeSheet($data->id_voyage_order) == 0',
								'options'=>array(
									'class'=>'',
									'rel'=>'',
									 'title'=>'Create TimeSheet',
								),
							),

							'update_timesheet'=>
							array(
								'label'=>'Update',
								'url'=> 'Yii::app()->createUrl("timesheet/update_daily",array("id"=>$data->id_voyage_order,"inVoyageClose"=>1))',
								'visible'=>'VoyageCloseDB::GetviewbottonTimeSheet($data->id_voyage_order) == 1',
								'options'=>array(
									'class'=>'',
									'rel'=>'',
									 'title'=>'Update TimeSheet',
								),
							),

							'view_timesheet'=>
							array(
								'label'=>'View',
								'url'=> 'Yii::app()->createUrl("timesheet/update_daily",array("id"=>$data->id_voyage_order,"inVoyageClose"=>1,"inView"=>1))',
								'visible'=>'VoyageCloseDB::GetviewbottonTimeSheet($data->id_voyage_order) == 1',
								'options'=>array(
									'class'=>'',
									'rel'=>'',
									 'title'=>'View TimeSheet',
								),
							),
						),
		),
	*/
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

