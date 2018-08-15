<?php
$this->breadcrumbs=array(
	'Part Boms'=>array('index'),
	$model->id_part_bom,
);

$this->menu=array(
//array('label'=>'List PartBom','url'=>array('index')),
array('label'=>'Manage PartBom','url'=>array('admin')),
array('label'=>'Create PartBom','url'=>array('create')),
array('label'=>'View PartBom','url'=>array('view','id'=>$model->id_part_bom),'active'=>true),
array('label'=>'Update PartBom','url'=>array('update','id'=>$model->id_part_bom)),

array('label'=>'Delete PartBom','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_part_bom),'confirm'=>'Are you sure you want to delete this item?')),

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
<h2>View PartBom<font color=#BD362F> #<?php echo $model->id_part_bom; ?></font></h2>
<hr>
</div>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_part_bom',
		
		array('label'=>'Bom',
				  'value'=>$model->bom->bom_name),
		//'id_bom',
		'id_part',
		'id_part_parent',
		array(
            'label'=>'quantity',
             'value'=>NumberAndCurrency::formatNumber($model->quantity),
            ),
		//'quantity',
		'metric',
		'alias_name',
		'code',
),
)); ?>
