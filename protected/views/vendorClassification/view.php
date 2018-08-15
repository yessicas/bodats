<?php
$this->breadcrumbs=array(
	'Vendor Classifications'=>array('index'),
	$model->id_vendor_classification,
);

$this->menu=array(
//array('label'=>'List VendorClassification','url'=>array('index')),
array('label'=>'Manage Vendor Classification','url'=>array('custvend/klas')),
//array('label'=>'Create VendorClassification','url'=>array('create')),
array('label'=>'View Vendor Classification','url'=>array('view','id'=>$model->id_vendor_classification),'active'=>true),
//array('label'=>'Update VendorClassification','url'=>array('update','id'=>$model->id_vendor_classification)),

//array('label'=>'Delete VendorClassification','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_vendor_classification),'confirm'=>'Are you sure you want to delete this item?')),

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

<h3>View Vendor Classification<font color=#BD362F> #<?php echo $model->namavendor->VendorName; ?></font></h3>
<hr>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_vendor_classification',
		array('label'=>'Vendor',
				  'value'=>$model->namavendor->VendorName),
		//'id_vendor',
		'type',
),
)); ?>
