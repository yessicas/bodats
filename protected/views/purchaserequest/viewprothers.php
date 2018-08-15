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
	array('label'=>'PR '.TextDisplayHelper::displayLabelFromMode($label),'url'=>array('purchaserequest/prothers/mode/'.$label)),
	array('label'=>'Manage PR '.TextDisplayHelper::displayLabelFromMode($label),'url'=>array('purchaserequest/admothers/mode/'.$label)),
	array('label'=>'Approved PR '.TextDisplayHelper::displayLabelFromMode($label),'url'=>array('purchaserequest/admothersapproved/mode/'.$label.'/approved/1')),
	array('label'=>'Rejected PR '.TextDisplayHelper::displayLabelFromMode($label),'url'=>array('purchaserequest/admothersapproved/mode/'.$label.'/approved/0')),
	array('label'=>'View Detail PR '.TextDisplayHelper::displayLabelFromMode($label),'url'=>array('purchaserequest/viewprothers', 'idpr'=>$idpr), 'active'=>true),
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

<div class="view">
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
		array(
            'label'=>'Amount',
           'value'=>function($data){
				if(isset($data->MetricPr)){
					return $data->amount." ".$data->MetricPr->metric_name;
				}else{
					return $data->amount;
				}
			},
           ),
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

<div class ="view">
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
</div>

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
