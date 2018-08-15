<div class="view">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'currency-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>
<!--
<p class="help-block"><i>Isian Dengan Tanda  <span class="required">*</span> Tidak Boleh Kosong</i></p>
-->

<div class = "animated flash">
<?php echo $form->errorSummary($model); ?>
</div>

<?php //echo $form->textFieldRow($model,'currency',array('class'=>'span2','maxlength'=>100)); ?>
<?php echo $form->textFieldRow($model,'change_rate',array('class'=>'span2','maxlength'=>15)); ?>
<?php echo $form->textFieldRow($model,'SK',array('class'=>'span4','maxlength'=>15)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>

</div>