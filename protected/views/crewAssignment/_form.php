<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'crew-assignment-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<?php
	$crewassign = CrewDB::getCrewAssignment($id_tug, $id_crew_position);
	
	$crewdefvalue = '';
	$statdatedefvalue = '';
	$enddatedefvalue = '';
	if($crewassign != null){
		$crewdefvalue = $crewassign->CrewId;
		$statdatedefvalue = $crewassign->start_date;
		$enddatedefvalue = $crewassign->expired_date;
		echo '<div class="alert info">Update Crew Assignment</div>';
	}
	$crewpos = CrewDB::getCrewPosition($id_crew_position);
	$vessel = VesselDB::getVessel($id_tug);
?>
<script>   
    $(function() {
         $( ".calendar" ).datepicker({ dateFormat: 'yy-mm-dd' }); 
         $( ".calendar1" ).datepicker({ dateFormat: 'yy-mm-dd' });   
    }); 
</script>

<div class = "animated flash">
<?php echo $form->errorSummary($model); ?>
</div>

<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldRow($model,'vessel_id',array('class'=>'span5')); ?>
	<div class="control-group ">
		<label class="control-label" for="CrewAssignment_id_crew_position">Vessel</label>
		<div class="controls">
			<?php echo CHtml::textField('Vessel',$vessel->VesselName,array('class'=>'span4', 'maxLength'=>10,'readonly'=>'readonly')); ?>
		</div>
	</div>
	<div class="control-group ">
		<label class="control-label" for="CrewAssignment_id_crew_position">Crew Position</label>
		<div class="controls">
			<?php echo CHtml::textField('CrewPosition',$crewpos->crew_position,array('class'=>'span4', 'maxLength'=>10,'readonly'=>'readonly')); ?>
		</div>
	</div>

	<?php //echo $form->textFieldRow($model,'CrewId',array('class'=>'span5')); ?>
	<?php
		$crewdefvalue = '';
		echo $form->dropDownListRow($model,'CrewId' ,CHtml::listData(CrewDB::getListAllCrew(), 'CrewId', 'CrewName'),
		array('prompt'=>'-- Select --','class'=>'span4'));
	 ?>
	 
	<?php echo $form->hiddenField($model,'vessel_id',array('class'=>'span3','maxlength'=>20)); ?> 
	<?php echo $form->hiddenField($model,'id_crew_position',array('class'=>'span3','maxlength'=>20)); ?> 

	<?php //echo $form->textFieldRow($model,'id_crew_position',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'start_date',array('class'=>'calendar', 'maxLength'=>10, 'style'=>'width:100px;')); ?>

	<?php echo $form->textFieldRow($model,'expired_date',array('class'=>'calendar', 'maxLength'=>10, 'style'=>'width:100px;')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
