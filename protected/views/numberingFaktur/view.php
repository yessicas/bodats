<?php
	$this->breadcrumbs=array(
		'Numbering Fakturs'=>array('index'),
		$model->id_numbering_faktur,
	);

	$this->menu=array(
		array('label'=>'List Numbering Faktur','url'=>array('admin')),
		//array('label'=>'Create Numbering Faktur','url'=>array('create')),
		array('label'=>'Update Numbering Faktur','url'=>array('update','id'=>$model->id_numbering_faktur), 'active'=>false),
		array('label'=>'View Numbering Faktur','url'=>array('view'), 'active'=>true),
	);
?>

	<div id="content">
	<h2>View NumberingFaktur #<?php echo $model->number_faktur_complete; ?></h2>
	</div>

	<div class="view">
	<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
			//'id_numbering_faktur',
			//'first_number',
			//'last_number',
			'number_faktur_complete',
			'status',
			'notes',
			'taken_date',
			'user_taken',
			'ip_user_taken',
	),
	)); ?>
	</div>
	
	