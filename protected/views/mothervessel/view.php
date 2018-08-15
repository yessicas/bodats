<?php
$this->breadcrumbs=array(
	'Mother Vessels'=>array('index'),
	$model->id_mothervessel,
);

$this->menu=array(
	array('label'=>'Manage Mother Vessel','url'=>array('entity/entimother')),
	array('label'=>'Create Mother Vessel','url'=>array('entity/entimothercreate')),
	array('label'=>'View Mother Vessel','url'=>array('entity/entimotherview','id'=>$model->id_mothervessel)),
	array('label'=>'Update Mother Vessel','url'=>array('entity/entimotherupdate','id'=>$model->id_mothervessel)),
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

<div id="content">
<h2>View Mother Vessel # <font color="#BD362F"> <?php echo $model->MV_Name; ?></font></h2>
<hr>
</div>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_mothervessel',
		'MotherVesselCode',
		'MV_Name',
		'MV_Type',
		'MV_Route',
),
)); ?>
