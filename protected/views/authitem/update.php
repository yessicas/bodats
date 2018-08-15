<?php
$this->breadcrumbs=array(
	'Authitems'=>array('index'),
	$model->name=>array('view','id'=>$model->name),
	'Update',
);
$this->menu=array(
    array('label'=>'Manage Level Access','url'=>array('master/maslev')),
    array('label'=>'Create Level Access','url'=>array('master/maslevcreate')),
    array('label'=>'View Level Access','url'=>array('master/maslevview','id'=>$model->name)),
    array('label'=>'Update Level Access','url'=>array('master/maslevupdate','id'=>$model->name),'active'=>true),
    array('label'=>'Delete Level Access','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->name),'confirm'=>'Are you sure you want to delete this item?')),
);
?>


	<h3>Update Level Access <font color="#BD362F"> <?php echo $model->name; ?></font></h3>
	<hr>


<?php echo $this->renderPartial('../authitem/_form',array('model'=>$model)); ?>