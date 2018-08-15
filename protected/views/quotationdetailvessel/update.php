<?php
$this->breadcrumbs=array(
	'Quotation Detail Vessels'=>array('index'),
	$model->id_quotation_detail=>array('view','id'=>$model->id_quotation_detail),
	'Update',
);

	$this->menu=array(
	//array('label'=>'List QuotationDetailVessel','url'=>array('index')),
	//array('label'=>'Create QuotationDetailVessel','url'=>array('create')),
	//array('label'=>'View QuotationDetailVessel','url'=>array('view','id'=>$model->id_quotation_detail)),
	//array('label'=>'Manage QuotationDetailVessel','url'=>array('admin')),
	);
	?>

<div id="content">
<h2>Update Quotation Detail Vessel # <?php echo $model->id_quotation_detail; ?></h2>
<hr>
</div>


<?php echo $this->renderPartial('_form',array('model'=>$model,'quotationdata'=>$quotationdata)); ?>