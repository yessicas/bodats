<?php
$this->breadcrumbs=array(
	'Customer Voices'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Customer Rating','url'=>array('demand/rating')),
);
?>

<?php

	Yii::app()->clientScript->registerScript('search', "
	$('.search-button').click(function(){
	    $('.search-form').toggle();
	    return false;
	});
	$('.search-form form').submit(function(){
	    $.fn.yiiGridView.update('availability-grid', {
	        data: $(this).serialize()
	    });
	    return false;
	});
	");
	?>



<div class="view">
	<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>'demand/pilihan',
    'method'=>'post',
)); ?>
		<?php /*
		$model = "asdasd";
		*/ ?>
		
	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="freightCalculator_Ratingby"><?php echo "Rating By &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
		<?php echo CHtml::dropDownList('Ratingby','',array("VolumeOrder"=>"Volume Order","PaymentPerformance"=>"Payment Performance"),
			array('class'=>'span3'));?>
	</div>
	</div>

	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="freightCalculator_Year"><?php echo "Year &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">

	<?php echo CHtml::dropDownList('Year','',array("2014"=>"2014"),
			array('class'=>'span3'));?>

	</div>
	</div>

	<div class="form-actions">

		<?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type'=>'primary',
            'label'=>'Display',
        )); 
?>
	</div>
</div>

<?php $this->endWidget(); ?>