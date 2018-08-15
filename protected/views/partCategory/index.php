<?php
$this->breadcrumbs=array(
	'Part Categories',
);

$this->menu=array(
array('label'=>'Create PartCategory','url'=>array('create')),
array('label'=>'Manage PartCategory','url'=>array('admin')),
);
?>
<div id="content">
<h2>Part Categories</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
