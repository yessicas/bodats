<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'consumable-stock-item-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->dropDownListRow($model,'id_po_category',CHtml::listData(PoCategory::model()->findAll(), 'id_po_category', 'category_name'),
   //array('prompt'=>'--Select--', 'class'=>'span4'));?>

	<?php //echo $form->textFieldRow($model,'id_po_category',array('class'=>'span4')); ?>
	<?php echo $form->dropDownListRow($model,'category',array('PART'=>'PART','CS'=>'CONSUMABLE STOCK','ASSET'=>'ASSET'),
	 array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span4'));?>
	 
	<?php echo $form->dropDownListRow($model,'consumable_stock_category',array('ENGINE'=>'ENGINE','DECK'=>'DECK','EHS'=>'EHS'),
	 array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span4'));?>

	<?php //echo $form->textFieldRow($model,'consumable_stock_category',array('class'=>'span4','maxlength'=>0)); ?>

	<?php echo $form->textFieldRow($model,'consumable_stock_item',array('class'=>'span6','maxlength'=>250)); ?>

	<?php echo $form->textFieldRow($model,'metric',array('class'=>'span4','maxlength'=>20)); ?>

	<?php //echo $form->textFieldRow($model,'parent_level1',array('class'=>'span4','maxlength'=>250)); ?>

	<?php //echo $form->textFieldRow($model,'parent_level2',array('class'=>'span4','maxlength'=>250)); ?>

	<?php //echo $form->textFieldRow($model,'parent_level3',array('class'=>'span4','maxlength'=>250)); ?>
	<?php 
	if(UsersAccess::checkUserAccess("ADM","PRO")){
		echo $form->textFieldRow($model,'estimated_unit_price',array('class'=>'span4'));
	}
	?>
	<?php echo $form->textFieldRow($model,'impa',array('class'=>'span6')); ?>

	<?php echo $form->textFieldRow($model,'serial_number',array('class'=>'span6','maxlength'=>150)); ?>

	<?php echo $form->textAreaRow($model,'description',array('rows'=>4, 'cols'=>50, 'class'=>'span6')); ?>

	

	

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
