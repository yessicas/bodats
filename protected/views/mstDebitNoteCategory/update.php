<?php
$this->breadcrumbs=array(
	'Mst Debit Note Categories'=>array('index'),
	$model->id_debit_note_category=>array('view','id'=>$model->id_debit_note_category),
	'Update',
);

	$this->menu=array(
	// array('label'=>'List MstDebitNoteCategory','url'=>array('index')),
	array('label'=>'Manage Debit Note Category','url'=>array('master/debit')),
array('label'=>'Create Debit Note Category','url'=>array('master/debitcreate')),
array('label'=>'View Debit Note Category','url'=>array('master/debitview','id'=>$model->id_debit_note_category)),
array('label'=>'Update Debit Note Category','url'=>array('master/debitupdate','id'=>$model->id_debit_note_category),'active'=>true),

	);
	?>

	<h3>Update Debit Note Category<font color=#BD362F> <?php echo $model->debit_note_category; ?></font></h3>
	<hr>

<?php echo $this->renderPartial('../MstDebitNoteCategory/_form',array('model'=>$model)); ?>