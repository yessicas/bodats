<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id_propinsi',array('class'=>'span5','maxlength'=>10)); ?>

		<?php echo $form->textFieldRow($model,'id_country',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'kodebps',array('class'=>'span5','maxlength'=>10)); ?>

		<?php echo $form->textFieldRow($model,'nama',array('class'=>'span5','maxlength'=>64)); ?>

		<?php echo $form->textFieldRow($model,'kodeiso',array('class'=>'span5','maxlength'=>8)); ?>

		<?php echo $form->textFieldRow($model,'ibukota',array('class'=>'span5','maxlength'=>45)); ?>

		<?php echo $form->textFieldRow($model,'pulau',array('class'=>'span5','maxlength'=>45)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
