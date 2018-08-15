<?php
$this->breadcrumbs=array(
	'Settype Tugbarges'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage Set Tug Barge','url'=>array('settypetugbarge/admin')),
array('label'=>'Create Set type Tug barge','url'=>array('settypetugbarge/create')),
);
?>
<div id="content">
<h2>Create Set type Tug barge</h2>
<hr>
</div>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>