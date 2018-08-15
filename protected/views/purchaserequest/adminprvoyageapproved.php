<?php

$this->breadcrumbs=array(
	'Purchase Requests'=>array('index'),
	'Manage',
);

	$TypePR = $model->TypePR;
	$SubTitle = "Purchase Request (PR)";
	if($TypePR  == "IM"){
		$SubTitle = "Internal Memo (IM)";
	}

	if($approved == 1){
		$statapproved = true;
		$statrejected = false;
		$alertype = "warning";
		echo PurchaseDisplayer::displayTabLabelPRVoyage($TypePR, $label, $this, 2);
	}
		
	if($approved == 0){
		$statapproved = false;
		$statrejected = true;
		$alertype = "error";
		echo PurchaseDisplayer::displayTabLabelPRVoyage($TypePR, $label, $this, 3);
	}
	

?>


<div id="content">
<?php
	$lbl = "";
	if($approved == 1)
		$lbl='approved';
		
	if($approved == 0)
		$lbl='rejected';
?>
<h2><?php echo ucwords($lbl); ?> <?php echo $SubTitle; ?> - <?php echo TextDisplayHelper::displayLabelFromMode($label); ?></h2>
<hr>
</div>

<div id='results'></div>
<div class="alert alert-block alert-<?php echo $alertype; ?>">This table inform about <?php echo $SubTitle; ?> datas that has been <?php echo $lbl; ?>. It can't be changed again.</div>
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
		//'PRNo',
		//'PRMonth',
		//'PRYear',
		
		//'id_po_category',
	
        array(  
                'name'=>'id_po_category',
                'value'=>'$data->PoCategory->category_name',
				/*
				'filter'=>CHtml::listData(PoCategory::model()->findAll(array(
					   'condition' => 'id_parent = :id_parent',
					   'params' => array(
						   ':id_parent' => "10400",
					   ),
				   )), 'id_po_category', 'category_name'),
                */     
				'filter'=>false,				

             ),

		'amount',
		//'metric',
        array(  
                'name'=>'metric',
                'value'=>'$data->MetricPr->metric_name',
                //'filter'=>CHtml::listData(MstMetricPr::model()->findAll(), 'metric', 'metric_name'),   
				'filter'=>false,

             ),
		//'dedicated_to',
		//'id_vessel',
		//'id_voyage_order',
		'notes',

		//'is_mutliple_item',
		//'requested_user',
		//'requested_date',
		//'ip_user_requested',
		//'Status',
        array(  
                'name'=>'Status',
                //'filter'=>array('PR'=>'PR','PR APPROVED'=>'PR APPROVED', 'PR REJECTED'=>'PR REJECTED', 'PO'=>'PO','GOOD RECEIVE','GOOD RECEIVE'),
				'filter'=>false,
                ),

		//'approved_user',
		//'approval_date',
		//'ip_user_approved',
		
		array(
		 'class'=>'bootstrap.widgets.TbButtonColumn',
		 'buttons'=>array(
			'view'=>array('url'=>'Yii::app()->createUrl("purchaserequest/additemprvoyage/action/view", array("id"=>$data->id_purchase_request, "mode"=>"'.$label.'"))'),
			'update'=>array('visible'=>'false'),
			'delete'=>array('visible'=>'false'),
			),
		
		),
),
)); ?> 


