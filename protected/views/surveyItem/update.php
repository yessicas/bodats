<?php
$this->breadcrumbs=array(
	'Survey Items'=>array('index'),
	$model->id_survey_item=>array('view','id'=>$model->id_survey_item),
	'Update',
);

	$this->menu=array(
	// array('label'=>'List SurveyItem','url'=>array('index')),
	array('label'=>'Manage Survey Item','url'=>array('admin')),
	array('label'=>'Create Survey Item','url'=>array('create')),
	array('label'=>'View Survey Item','url'=>array('view','id'=>$model->id_survey_item)),
	array('label'=>'Update Survey Item','url'=>array('update','id'=>$model->id_survey_item),'active'=>true),
	
	);
	?>
<div id="content">
	<h2>Update Survey Item<font color=#BD362F> <?php echo $model->id_survey_item; ?></font></h2>
	<hr>
</div>
<?php echo $this->renderPartial('../SurveyItem/_form',array('model'=>$model)); ?>