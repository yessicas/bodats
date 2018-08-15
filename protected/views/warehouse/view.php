<?php
$this->breadcrumbs=array(
	'Warehouses'=>array('index'),
	$model->id_warehouse,
);

$this->menu=array(
//array('label'=>'List Warehouse','url'=>array('index')),
array('label'=>'Manage Warehouse','url'=>array('admin')),
array('label'=>'Create Warehouse','url'=>array('create')),
array('label'=>'View Warehouse','url'=>array('view','id'=>$model->id_warehouse),'active'=>true),
array('label'=>'Update Warehouse','url'=>array('update','id'=>$model->id_warehouse)),

array('label'=>'Delete Warehouse','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_warehouse),'confirm'=>'Are you sure you want to delete this item?')),

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
<h2>View Warehouse<font color=#BD362F> #<?php echo $model->warehouse_name; ?></font></h2>
<hr>
</div>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_warehouse',
		'warehouse_name',
		'address',
		array(

		'label'=>'Is Active',
		//'value'=>$model->Status=='1' ? 'Used' : 'Unused',  
		'value'=>Warehouse::model()->status($model->is_active),  

		),
		//'is_active',
),
)); ?>
