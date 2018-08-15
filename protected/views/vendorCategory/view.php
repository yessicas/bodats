<?php
$this->breadcrumbs=array(
	'Vendor Categories'=>array('index'),
	$model->id_vendor_category,
);

$this->menu=array(
//array('label'=>'List VendorCategory','url'=>array('index')),
array('label'=>'Manage VendorCategory','url'=>array('admin')),
array('label'=>'Create VendorCategory','url'=>array('create')),
array('label'=>'View VendorCategory','url'=>array('view','id'=>$model->id_vendor_category)),
array('label'=>'Update VendorCategory','url'=>array('update','id'=>$model->id_vendor_category)),

array('label'=>'Delete VendorCategory','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_vendor_category),'confirm'=>'Are you sure you want to delete this item?')),

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
<h2>View VendorCategory<font color=#BD362F> #<?php echo $model->id_vendor_category; ?></font></h2>
<hr>
</div>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_vendor_category',
		'id_vendor',
		'id_po_category',
		'description',
),
)); ?>
