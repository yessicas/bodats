<?php
$this->breadcrumbs=array(
	'Customers',
);

$this->menu=array(
array('label'=>'Create Customer','url'=>array('create')),
array('label'=>'Manage Customer','url'=>array('admin')),
);
?>
<div id="content">
<h2>Customers</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'../customer/_view',
)); ?>
