<?php
$this->breadcrumbs=array(
	'Payroll Items',
);

$this->menu=array(
array('label'=>'Create Payroll Item','url'=>array('create')),
array('label'=>'Manage Payroll Item','url'=>array('admin')),
);
?>
<div id="content">
<h2>Payroll Items</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
