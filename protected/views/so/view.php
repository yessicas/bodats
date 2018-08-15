<?php
$this->breadcrumbs=array(
	'Sos'=>array('index'),
	$model->id_so,
);

$this->menu=array(
	array('label'=>'Manage SO ','url'=>array('so/admin')),
	array('label'=>'Create SO','url'=>array('so/searchquo')),
	array('label'=>'Update SO','url'=>array('so/update','id'=>$model->id_so,'idsp'=>$model->id_sales_plan)),
//array('label'=>'Delete So','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_so),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'View SO','url'=>array('so/view','id'=>$model->id_so)),
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
<h2>View Shipping Order  # <font color="#BD362F"><?php echo $model->ShippingOrderNumber; ?></font></h2>
<hr>
</div>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_so',
		//'id_quotation',
		'ShippingOrderNumber',
		//'SODate',
		/*
		array(
			'label'=>'Loading Date',
			//'value'=>'Timeanddate::getDisplayStandardDate($data->Quotation->LoadingDate)',
			'value'=>function($data) {
					if(isset($data->Quotation)){
						return Timeanddate::getDisplayStandardDate($data->Quotation->LoadingDate);
					}else{
						return "-- QuoNF --";
					}
                },
		),
		*/
		//'VoyageDate',
		//'SONo',
		//'SOMonth',
		//'SOYear',
		//'period_year',
		//'period_month',
		//'period_quartal',
		//'SOQuartal',
		'SI_Number',
		'Consignee',
		'NotifyAddress',
		'Marks',
		'DocumentsRequired',
),
)); ?>


	<?php 
	if($modelquo->id_bussiness_type_order==100){
		//echo $this->renderPartial('../quotation/view_partial', array('model'=>$modelquo,'modeldetail'=>$modeldetailquo)); 
		echo $this->renderPartial('../quotation/viewonly_partial_with_manage_data', array('model'=>$modelquo,'modeldetail'=>$modeldetailquo,'modelso'=>$model)); 
	}


	if($modelquo->id_bussiness_type_order==200){
		//echo $this->renderPartial('../quotation/view_partial', array('model'=>$modelquo,'modeldetail'=>$modeldetailquo)); 
		echo $this->renderPartial('../quotation/viewonly_partial_with_manage_data', array('model'=>$modelquo,'modeldetail'=>$modeldetailquo,'modelso'=>$model)); 
	}

	if($modelquo->id_bussiness_type_order==250){
	//echo $this->renderPartial('../quotation/view_partial', array('model'=>$modelquo,'modeldetail'=>$modeldetailquo)); 
	echo $this->renderPartial('../quotation/view_partial_TRANS', array('model'=>$modelquo,'modeldetail'=>$modeldetailquo,'modelso'=>$model)); 
	}

	if($modelquo->id_bussiness_type_order==300){
		echo $this->renderPartial('../quotation/viewonly_partialTC', array('model'=>$modelquo,'modeldetail'=>$modeldetailquo)); 
	}

	?>
