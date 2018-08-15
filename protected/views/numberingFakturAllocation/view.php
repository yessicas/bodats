<?php
$this->breadcrumbs=array(
	'Numbering Faktur Allocations'=>array('index'),
	$model->id_numbering_faktur_allocation,
);

$this->menu=array(
	array('label'=>'List Faktur Allocation','url'=>array('admin')),
	array('label'=>'Create Faktur Allocation','url'=>array('create')),
	array('label'=>'View Faktur Allocation','url'=>array('view','id'=>$model->id_numbering_faktur_allocation), 'active'=>true),
);
?>

<div id="content">
<h2>View Numbering Faktur Allocation</h2>
</div>

<div class="view">
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_numbering_faktur_allocation',
		array('name' => 'status','format'=>'raw',
              'value'=> $model -> is_active == 1 ? 'Active' : 'in Active'),
		'first_number',
		'last_number',
		//'prefix_number',
		//'first_number_int',
		//'last_number_int',
		//'create_date',
		//'user_create',
		//'ip_user_create',
),
)); ?>
</div>

<div class="view">
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_numbering_faktur_allocation',
		//'prefix_number',
		//'first_number_int',
		//'last_number_int',
		'create_date',
		'user_create',
		'ip_user_create',
),
)); ?>
</div>