<?php
$this->breadcrumbs=array(
	'Brokerage Items',
);

$this->menu=array(
array('label'=>'Create BrokerageItem','url'=>array('create')),
array('label'=>'Manage BrokerageItem','url'=>array('admin')),
);
?>
<div id="content">
<h2>Brokerage Items</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
