	<?php
	$this->breadcrumbs=array(
		'Reservation Inquiry'=>array('step2'),
		'Create',
	);

	$this->menu=array(
	 array('label'=>'Availability', 'url'=>array('checkavailable')),
	  array('label'=>'Step1', 'url'=>array('step1')),
    array('label'=>'Step2', 'url'=>array('step2'),'active'=>true),
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
	<h2>Reservation Inquiry</h2>
	<hr>
	</div>

	<div class="alert alert-block alert-info">
	Step 2 Inquiry Estimation
	</div>

	<div class="view">

	<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
    'action'=>Yii::app()->createUrl($this->route),
    'type' => 'horizontal',
    'method'=>'get',
)); ?>



	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="freightCalculator_CompanyName"><?php echo "Company Name &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
		<?php echo CHtml::textField('CompanyName','',array('class'=>'span4', 'maxLength'=>10,'readonly'=>'readonly')); ?>
	</div>
	</div>

	<div class="form-horiz ">

	<label class="control-label required" for="LoadingDate"><?php echo "Loading Date &nbsp"?> <span class="required">*</span></label> <!-- label -->

	<div class="controls">

	<?php echo CHtml::textField('LoadingDate','',array('class'=>'span2', 'maxLength'=>10,'readonly'=>'readonly')); ?>

	</div>
	</div>

	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="freightCalculator_PortLoading"><?php echo "Port Of Loading &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
		<?php echo CHtml::textField('PortLoading','',array('class'=>'span3', 'maxLength'=>10,'readonly'=>'readonly')); ?>
	</div>
	</div>


	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="freightCalculator_PortUnloading"><?php echo "Port Of Unloading &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
	<?php echo CHtml::textField('PortUnloading','',array('class'=>'span3', 'maxLength'=>10,'readonly'=>'readonly')); ?>
	</div>
	</div>


	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="freightCalculator_TUG"><?php echo "TUG &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
		<?php echo CHtml::textField('TUG','',array('class'=>'span2', 'maxLength'=>10,'readonly'=>'readonly')); ?>
	</div>
	</div>

	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="freightCalculator_BARGE"><?php echo "BARGE &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
		<?php echo CHtml::textField('BARGE','',array('class'=>'span2', 'maxLength'=>10,'readonly'=>'readonly')); ?>
	</div>
	</div>

	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="freightCalculator_Quantity"><?php echo "Quantity &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
		<?php echo CHtml::textField('Quantity','',array('class'=>'span2', 'maxLength'=>10)); ?>
		<?php echo CHtml::textField('MT','MT',
			array('style'=>'width:18px; margin-left:-25px;','disabled'=>'disabled'));?>
	</div>
	</div>

	<div style="font-weight:bold; margin-left:80px; margin-bottom:10px;" > Standard Cost & Estimation</div>

	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="freightCalculator_Cost"><?php echo "Cost &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
		<?php echo CHtml::textField('Cost','',array('class'=>'span2', 'maxLength'=>10,'readonly'=>'readonly')); ?>
		<?php echo CHtml::textField('MT','IDR per MT',
			array('style'=>'width:63px; margin-left:-25px;','disabled'=>'disabled'));?>
	</div>
	</div>

	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="freightCalculator_SailingTime"><?php echo "Sailing Time &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
		<?php echo CHtml::textField('SailingTime','',array('class'=>'span2', 'maxLength'=>10,'readonly'=>'readonly')); ?>
		<?php echo CHtml::textField('MT','days',
			array('style'=>'width:27px; margin-left:-25px;','disabled'=>'disabled'));?>
	</div>
	</div>



		<div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type'=>'primary',
            'label'=>'Reserve & Ask Quotation',
        )); ?>
    </div>
</div>

<?php $this->endWidget(); ?>