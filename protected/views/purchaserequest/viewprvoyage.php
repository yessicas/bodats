<?php
	$cs=Yii::app()->clientScript;
	$cs->registerCSSFile('css/pmlstyle.css');
?>
<?php
$this->breadcrumbs=array(
	'Purchase Requests'=>array('index'),
	$model->id_purchase_request,
);

$this->menu=array(
	array('label'=>'PR '.TextDisplayHelper::displayLabelFromMode($label),'url'=>array('purchaserequest/prvoyage/mode/'.$label)),
	array('label'=>'Manage PR '.TextDisplayHelper::displayLabelFromMode($label),'url'=>array('purchaserequest/admvoyage/mode/'.$label)),
	array('label'=>'Approved PR '.TextDisplayHelper::displayLabelFromMode($label),'url'=>array('purchaserequest/admvoyageapproved/mode/'.$label.'/approved/1')),
	array('label'=>'Rejected PR '.TextDisplayHelper::displayLabelFromMode($label),'url'=>array('purchaserequest/admvoyageapproved/mode/'.$label.'/approved/0')),
	array('label'=>'View Detail PR '.TextDisplayHelper::displayLabelFromMode($label),'url'=>array('purchaserequest/admin'), 'active'=>true),
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
<h2>View Detail Purchase Request (PR) - <?php echo TextDisplayHelper::displayLabelFromMode($label); ?></h2>
<hr>
</div>

<div class="view" style="margin-left:24px; width: 790px;">
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_purchase_request',
		'PRNumber',
		//'PRDate',
		array('label'=>'PR. Date','value'=>Timeanddate::getDisplayStandardDate($model->PRDate)),
		//'PRNo',
		//'PRMonth',
		//'PRYear',
		//'id_po_category',
		array('label'=>'PR. Category','value'=>$model->PoCategory->category_name),
		//array('label'=>'Amount','value'=>$model->amount." ".$model->MetricPr->metric_name),
		//'amount',
		//'metric',
		//array('label'=>'Metric PR','value'=>$model->MetricPr->metric_name),
		//'dedicated_to',
		//'id_vessel',
		
		//'id_voyage_order',
		'notes',
		//'is_mutliple_item',
		//'requested_user',
		//'requested_date',
		//'ip_user_requested',
		'Status',
		//'approved_user',
		//'approval_date',
		//'ip_user_approved',
),
)); ?>
</div>

	<?php
		echo VoyageOrderDisplayer::displayVoyageInfo3column($model->id_voyage_order, '800px');
	?>

Requested By: 
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_purchase_request',
		'requested_user',
		'requested_date',
		'ip_user_requested',
		//'Status',
		//'approved_user',
		//'approval_date',
		//'ip_user_approved',
),
)); ?>


<?php if($model->approved_user != "") { ?>
Approval/Rejected By:
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_purchase_request',

		//'Status',
		'approved_user',
		'approval_date',
		'ip_user_approved',
		'approval_notes'
),
)); ?>
<?php } ?>
