<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id_purchase_request',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'PRNumber',array('class'=>'span5','maxlength'=>250)); ?>

		<?php echo $form->textFieldRow($model,'PRDate',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'PRNo',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'PRMonth',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'PRYear',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'id_po_category',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'amount',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'metric',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'dedicated_to',array('class'=>'span5','maxlength'=>0)); ?>

		<?php echo $form->textFieldRow($model,'id_vessel',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'id_voyage_order',array('class'=>'span5')); ?>

		<?php echo $form->textAreaRow($model,'notes',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldRow($model,'is_mutliple_item',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'requested_user',array('class'=>'span5','maxlength'=>45)); ?>

		<?php echo $form->textFieldRow($model,'requested_date',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'ip_user_requested',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'Status',array('class'=>'span5','maxlength'=>0)); ?>

		<?php echo $form->textFieldRow($model,'approved_user',array('class'=>'span5','maxlength'=>45)); ?>

		<?php echo $form->textFieldRow($model,'approval_date',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'ip_user_approved',array('class'=>'span5','maxlength'=>50)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
