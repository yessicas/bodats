<?php
$this->breadcrumbs=array(
	'Standard Agencies',
);

$this->menu=array(
array('label'=>'Create StandardAgency','url'=>array('create')),
array('label'=>'Manage StandardAgency','url'=>array('admin')),
);
?>
<div id="content">
<h2>Standard Agencies</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
