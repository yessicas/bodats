<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id_sailing_order',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'SailingOrderNumber',array('class'=>'span5','maxlength'=>32)); ?>

		<?php echo $form->textFieldRow($model,'SailingOrderNo',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'SailingOrderMonth',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'SailingOrderYear',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'id_voyage_order',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'CrewIdMaster',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'Period',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'StartDate',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'StandardFuel',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'LayTime',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'Insentif',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'LastFuelStock',array('class'=>'span5')); ?>

		<?php echo $form->textAreaRow($model,'Remark',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldRow($model,'Nautical',array('class'=>'span5','maxlength'=>150)); ?>

		<?php echo $form->textFieldRow($model,'NauticalHead',array('class'=>'span5','maxlength'=>150)); ?>

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
