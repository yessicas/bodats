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

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<div class="control-group ">
	<label class="control-label required" ><?php echo $model::model()->getAttributeLabel('VesselTugId'); ?> <span class="required">*</span> </label> <!-- label -->
	<div class="controls">

	<?php echo $form->dropDownList($model,'VesselTugId',CHtml::listData(Vessel::model()->findAll(array(
           'condition' => 'VesselType = :VesselType',
           'params' => array(
               ':VesselType' => "TUG",
           ),
       )), 'id_vessel', 'VesselName'),
       array('prompt'=>'--Select--','class'=>'span3'));?>

      <?php echo $form->error($model,'VesselTugId'); ?>
     </div>
 </div>

	<?php //echo $form->textFieldRow($model,'VesselTugId',array('class'=>'span5')); ?>

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

	<?php //echo $form->textFieldRow($model,'VesselBargeId',array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($model,'id_vessel_status',CHtml::listData(VesselStatus::model()->findAll(), 'id_vessel_status', 'vessel_status'),
    array('prompt'=>'--Select--','class'=>'span3'));?>

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
						'changeMonth'=>true,
						'changeYear'=>true,
						'showOn'=>'focus',
						'showButtonPanel' => true,
					),
	'htmlOptions'=>array(
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
						'changeMonth'=>true,
						'changeYear'=>true,
						'showOn'=>'focus',
						'showButtonPanel' => true,
					),
	'htmlOptions'=>array(
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
