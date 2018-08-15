<?php
$this->breadcrumbs=array(
	'Setting Generals'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage Setting General','url'=>array('setting/general')),
array('label'=>'Create Setting General','url'=>array('setting/generalcreate')),
);
?>
<div id="content">
<h2>Create SettingGeneral</h2>
<hr>
</div>


<?php echo $this->renderPartial('../settinggeneral/_form', array('model'=>$model)); ?>