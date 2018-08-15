<script>function finetug(data) {
                // refresh your grid
                 $("#resultfinetugset").html(data);
				
        }
</script>

<script>function finebarge(data) {
                // refresh your grid
                 $("#resultfinebargeset").html(data);
				
        }
</script>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'settype-tugbarge-form',
	'enableAjaxValidation'=>false,
	'type' => 'horizontal',
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php // echo $form->textFieldRow($model,'month',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'year',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'first_date',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'tug',array('class'=>'span5')); ?>


	<div class="control-group ">
	<label class="control-label required" ><?php echo $model::model()->getAttributeLabel('tug'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">

	<?php echo $form->dropDownList($model,'tug',CHtml::listData(Vessel::model()->findAll(array(
           'condition' => 'VesselType = :VesselType',
           'params' => array(
               ':VesselType' => "TUG",
           ),
       )), 'id_vessel', 'VesselName'),
    array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span4',
    'ajax' => array('type'=>'POST', 'url'=>CController::createUrl('findtugset') /*, 'update'=>'#id_update'*/,'success'=>'finetug')));?>

    <?php echo $form->error($model,'tug'); ?> <!-- error message -->
    <br>
    <div id ="resultfinetugset" style="color: #4CAD2D; margin-left:20px;padding-top:5px;"> </div>
	</div>
	</div>

   
	<div class="control-group ">
	<label class="control-label required" ><?php echo $model::model()->getAttributeLabel('barge'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">

	<?php echo $form->dropDownList($model,'barge',CHtml::listData(Vessel::model()->findAll(array(
           'condition' => 'VesselType = :VesselType',
           'params' => array(
               ':VesselType' => "BARGE",
           ),
       )), 'id_vessel', 'VesselName'),
    array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span4',
    'ajax' => array('type'=>'POST', 'url'=>CController::createUrl('findbargeset') /*, 'update'=>'#id_update'*/,'success'=>'finebarge')));?>
     <?php echo $form->error($model,'barge'); ?> <!-- error message -->
    <br>
    <div id ="resultfinebargeset" style="color: #4CAD2D; margin-left:20px;padding-top:5px;"> </div>
	</div>
	</div>

	<?php echo $form->textFieldRow($model,'voyage_number',array('class'=>'span3','maxlength'=>50)); ?>

	<?php //echo $form->textFieldRow($model,'barge',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'tug_power',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'barge_capacity',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'settype_name',array('class'=>'span5','maxlength'=>250)); ?>

	<?php //echo $form->textFieldRow($model,'created_date',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'created_user',array('class'=>'span5','maxlength'=>45)); ?>

	<?php //echo $form->textFieldRow($model,'ip_user_updated',array('class'=>'span5','maxlength'=>50)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
