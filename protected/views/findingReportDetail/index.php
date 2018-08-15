<?php
$this->breadcrumbs=array(
	'Finding Report Details',
);

$this->menu=array(
array('label'=>'Create FindingReportDetail','url'=>array('create')),
array('label'=>'Manage FindingReportDetail','url'=>array('admin')),
);
?>
<div id="content">
<h2>Finding Report Details</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
