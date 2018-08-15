<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id_po_category',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'code',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'category',array('class'=>'span5','maxlength'=>0)); ?>

		<?php echo $form->textFieldRow($model,'category_name',array('class'=>'span5','maxlength'=>250)); ?>

		<?php echo $form->textFieldRow($model,'id_parent',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'is_end_node',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'level1',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'level2',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'level3',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'num_level',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'auth',array('class'=>'span5','maxlength'=>250)); ?>

		<?php echo $form->textFieldRow($model,'type_good_issue',array('class'=>'span5','maxlength'=>0)); ?>

		<?php echo $form->textFieldRow($model,'dedicated_to',array('class'=>'span5','maxlength'=>0)); ?>

		<?php echo $form->textFieldRow($model,'lead_time_from_approval',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'request_by',array('class'=>'span5','maxlength'=>50)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
