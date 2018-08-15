<?php
$this->breadcrumbs=array(
	'Nodes'=>array('index'),
	$model->id_node,
);

$this->menu=array(

	array('label'=>'Update Node','url'=>array('entity/entinodeupdate','id'=>$model->id_node)),
	array('label'=>'Create Node','url'=>array('entity/entinodecreate')),
	array('label'=>'View Node','url'=>array('entity/entinodeview','id'=>$model->id_node)),
	array('label'=>'Manage Node','url'=>array('entity/entinode')),
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
<h2>View Node # <font color="#BD362F"> <?php echo $model->node_name; ?></font></h2>
<hr>
</div>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_node',
		'node_name',
		'node_acronym',
),
)); ?>
