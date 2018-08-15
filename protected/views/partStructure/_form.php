<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'part-structure-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>




<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>




	<?php echo $form->textFieldRow($model,'code_number',array('class'=>'span4','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'structure_name',array('class'=>'span5','maxlength'=>250)); ?>


	<div id="id_level">
	<div class="control-group ">
	<label for="PartStructure_id_level" class="control-label required"> <?php echo 'Level' ?> <span class="required">*</span></label>
	<div class="controls">
	<?php 
	echo CHtml::dropDownList('id_level','',CHtml::listData(PartLevel::model()->findAll(), 'id_part_level', 'part_level_name'),
   							array('prompt'=>Yii::t('strings','-- Select --'), 'id' => 'id_level',

   								'disabled'=>false,
   								'ajax' => array(
   								'type'=>'POST', 
   								'url'=>CController::createUrl('Updatelevel'),
   								'update'=>'#PartStructure_id_part_structure_parent',
   								'data'=>array('hasil_part_level'=>'js:this.value')),
   								//'success'=>'changepart')
   								));?>
    </div>
	</div>
	</div>

	<div>
	<div class="control-group ">
	<label for="PartStructure_id_part_structure_parent" class="control-label required"> <?php echo 'Part Structure Parent' ?> <span class="required">*</span></label>
	<div class="controls">
	<?php     
    echo CHtml::dropDownList('PartStructure[id_part_structure_parent]','',
    	CHtml::listData(PartStructure::model()->findAll(), 'id_part_structure', 'structure_name'),
    	array('prompt'=>Yii::t('strings','-- Select --'), 
    	'id' => 'PartStructure_id_part_structure_parent','disabled'=>false));	
	?>
	</div>
	</div>
	</div>

	

	<?php /* echo $form->dropDownListRow($model,'id_level',CHtml::listData(PartLevel::model()->findAll(), 'id_part_level', 'part_level_name'),
    array('prompt'=>'--Select--','class'=>'span2')); */ ?>

	<?php /* echo $form->dropDownListRow($model,'id_part_structure_parent',CHtml::listData(PartStructure::model()->findAll(), 'id_part_structure', 'structure_name'),
    array('prompt'=>'--Select--','class'=>'span2')); */ ?>

	<?php //echo $form->textFieldRow($model,'id_part_structure_parent',array('class'=>'span5','maxlength'=>20)); ?>

	

	<?php //echo $form->textFieldRow($model,'id_level',array('class'=>'span5')); ?>

	

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>


<?php $this->endWidget(); ?>
