<div class = "view" >
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'standard-agency-item-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
	
	<div class="control-group ">
	<label class="control-label required" ><?php echo $model::model()->getAttributeLabel('Start'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	<?php echo Chtml::textField('start',$modelAgency->jettyIdStart->JettyName,array('class'=>'span3','readonly'=>'readonly')); ?>
	</div>
	</div>

	<div class="control-group ">
	<label class="control-label required" ><?php echo $model::model()->getAttributeLabel('Finish'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	<?php echo Chtml::textField('finish',$modelAgency->jettyIdEnd->JettyName,array('class'=>'span3','readonly'=>'readonly')); ?>
	</div>
	</div>

	<?php //echo $form->textFieldRow($model,'id_standard_agency',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'id_agency_item',array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($model,'id_agency_item',CHtml::listData(AgencyItem::model()->findAll(),'id_agency_item', 'agency_item'),
    array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span3'));?>

    <?php echo $form->dropDownListRow($model,'type',array('FIX'=>'FIX','VARIABLE'=>'VARIABLE'),
    array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span3'));?>

	<?php //echo $form->textFieldRow($model,'agency_fix_cost',array('class'=>'span3')); ?>

	<?php //echo $form->textFieldRow($model,'agency_var_cost',array('class'=>'span3')); ?>


	<?php echo $form->textFieldRow($model,'quantity',array('class'=>'span3','maxlength'=>200)); ?>

	<?php echo $form->dropDownListRow($model,'metric',CHtml::listData(MstMetricPr::model()->findAll(),'metric', 'metric'),
    array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span3'));?>

	<?php echo $form->textFieldRow($model,'unit_price',array('class'=>'span3','maxlength'=>200)); ?>

	<?php //echo $form->textFieldRow($model,'id_currency',array('class'=>'span5')); ?>
	<?php echo $form->dropDownListRow($model,'id_currency',CHtml::listData(Currency::model()->findAll(), 'id_currency', 'currency'),
    array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span2'));?>

	<?php echo $form->textFieldRow($model,'description',array('class'=>'span5','maxlength'=>200)); ?>

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

</div>