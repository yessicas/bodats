<?php
$this->breadcrumbs=array(
	'Customer Users'=>array('index'),
	'Create',
);

$this->menu=array(

array('label'=>'Manage Users of Customer','url'=>array('zone/masuserof')),
array('label'=>'Create User of Customer','url'=>array('zone/masuserofcreate')),
);
?>
<div id="content">
<h2>Create Customer Users</h2>
<hr>
</div>


<?php echo $this->renderPartial('../CustomerUsers/_form', array('model'=>$model)); ?>