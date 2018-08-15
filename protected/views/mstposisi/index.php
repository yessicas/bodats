<?php
$this->breadcrumbs=array(
	'Mst Posisis',
);

$this->menu=array(
array('label'=>'Create MstPosisi','url'=>array('create')),
array('label'=>'Manage MstPosisi','url'=>array('admin')),
);
?>

<h1>Mst Posisis</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
