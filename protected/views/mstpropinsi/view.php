<?php
$this->breadcrumbs=array(
	'Mst Propinsis'=>array('index'),
	$model->id_propinsi,
);

$this->menu=array(
array('label'=>'List MstPropinsi','url'=>array('index')),
array('label'=>'Create MstPropinsi','url'=>array('create')),
array('label'=>'Update MstPropinsi','url'=>array('update','id'=>$model->id_propinsi)),
array('label'=>'Delete MstPropinsi','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_propinsi),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage MstPropinsi','url'=>array('admin')),
);
?>

<h1>View MstPropinsi #<?php echo $model->id_propinsi; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_propinsi',
		'id_country',
		'kodebps',
		'nama',
		'kodeiso',
		'ibukota',
		'pulau',
),
)); ?>
