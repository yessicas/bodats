<?php
$this->breadcrumbs=array(
	'Voyage Mst Activity Groups'=>array('admin'),
	$model->id_voyage_activity_group=>array('view','id'=>$model->id_voyage_activity_group),
	'Update',
);

	$this->menu=array(
	// array('label'=>'List VoyageMstActivityGroup','url'=>array('index')),
	array('label'=>'Manage VoyageMstActivityGroup','url'=>array('admin')),
	array('label'=>'Tambah VoyageMstActivityGroup','url'=>array('create')),
	array('label'=>'Lihat VoyageMstActivityGroup','url'=>array('view','id'=>$model->id_voyage_activity_group)),
	array('label'=>'Ubah VoyageMstActivityGroup','url'=>array('update','id'=>$model->id_voyage_activity_group),'active'=>true),
	
	);
	?>

	<h1>Ubah VoyageMstActivityGroup<font color=#96E400> #<?php echo $model->id_voyage_activity_group; ?></font></h1>

<?php echo $this->renderPartial('../VoyageMstActivityGroup/_form',array('model'=>$model)); ?>