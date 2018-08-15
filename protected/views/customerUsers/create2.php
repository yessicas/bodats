<?php
$this->breadcrumbs=array(
	'Customer Users'=>array('index'),
	'Create',
);

$this->menu=array(

array('label'=>'Manage Users of Customer','url'=>array('zone/masuserof')),
array('label'=>'Create User of Customer','url'=>array('CustomerUsers/create2')),
);
?>
<div id="content">
<h2>Create Customer Users</h2>
<hr>
</div>


<?php echo $this->renderPartial('../CustomerUsers/_form2', array('model'=>$model)); ?>