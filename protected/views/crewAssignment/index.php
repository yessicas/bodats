<?php
$this->breadcrumbs=array(
	'Crew Assignments',
);

$this->menu=array(
array('label'=>'Create Crew Assignment','url'=>array('create')),
array('label'=>'Manage Crew Assignment','url'=>array('admin')),
);
?>

<h1>Crew Assignments</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
