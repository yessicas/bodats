<?php
$this->breadcrumbs=array(
	'Damage Report Repairs',
);

$this->menu=array(
array('label'=>'Create DamageReportRepair','url'=>array('create')),
array('label'=>'Manage DamageReportRepair','url'=>array('admin')),
);
?>

<h1>Damage Report Repairs</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
