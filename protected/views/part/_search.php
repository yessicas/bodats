<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id_part',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'id_vessel',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'id_part_structure',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'PartNumber',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'PartName',array('class'=>'span5','maxlength'=>150)); ?>

		<?php echo $form->textFieldRow($model,'LifeTime',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'UsageTime',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'MinStock',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'Quantity',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'metric',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'ReplaceSchedule',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'LastReplacementDate',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'ReplaceLeadtime',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'StandardPriceUnit',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'id_currency',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
