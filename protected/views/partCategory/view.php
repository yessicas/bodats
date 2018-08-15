<?php
$this->breadcrumbs=array(
	'Part Categories'=>array('index'),
	$model->id_part_category,
);

$this->menu=array(
//array('label'=>'List PartCategory','url'=>array('index')),
array('label'=>'Create Part Category','url'=>array('invent/catpartcreate')),
array('label'=>'Update Part Category','url'=>array('invent/catpartupdate','id'=>$model->id_part_category)),
array('label'=>'View Part Category','url'=>array('invent/catpartview','id'=>$model->id_part_category)),
array('label'=>'Manage Part Category','url'=>array('invent/catpart')),
array('label'=>'Delete Part Category','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_part_category),'confirm'=>'Are you sure you want to delete this item?')),
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
<h2>View Part Category<font color=#BD362F> #<?php echo $model->id_part_category; ?></font></h2>
<hr>
</div>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_part_category',
		'PartCategoryName',
		'PartDescription',
),
)); ?>
