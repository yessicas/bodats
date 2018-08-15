<?php
$this->breadcrumbs=array(
	'Storage Locations'=>array('index'),
	$model->StorageLocationId,
);

$this->menu=array(
array('label'=>'Update Storage Location','url'=>array('entity/entistorupdate','id'=>$model->StorageLocationId)),
    array('label'=>'Create Storage Location','url'=>array('entity/entistorcreate')),
    array('label'=>'View Storage Location','url'=>array('entity/entistorview','id'=>$model->StorageLocationId)),
    array('label'=>'Manage Storage Location','url'=>array('entity/entistorage')),
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
<h2>View StorageLocation #<?php echo $model->StorageLocationId; ?></h2>
<hr>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'StorageLocationId',
		'LocationName',
),
)); ?>
