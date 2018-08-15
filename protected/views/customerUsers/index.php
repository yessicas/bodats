<?php
$this->breadcrumbs=array(
	'Customer Users',
);

$this->menu=array(
array('label'=>'Create Customer Users','url'=>array('create')),
array('label'=>'Manage Customer Users','url'=>array('admin')),
);
?>
<div id="content">
<h2>Customer Users</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
