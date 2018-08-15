<?php
$this->breadcrumbs=array(
	'Bank Accounts',
);

$this->menu=array(
array('label'=>'Create BankAccount','url'=>array('create')),
array('label'=>'Manage BankAccount','url'=>array('admin')),
);
?>
<div id="content">
<h2>Bank Accounts</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
