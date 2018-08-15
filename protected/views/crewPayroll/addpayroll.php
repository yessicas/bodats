<?php
$this->breadcrumbs=array(
	'Crew Assignments'=>array('index'),
	'Create',
);

$this->menu=array(
//array('label'=>'List CrewAssignment','url'=>array('index')),
//array('label'=>'Manage CrewAssignment','url'=>array('admin')),
);
?>

<h3>Crew Exchange</h3>
<hr>

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
	
	<h4>Crew Sign Off</h4>
	<div class="control-group ">
		<label class="control-label" for="CrewAssignment_id_crew_position">Crew Name</label>
		<div class="controls">
			<?php echo CHtml::textField('CrewName',$crewassign->crew->CrewName,array('class'=>'span4', 'maxLength'=>10,'readonly'=>'readonly')); ?>
		</div>
	</div>
		<div class="control-group ">
		<label class="control-label" for="CrewAssignment_id_crew_position">Start Date</label>
		<div class="controls">
			<?php echo CHtml::textField('Startdate',$crewassign->start_date,array('class'=>'span4', 'maxLength'=>10,'readonly'=>'readonly')); ?>
		</div>
	</div>
		<div class="control-group ">
		<label class="control-label" for="CrewAssignment_id_crew_position">Expired Date</label>
		<div class="controls">
			<?php echo CHtml::textField('OldExpiredDate',$crewassign->expired_date,array('class'=>'calendar', 'maxLength'=>10, 'style'=>'width:100px;')); ?>
		</div>
	</div>
	<?php echo '<div class="alert warning">This crew will be replaced by:</div>'; ?>
	<h4>Crew Sign On</h4>
	<?php
		//Reset Value
		$model->CrewId = 0;
		$model->start_date = "";
		$model->expired_date = "";
		
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