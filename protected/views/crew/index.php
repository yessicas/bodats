<?php
$this->breadcrumbs=array(
	'Crews',
);

$this->menu=array(
array('label'=>'Create Crew','url'=>array('create')),
array('label'=>'Manage Crew','url'=>array('admin')),
);
?>
<div id="content">
<h2>Crews</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
