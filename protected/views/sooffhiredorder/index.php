<?php
$this->breadcrumbs=array(
	'So Offhired Orders',
);

$this->menu=array(
array('label'=>'Create SO TC','url'=>array('create')),
array('label'=>'Manage SO TC','url'=>array('admin')),
);
?>
<div id="content">
<h2>SO TC</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
