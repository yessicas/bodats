<?php
$this->breadcrumbs=array(
	'Mst Propinsis',
);

$this->menu=array(
array('label'=>'Create MstPropinsi','url'=>array('create')),
array('label'=>'Manage MstPropinsi','url'=>array('admin')),
);
?>

<h1>Mst Propinsis</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
