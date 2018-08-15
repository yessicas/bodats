<?php
$this->breadcrumbs=array(
	'Rent Items'=>array('index'),
	$model->id_rent_item=>array('view','id'=>$model->id_rent_item),
	'Update',
);

	$this->menu=array(
	// array('label'=>'List RentItem','url'=>array('index')),
	array('label'=>'Manage Rent Item','url'=>array('admin')),
	array('label'=>'Create Rent Item','url'=>array('create')),
	array('label'=>'View Rent Item','url'=>array('view','id'=>$model->id_rent_item)),
	array('label'=>'Update Rent Item','url'=>array('update','id'=>$model->id_rent_item),'active'=>true),
	
	);
	?>
<div id="content">
	<h2>Update RentItem<font color=#BD362F> <?php echo $model->id_rent_item; ?></font></h2>
	<hr>
</div>
<?php echo $this->renderPartial('../RentItem/_form',array('model'=>$model)); ?>