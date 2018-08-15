<?php
$this->breadcrumbs=array(
	'Quotations'=>array('index'),
	'Create',
);

$this->menu=array(
 //array('label'=>'Manage Quotation', 'url'=>array('demand/quo')),
 array('label'=>'Create Shipping Order ','url'=>array('sosalesplan/createsoauto')),
 //array('label'=>'Back to step 1 ', 'url'=>array('demand/quoupdate','id'=>$model->id_quotation)),
);
?>
<?php echo $this->renderPartial('_view_sales_plan_info', array('model'=>$model, 'modelSalesPlan'=>$modelSalesPlan,'modelSo'=>$modelSo,)); ?>

<?php echo $this->renderPartial('_form_so_auto', array('model'=>$model,'modelSalesPlan'=>$modelSalesPlan,'modelSo'=>$modelSo,)); ?>
