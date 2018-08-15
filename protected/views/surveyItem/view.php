<?php
$this->breadcrumbs=array(
	'Survey Items'=>array('index'),
	$model->id_survey_item,
);

$this->menu=array(
//array('label'=>'List SurveyItem','url'=>array('index')),
array('label'=>'Manage Survey Item','url'=>array('admin')),
array('label'=>'Create Survey Item','url'=>array('create')),
array('label'=>'View Survey Item','url'=>array('view','id'=>$model->id_survey_item),'active'=>true),
array('label'=>'Update Survey Item','url'=>array('update','id'=>$model->id_survey_item)),

array('label'=>'Delete Survey Item','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_survey_item),'confirm'=>'Are you sure you want to delete this item?')),

);
?>

<?php
if(Yii::app()->user->hasFlash('success')):?>

<div class = "animated flash">
	<?php
    $this->widget('bootstrap.widgets.TbAlert', array(
    'block' => true,
    'fade' => true,
    'closeText' => '&times;', // false equals no close link
    'alerts' => array( // configurations per alert type
        // success, info, warning, error or danger
        'success' => array('closeText' => '&times;'), 

    ),
	));
	?>
</div>

<?php endif; ?>
<div id="content">
<h2>View Survey Item<font color=#BD362F> #<?php echo $model->id_survey_item; ?></font></h2>
<hr>
</div>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_survey_item',
		'survey_item_name',
		'survey_item_code',
		'category',
),
)); ?>
