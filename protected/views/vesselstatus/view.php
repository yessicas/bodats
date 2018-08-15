<?php
$this->breadcrumbs=array(
	'Vessel Statuses'=>array('index'),
	$model->id_vessel_status,
);

$this->menu=array(
	array('label'=>'Update Vessel Status', 'url'=>array('master/masvesupdate', 'id'=>$model->id_vessel_status)),
	array('label'=>'Create Vessel Status', 'url'=>array('master/masvescreate')),
	array('label'=>'View Vessel Status', 'url'=>array('master/masvesview', 'id'=>$model->id_vessel_status)),
	array('label'=>'Delete Vessel Status', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_vessel_status),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Vessel Status', 'url'=>array('master/masves')),
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
<h2>View Vessel Status # <font color="#BD362F"> <?php echo $model->vessel_status; ?></font></h2>
<hr>
</div>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_vessel_status',
		'vessel_status',
		'description',
),
)); ?>
