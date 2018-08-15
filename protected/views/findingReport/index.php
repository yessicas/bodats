<?php
$this->breadcrumbs=array(
	'Finding Reports',
);

$this->menu=array(
array('label'=>'Create Finding Report','url'=>array('create')),
array('label'=>'Manage Finding Report','url'=>array('admin')),
);
?>
<div id="content">
<h2>Finding Reports</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
