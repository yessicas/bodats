<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id_consumable_stock_item',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'id_po_category',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'consumable_stock_category',array('class'=>'span5','maxlength'=>0)); ?>

		<?php echo $form->textFieldRow($model,'consumable_stock_item',array('class'=>'span5','maxlength'=>250)); ?>

		<?php echo $form->textFieldRow($model,'parent_level1',array('class'=>'span5','maxlength'=>250)); ?>

		<?php echo $form->textFieldRow($model,'parent_level2',array('class'=>'span5','maxlength'=>250)); ?>

		<?php echo $form->textFieldRow($model,'parent_level3',array('class'=>'span5','maxlength'=>250)); ?>

		<?php echo $form->textFieldRow($model,'serial_number',array('class'=>'span5','maxlength'=>150)); ?>

		<?php echo $form->textFieldRow($model,'description',array('class'=>'span5','maxlength'=>800)); ?>

		<?php echo $form->textFieldRow($model,'estimated_unit_price',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'metric',array('class'=>'span5','maxlength'=>20)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
