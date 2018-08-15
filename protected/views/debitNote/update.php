<?php
$this->breadcrumbs=array(
	'Debit Notes'=>array('index'),
	$model->id_debit_note=>array('view','id'=>$model->id_debit_note),
	'Update',
);

	$this->menu=array(
	array('label'=>'Manage Debit Note','url'=>array('admin')),
	//array('label'=>'List DebitNote','url'=>array('index')),
	array('label'=>'Create Debit Note','url'=>array('create')),
	array('label'=>'View Debit Note','url'=>array('view','id'=>$model->id_debit_note)),
	array('label'=>'Update Debit Note','url'=>array('update','id'=>$model->id_debit_note),'active'=>true),
	
	);
	?>

	<div id="content">
	<h2>Update Debit Note <?php echo $model->id_debit_note; ?></h2>
	<hr>
</div>	

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>