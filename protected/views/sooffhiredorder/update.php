<?php
$this->breadcrumbs=array(
	'So Offhired Orders'=>array('index'),
	$model->id_so_offhired_order=>array('view','id'=>$model->id_so_offhired_order),
	'Update',
);

	$this->menu=array(
//array('label'=>'Manage Shipping Order ','url'=>array('so/admin')),
//array('label'=>'Create Shipping Order','url'=>array('so/searchquo')),
array('label'=>'Manage TC ','url'=>array('sooffhiredorder/admin')),
array('label'=>'Create TC','url'=>array('sooffhiredorder/create')),
array('label'=>'Update TC','url'=>array('sooffhiredorder/update','id'=>$model->id_so_offhired_order)),
);
?>

<div id="content">
<h2>Update TC # <font color="#BD362F"><?php echo $model->OffhiredOrderNumber; ?></font></h2>
<hr>
</div>



<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>