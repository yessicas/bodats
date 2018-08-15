<?php
$this->breadcrumbs=array(
	'Invoice Voyages'=>array('index'),
	'Add Payment Info ',
);

$this->menu=array(
array('label'=>'Manage Invoice Payment ','url'=>array('invoicevoyage/invoicepayment')),
array('label'=>'Add Payment Info ','url'=>array('invoicevoyage/addpayment','id'=>$_GET['id'])),
);
?>

<div id="content">
<h2>Add Payment Info</h2>
<hr>
</div>


</style>
<div class="view">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'invoice-voyage-form',
	'enableAjaxValidation'=>false,
	'type' => 'horizontal',
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<!--<p class="help-block">Fields with <span class="required">*</span> are required.</p>-->

<?php echo $form->errorSummary($model); ?>

<?php //echo $form->textFieldRow($model,'PaymentStatus',array('class'=>'span5','maxlength'=>20)); ?>

<?php echo $form->dropDownListRow($model,'PaymentStatus',array('UNPAID'=>'UNPAID', 'PAID'=>'PAID'), 
			array('prompt'=>'-- Select --','class'=>'span3'));?>

<?php //echo $form->textFieldRow($model,'PaymentDate',array('class'=>'calendar span3','maxlength'=>25)); ?>

	<div class="control-group ">
	<label class="control-label required" for="Quotation_QuotationDate"><?php echo $model::model()->getAttributeLabel('PaymentDate'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	'model'=>$model,
	//'language'=>Yii::app()->language='id',
	'attribute'=>'PaymentDate',
	'options'=>array(
						'showAnim'=>'slideDown',
						'dateFormat'=>'yy-mm-dd',          
						'changeMonth'=>true,
						'changeYear'=>true,
						'showOn'=>'focus',
						'showButtonPanel' => true,
					),
	'htmlOptions'=>array(
	'style'=>'width:80px;'),
	)); ?>	
	<?php echo $form->error($model,'PaymentDate'); ?> <!-- error message -->
	</div>
	</div>


<div class="control-group ">
<label class="control-label required" for="PaymentAmount"><?php echo $model::model()->getAttributeLabel('PaymentAmount'); ?> <span class="required">*</span></label> <!-- label manual -->
<div class="controls">
<?php echo $form->textField($model,'PaymentAmount',array('class'=>'span3','maxlength'=>25)); ?>
<?php echo " ".$model->Currency->currency ; ?>
<?php echo $form->error($model,'PaymentAmount'); ?>
</div>
</div>

<?php //echo $form->textFieldRow($model,'PaymentBankAccountID',array('class'=>'span5','maxlength'=>25)); ?>

<?php echo $form->dropDownListRow($model,'PaymentBankAccountID',CHtml::listData(BankAccount::model()->findAll(), 'id_bank_account', 'BankName'),
    array('prompt'=>'--Pilih --','class'=>'span3'));?>

<?php //echo $form->textFieldRow($model,'PaymentLate',array('class'=>'span5','maxlength'=>25)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
</div>