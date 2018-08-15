<?php
$this->breadcrumbs=array(
	'Part Structures'=>array('index'),
	$model->id_part_structure,
);

$this->menu=array(
//array('label'=>'List PartStructure','url'=>array('index')),
array('label'=>'Manage Part Structure','url'=>array('admin')),
array('label'=>'Create Part Structure','url'=>array('create')),
array('label'=>'View Part Structure','url'=>array('view','id'=>$model->id_part_structure)),
array('label'=>'Update Part Structure','url'=>array('update','id'=>$model->id_part_structure)),

array('label'=>'Delete Part Structure','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_part_structure),'confirm'=>'Are you sure you want to delete this item?')),

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

<h3>View Part Structure<font color=#BD362F> #<?php echo $model->id_part_structure; ?></font></h3>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_part_structure',
		'code_number',
		'structure_name',
		'id_part_structure_parent',
		array('label'=>'Level',
				  'value'=>$model->level->part_level_name),
		//'id_level',
		//'created_date',
		//'created_user',
		//'ip_user_updated',
),
)); ?>
