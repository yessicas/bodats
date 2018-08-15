<?php
$this->breadcrumbs=array(
	'Customer Users'=>array('index'),
	$model->id_customer_user,
);

$this->menu=array(
//array('label'=>'List CustomerUsers','url'=>array('index')),
array('label'=>'Manage Customer Users','url'=>array('zone/masuserof')),
array('label'=>'Create Customer Users','url'=>array('customerusers/create2')),
array('label'=>'View Customer Users','url'=>array('zone/masuserofview','id'=>$model->id_customer_user)),
array('label'=>'Update Customer Users','url'=>array('zone/masuserofupdate','id'=>$model->id_customer_user)),
array('label'=>'Delete Customer Users','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_customer_user),'confirm'=>'Are you sure you want to delete this item?')),

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
<h2>View Customer Users<font color=#BD362F> # <?php echo $model->Customer->CompanyName; ?></font></h2>
<hr>
</div>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_customer_user',
		 array('label'=>'Nama Company',
				  'value'=>$model->Customer->CompanyName),
		//'id_customer',
		'userid',
),
)); ?>
