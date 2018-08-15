<?php
$this->breadcrumbs=array(
	'Mothervessels',
);

$this->menu=array(
array('label'=>'Manage Mother Vessel','url'=>array('admin')),
array('label'=>'Create Mother Vessel','url'=>array('create')),
);
?>

<h1>Mother Vessels</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
