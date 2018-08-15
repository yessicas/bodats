<?php
$this->breadcrumbs=array(
	//'Users'=>array('index'),
	'Register Individual',
);

$this->menu=array(
array('label'=>'Manage Users','url'=>array('master/masusers')),
array('label'=>'Create Users','url'=>array('master/masuserscreate')),
);
?>

<div id="content">
<h2>Create Users </h2>
<hr>
</div>

<?php echo $this->renderPartial('../users/_form', array('model'=>$model)); ?>
