<?php
/* @var $this VesselController */
/* @var $model Vessel */

$this->breadcrumbs=array(
	'Vessels'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Manage Vessel', 'url'=>array('entity/entivess')),
    array('label'=>'Create Vessel', 'url'=>array('entity/entivesscreate')),
	
);
?>

<div id="content">
<h2>Create Vessel</h2>
<hr>
</div>

<?php echo $this->renderPartial('../vessel/_form', array('model'=>$model)); ?>