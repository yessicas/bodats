
<?php
$this->breadcrumbs=array(
	'Voyage Mst Activity Groups'=>array('admin'),
	$model->id_voyage_activity_group=>array('view','id'=>$model->id_voyage_activity_group),
	'Update',
);
?>



<h1> <?php
 echo $title; ?>

<font color=#D26A48> #<?php echo $model->id_voyage_activity_group; ?></font></h1>

<?php echo $this->renderPartial('../../../../views/VoyageMstActivityGroup/_form',array('model'=>$model)); ?>