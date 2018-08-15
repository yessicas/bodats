<?php
$this->breadcrumbs=array(
	'Jetties'=>array('index'),
	$model->JettyId,
);

$this->menu=array(
	array('label'=>'Manage Jetty','url'=>array('entity/entijet')),
	array('label'=>'Create Jetty','url'=>array('entity/entijetcreate')),
	array('label'=>'View Jetty','url'=>array('entity/entijetview','id'=>$model->JettyId)),
	array('label'=>'Update Jetty','url'=>array('entity/entijetupdate','id'=>$model->JettyId)),
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
<h2>View Jetty # <font color="#BD362F"><?php echo $model->JettyName; ?></font></h2>
<hr>
</div>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'JettyId',
		'JettyName',
		'JettyPosition',
		'Acronym',
),
)); ?>
