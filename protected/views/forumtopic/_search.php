<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id_forum_topic',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'id_forum_category',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'judul_topic',array('class'=>'span5','maxlength'=>150)); ?>

		<?php echo $form->textAreaRow($model,'deskripsi',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldRow($model,'status',array('class'=>'span5','maxlength'=>0)); ?>

		<?php echo $form->textFieldRow($model,'userid_created',array('class'=>'span5','maxlength'=>45)); ?>

		<?php echo $form->textFieldRow($model,'created_date',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'ip_addr_created',array('class'=>'span5','maxlength'=>64)); ?>

		<?php echo $form->textFieldRow($model,'number_comment',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'last_commented',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
