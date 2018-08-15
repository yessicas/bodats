<?php
$this->breadcrumbs=array(
	'Setting Spal Reports',
);

$this->menu=array(
array('label'=>'Create Setting SPAL Report','url'=>array('create')),
array('label'=>'Manage Setting SPAL Report','url'=>array('admin')),
);
?>
<div id="content">
<h2>Setting SPAL Reports</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
