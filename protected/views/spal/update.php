<?php
$this->breadcrumbs=array(
	'Spals'=>array('index'),
	$model->id_spal=>array('view','id'=>$model->id_spal),
	'Update',
);

	$this->menu=array(
	//array('label'=>'List Spal','url'=>array('index')),
	array('label'=>'Manage Agreement Document SPAL','url'=>array('spal/admin')),
	//array('label'=>'Create Spal','url'=>array('create')),
	array('label'=>'Update Agreement Document SPAL','url'=>array('spal/update','id'=>$model->id_quotation)),
	array('label'=>'View Agreement Document SPAL','url'=>array('spal/view','id'=>$model->id_quotation)),
	//array('label'=>'View Spal','url'=>array('view','id'=>$model->id_quotation)),
	);
	?>

<div id="content">
<h2>Update SURAT PERJANJIAN ANGKUTAN LAUT #<?php echo $model->id_spal; ?></h2>
<hr>
</div>
	

<?php echo $this->renderPartial('_form_update',array('model'=>$model,'modelquo'=>$modelquo)); ?>