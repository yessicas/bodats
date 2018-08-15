<?php
$this->breadcrumbs=array(
	'Quotation Detail Vessels'=>array('index'),
	$model->id_quotation_detail,
);

$this->menu=array(
array('label'=>'List QuotationDetailVessel','url'=>array('index')),
array('label'=>'Create QuotationDetailVessel','url'=>array('create')),
array('label'=>'Update QuotationDetailVessel','url'=>array('update','id'=>$model->id_quotation_detail)),
array('label'=>'Delete QuotationDetailVessel','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_quotation_detail),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage QuotationDetailVessel','url'=>array('admin')),
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
<h2>View Quotation Detail Vessel #<?php echo $model->id_quotation_detail; ?></h2>
<hr>
</div>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_quotation_detail',
		//'id_quotation',
		//'IdNodeOrigin',
		'JettyOrigin.JettyName',
		//'IdNodeDestination',
		'JettyDestination.JettyName',
		'BargeSize',
		'Capacity',
		'Price',
		//'id_currency',
		'Currency.currency',
		'change_rate',
),
)); ?>
