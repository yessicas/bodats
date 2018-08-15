<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id_gl_posting',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'id_account_gl',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'pair_number',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'posting_date',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'description',array('class'=>'span5','maxlength'=>250)); ?>

		<?php echo $form->textFieldRow($model,'amount',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'id_currency',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'drcr',array('class'=>'span5','maxlength'=>0)); ?>

		<?php echo $form->textFieldRow($model,'ref',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'created_date',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'created_user',array('class'=>'span5','maxlength'=>45)); ?>

		<?php echo $form->textFieldRow($model,'ip_user_updated',array('class'=>'span5','maxlength'=>50)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
