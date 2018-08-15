<?php
$this->breadcrumbs=array(
	'Voyage Mst Activity Groups'=>array('admin'),
	$model->id_voyage_activity_group,
);

$this->menu=array(
//array('label'=>'List VoyageMstActivityGroup','url'=>array('index')),
array('label'=>'Manage VoyageMstActivityGroup','url'=>array('admin')),
array('label'=>'Tambah VoyageMstActivityGroup','url'=>array('create')),
array('label'=>'Lihat VoyageMstActivityGroup','url'=>array('view','id'=>$model->id_voyage_activity_group),'active'=>true),
array('label'=>'Ubah VoyageMstActivityGroup','url'=>array('update','id'=>$model->id_voyage_activity_group)),

array('label'=>'Hapus VoyageMstActivityGroup','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_voyage_activity_group),'confirm'=>'Are you sure you want to delete this item?')),

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

<h1>Lihat VoyageMstActivityGroup<font color=#96E400> #<?php echo $model->id_voyage_activity_group; ?></font></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_voyage_activity_group',
		'voyage_activity_group_short',
		'voyage_activity_group',
		'voyage_activity_group_desc',
		'color',
),
)); ?>
