<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id_so_offhired_order',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'id_quotation',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'id_customer',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'VesselTug',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'VesselBarge',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'OffhiredOrderNumber',array('class'=>'span5','maxlength'=>100)); ?>

		<?php echo $form->textFieldRow($model,'SONo',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'SOMonth',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'SOYear',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'SODate',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'period_year',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'period_month',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'period_quartal',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'TCStartDate',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'TCEndDate',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'TCPrice',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'SOQuartal',array('class'=>'span5')); ?>

		<?php echo $form->textAreaRow($model,'Marks',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
