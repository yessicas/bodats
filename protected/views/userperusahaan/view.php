<?php
$this->breadcrumbs=array(
	'User Perusahaans'=>array('index'),
	$model->id_user_perusahaan,
);

$this->menu=array(
array('label'=>'List UserPerusahaan','url'=>array('index')),
array('label'=>'Create UserPerusahaan','url'=>array('create')),
array('label'=>'Update UserPerusahaan','url'=>array('update','id'=>$model->id_user_perusahaan)),
array('label'=>'Delete UserPerusahaan','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_user_perusahaan),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage UserPerusahaan','url'=>array('admin')),
);
?>

<h1>View UserPerusahaan #<?php echo $model->id_user_perusahaan; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_user_perusahaan',
		'userid',
		'id_perusahaan',
		'typeuser',
),
)); ?>
