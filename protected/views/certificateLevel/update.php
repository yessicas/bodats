<?php
$this->breadcrumbs=array(
	'Certificate Levels'=>array('index'),
	$model->id_certificate=>array('view','id'=>$model->id_certificate),
	'Update',
);

	$this->menu=array(
	array('label'=>'Manage Certificate Level','url'=>array('master/mascer')),
	array('label'=>'Create Certificate Level','url'=>array('master/mascercreate')),
	array('label'=>'View Certificate Level','url'=>array('master/mascerview','id'=>$model->id_certificate)),
	array('label'=>'Update Certificate Level','url'=>array('master/mascerupdate','id'=>$model->id_certificate)),
	array('label'=>'Delete Certificate Level','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_certificate),'confirm'=>'Are you sure you want to delete this item?')),
	);
	?>
<!--- <div id="content"> !---->

	<h3>Update Certificate Level <font color="#BD362F"> <?php echo $model->certiface_level; ?> </font></h3>
	<hr>

<?php echo $this->renderPartial('../CertificateLevel/_form',array('model'=>$model)); ?>