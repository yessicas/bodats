<?php
$this->breadcrumbs=array(
	'Bidang Usahas'=>array('index'),
	$model->id_bidang_usaha,
);

$this->menu=array(
array('label'=>'List BidangUsaha','url'=>array('index')),
array('label'=>'Create BidangUsaha','url'=>array('create')),
array('label'=>'Update BidangUsaha','url'=>array('update','id'=>$model->id_bidang_usaha)),
array('label'=>'Delete BidangUsaha','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_bidang_usaha),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage BidangUsaha','url'=>array('admin')),
);
?>

<h1>View BidangUsaha #<?php echo $model->id_bidang_usaha; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_bidang_usaha',
		'bidang_usaha',
),
)); ?>
