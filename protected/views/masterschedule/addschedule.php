<?php 
if(isset($_GET['year'])){
	$defaultDate=$_GET['year'].'-'.$_GET['month'].'-01';	
}else{
	$defaultDate=date("Y-m-d");
}

?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'schedule-form',
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

	
?>

<h3>Add Schedule - <?php echo $status; ?></h3>
<hr>

<?php echo $form->errorSummary($model); ?>

<?php /*
	<div class="control-group ">
	<label class="control-label required" ><?php echo $model::model()->getAttributeLabel('VesselTugId'); ?> <span class="required">*</span> </label> <!-- label -->
	<div class="controls">

	<?php echo $form->dropDownList($model,'VesselTugId',CHtml::listData(Vessel::model()->findAll(array(
           'condition' => 'VesselType = :VesselType',
           'params' => array(
               ':VesselType' => "TUG",
           ),
       )), 'id_vessel', 'VesselName'),
       array('prompt'=>'--Select--','class'=>'span3', 'readonly'=>'readonly'));?>

      <?php echo $form->error($model,'VesselTugId'); ?>
     </div>
	</div>
	
	<div class="control-group ">
	<label class="control-label required" ><?php echo $model::model()->getAttributeLabel('VesselBargeId'); ?> <span class="required">*</span> </label> <!-- label -->
	<div class="controls">
	
	<?php echo $form->dropDownList($model,'VesselBargeId',CHtml::listData(Vessel::model()->findAll(array(
           'condition' => 'VesselType = :VesselType',
           'params' => array(
               ':VesselType' => "TUG",
           ),
       )), 'id_vessel', 'VesselName'),
       array('prompt'=>'--Select--','class'=>'span3'));?>

      <?php echo $form->error($model,'VesselBargeId'); ?>
     </div>
	</div>
*/ ?>

	<?php //echo $form->textFieldRow($model,'VesselTugId',array('class'=>'span5')); ?>
	<?php 
	if($id_tug > 0){
		echo FormCommonDisplayer::displayRowVessel($form, $model, $id_tug, "VesselTugId", "Vessel Tug", $size="span4"); 
	}
	?>
	<?php 
	if($id_barge > 0){
		echo FormCommonDisplayer::displayRowVessel($form, $model, $id_barge, "VesselBargeId", "Vessel Barge", $size="span4"); 
	}
	?>
	
	<?php
		if($id_tug > 0 && $id_barge > 0){
			//echo 'If your choose this application, it will break the pair of.';
		}
	?>


	<?php //echo $form->textFieldRow($model,'VesselBargeId',array('class'=>'span5')); ?>

	<?php 
	//echo $form->dropDownListRow($model,'id_vessel_status',CHtml::listData(VesselStatus::model()->findAll(), 'id_vessel_status', 'vessel_status'),
    //array('prompt'=>'--Select--','class'=>'span3'));
	?>
	<?php 
	$vessel_status=VesselStatus::model()->findByAttributes(array('vessel_status'=>$status));
	$model->id_vessel_status = $vessel_status->id_vessel_status;
	echo $form->hiddenField($model,'id_vessel_status',array('class'=>'span5'));


	if($vessel_status->id_vessel_status==10){
		echo $form->hiddenField($model,'is_voyage',array('class'=>'span5','value'=>1));
		echo $form->hiddenField($model,'id_voyage_order',array('class'=>'span5','value'=>$_GET['id_voyage_order']));
	}

	if($vessel_status->id_vessel_status==20 || $vessel_status->id_vessel_status==30){
		if(isset($_GET['id_request_for_schedule'])){
		echo CHtml::hiddenField('id_request_for_schedule',$_GET['id_request_for_schedule'],array('class'=>'span5'));
		}
	}

	if($vessel_status->id_vessel_status==50){
		if(isset($_GET['id_so_offhired_order'])){
		//echo CHtml::hiddenField('id_so_offhired_order',$_GET['id_so_offhired_order'],array('class'=>'span5'));
		echo $form->hiddenField($model,'is_off_hired',array('class'=>'span5','value'=>1));
		echo $form->hiddenField($model,'id_so_offhired_order',array('class'=>'span5','value'=>$_GET['id_so_offhired_order']));
		}
	}

	if($vessel_status->id_vessel_status==60){
		if(isset($_GET['id_vessel_maintenance_plan'])){
		echo CHtml::hiddenField('id_vessel_maintenance_plan',$_GET['id_vessel_maintenance_plan'],array('class'=>'span5'));
		}
	}
	
	if($status == "REPAIR"){
		$breakdowntype =  Chtml::dropDownList('TypeBreakDown','TypeBreakdown',array('UNBREAKDOWN'=>'UNBREAKDOWN', 'BREAKDOWN'=>'BREAKDOWN'), 
			array('class'=>'span3'));
		echo FormCommonDisplayer::displayRowInput("Type Breakdown", $breakdowntype);
	}


	?>
	<?php //echo $form->textFieldRow($model,'id_vessel_status',array('class'=>'span5')); ?>

	<div class="control-group ">
	<label class="control-label required" for="StartDate"><?php echo $model::model()->getAttributeLabel('StartDate'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">

	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	'model'=>$model,
	//'language'=>Yii::app()->language='id',
	'attribute'=>'StartDate',
	'options'=>array(
						'showAnim'=>'slideDown',
						'dateFormat'=>'yy-mm-dd',        
						'defaultDate' => $defaultDate,  
						'changeMonth'=>true,
						'changeYear'=>true,
						'showOn'=>'focus',
						'showButtonPanel' => true,
					),
	'htmlOptions'=>array(
	'value'=>isset($_GET['StartDate']) ? $_GET['StartDate'] :'',
	'style'=>'width:100px;'),
	)); ?>	
	<?php echo $form->error($model,'StartDate'); ?>
</div>
</div>

	<?php //echo $form->textFieldRow($model,'StartDate',array('class'=>'span5')); ?>

	<div class="control-group ">
	<label class="control-label required" for="EndDate"><?php echo $model::model()->getAttributeLabel('EndDate'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	'model'=>$model,
	//'language'=>Yii::app()->language='id',
	'attribute'=>'EndDate',
	'options'=>array(
						'showAnim'=>'slideDown',
						'dateFormat'=>'yy-mm-dd',   
						'defaultDate' => $defaultDate,       
						'changeMonth'=>true,
						'changeYear'=>true,
						'showOn'=>'focus',
						'showButtonPanel' => true,
					),
	'htmlOptions'=>array(
	'value'=>isset($_GET['EndDate']) ? $_GET['EndDate'] :'',
	'style'=>'width:100px;'),
	)); ?>	
	<?php echo $form->error($model,'EndDate'); ?>
</div>
</div>

	<?php //echo $form->textFieldRow($model,'EndDate',array('class'=>'span5')); ?>


<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>


