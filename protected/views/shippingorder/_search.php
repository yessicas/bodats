<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id_shipping_order',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'ShippingOrderNumber',array('class'=>'span5','maxlength'=>32)); ?>

		<?php echo $form->textFieldRow($model,'SONo',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'SOMonth',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'SOYear',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'id_quotation',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'id_customer',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'SI_Number',array('class'=>'span5','maxlength'=>250)); ?>

		<?php echo $form->textFieldRow($model,'EstUnloading',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'id_mothervessel',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'Period',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'SO_Date',array('class'=>'span5')); ?>

		<?php echo $form->textAreaRow($model,'SO_Place',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textAreaRow($model,'SO_Attachment',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldRow($model,'TrVoyageOrderRevisionId',array('class'=>'span5','maxlength'=>32)); ?>

		<?php echo $form->textFieldRow($model,'SO_Status',array('class'=>'span5','maxlength'=>0)); ?>

		<?php echo $form->textAreaRow($model,'RevisionNote',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldRow($model,'total_price',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'total_capacity',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'total_barge_size',array('class'=>'span5')); ?>

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
