<?php
$this->breadcrumbs=array(
	'So Offhired Orders'=>array('index'),
	$model->id_so_offhired_order,
);


	$this->menu=array(
//array('label'=>'Manage Shipping Order ','url'=>array('so/admin')),
//array('label'=>'Create Shipping Order','url'=>array('so/searchquo')),
array('label'=>'Manage TC ','url'=>array('sooffhiredorder/admin')),
array('label'=>'Create TC','url'=>array('sooffhiredorder/create')),
array('label'=>'Update TC','url'=>array('sooffhiredorder/update','id'=>$model->id_so_offhired_order)),
array('label'=>'View TC','url'=>array('sooffhiredorder/view','id'=>$model->id_so_offhired_order)),
//array('label'=>'Delete SoOffhiredOrder','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_so_offhired_order),'confirm'=>'Are you sure you want to delete this item?')),

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
<h2>View TC  # <font color="#BD362F"><?php echo $model->OffhiredOrderNumber; ?></font></h2>
<hr>
</div>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_so_offhired_order',
		//'id_quotation',
		'OffhiredOrderNumber',
		'SODate',
		//'id_customer',
		array('label'=>'Customer Name', 'value'=>$model->Quotation->Customer->CompanyName),
		array('label'=>'Customer Adress', 'value'=>$model->Quotation->Customer->Address),
		//'VesselTug',
		array('label'=>'Tug', 'value'=>$model->VesselTugs->VesselName),
		//'VesselBarge',
		array('label'=>'Barge', 'value'=>$model->VesselBarges->VesselName),
		//'OffhiredOrderNumber',
		//'SONo',
		//'SOMonth',
		//'SOYear',
		//'period_year',
		//'period_month',
		//'period_quartal',
		'TCStartDate',
		'TCEndDate',
		 array('label'=>'Total','value'=>Timeanddate::countRangeDate($model->TCStartDate,$model->TCEndDate)." days"),
		  array('name'=>'TCPrice','value'=>$model->TCPrice." / day"),
		//'TCPrice',
		//'SOQuartal',
		//'Marks',
),
)); ?>
