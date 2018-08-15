<?php
$this->breadcrumbs=array(
	'Consumable Stock Items'=>array('index'),
	$model->id_consumable_stock_item=>array('view','id'=>$model->id_consumable_stock_item),
	'Update',
);

	$this->menu=array(
	/*
	array('label'=>'Manage Consumable Stock Item','url'=>array('admin')),
	array('label'=>'Create Consumable Stock Item','url'=>array('create')),
	array('label'=>'View Consumable Stock Item','url'=>array('view','id'=>$model->id_consumable_stock_item)),
	array('label'=>'Update Consumable Stock Item','url'=>array('update','id'=>$model->id_consumable_stock_item),'active'=>true),
	array('label'=>'Delete Consumable Stock Item','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_consumable_stock_item),'confirm'=>'Are you sure you want to delete this item?')),
	*/
	
	array('label'=>'Manage CS/Part/Asset','url'=>array('admin')),
	array('label'=>'Create CS/Part/Asset','url'=>array('update','id'=>$model->id_consumable_stock_item),'active'=>true),
	);
	?>

	<h3> Update Consumable Stock Item <font color=#BD362F> <?php echo $model->po->category_name; ?></h3>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>