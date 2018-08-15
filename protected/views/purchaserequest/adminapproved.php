
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

/*
$this->menu=array(
array('label'=>'Manage  Purchase Request','url'=>array('purchaserequest/admin')),
array('label'=>'Purchase Request Appproved','url'=>array('purchaserequest/prapproved')),
array('label'=>'Purchase Request Rejected','url'=>array('purchaserequest/prrejected')),
//array('label'=>'Purchase Order','url'=>array('purchaserequest/po')),
array('label'=>'Create Purchase Request','url'=>array('purchaserequest/create')),
);
*/
	if($status == "approved")
		PurchaseDisplayer::displayTabLabelPRApproval($this, 2);
		
	if($status == "rejected")
		PurchaseDisplayer::displayTabLabelPRApproval($this, 3);
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
<h2><?php echo ucwords($status); ?> Purchase Request (PR) - <?php echo TextDisplayHelper::displayLabelFromMode($mode); ?></h2>
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
		'PRNumber',
        array(   
                'header'=>'PR.Date',
                'name'=>'PRDate',
                'value'=>'Yii::app()->dateFormatter->formatDateTime($data->PRDate, "medium","")',
                //'filter'=>CHtml::listData(Owner::model()->findAll(),'id_owner', 'owner_name'),
               // 'filter'=>array("GROUP"=>"GROUP","NON-GROUP"=>"NON-GROUP"),
                ),
		//'PRDate',
		//'PRNo',
		//'PRMonth',
		//'PRYear',
		
		//'id_po_category',
		/*
        array(  
                'name'=>'id_po_category',
                'value'=>'$data->PoCategory->category_name',
                        'filter'=>CHtml::listData(PoCategory::model()->findAll(
							   //array(
                               //'condition' => 'id_parent = :id_parent',
                               //'params' => array(
                               //    ':id_parent' => "10400",
                               //)),
                           
						   ), 'id_po_category', 'category_name'),
                           

             ),
		*/	 
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
                            'url'=> 'Yii::app()->createUrl("purchaserequest/viewpr",array("id"=>$data->id_purchase_request,"mode"=>$_GET["mode"]))',
                            'label'=>'View PR',
                            'options'=>array(
                               // 'class'=>'various fancybox.ajax',
                                'class'=>'',
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
		//'requested_user',
		//'requested_date',
		//'ip_user_requested',
		//'Status',
        array(  
                'name'=>'Status',
				'value'=>'PurchaseDisplayer::getStatusPurchaseRequest($data->Status)',
				'filter'=>false,
                //'filter'=>array('PR'=>'PR','PR APPROVED'=>'PR APPROVED', 'PR REJECTED'=>'PR REJECTED', 'PO'=>'PO','GOOD RECEIVE','GOOD RECEIVE'),
                ),

		'approved_user',
		'approval_date',
         array(
        'header'=>'Appproval Lead Time',    
                //'value'=>'PurchaseRequestDB::getLeadTime($data->PRDate,date("Y-m-d"))',
                'value'=>function($data) {
                return (PurchaseRequestDB::getLeadTime($data->PRDate,$data->approval_date) > 0) ? PurchaseRequestDB::getLeadTime($data->PRDate,$data->approval_date)." day" : "-";
                },
                'cssClassExpression' => 'PurchaseRequestDB::getLeadTimeColor($data->PRDate,$data->approval_date)',
                'htmlOptions'=>array('style'=>'width:50px;text-align:center;'),
            ),
		//'ip_user_approved',
		
		/*
		array(
			 'class'=>'bootstrap.widgets.TbButtonColumn',
			 'buttons'=>array(
					
								'view'=>array('visible'=>'$data->Status=="PR"'),

								'update'=> array('visible'=>'$data->Status=="PR"'),

								 'delete'=>array('visible'=>'$data->Status=="PR"'),


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

