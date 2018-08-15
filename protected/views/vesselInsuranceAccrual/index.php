<?php
$this->breadcrumbs=array(
	'Vessel Insurance Accruals',
);

$this->menu=array(
array('label'=>'Create Vessel Insurance Accrual','url'=>array('create')),
array('label'=>'Manage Vessel Insurance Accrual','url'=>array('admin')),
);
?>
<div id="content">
<h2>Vessel Insurance Accruals</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
