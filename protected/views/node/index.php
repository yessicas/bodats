<?php
$this->breadcrumbs=array(
	'Nodes',
);

$this->menu=array(
array('label'=>'Create Node','url'=>array('create')),
array('label'=>'Manage Node','url'=>array('admin')),
);
?>

<div id="content">
<h2>Node</h2>
<hr>
</div>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
