<?php
	$this->breadcrumbs=array(
		'Numbering Invoices'=>array('index'),
		'Create',
	);

		$this->menu=array(
	array('label'=>'List Numbering Invoice','url'=>array('admin')),
	array('label'=>'Create Numbering Invoice','url'=>array('create'), 'active'=>true),
	);
?>

<div id="content">
<h2>Create Numbering Invoice</h2>
</div>
	
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>