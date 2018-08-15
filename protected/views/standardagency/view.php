<?php
$this->breadcrumbs=array(
	'Standard Agencies'=>array('index'),
	$model->id_standard_agency,
);

$this->menu=array(
array('label'=>'Manage Standard Agency','url'=>array('admin')),
array('label'=>'Create Standard Agency','url'=>array('create')),
array('label'=>'Update Standard Agency','url'=>array('update','id'=>$model->id_standard_agency)),
array('label'=>'Delete Standard Agency','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_standard_agency),'confirm'=>'Are you sure you want to delete this item?')),

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
<h2>View StandardAgency #<?php echo $model->id_standard_agency; ?></h2>
<hr>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_standard_agency',
		'JettyIdStart',
		'JettyIdEnd',
		'agency_fix_cost',
		'agency_var_cost',
		//'rent',
		//'other',
		'id_currency',
),
)); ?>
