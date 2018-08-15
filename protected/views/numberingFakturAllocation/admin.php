<?php
$this->breadcrumbs=array(
	'Numbering Faktur Allocations'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List Faktur Allocation','url'=>array('admin'), 'active'=>true),
array('label'=>'Create Faktur Allocation','url'=>array('create')),
);


?>


<div id="content">
<h2>Faktur Allocation</h2>
</div>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'numbering-faktur-allocation-grid',
'dataProvider'=>$model->search(),
'type' => 'striped bordered condensed',
'filter'=>$model,
'columns'=>array(
		array(
				'header'=>'No',    
				'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            ),
		//'id_numbering_faktur_allocation',
		array(      
            'header'=>'Is Active',
            'value'=>'$data->getYesNoStr($data->is_active)' ,
        ), 
		'first_number',
		'last_number',
		'create_date',
		'user_create',
		'ip_user_create',
		//'prefix_number',
		//'first_number_int',
		/*
		'last_number_int',
		'create_date',
		'user_create',
		'ip_user_create',
		*/
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
