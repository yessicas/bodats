<?php
$this->breadcrumbs=array(
	'Customer Voices'=>array('index'),
	$model->id_customor_voice=>array('view','id'=>$model->id_customor_voice),
	'Update',
);

	$this->menu=array(
	//array('label'=>'List CustomerVoice','url'=>array('index')),
	array('label'=>'Manage Customer Voice','url'=>array('zone/voice')),
	//array('label'=>'Create CustomerVoice','url'=>array('create')),
	array('label'=>'View Customer Voice','url'=>array('zone/voiceview','id'=>$model->id_customor_voice)),
	array('label'=>'Update Customer Voice','url'=>array('zone/voiceupdate','id'=>$model->id_customor_voice)),
	
	);
	?>
<div id="content">
	<h2>Update Customer Voice<font color=#BD362F> <?php echo $model->id_customor_voice; ?></font></h2>
	<hr>
</div>
<?php echo $this->renderPartial('../CustomerVoice/_form',array('model'=>$model)); ?>