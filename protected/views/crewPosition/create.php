<?php
$this->breadcrumbs=array(
	'Crew Positions'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage Crew Position','url'=>array('master/mascrew')),
array('label'=>'Create Crew Position','url'=>array('master/mascrewcreate')),

);
?>
<div id="content">
<h2>Create Crew Position</h2>
<hr>
</div>


<?php echo $this->renderPartial('../CrewPosition/_form', array('model'=>$model)); ?>