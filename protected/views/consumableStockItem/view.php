<?php
$this->breadcrumbs=array(
	'Consumable Stock Items'=>array('index'),
	$model->id_consumable_stock_item,
);

$this->menu=array(
	/*
//array('label'=>'List ConsumableStockItem','url'=>array('index')),
	array('label'=>'Manage Consumable Stock Item','url'=>array('admin')),
	array('label'=>'Create Consumable Stock Item','url'=>array('create')),
	array('label'=>'View Consumable Stock Item','url'=>array('view','id'=>$model->id_consumable_stock_item),'active'=>true),
	array('label'=>'Update Consumable Stock Item','url'=>array('update','id'=>$model->id_consumable_stock_item)),
	array('label'=>'Delete Consumable Stock Item','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_consumable_stock_item),'confirm'=>'Are you sure you want to delete this item?')),
	*/
	array('label'=>'Manage CS/Part/Asset','url'=>array('admin')),
	array('label'=>'View CS/Part/Asset','url'=>array('view','id'=>$model->id_consumable_stock_item),'active'=>true),
);
?>


<h3>View CS/Part/Asset Item<font color=#BD362F> #<?php echo $model->consumable_stock_item; ?></font></h3>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_consumable_stock_item',
		/*
		array('label'=>'Po Category',
				  'value'=>$model->po->category_name),
		*/
		'consumable_stock_item',
		'category',
		'consumable_stock_category',
		
		//'parent_level1',
		//'parent_level2',
		//'parent_level3',
		'impa',
		'serial_number',
		'description',
		array('label'=>'Estimated Unit Price',
			'type'=>'raw',
			'value'=>NumberAndCurrency::formatCurrency($model->estimated_unit_price),
			'visible'=>UsersAccess::checkUserAccess("ADM","PRO"),
			),
	//	'estimated_unit_price',
		'metric',
),
)); ?>
