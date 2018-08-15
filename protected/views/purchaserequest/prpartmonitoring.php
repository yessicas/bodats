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
	array('label'=>'PR Monitoring','url'=>array('purchaserequest/prtopomonitoring'), 'active'=>true),
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
<h2>PR Part, Consumable Stock & Asset - Monitoring</h2>
<hr>

</div>



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
		array('header'=>'Item',
		   'type'=>'raw',
		   'htmlOptions'=>array('width'=>'140px'),
			'value'=>
			function($data)  {
				return PurchaseRequestDB::getDetailItem($data);
			}
			,
		),
		
		'quantity',
		//'metric',
        array(  
                'name'=>'metric',
                'value'=>'$data->metric',
             ),
        array(
                'name'=>'PurchaseRequest.PRDate',
                'value'=>'Yii::app()->dateFormatter->formatDateTime($data->PurchaseRequest->PRDate, "medium","")',
                ),
		//'PRDate',
        array(  
                'name'=>'status',
				'value'=>'PurchaseDisplayer::getStatusPurchaseRequest($data->status)',
				'filter'=>false,
                //'filter'=>array('PR'=>'PR','PR APPROVED'=>'PR APPROVED', 'PR REJECTED'=>'PR REJECTED', 'PO'=>'PO','GOOD RECEIVE','GOOD RECEIVE'),
                ),
        array(
                'name'=>'approval_date',
                'value'=>'Yii::app()->dateFormatter->formatDateTime($data->approval_date, "medium","medium")',
                ),
		//'approval_date',
		
		//'id_po_category',
		/*
		array(  
		'name'=>'id_po_category',
		'value'=>'$data->PoCategory->category_name',
				'filter'=>PurchaseRequestDB::getPRCategory(),
		),
		*/
		
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
		//'notes',
		'PurchaseRequest.PRNumber',
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

<?php 
$this->widget('application.extensions.fancybox.EFancyBox', array(
    'target'=>'.popup_foto',
    'config'=>array(
        'maxWidth'    => 800,
        'maxHeight'   => 600,
        'fitToView'   => false,
        'width'       => 600,
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
        'width'       => 600,
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
