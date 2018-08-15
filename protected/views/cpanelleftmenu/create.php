<?php
$this->breadcrumbs=array(
	'Cpanel Leftmenus'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage Cpanel Leftmenu','url'=>array('master/masleft')),
array('label'=>'Create Cpanel Leftmenu','url'=>array('master/masleftcreate')),

);
?>
<div id="content">
<h2>Create CpanelLeftmenu</h2>
<hr>
</div>


<?php echo $this->renderPartial('../CpanelLeftmenu/_form', array('model'=>$model)); ?>