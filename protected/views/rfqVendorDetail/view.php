<?php
$this->breadcrumbs=array(
	'Rfq Vendor Details'=>array('index'),
	$model->id_rfq_vendor_detail,
);

$this->menu=array(
//array('label'=>'List RfqVendorDetail','url'=>array('index')),
array('label'=>'Create RfqVendorDetail','url'=>array('create')),
array('label'=>'Update RfqVendorDetail','url'=>array('update','id'=>$model->id_rfq_vendor_detail)),
array('label'=>'View RfqVendorDetail','url'=>array('view','id'=>$model->id_rfq_vendor_detail)),
array('label'=>'Delete RfqVendorDetail','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_rfq_vendor_detail),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage RfqVendorDetail','url'=>array('admin')),
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
<h2>View RfqVendorDetail<font color=#BD362F> #<?php echo $model->id_rfq_vendor_detail; ?></font></h2>
<hr>
</div>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_rfq_vendor_detail',
		//'id_rfq_vendor',
		array('label'=>'RFQNumber', 
        	'value'=>$model->idRfqVendor->RFQNumber),
		array('label'=>'Part', 
        	'value'=>$model->idPart->PartName),
        
		//'id_part',
		'quantity',
		//'created_date',
		//'created_user',
		//'ip_user_updated',
),
)); ?>
