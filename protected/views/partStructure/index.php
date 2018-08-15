<?php
$this->breadcrumbs=array(
	'Part Structures',
);

$this->menu=array(
array('label'=>'Create Part Structure','url'=>array('create')),
array('label'=>'Manage Part Structure','url'=>array('admin')),
);
?>
<div id="content">
<h2>Part Structures</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
