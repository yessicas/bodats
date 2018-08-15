<?php
$this->breadcrumbs=array(
	'Currencies'=>array('index'),
	$model->id_currency,
);

$this->menu=array(
//array('label'=>'List Currency','url'=>array('index')),
array('label'=>'Manage Currency','url'=>array('master/mascurr')),
array('label'=>'Create Currency','url'=>array('master/mascurrcreate')),
array('label'=>'View Currency','url'=>array('view','id'=>$model->id_currency),'active'=>true),
array('label'=>'Update Currency','url'=>array('update','id'=>$model->id_currency)),
array('label'=>'Delete Currency','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_currency),'confirm'=>'Are you sure you want to delete this item?')),
//array('label'=>'Delete Currency','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_currency),'confirm'=>'Apakah anda yakin akan menghapus data ini?')),

);
?>


<?php
if(Yii::app()->user->hasFlash('success')):?>

<div class = "animated flash">
	<?php
    $this->widget('bootstrap.widgets.TbAlert', array(
    'block' => true,
    'fade' => true,
    'closeText' => '&times;', // false equals no close link
    'alerts' => array( // configurations per alert type
        // success, info, warning, error or danger
        'success' => array('closeText' => '&times;'), 

    ),
	));
	?>
</div>

<?php endif; ?>

<!--- <div id="content"> !---->

<h3>View Currency # <font color="#BD362F"> <?php echo $model->currency; ?> </font></h3>
<hr>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
//'type'=>'striped bordered condensed',
'attributes'=>array(
	//array('label'=>'Label','name'=>'attribute','value'=>'value'),
	/*
	array(
		'name' => 'hak_akses',
		'type' => 'raw',
		'value' => CHtml::encode($model->ubahAkses()),
		),
	*/
		'id_currency',
		'currency',
		array('label'=>'Change Rate',
			'type'=>'raw',
			'value'=>NumberAndCurrency::formatCurrency($model->change_rate)),
	//	'change_rate',
),
)); ?>
