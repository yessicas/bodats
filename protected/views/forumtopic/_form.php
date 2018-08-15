<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'forum-topic-form',
	'enableAjaxValidation'=>false,
)); ?>

<div class="view">

	<div class = "animated flash">
	<?php echo $form->errorSummary($model); ?>
	</div>


	<?php //echo $form->textFieldRow($model,'id_forum_category',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->dropDownListRow($model,'id_forum_category',CHtml::listData(ForumCategory::model()->findAll(), 'id_forum_category', 'forum_category'),
    array('prompt'=>'--Pilih --','class'=>'span3'));?>

	<?php echo $form->textFieldRow($model,'judul_topic',array('class'=>'span5','maxlength'=>150)); ?>

	<?php //echo $form->textAreaRow($model,'deskripsi',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php
		  $this->widget(
		    'bootstrap.widgets.TbCKEditor',
		    array(
		        'model' => $model,
		        'attribute' => 'deskripsi',
		       
		    )
		);

	?>

	<?php echo $form->error($model,'deskripsi'); ?>

	<?php //echo $form->textFieldRow($model,'status',array('class'=>'span5','maxlength'=>0)); ?>

	<?php //echo $form->textFieldRow($model,'userid_created',array('class'=>'span5','maxlength'=>45)); ?>

	<?php //echo $form->textFieldRow($model,'created_date',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'ip_addr_created',array('class'=>'span5','maxlength'=>64)); ?>

	<?php //echo $form->textFieldRow($model,'number_comment',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'last_commented',array('class'=>'span5')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'icon'=>'comment white',
			'label'=>$model->isNewRecord ? 'Post' : 'Post',
		)); ?>
</div>
</div>

<?php $this->endWidget(); ?>
