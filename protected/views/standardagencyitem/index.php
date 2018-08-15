<?php
$this->breadcrumbs=array(
	'Standard Agency Items',
);

$this->menu=array(
array('label'=>'Create StandardAgencyItem','url'=>array('create')),
array('label'=>'Manage StandardAgencyItem','url'=>array('admin')),
);
?>
<div id="content">
<h2>Standard Agency Items</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
