<?php
$this->breadcrumbs=array(
	'Service Items'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'Manage Service Item','url'=>array('admin'), 'active'=>true),
array('label'=>'Create Service Item','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('service-item-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<div id="content">
<h2>Manage Survey Items</h2>
<hr>

</div>



<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'service-item-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		//'id_service_item',
		array(
			'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
        ),
		'service_item',
		'description',
		//'id_po_category',
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
