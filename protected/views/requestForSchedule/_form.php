<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'request-for-schedule-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>


<script>   
    $(function() {
         $( ".calendar" ).datepicker({ dateFormat: 'yy-mm-dd' }); 
         $( ".calendar1" ).datepicker({ dateFormat: 'yy-mm-dd' });   
    }); 
</script>

<?php 
 echo"<script type='text/javascript'>
 function hitung_durasi() 
 {

 
var start = new Date($('#RequestForSchedule_StartDate').val()); 
var end = new Date($('#RequestForSchedule_EndDate').val())  
var diff = Math.abs(end-start); 
var days = diff/1000/60/60/24;

if($('#RequestForSchedule_EndDate').val()!=''&& $('#RequestForSchedule_StartDate').val()!=''){

if(start > end){
	alert('Start Date Cannot Smaller Than End Date');
	$('#RequestForSchedule_EndDate').val('');
	$('#RequestForSchedule_Duration').val('');
}else{

    $('#RequestForSchedule_Duration').val(days)
}


}


}
 </script>";
?>


<?php if (!$model->isNewRecord ){

echo"<script type='text/javascript'>
  window.onload = function (){

 
var start = new Date($('#RequestForSchedule_StartDate').val()); 
var end = new Date($('#RequestForSchedule_EndDate').val())  
var diff = Math.abs(end-start); 
var days = diff/1000/60/60/24;

if($('#RequestForSchedule_EndDate').val()!=''&& $('#RequestForSchedule_StartDate').val()!=''){

if(start > end){
	alert('Start Date Cannot Smaller Than End Date');
	$('#RequestForSchedule_EndDate').val('');
	$('#RequestForSchedule_Duration').val('');
}else{

    $('#RequestForSchedule_Duration').val(days)
}


}


}
 </script>";


}

?>



<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
	
	
	<?php 
	if(isset($_GET['idv'])) {
		$vesselID =  $_GET['idv'];

		echo'
		<div class="control-group ">
		<label class="control-label" for="Durasi">Vessel <span class="required">*</span></label>
		<div class="controls">
		';
			echo Chtml::dropDownList('vesselNameId',$vesselID,CHtml::listData(Vessel::model()->findAll(array('order'=>'VesselName')), 'id_vessel', 'VesselName','VesselType'),
    		array('prompt'=>'--Pilih --','class'=>'span3','disabled'=>true));
		echo'
		</div>
		</div>
		';
		echo $form->hiddenField($model,'id_vessel',array('class'=>'span5','value'=>$vesselID)); 

	}else{
		$vesselID =  0;
		echo $form->dropDownListRow($model,'id_vessel',CHtml::listData(Vessel::model()->findAll(array('order'=>'VesselName')), 'id_vessel', 'VesselName','VesselType'),
    	array('prompt'=>'--Pilih --','class'=>'span3', "options" => array($vesselID=>array("selected"=>true)),));
	}

	?>





	<?php //echo $form->dropDownListRow($model,'id_vessel',CHtml::listData(Vessel::model()->findAll(), 'id_vessel', 'VesselName','VesselType'),
    //array('prompt'=>'--Pilih --','class'=>'span3', "options" => array($vesselID=>array("selected"=>true)),));?>

	<?php //echo $form->textFieldRow($model,'id_vessel',array('class'=>'span5')); ?>




	<?php //echo $form->dropDownListRow($model,'id_vessel_status',CHtml::listData(VesselStatus::model()->findAll(), 'id_vessel_status', 'vessel_status'),
    //array('prompt'=>'--Pilih --','class'=>'span3'));?>

    	<?php if(isset($_GET['mode'])){

		    if($_GET['mode']=='REPAIR'){
		        $id_vessel_status=20;
		    }

		    if($_GET['mode']=='DOCKING'){
		        $id_vessel_status=30;
		    }
		    
			}else{
			   $id_vessel_status=30;
			}
		?>

    	<div class="control-group ">
		<label class="control-label" for="Durasi">Vessel Status <span class="required">*</span></label>
		<div class="controls">
		<?php echo Chtml::dropDownList('viewstatusbessel',$id_vessel_status,CHtml::listData(VesselStatus::model()->findAll(), 'id_vessel_status', 'vessel_status'),
	    array('prompt'=>'-- Select --','class'=>'span3','disabled'=>'disabled'));?>
	    </div>
		</div>
    	<?php echo $form->hiddenField($model,'id_vessel_status',array('class'=>'span5','value'=>$id_vessel_status)); ?>



	<?php //echo $form->textFieldRow($model,'id_vessel_status',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'status_rfs',array('class'=>'span5','maxlength'=>0)); ?>

	<?php echo $form->textFieldRow($model,'StartDate',array('class'=>'calendar', 'id'=>'RequestForSchedule_StartDate' ,'onChange' => 'javascript:hitung_durasi()')); ?>

	<?php echo $form->error($model,'StartDate'); ?>

	<?php echo $form->textFieldRow($model,'EndDate',array('class'=>'calendar1', 'id'=>'RequestForSchedule_EndDate','onChange' => 'javascript:hitung_durasi()')); ?>

	<?php echo $form->error($model,'EndDate'); ?>

	<div class="control-group ">
		<label class="control-label" for="Durasi">Duration <span class="required">*</span></label>
		<div class="controls">

	<?php echo CHtml::textField('Duration','',array('class'=>'span1', 'id'=>'RequestForSchedule_Duration','readonly'=>'readonly')); ?>
	<?php echo CHtml::textField('Days','Days',
			array('style'=>'width:30px; margin-left:-10px','readonly'=>'readonly'));?>

	</div>
	</div>

	<?php echo $form->dropDownListRow($model,'TypeSchedule',array('UNSCHEDULED'=>'UNSCHEDULED', 'SCHEDULED'=>'SCHEDULED'), 
			array('prompt'=>'-- Select --','class'=>'span3'));?>
	<?php echo $form->dropDownListRow($model,'TypeBreakdown',array('UNBREAKDOWN'=>'UNBREAKDOWN', 'BREAKDOWN'=>'BREAKDOWN'), 
			array('prompt'=>'-- Select --','class'=>'span3'));?>

	<?php //echo $form->textFieldRow($model,'notes',array('class'=>'span5','maxlength'=>250)); ?>
	<?php echo $form->textAreaRow($model,'notes',array('rows'=>4, 'cols'=>50, 'class'=>'span4')); ?>

	<?php if(isset($_GET['mode'])){

		    if($_GET['mode']=='REPAIR'){
		    	echo'
		    	<br>
		    	<div class="alert in alert-block fade alert-danger">
				Choose YES if you want to force plot to schedule.
				</div>
				';
		        echo $form->dropDownListRow($model,'forced_plot_to_schedule',array('NO'=>'NO','YES'=>'YES' ), array( 'class'=>'span2'));
		    }
		}
	?>



	<?php //echo $form->textFieldRow($model,'id_schedule',array('class'=>'span5','maxlength'=>20)); ?>


<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
