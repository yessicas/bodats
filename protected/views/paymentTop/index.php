<?php
$this->breadcrumbs=array(
	'Payment Tops',
);

$this->menu=array(
array('label'=>'Create PaymentTop','url'=>array('create')),
array('label'=>'Manage PaymentTop','url'=>array('admin')),
);
?>
<div id="content">
<h2>Payment Tops</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
