<?php
$this->breadcrumbs=array(
	'Jetties'=>array('index'),
	'Create',
);

$this->menu=array(
 array('label'=>'Manage Jetty', 'url'=>array('entity/entijet')),
 array('label'=>'Create Jetty', 'url'=>array('entity/entijetcreate')),
);
?>
<div id="content">
<h2>Create Jetty</h2>
<hr>
</div>


<?php echo $this->renderPartial('../jetty/_form', array('model'=>$model)); ?>