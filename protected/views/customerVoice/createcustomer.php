<?php
$this->breadcrumbs=array(
	'Customer Voices'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Add Your Voice','url'=>array('zone/voicecreate'), 'active'=>true),
array('label'=>'View Last Customer Voice','url'=>array('customervoice/admincustomer')),


);
?>

<?php
if(Yii::app()->user->hasFlash('error')):?>

<div class = "animated flash">
	<?php
    $this->widget('bootstrap.widgets.TbAlert', array(
    'block' => true,
    'fade' => true,
    'closeText' => '&times;', // false equals no close link
    'alerts' => array( // configurations per alert type
        // success, info, warning, error or danger
        'error' => array('closeText' => '&times;'), 

    ),
	));
	?>
</div>

<?php endif; ?>

<div id="content">
<h2>Add Your Voice</h2>
<hr>
</div>
<div class="alert alert-block alert-info">
Please give your feedback or your voice to us (PT.PML). Thank you for your comment and feedback.
</div>

<?php echo $this->renderPartial('../CustomerVoice/_form', array('model'=>$model)); ?>