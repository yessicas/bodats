<?php
$this->breadcrumbs=array(
	'So Offhired Orders'=>array('index'),
	'Create',
);

$this->menu=array(
//array('label'=>'Manage Shipping Order ','url'=>array('so/admin')),
//array('label'=>'Create Shipping Order','url'=>array('so/searchquo')),
array('label'=>'Manage TC','url'=>array('sooffhiredorder/admin')),
array('label'=>'Create TC','url'=>array('sooffhiredorder/create')),
);

$this->menu=array(
array('label'=>'Manage SO','url'=>array('so/admin')),
array('label'=>'Create SO','url'=>array('so/searchquo')),
array('label'=>'Create SO Without Quotation','url'=>array('soquo/quocreate')),
array('label'=>'Manage TC','url'=>array('sooffhiredorder/admin')),
array('label'=>'Create TC','url'=>array('sooffhiredorder/create')),
);
?>
<div id="content">
<h2>Create TC</h2>
<hr>
</div>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>