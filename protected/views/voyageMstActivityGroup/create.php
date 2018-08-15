<?php
$this->breadcrumbs=array(
	'Voyage Mst Activity Groups'=>array('admin'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage VoyageMstActivityGroup','url'=>array('admin')),
array('label'=>'Tambah VoyageMstActivityGroup','url'=>array('create'),'active'=>true),

);
?>

<h1>Tambah VoyageMstActivityGroup</h1>



<?php echo $this->renderPartial('../VoyageMstActivityGroup/_form', array('model'=>$model)); ?>