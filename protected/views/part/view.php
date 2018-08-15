<?php
$this->breadcrumbs=array(
	'Parts'=>array('index'),
	$model->id_part,
);

$this->menu=array(
//array('label'=>'List Part','url'=>array('index')),
array('label'=>'Manage Part','url'=>array('admin')),
array('label'=>'Create Part','url'=>array('create')),
array('label'=>'View Part','url'=>array('view','id'=>$model->id_part),'active'=>true),
array('label'=>'Update Part','url'=>array('update','id'=>$model->id_part)),

array('label'=>'Delete Part','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_part),'confirm'=>'Are you sure you want to delete this item?')),

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

<h3>View Part<font color=#BD362F> #<?php echo $model->PartName; ?></font></h3>
<hr>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		/*'id_part',
	array('label'=>'Vesel',
				  'value'=>$model->vess->VesselName),
	//	'id_vessel',

	array('label'=>'Part Structure',
				  'value'=>$model->struc->structure_name),

	//	'id_part_structure', */
		'PartNumber',
		'PartName',
	/*	'LifeTime',
		'UsageTime',
		'MinStock',
		'Quantity',
array('label'=>'Metric',
				  'value'=>$model->met->metric_name),
	//	'metric',
		//'ReplaceSchedule',
array(
            'name'=>'LastReplacementDate',
           'value'=>Yii::app()->dateFormatter->formatDateTime($model->LastReplacementDate, "medium",""),
           ),
	//	'LastReplacementDate',
		//'ReplaceLeadtime', */
		array(
            'label'=>'Standard Price Unit',
             'value'=>NumberAndCurrency::formatCurrency($model->StandardPriceUnit),
            ),
		//'StandardPriceUnit',

		array('label'=>'Currency',
				  'value'=>$model->curr->currency),

	//	'id_currency',
),
)); ?>
