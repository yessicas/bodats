<?php
$this->breadcrumbs=array(
	'User Perusahaans'=>array('index'),
	$model->id_user_perusahaan=>array('view','id'=>$model->id_user_perusahaan),
	'Update',
);

	$this->menu=array(
	array('label'=>'List UserPerusahaan','url'=>array('index')),
	array('label'=>'Create UserPerusahaan','url'=>array('create')),
	array('label'=>'View UserPerusahaan','url'=>array('view','id'=>$model->id_user_perusahaan)),
	array('label'=>'Manage UserPerusahaan','url'=>array('admin')),
	);
	?>

	<h1>Update UserPerusahaan <?php echo $model->id_user_perusahaan; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>