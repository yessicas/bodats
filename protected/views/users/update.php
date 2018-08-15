<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->userid=>array('view','id'=>$model->userid),
	'Update',
);

	$this->menu=array(
	array('label'=>'Manage Users','url'=>array('master/masusers')),
	array('label'=>'Create Users','url'=>array('master/masuserscreate')),
	array('label'=>'View Users','url'=>array('master/masusersview','id'=>$model->userid)),
	array('label'=>'Update Users','url'=>array('master/masusersupdate'),'active'=>true),
	array('label'=>'Delete Level Access','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->userid),'confirm'=>'Are you sure you want to delete this item?')),
	);
	?>


<h3> Update # <font color="#BD362F"> <?php echo $model->userid; ?> </font></h3>
<hr>


<?php echo $this->renderPartial('../users/_form',array('model'=>$model)); ?>