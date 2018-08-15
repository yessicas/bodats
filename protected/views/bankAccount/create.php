<?php
$this->breadcrumbs=array(
	'Bank Accounts'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage BankAccount','url'=>array('admin')),
array('label'=>'Create BankAccount','url'=>array('create'),'active'=>true),

);
?>
<div id="content">
<h2>Create BankAccount</h2>
<hr>
</div>


<?php echo $this->renderPartial('../BankAccount/_form', array('model'=>$model)); ?>