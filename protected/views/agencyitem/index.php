<?php
$this->breadcrumbs=array(
	'Agency Items',
);

$this->menu=array(
array('label'=>'Create AgencyItem','url'=>array('create')),
array('label'=>'Manage AgencyItem','url'=>array('admin')),
);
?>
<div id="content">
<h2>Agency Items</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
