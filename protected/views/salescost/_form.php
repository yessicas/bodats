<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'sales-cost-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'JettyIdStart',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'JettyIdEnd',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'BargeSize',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'Capacity',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PriceUnit',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'id_currency',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'change_rate',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'FuelLtr',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'FuelCost',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'AgencyCost',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'DepreciationCost',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'CrewCost',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'Rent',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'SubconCost',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'IncuranceCost',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RepairCost',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'DockingCost',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'BrokerageCost',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'OthersCost',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'GP_COGM',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'MarginFuelCost',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'MarginAgencyCost',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'MarginDepreciationCost',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'MarginCrewCost',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'MarginRent',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'MarginSubconCost',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'MarginIncuranceCost',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'MarginRepairCost',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'MarginDockingCost',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'MarginBrokerageCost',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'MarginOthersCost',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'GP_COGS',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'TotalRevenue',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'TotalSalesCost',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'created_date',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'created_user',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'ip_user_updated',array('class'=>'span5','maxlength'=>50)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
