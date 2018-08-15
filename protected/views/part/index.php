<?php
$this->breadcrumbs=array(
	'Parts',
);

$this->menu=array(
array('label'=>'Create Part','url'=>array('create')),
array('label'=>'Manage Part','url'=>array('admin')),
);
?>
<div id="content">
<h2>Parts</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
