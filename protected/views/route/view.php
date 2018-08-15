<?php
$this->breadcrumbs=array(
	'Routes'=>array('index'),
	$model->RouteId,
);

$this->menu=array(
array('label'=>'Update Route','url'=>array('entity/entirouteupdate','id'=>$model->RouteId)),
	array('label'=>'Create Route','url'=>array('entity/entiroutecreate')),
	array('label'=>'View Route','url'=>array('entity/entirouteview','id'=>$model->RouteId)),
	array('label'=>'Manage Route','url'=>array('entity/entiroute')),
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
<h2>View Route # <font color="#BD362F"> <?php echo $model->Place_first; ?></font></h2>
<hr>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'RouteId',
		'Place_first',
		'Place_second',
		'Acronym',
),
)); ?>
