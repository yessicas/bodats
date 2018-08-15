<?php
$this->breadcrumbs=array(
	'Brokerage Items'=>array('index'),
	$model->id_brokerage_item,
);

$this->menu=array(
//array('label'=>'List BrokerageItem','url'=>array('index')),
array('label'=>'Manage Brokerage Item','url'=>array('master/masbrok')),
array('label'=>'Create Brokerage Item','url'=>array('master/masbrokcreate')),
array('label'=>'View Brokerage Item','url'=>array('view','id'=>$model->id_brokerage_item),'active'=>true),
array('label'=>'Update Brokerage Item','url'=>array('update','id'=>$model->id_brokerage_item)),
array('label'=>'Delete Brokerage Item','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_brokerage_item),'confirm'=>'Are you sure you want to delete this item?')),

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
<h3>View Brokerage Item <font color="#BD362F"> #<?php echo $model->brokerage_item; ?></font></h3>
<hr>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_brokerage_item',
		'brokerage_item',
		'description',
),
)); ?>
