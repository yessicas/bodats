<h3>Crew Sign On</h3>
<hr>


	<?php /*$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>'demand/salesplan',
    'method'=>'post',
    'type'=>'horizontal',
));  */ ?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'SignOn-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data')
));  ?>

<script>   
    $(function() {
         $( ".calendar" ).datepicker({ dateFormat: 'yy-mm-dd' }); 
         $( ".calendar1" ).datepicker({ dateFormat: 'yy-mm-dd' });   
    }); 
</script>


<?php
	$crewassign = CrewDB::getCrewAssignment($id_tug, $id_crew_position);
	
	$crewdefvalue = '';
	$statdatedefvalue = '';
	$enddatedefvalue = '';
	if($crewassign != null){
		$crewdefvalue = $crewassign->CrewId;
		$statdatedefvalue = $crewassign->start_date;
		$enddatedefvalue = $crewassign->expired_date;
		echo '<div class="alert-danger info" style="padding:5px;">Update Crew Assignment</div>';
	}
	$crewpos = CrewDB::getCrewPosition($id_crew_position);
	$vessel = VesselDB::getVessel($id_tug);
?>
<?php echo $form->errorSummary($model); ?>
<div class="view">
		
	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="CrewAssignment_CrewPosition"><?php echo "Crew Position &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
	<?php echo CHtml::textField('CrewPosition',$crewpos->crew_position,array('class'=>'span4', 'maxLength'=>10,'readonly'=>'readonly')); ?>
	</div>
	</div>

	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="CrewAssignment_Vessel"><?php echo "Vessel &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
	<?php echo CHtml::textField('Vessel',$vessel->VesselName,array('class'=>'span4', 'maxLength'=>10,'readonly'=>'readonly')); ?>
	</div>
	</div>
	
	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="CrewAssignment_CrewName"><?php echo "Crew Name &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
	<?php
	
	echo CHtml::dropDownList('CrewId',$crewdefvalue ,CHtml::listData(CrewDB::getListAllCrew(), 'CrewId', 'CrewName'),
     array('prompt'=>'-- Select --','class'=>'span4'));
	?>
	</div>
	</div>


	<div class="form-horiz">
	<label class="control-label required" for="CrewAssignment_SignOffDate"><?php echo "Sign On Date &nbsp" ?> <span class="required">*</span></label> <!-- label -->

	<div class="controls">

		<?php echo CHtml::textField('StartDate',$statdatedefvalue ,array('class'=>'calendar', 'maxLength'=>10, 'style'=>'width:100px;')); ?>
	
	</div>
	</div>

	<div class="form-horiz">
	<label class="control-label required" for="CrewAssignment_Until"><?php echo "Until &nbsp" ?> <span class="required">*</span></label> <!-- label -->

	<div class="controls">
	
	<?php echo CHtml::textField('EndDate',$enddatedefvalue,array('class'=>'calendar1', 'maxLength'=>10, 'style'=>'width:100px;')); ?>

	</div>
	</div>

	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="CrewAssignment_Duration"><?php echo "Duration &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
	<?php echo CHtml::textField('Duration',"0",array('class'=>'span3', 'maxLength'=>10,'readonly'=>'readonly')); ?> days
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
