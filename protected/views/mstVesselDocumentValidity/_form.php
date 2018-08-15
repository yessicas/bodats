<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'mst-vessel-document-validity-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'no',array('class'=>'span2')); ?>

	<?php echo $form->textAreaRow($model,'vessel_document_validity',array('rows'=>3, 'cols'=>50, 'class'=>'span4')); ?>

	<?php //echo $form->textFieldRow($model,'vessel_document_validity',array('class'=>'span4','maxlength'=>250)); ?>

	<div class="control-group ">
	<label class="control-label required" for="color"><?php echo $model::model()->getAttributeLabel('color'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
		
		<?php $this->widget('application.extensions.SMiniColors.SActiveColorPicker',
		array(
		'id'=>'color2',
		'model'=>$model,
		'attribute'=>'color',
		'hidden'=>false,
		'htmlOptions'=>array('class'=>'span2'), 
		));
		?>
		<?php echo $form->error($model,'color'); ?>
	
	</div>
	</div>

	<?php //echo $form->textFieldRow($model,'color',array('class'=>'span5','maxlength'=>20)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
