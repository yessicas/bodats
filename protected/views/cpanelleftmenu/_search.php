<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id_leftmenu',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'id_parent_leftmenu',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'has_child',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'menu_name',array('class'=>'span5','maxlength'=>200)); ?>

		<?php echo $form->textFieldRow($model,'menu_icon',array('class'=>'span5','maxlength'=>100)); ?>

		<?php echo $form->textFieldRow($model,'value_indo',array('class'=>'span5','maxlength'=>250)); ?>

		<?php echo $form->textFieldRow($model,'value_eng',array('class'=>'span5','maxlength'=>250)); ?>

		<?php echo $form->textFieldRow($model,'url',array('class'=>'span5','maxlength'=>250)); ?>

		<?php echo $form->textFieldRow($model,'visible',array('class'=>'span5')); ?>

		<?php echo $form->textAreaRow($model,'auth',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
