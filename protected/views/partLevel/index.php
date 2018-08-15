<?php
$this->breadcrumbs=array(
	'Part Levels',
);

$this->menu=array(
array('label'=>'Create Part Level','url'=>array('create')),
array('label'=>'Manage Part Level','url'=>array('admin')),
);
?>
<div id="content">
<h2>Part Levels</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
