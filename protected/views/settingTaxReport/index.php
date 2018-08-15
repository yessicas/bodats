<?php
$this->breadcrumbs=array(
	'Setting Tax Reports',
);

$this->menu=array(
array('label'=>'Create Setting Tax Report','url'=>array('create')),
array('label'=>'Manage Setting Tax Report','url'=>array('admin')),
);
?>
<div id="content">
<h2>Setting Tax Reports</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
