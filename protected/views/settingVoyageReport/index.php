<?php
$this->breadcrumbs=array(
	'Setting Voyage Reports',
);

$this->menu=array(
array('label'=>'Create SettingVoyageReport','url'=>array('create')),
array('label'=>'Manage SettingVoyageReport','url'=>array('admin')),
);
?>
<div id="content">
<h2>Setting Voyage Reports</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
