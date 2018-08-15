<?php
$this->breadcrumbs=array(
	'Vessel Statuses'=>array('index'),
	'Create',
);

$this->menu=array(
    array('label'=>'Create Vessel Status', 'url'=>array('master/masvescreate')),
    array('label'=>'Manage Vessel Status', 'url'=>array('master/masves')),
    
);
?>
<div id="content">
<h2>Create VesselStatus</h2>
<hr>
</div>


<?php echo $this->renderPartial('../vesselstatus/_form', array('model'=>$model)); ?>