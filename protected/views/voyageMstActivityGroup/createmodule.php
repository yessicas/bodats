<?php
$this->breadcrumbs=array(
	'Voyage Mst Activity Groups'=>array('admin'),
	'Create',
);
?>

<h1> <?php
 echo $title; ?>
 </h1>



<?php echo $this->renderPartial('../../../../views/VoyageMstActivityGroup/_form',array('model'=>$model)); ?>