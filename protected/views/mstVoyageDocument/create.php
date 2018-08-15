<?php
$this->breadcrumbs=array(
	'Mst Voyage Documents'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage Voyage Document','url'=>array('voydoc')),
array('label'=>'Create Voyage Document','url'=>array('voydoccreate'),'active'=>true),

);
?>
<div id="content">
<h2>Create Voyage Document</h2>
<hr>
</div>


<?php echo $this->renderPartial('../MstVoyageDocument/_form', array('model'=>$model)); ?>