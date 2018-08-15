<?php
$this->breadcrumbs=array(
	'Setting Invoice Reports',
);

$this->menu=array(
array('label'=>'Create Setting Invoice Report','url'=>array('create')),
array('label'=>'Manage Setting Invoice Report','url'=>array('admin')),
);
?>
<div id="content">
<h2>Setting Invoice Reports</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
