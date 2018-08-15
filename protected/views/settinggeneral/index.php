<?php
$this->breadcrumbs=array(
	'Setting Generals',
);

$this->menu=array(
array('label'=>'Create SettingGeneral','url'=>array('create')),
array('label'=>'Manage SettingGeneral','url'=>array('admin')),
);
?>
<div id="content">
<h2>Setting Generals</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
