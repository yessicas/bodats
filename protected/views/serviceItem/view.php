<?php
$this->breadcrumbs=array(
	'Service Items'=>array('index'),
	$model->id_service_item,
);

$this->menu=array(
array('label'=>'Manage Service Item','url'=>array('admin')),
array('label'=>'Create Service Item','url'=>array('create')),
array('label'=>'View Service Item','url'=>array('view','id'=>$model->id_service_item),'active'=>true),
array('label'=>'Update Service Item','url'=>array('update','id'=>$model->id_service_item)),
array('label'=>'Delete Service Item','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_service_item),'confirm'=>'Are you sure you want to delete this item?')),

);
?>

<div id="content">
<h2>View ServiceItem #<?php echo $model->id_service_item; ?></h2>
<hr>
</div>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_service_item',
		'service_item',
		'description',
		//'id_po_category',
),
)); ?>
