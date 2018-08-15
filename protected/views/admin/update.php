<?php
$this->breadcrumbs=array(
	'Data Diri'=>array('index'),
	$model->nama_lengkap=>array('view','id'=>$model->id_data_diri),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Data Diri','url'=>array('index')),
	array('label'=>'Create Data Diri','url'=>array('create')),
	array('label'=>'View Data Diri','url'=>array('view','id'=>$model->id_data_diri)),
	array('label'=>'Manage Data Diri','url'=>array('admin')),
	);
	?>

	<div class="well">
<h4>Ubah  Data Diri</h4>
<hr>
<p>
	Anda Dapat Mengubah data    <?php echo $model->nama_lengkap ?>
</p>
</div>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>