<?php
$this->breadcrumbs=array(
	'Debit Notes'=>array('index'),
	'Create',
);

$this->menu=array(

array('label'=>'Manage Debit Note','url'=>array('admin')),
array('label'=>'Create Debit Note','url'=>array('create'),'active'=>true),

);
?>

<div id="content">
<h2>Create Debit Note</h2>
<hr>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>