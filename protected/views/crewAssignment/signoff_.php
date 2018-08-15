<h3>Crew Sign Off</h3>
<hr>
	<?php /*$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>'demand/salesplan',
    'method'=>'post',
    'type'=>'horizontal',
));  */ ?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'SignOff-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data')
));  ?>


<?php 
/*
$Load= $_POST['PortLoading'] ; 
$Unload= $_POST['PortUnLoading'] ;
$Tug= $_POST['Tug'] ;
$Barge= $_POST['Barge'] ;
$Quan= $_POST['quantity'];
*/
?>

<script>   
    $(function() {
         $( ".calendar" ).datepicker({ dateFormat: 'yy-mm-dd' }); 
         $( ".calendar1" ).datepicker({ dateFormat: 'yy-mm-dd' });   
    }); 
</script>



<div class="view">
		
		
	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="CrewAssignment_CrewName"><?php echo "Crew Name &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
	<?php echo CHtml::textField('CrewName',"Alex Widodo",array('class'=>'span4', 'maxLength'=>10,'readonly'=>'readonly')); ?>
	</div>
	</div>

	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="CrewAssignment_CrewPosition"><?php echo "Crew Position &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
	<?php echo CHtml::textField('CrewPosition',"Master",array('class'=>'span3', 'maxLength'=>10,'readonly'=>'readonly')); ?>
	</div>
	</div>

	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="CrewAssignment_Vessel"><?php echo "Vessel &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
	<?php echo CHtml::textField('Vessel',"PATRIA 1",array('class'=>'span3', 'maxLength'=>10,'readonly'=>'readonly')); ?>
	</div>
	</div>


	<div class="form-horiz">
	<label class="control-label required" for="CrewAssignment_SignOffDate"><?php echo "Sign Off Date &nbsp" ?> <span class="required">*</span></label> <!-- label -->

	<div class="controls">

		<?php echo CHtml::textField('SignOff','',array('class'=>'calendar', 'maxLength'=>10, 'style'=>'width:100px;')); ?>
	
	</div>
	</div>

	<div class="form-horiz">
	<label class="control-label required" for="CrewAssignment_Until"><?php echo "Until &nbsp" ?> <span class="required">*</span></label> <!-- label -->

	<div class="controls">
	
	<?php echo CHtml::textField('Until','',array('class'=>'calendar1', 'maxLength'=>10, 'style'=>'width:100px;')); ?>

	</div>
	</div>

	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="CrewAssignment_Duration"><?php echo "Duration &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
	<?php echo CHtml::textField('Duration',"30",array('class'=>'span3', 'maxLength'=>10,'readonly'=>'readonly')); ?> days
	</div>
	</div>

	<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Save',
		)); ?>
</div>


</div>

<?php $this->endWidget(); ?>
