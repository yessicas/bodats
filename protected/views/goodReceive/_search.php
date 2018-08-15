<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id_good_receive',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'id_purchase_order',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'id_purchase_order_detail',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'id_po_category',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'received_date',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'receive_by',array('class'=>'span5','maxlength'=>250)); ?>

		<?php echo $form->textFieldRow($model,'condition',array('class'=>'span5','maxlength'=>250)); ?>

		<?php echo $form->textFieldRow($model,'notes',array('class'=>'span5','maxlength'=>250)); ?>

		<?php echo $form->textFieldRow($model,'amount',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'purchase_item_table',array('class'=>'span5','maxlength'=>200)); ?>

		<?php echo $form->textFieldRow($model,'id_item',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'item_add_info',array('class'=>'span5','maxlength'=>150)); ?>

		<?php echo $form->textFieldRow($model,'quantity',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'metric',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'receive_number',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'status_receive',array('class'=>'span5','maxlength'=>0)); ?>

		<?php echo $form->textFieldRow($model,'created_user',array('class'=>'span5','maxlength'=>45)); ?>

		<?php echo $form->textFieldRow($model,'created_date',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'ip_user_updated',array('class'=>'span5','maxlength'=>50)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
