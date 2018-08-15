<?php
$this->breadcrumbs=array(
	'Finding Report Details'=>array('index'),
	$model->id_finding_report_detail=>array('view','id'=>$model->id_finding_report_detail),
	'Update',
);

	$this->menu=array(
	array('label'=>'List FindingReportDetail','url'=>array('index')),
	array('label'=>'Create FindingReportDetail','url'=>array('create')),
	array('label'=>'View FindingReportDetail','url'=>array('view','id'=>$model->id_finding_report_detail)),
	array('label'=>'Manage FindingReportDetail','url'=>array('admin')),
	);
	?>
<div id="content">
	<h2>Update FindingReportDetail # <font color=#BD362F> <?php echo $model->id_finding_report_detail; ?></font></h2>
	<hr>
</div>
<?php echo $this->renderPartial('../FindingReportDetail/_form',array('model'=>$model)); ?>