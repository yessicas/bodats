<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id_damage_report_repair',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'id_damage_report',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'id_request_for_schedule',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'id_vessel',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'StartRepair',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'EndRepair',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'DamageReportNumber',array('class'=>'span5','maxlength'=>250)); ?>

		<?php echo $form->textFieldRow($model,'NoReport',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'NoMonth',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'NoYear',array('class'=>'span5')); ?>

		<?php echo $form->textAreaRow($model,'Description',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldRow($model,'PIC',array('class'=>'span5','maxlength'=>256)); ?>

		<?php echo $form->textFieldRow($model,'Status',array('class'=>'span5','maxlength'=>0)); ?>

		<?php echo $form->textAreaRow($model,'CausedDamage',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldRow($model,'RepairPhoto1',array('class'=>'span5','maxlength'=>250)); ?>

		<?php echo $form->textFieldRow($model,'RepairPhoto2',array('class'=>'span5','maxlength'=>250)); ?>

		<?php echo $form->textFieldRow($model,'RepairPhoto3',array('class'=>'span5','maxlength'=>250)); ?>

		<?php echo $form->textFieldRow($model,'Master',array('class'=>'span5','maxlength'=>256)); ?>

		<?php echo $form->textFieldRow($model,'ChiefEngineer',array('class'=>'span5','maxlength'=>256)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
