<?php
$this->breadcrumbs=array(
	'Standard Agency Items'=>array('index'),
	$model->id_standard_agency_item=>array('view','id'=>$model->id_standard_agency_item),
	'Update',
);

	$this->menu=array(
	array('label'=>'Detail Standard Agency','url'=>array('standardagencyitem/viewdetail','id'=>$model->id_standard_agency)),
	array('label'=>'Add Detail Standard Agency','url'=>array('Standardagencyitem/create','id'=>$model->id_standard_agency)),
	array('label'=>'Update Detail Standard Agency','url'=>array('Standardagencyitem/update','id'=>$model->id_standard_agency)),
	//array('label'=>'List StandardAgencyItem','url'=>array('index')),
	//array('label'=>'Create StandardAgencyItem','url'=>array('create')),
	//array('label'=>'View StandardAgencyItem','url'=>array('view','id'=>$model->id_standard_agency_item)),
	//array('label'=>'Manage StandardAgencyItem','url'=>array('admin')),
	);
	?>

<div id="content">
<h2>Update  Detail Item - Standard Agency </h2>
<hr>
</div>

	<h2><?php //echo $model->id_standard_agency_item; ?></h2>
	
<?php echo $this->renderPartial('_form',array('model'=>$model,'modelAgency'=>$modelAgency)); ?>