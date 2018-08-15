<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php //echo $form->textFieldRow($model,'userid',array('class'=>'span5','maxlength'=>45)); ?>

		<?php //echo $form->textFieldRow($model,'code_id',array('class'=>'span5','maxlength'=>14)); ?>

		<?php //echo $form->textFieldRow($model,'type',array('class'=>'span5','maxlength'=>14)); ?>

		<?php echo $form->textFieldRow($model,'full_name',array('class'=>'span5','maxlength'=>250)); ?>

		<?php //echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>250)); ?>

		<?php //echo $form->textFieldRow($model,'security_code',array('class'=>'span5','maxlength'=>200)); ?>

		<?php //echo $form->textAreaRow($model,'secret_question',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php //echo $form->textFieldRow($model,'answer_secret_question',array('class'=>'span5','maxlength'=>250)); ?>

		<?php //echo $form->textFieldRow($model,'status_activated',array('class'=>'span5')); ?>

		<?php //echo $form->textFieldRow($model,'created_date',array('class'=>'span5')); ?>

		<?php //echo $form->textFieldRow($model,'ip_addr_created',array('class'=>'span5','maxlength'=>64)); ?>

		<?php //echo $form->textFieldRow($model,'hit_count',array('class'=>'span5','maxlength'=>11)); ?>

		<?php //echo $form->textFieldRow($model,'last_login',array('class'=>'span5')); ?>

		<?php //echo $form->textFieldRow($model,'last_logout',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>Yii::t('strings','Search'),
		)); ?>
	</div>

<?php $this->endWidget(); ?>
