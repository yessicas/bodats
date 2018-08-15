<?php
$this->breadcrumbs=array(
	'Numbering Faktur Allocations'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Faktur Allocation','url'=>array('admin')),
array('label'=>'Create Faktur Allocation','url'=>array('create'), 'active'=>true),
);
?>



<div id="content">
<h2>Add New Faktur Allocation</h2>
</div>

<div class ="alert alert-info">
Please fill with allocation number of VAT taken from tax office. For example starf from 010.034.16.66216502 until 010.034.16.66216522 
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>