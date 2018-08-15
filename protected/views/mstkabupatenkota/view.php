<?php
$this->breadcrumbs=array(
	'Mst Kabupatenkotas'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List MstKabupatenkota','url'=>array('index')),
array('label'=>'Create MstKabupatenkota','url'=>array('create')),
array('label'=>'Update MstKabupatenkota','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete MstKabupatenkota','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage MstKabupatenkota','url'=>array('admin')),
);
?>

<h1>View MstKabupatenkota #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'nama',
		'ibukota',
		'id_propinsi',
		'ibukotaprop',
		'jmlpenduduk',
		'kodebps',
),
)); ?>
