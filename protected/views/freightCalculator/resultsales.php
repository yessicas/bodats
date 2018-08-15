<?php
$this->breadcrumbs=array(
	'Result'=>array('result'),
	'Check',
);

$this->menu=array(

array('label'=>'Calculator','url'=>array('demand/caculat')),
array('label'=>'Calculator Result','url'=>array('demand/result'), 'active'=>true),
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




<h4>Cost Plan Calculator Result</h4>


<div class="view">

	<?php /*$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>'salesplan/approve',
    'method'=>'post',
    'type'=>'horizontal',
)); */ ?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'salesplan-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data')
)); ?>


<?php 
/*
$Load= $_POST['PortLoading'] ; 
$Unload= $_POST['PortUnLoading'] ;
$Tug= $_POST['Tug'] ;
$Barge= $_POST['Barge'] ;
$Quan= $_POST['quantity'];
*/
?>



<div class="view">
		
		
	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="freightCalculator_PortLoading"><?php echo "PortLoading &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
		<?php echo CHtml::textField('PortLoading','',array('class'=>'span3', 'maxLength'=>10, 'readonly'=>'readonly')); ?>
	</div>
	</div>

	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="freightCalculator_PortUnloading"><?php echo "PortUnloading &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
	<?php echo CHtml::textField('PortUnloading','',array('class'=>'span3', 'maxLength'=>10,'readonly'=>'readonly')); ?>
	</div>
	</div>

	
	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="freightCalculator_Tug"><?php echo "Tug &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
	<?php echo CHtml::textField('Tug','',array('class'=>'span3', 'maxLength'=>10,'readonly'=>'readonly')); ?>
	</div>
	</div>


	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="freightCalculator_Barge"><?php echo "Barge &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
	<?php echo CHtml::textField('Barge','',array('class'=>'span3', 'maxLength'=>10,'readonly'=>'readonly')); ?>
	</div>
	</div>

	
	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="freightCalculator_Quantity"><?php echo "Quantity &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
		<?php echo CHtml::textField('Quantity','',array('class'=>'span3', 'maxLength'=>10)); ?>
		<?php echo CHtml::dropDownList('MT','',array("MT"=>"MT"),
			array('style'=>'width:60px;','disabled'=>'disabled'));?>
	</div>
	</div>

	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="freightCalculator_Price"><?php echo "Price Per MT &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
		<?php echo CHtml::textField('Price','',array('class'=>'span3', 'maxLength'=>10)); ?>
		<?php echo CHtml::dropDownList('USD','',array("USD"=>"USD"),
			array('style'=>'width:70px;','disabled'=>'disabled'));?>
	</div>
	</div>

</div>

	<h4>Cost Standard</h4>

	<div class="view">

	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="freightCalculator_FullCost"><?php echo "Full Cost &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
		<?php echo CHtml::textField('FullCost','',array('class'=>'span3', 'maxLength'=>10,'readonly'=>'readonly')); ?> IDR
	</div>
	</div>

	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="freightCalculator_AgencyFix"><?php echo "AgencyFix &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
	<?php echo CHtml::textField('AgencyFix','',array('class'=>'span3', 'maxLength'=>10,'readonly'=>'readonly')); ?> IDR
	</div>
	</div>

	
	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="freightCalculator_DepreciationCost"><?php echo "DepreciationCost &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
	<?php echo CHtml::textField('DepreciationCost','',array('class'=>'span3', 'maxLength'=>10,'readonly'=>'readonly')); ?> IDR
	</div>
	</div>


	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="freightCalculator_CrewCost"><?php echo "Crew Cost &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
	<?php echo CHtml::textField('CrewCost','',array('class'=>'span3', 'maxLength'=>10,'readonly'=>'readonly')); ?> IDR
	</div>
	</div>

	
	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="freightCalculator_InsuranceCost"><?php echo "Insurance Cost &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
		<?php echo CHtml::textField('InsuranceCost','',array('class'=>'span3', 'maxLength'=>10,'readonly'=>'readonly')); ?> IDR
	</div>
	</div>


	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="freightCalculator_RepairCost"><?php echo "Repair Cost &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
	<?php echo CHtml::textField('RepairCost','',array('class'=>'span3', 'maxLength'=>10,'readonly'=>'readonly')); ?> IDR
	</div>
	</div>

	
	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="freightCalculator_DockingCost"><?php echo "Docking Cost &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
		<?php echo CHtml::textField('DockingCost','',array('class'=>'span3', 'maxLength'=>10,'readonly'=>'readonly')); ?> IDR
	</div>
	</div>

	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="freightCalculator_BrokerCost"><?php echo "Brokerage Cost &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
	<?php echo CHtml::textField('BrokerCost','',array('class'=>'span3', 'maxLength'=>10,'readonly'=>'readonly')); ?> IDR
	</div>
	</div>

	
	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="freightCalculator_OthersCost"><?php echo "Others Cost &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
		<?php echo CHtml::textField('OthersCost','',array('class'=>'span3', 'maxLength'=>10,'readonly'=>'readonly')); ?> IDR
	</div>
	</div>

	<hr style="width:350px; margin-left:20px;">

	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="freightCalculator_TotCost" style="font-weight:bold;"><?php echo "TOTAL COST &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
	<?php echo CHtml::textField('CrewCost','',array('class'=>'span3', 'maxLength'=>10,'readonly'=>'readonly')); ?> IDR
	</div>
	</div>

	
	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="freightCalculator_InsuranceCost" style="font-weight:bold;"><?php echo "COST PER MT &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
		<?php echo CHtml::textField('InsuranceCost','',array('class'=>'span3', 'maxLength'=>10,'readonly'=>'readonly')); ?> IDR
	</div>
	</div>

</div>

	<h4>Grows Profit</h4>

	<div class="view">

		<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="freightCalculator_GP"><?php echo "GP &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
	<?php echo CHtml::textField('GP','',array('class'=>'span1', 'maxLength'=>10)); ?> %
	</div>
	</div>

	
	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="freightCalculator_QuotationCost" style="font-weight:bold;"><?php echo " QUOTATION COST &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
		<?php echo CHtml::textField('QuotationCost','',array('class'=>'span3', 'maxLength'=>10,'readonly'=>'readonly')); ?> IDR
	</div>
	</div>

	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="freightCalculator_InsuranceCost" style="font-weight:bold;"><?php echo "COST PER MT &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
		<?php echo CHtml::textField('InsuranceCost','',array('class'=>'span3', 'maxLength'=>10,'readonly'=>'readonly')); ?> IDR
	</div>
	</div>



	</div>

	<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Add Sales Plan',
		)); ?>
</div>



</div>

<?php $this->endWidget(); ?>