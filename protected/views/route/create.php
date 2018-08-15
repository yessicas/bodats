<?php
$this->breadcrumbs=array(
	'Routes'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Create Route', 'url'=>array('entity/entiroutecreate')),
 array('label'=>'Manage Route', 'url'=>array('entity/entiroute')),
);
?>
<div id="content">
<h2>Create Route</h2>
<hr>
</div>


<?php echo $this->renderPartial('../route/_form', array('model'=>$model)); ?>