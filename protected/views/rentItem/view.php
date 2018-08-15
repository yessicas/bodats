<?php
$this->breadcrumbs=array(
	'Rent Items'=>array('index'),
	$model->id_rent_item,
);

$this->menu=array(
//array('label'=>'List RentItem','url'=>array('index')),
array('label'=>'Manage Rent Item','url'=>array('admin')),
array('label'=>'Create Rent Item','url'=>array('create')),
array('label'=>'View Rent Item','url'=>array('view','id'=>$model->id_rent_item),'active'=>true),
array('label'=>'Update Rent Item','url'=>array('update','id'=>$model->id_rent_item)),

array('label'=>'Delete RentItem','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_rent_item),'confirm'=>'Are you sure you want to delete this item?')),

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
<h2>View Rent Item<font color=#BD362F> #<?php echo $model->id_rent_item; ?></font></h2>
<hr>
</div>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_rent_item',
		'rent_item_name',
		'rent_item_code',
		'category',
),
)); ?>
