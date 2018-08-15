<?php
$this->breadcrumbs=array(
	'Boms'=>array('index'),
	$model->id_bom,
);

$this->menu=array(
//array('label'=>'List Bom','url'=>array('index')),
array('label'=>'Manage Bom','url'=>array('admin')),
array('label'=>'Create Bom','url'=>array('create')),
array('label'=>'View Bom','url'=>array('view','id'=>$model->id_bom),'active'=>true),
array('label'=>'Update Bom','url'=>array('update','id'=>$model->id_bom)),

array('label'=>'Delete Bom','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_bom),'confirm'=>'Are you sure you want to delete this item?')),

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
<h2>View Bom<font color=#BD362F> #<?php echo $model->id_bom; ?></font></h2>
<hr>
</div>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_bom',
		'bom_name',
		'description',
		array('label'=>'Part Root',
				  'value'=>$model->part->PartName),
		//'id_part_root',
		array(
            'name'=>'created_date',
           'value'=>Yii::app()->dateFormatter->formatDateTime($model->created_date, "medium","short"),
           ),
		//'created_date',
		//'created_user',
		//'ip_user_updated',
),
)); ?>
