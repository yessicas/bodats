<?php
$this->breadcrumbs=array(
	'Purchase Requests'=>array('index'),
	$model->id_purchase_request,
);

$this->menu=array(
	array('label'=>'Manage  Purchase Request','url'=>array('purchaserequest/admin')),
	array('label'=>'Create Purchase Request','url'=>array('purchaserequest/create')),
	array('label'=>'View Purchase Request','url'=>array('purchaserequest/view','id'=>$model->id_purchase_request)),
	array('label'=>'Update Purchase Request','url'=>array('purchaserequest/update','id'=>$model->id_purchase_request)),
	array('label'=>'Delete Purchase Request','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_purchase_request),'confirm'=>'Are you sure you want to delete this item?')),
	);
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
<div id="content">
<h2>Update Purchase Request <?php echo $model->id_purchase_request; ?></h2>
<hr>
</div>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_purchase_request',
		'PRNumber',
		array(
            'name'=>'PRDate',
           'value'=>Yii::app()->dateFormatter->formatDateTime($model->PRDate, "medium",""),
           ),
	//	'PRDate',
		//'PRNo',
		//'PRMonth',
		//'PRYear',
		//'id_po_category',
		array('label'=>'PO Category','value'=>$model->PoCategory->category_name),
		'amount',
		//'metric',
		array('label'=>'Metric PR','value'=>$model->MetricPr->metric_name),
		'dedicated_to',
		//'id_vessel',
		array('label'=>'Vessel/Tug','value'=>$model->Vessel->VesselName),
		//'id_voyage_order',
		'notes',
		//'is_mutliple_item',
		'requested_user',
		'requested_date',
		'ip_user_requested',
		'Status',
		//'approved_user',
		//'approval_date',
		//'ip_user_approved',
),
)); ?>
