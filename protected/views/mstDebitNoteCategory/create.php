<?php
$this->breadcrumbs=array(
	'Mst Debit Note Categories'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage Debit Note Category','url'=>array('master/debit')),
array('label'=>'Create Debit Note Category','url'=>array('master/debitcreate'),'active'=>true),

);
?>
<div id="content">
<h2>Create Debit Note Category</h2>
<hr>
</div>


<?php echo $this->renderPartial('../MstDebitNoteCategory/_form', array('model'=>$model)); ?>