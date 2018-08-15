<?php
$this->breadcrumbs=array(
	'Currency Change Histories'=>array('index'),
	$model->id_currency_change_hist=>array('view','id'=>$model->id_currency_change_hist),
	'Update',
);

	$this->menu=array(
	array('label'=>'List CurrencyChangeHistory','url'=>array('index')),
	array('label'=>'Create CurrencyChangeHistory','url'=>array('create')),
	array('label'=>'View CurrencyChangeHistory','url'=>array('view','id'=>$model->id_currency_change_hist)),
	array('label'=>'Manage CurrencyChangeHistory','url'=>array('admin')),
	);
	?>

	<h2>Update CurrencyChangeHistory <?php echo $model->id_currency_change_hist; ?></h2>
	<hr>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>