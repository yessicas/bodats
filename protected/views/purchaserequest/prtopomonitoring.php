<style>
table tr td.oneday {
    background-color:#E8EC58 !important;
}
table tr td.twothreeday {
    background-color:#EA912C !important;
}

table tr td.morethreeday {
    background-color:#F26F68 !important;
}

</style>

	<?php
	$this->breadcrumbs=array(
		'Purchase Requests'=>array('index'),
		'Manage',
	);
	
	$this->menu=array(
	array('label'=>'PR to PO - Lead Time','url'=>array('purchaserequest/prtopomonitoring')),
	);
	?>

<style>
.labelclass{
color:#cd5934;
}

.labelclass:hover{
text-decoration:underline;
}
</style>



<div id="content">
<h2>PR to PO -  Lead Time Monitoring</h2>
<hr>

</div>

<div class="alert alert-info">Lead Time (delay) from PR Approval into creating PO</div>

<div id='results'></div>

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


<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'purchase-request-grid',
'dataProvider'=>$model->search(),
'type' => 'striped bordered condensed',
'filter'=>$model,
'columns'=>array(
		//'id_purchase_request',
         array(
        'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            ),
		'PRNumber',
        array(
                'name'=>'PRDate',
                'value'=>'Yii::app()->dateFormatter->formatDateTime($data->PRDate, "medium","")',
                ),
		//'PRDate',
        array(  
                'name'=>'Status',
				'value'=>'PurchaseDisplayer::getStatusPurchaseRequest($data->Status)',
				'filter'=>false,
                //'filter'=>array('PR'=>'PR','PR APPROVED'=>'PR APPROVED', 'PR REJECTED'=>'PR REJECTED', 'PO'=>'PO','GOOD RECEIVE','GOOD RECEIVE'),
                ),
        array(
                'name'=>'approval_date',
                'value'=>'Yii::app()->dateFormatter->formatDateTime($data->approval_date, "medium","medium")',
                ),
		//'approval_date',
		 array(
        'header'=>'Lead Time',    
        		//'value'=>'PurchaseRequestDB::getLeadTime($data->PRDate,date("Y-m-d"))',
        		'value'=>function($data) {
					return (PurchaseRequestDB::getLeadTime($data->approval_date,date("Y-m-d")) > 0) ? PurchaseRequestDB::getLeadTime($data->approval_date,date("Y-m-d"))." day" : "-";
				},
				'cssClassExpression' => 'PurchaseRequestDB::getLeadTimeColor($data->PRDate,date("Y-m-d"))',
        		'htmlOptions'=>array('style'=>'width:50px;text-align:center;'),
            ),
		//'PRNo',
		//'PRMonth',
		//'PRYear',
		
		//'id_po_category',

		array(  
		'name'=>'id_po_category',
		'value'=>'$data->PoCategory->category_name',
				'filter'=>PurchaseRequestDB::getPRCategory(),
		),

		'amount',
		//'metric',
        array(  
                'name'=>'metric',
                'value'=>'$data->MetricPr->metric_name',
                        'filter'=>CHtml::listData(MstMetricPr::model()->findAll(), 'metric', 'metric_name'),                                       

             ),
		//'dedicated_to',
		//'id_vessel',
		/*
        array(  
                'name'=>'id_vessel',
                'value'=>'CHtml::encode($data->Vessel->VesselName)',
                        'filter'=>CHtml::listData(Vessel::model()->findAll(array(
                               'condition' => 'VesselType = :VesselType',
                               'params' => array(
                                   ':VesselType' => "TUG",
                               ),
                           )), 'id_vessel', 'VesselName'),
                                               

             ),
			*/
		//'id_voyage_order',
		'notes',
		array(
		 'header'=>'View Detail PR',
		 'class'=>'bootstrap.widgets.TbButtonColumn',
		 'template'=>'{views}',
		 'buttons'=>array(
                    'views'=>
						array(
							//'icon'=>'share',
							'url'=> 'Yii::app()->createUrl("purchaserequest/viewpr",array("id"=>$data->id_purchase_request))',
							'label'=>'View PR',
							'options'=>array(
							    'class'=>'various fancybox.ajax',
								//'class'=>'',
								'rel'=>'',
								'title'=>'View PR',
							),
						),
					/*
					'update'=> array('visible'=>'$data->Status=="PR"'),
					'delete'=>array('visible'=>'$data->Status=="PR"'),
					*/
					),

			),
		//'is_mutliple_item',
		'requested_user',
		//'requested_date',
		//'ip_user_requested',
		//'Status',

		//'approved_user',
		//'approval_date',
		//'ip_user_approved',
		

				
		),
		)); ?> 



<table style="border: 0px solid black;">
 <tr>
  <td width=7% bgcolor="#E8EC58" style="border:0px solid white;"> </td>
  <td style="border: 1px solid white; text-align:left;"> 1 day </td>
</tr>

<tr>
  <td width=7% bgcolor="#EA912C" style="border:0px solid white;"> </td>
  <td style="border: 1px solid white; text-align:left;"> 2 - 3 days</td>
</tr>

<tr>
  <td width=7% bgcolor="#F26F68" style="border:0px solid white;"> </td>
  <td style="border: 1px solid white; text-align:left;"> > 3 days </td>
</tr>


  </table>


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
