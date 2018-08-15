<?php
/* @var $this VesselController */
/* @var $model Vessel */

$this->breadcrumbs=array(
	'Vessels'=>array('index'),
	$model->id_vessel=>array('view','id'=>$model->id_vessel),
	'Update',
);

$this->menu=array(
	//array('label'=>'Update Vessel', 'url'=>array('entity/entivessupdate')),
	//array('label'=>'Create Vessel', 'url'=>array('entity/entivesscreate')),
	//array('label'=>'View Vessel', 'url'=>array('vessel/view', 'id'=>$model->id_vessel)),
	//array('label'=>'Manage Vessel', 'url'=>array('entity/entivess')),
    array('label'=>'Manage Vessel', 'url'=>array('entity/entivess')),
    array('label'=>'Create Vessel', 'url'=>array('entity/entivesscreate')),
    array('label'=>'View Vessel', 'url'=>array('vessel/view', 'id'=>$model->id_vessel)),
	array('label'=>'Update Vessel', 'url'=>array('entity/entivessupdate', 'id'=>$model->id_vessel)),
	array('label'=>'Delete Vessel', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_vessel),'confirm'=>'Are you sure you want to delete this item?')),

);
?>

<div id="content">
<h2>Update Vessel # <font color="#BD362F"><?php echo $model->VesselName; ?></font></h2>
	<hr>
</div>
<?php echo $this->renderPartial('../vessel/_form', array('model'=>$model)); ?>