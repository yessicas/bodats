<?php
$this->breadcrumbs=array(
	'Crews'=>array('index'),
	'Create',
);

$this->menu=array(
 
    array('label'=>'Manage Crew', 'url'=>array('cre/crew')),
    array('label'=>'Create Crew', 'url'=>array('cre/crewcreate')),
);
?>
<div id="content">
<h2>Create Crew</h2>
<hr>
</div>


<?php echo $this->renderPartial('../crew/_form', array('model'=>$model)); ?>