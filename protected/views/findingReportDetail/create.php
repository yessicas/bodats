<?php
$this->breadcrumbs=array(
	'Finding Report Details'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage FindingReportDetail','url'=>array('admin')),
array('label'=>'Create FindingReportDetail','url'=>array('create')),

);
?>

<h3>Create FindingReportDetail</h3>
<hr>


<?php echo $this->renderPartial('../FindingReportDetail/_form', array('model'=>$model)); ?>