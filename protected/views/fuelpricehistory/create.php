<?php
$this->breadcrumbs=array(
	'Fuel Price Histories'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List FuelPriceHistory','url'=>array('index')),
array('label'=>'Manage FuelPriceHistory','url'=>array('admin')),
);
?>
<div id="content">
<h2>Create FuelPriceHistory</h2>
<hr>
</div>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>