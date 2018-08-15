<style>
#view
{
	color:black;
}
</style>
<?php
$this->breadcrumbs=array(
	'Quotations'=>array('index'),
	'Create',
);

$this->menu=array(
 //array('label'=>'Manage Quotation', 'url'=>array('demand/quo')),
 array('label'=>'View Shipping Order ','url'=>array('sosalesplan/viewsoauto', array('id'=>$modelSo->id_so)), 'active'=>true),
 //array('label'=>'Back to step 1 ', 'url'=>array('demand/quoupdate','id'=>$model->id_quotation)),
);
?>
<?php //echo $this->renderPartial('_view_sales_plan_info', array( 'modelSalesPlan'=>$modelSalesPlan,'modelSo'=>$modelSo,)); ?>

<?php echo $this->renderPartial('_view_quotation_info', array( 'modelQuotation'=>$modelQuotation,'modelSo'=>$modelSo,)); ?>

<?php echo $this->renderPartial('_view_shipping_order', array( 'modelQuotation'=>$modelQuotation,'modelSo'=>$modelSo,)); ?>


