<?php
$this->breadcrumbs=array(
	'Nodes'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Create Node', 'url'=>array('entity/entinodecreate')),
 array('label'=>'Manage Node', 'url'=>array('entity/entinode')),
);
?>
<div id="content">
<h2>Create Node</h2>
<hr>
</div>


<?php echo $this->renderPartial('../node/_form', array('model'=>$model)); ?>