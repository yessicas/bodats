<?php
$this->breadcrumbs=array(
	'Agency Items'=>array('index'),
	$model->id_agency_item=>array('view','id'=>$model->id_agency_item),
	'Update',
);

	$this->menu=array(
	array('label'=>'Manage AgencyItem','url'=>array('master/agen')),
	array('label'=>'Create AgencyItem','url'=>array('master/agencreate')),
	array('label'=>'View AgencyItem','url'=>array('view','id'=>$model->id_agency_item)),
	array('label'=>'Update AgencyItem','url'=>array('update','id'=>$model->id_agency_item),'active'=>true),
	array('label'=>'Manage AgencyItem','url'=>array('admin')),
	);
	?>

	<h3>Update Agency Item  <font color="#BD362F"> # <?php echo $model->agency_item; ?> </font> </h3>
	<hr>

<?php echo $this->renderPartial('../agencyitem/_form',array('model'=>$model)); ?>