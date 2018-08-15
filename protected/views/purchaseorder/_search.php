<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id_purchase_order',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'id_purchase_request',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'id_vendor',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'up',array('class'=>'span5','maxlength'=>200)); ?>

		<?php echo $form->textFieldRow($model,'PONumber',array('class'=>'span5','maxlength'=>250)); ?>

		<?php echo $form->textFieldRow($model,'PODate',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'PONo',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'POMonth',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'POYear',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'RevisionNumber',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'TermOfPayment',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'id_po_category',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'amount',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'id_metric_pr',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'PriceUnit',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'id_currency',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'ppn',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'pph15',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'pph23',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'others',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'dedicated_to',array('class'=>'span5','maxlength'=>0)); ?>

		<?php echo $form->textFieldRow($model,'id_vessel',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'id_voyage_order',array('class'=>'span5')); ?>

		<?php echo $form->textAreaRow($model,'notes',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldRow($model,'DeliveryDateRangeStart',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'DeliveryDateRangeEnd',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'is_mutliple_item',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'SignName',array('class'=>'span5','maxlength'=>200)); ?>

		<?php echo $form->textFieldRow($model,'created_user',array('class'=>'span5','maxlength'=>45)); ?>

		<?php echo $form->textFieldRow($model,'created_date',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'ip_user_created',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'Status',array('class'=>'span5','maxlength'=>0)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
