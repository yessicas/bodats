<?php
$this->breadcrumbs=array(
	'Mst Debit Note Categories'=>array('index'),
	$model->id_debit_note_category,
);

$this->menu=array(
//array('label'=>'List MstDebitNoteCategory','url'=>array('index')),
array('label'=>'Manage Debit Note Category','url'=>array('master/debit')),
array('label'=>'Create Debit Note Category','url'=>array('master/debitcreate')),
array('label'=>'View Debit Note Category','url'=>array('master/debitview','id'=>$model->id_debit_note_category),'active'=>true),
array('label'=>'Update Debit Note Category','url'=>array('master/debitupdate','id'=>$model->id_debit_note_category)),

array('label'=>'Delete MstDebitNoteCategory','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_debit_note_category),'confirm'=>'Are you sure you want to delete this item?')),

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

<h3>View Debit Note Category<font color=#BD362F> #<?php echo $model->debit_note_category; ?></font></h3>
<hr>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_debit_note_category',
		'debit_note_category',
		array(

		'label'=>'Is Active',
		//'value'=>$model->Status=='1' ? 'Used' : 'Unused',  
		'value'=>MstDebitNoteCategory::model()->statusAktiv($model->is_active),  

		),
		//'is_active',
),
)); ?>
