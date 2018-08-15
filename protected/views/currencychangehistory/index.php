<?php
$this->breadcrumbs=array(
	'Currency Change Histories',
);

$this->menu=array(
array('label'=>'Create CurrencyChangeHistory','url'=>array('create')),
array('label'=>'Manage CurrencyChangeHistory','url'=>array('admin')),
);
?>
<div id="content">
<h2>Currency Change Histories</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
