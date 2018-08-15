<?php
$this->breadcrumbs=array(
	'Rent Items'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage Rent Item','url'=>array('admin')),
array('label'=>'Create Rent Item','url'=>array('create'),'active'=>true),

);
?>
<div id="content">
<h2>Create Rent Item</h2>
<hr>
</div>


<?php echo $this->renderPartial('../RentItem/_form', array('model'=>$model)); ?>