<?php
$this->breadcrumbs=array(
	'Payment Tops'=>array('index'),
	$model->id_payment_top,
);

$this->menu=array(
array('label'=>'List PaymentTop','url'=>array('index')),
array('label'=>'Create PaymentTop','url'=>array('create')),
array('label'=>'Update PaymentTop','url'=>array('update','id'=>$model->id_payment_top)),
array('label'=>'Delete PaymentTop','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_payment_top),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage PaymentTop','url'=>array('admin')),
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

<!--- <div id="content"> !---->

<h3>View PaymentTop # <font color="#BD362F"> <?php echo $model->payment_top; ?></font></h3>
<hr>


<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
	'id_payment_top',
		'payment_top',
),
)); ?>
