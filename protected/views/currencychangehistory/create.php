<?php
$this->breadcrumbs=array(
	'Currency Change Histories'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List CurrencyChangeHistory','url'=>array('index')),
array('label'=>'Manage CurrencyChangeHistory','url'=>array('admin')),
);
?>
<div id="content">
<h2>Create CurrencyChangeHistory</h2>
<hr>
</div>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>