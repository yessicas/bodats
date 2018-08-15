<?php
$this->breadcrumbs=array(
	'Bussiness Type Orders'=>array('index'),
	$model->id_bussiness_type_order,
);

$this->menu=array(
//array('label'=>'List Bussiness Type Order','url'=>array('index')),
array('label'=>'Manage Bussiness Type Order','url'=>array('master/mastype')),
array('label'=>'Create Bussiness Type Order','url'=>array('master/mastypecreate')),
array('label'=>'View Bussiness Type Order','url'=>array('master/mastypeview','id'=>$model->id_bussiness_type_order),'active'=>true),
array('label'=>'Update Bussiness Type Order','url'=>array('master/mastypeupdate','id'=>$model->id_bussiness_type_order)),
array('label'=>'Delete Bussiness Type Order','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_bussiness_type_order),'confirm'=>'Are you sure you want to delete this item?')),

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

<h4>View Bussiness Type Order<font color=#BD362F> #<?php echo $model->bussiness_type_order; ?></font></h4>
<hr>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
	//	'id_bussiness_type_order',
		'bussiness_type_order',
),
)); ?>
