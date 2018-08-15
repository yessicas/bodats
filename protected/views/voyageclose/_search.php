<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id_voyage_close',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'CloseVoyageNumber',array('class'=>'span5','maxlength'=>64)); ?>

		<?php echo $form->textFieldRow($model,'CloseVoyageStatus',array('class'=>'span5','maxlength'=>0)); ?>

		<?php echo $form->textFieldRow($model,'CloseVoyageNo',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'CloseVoyageMonth',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'CloseVoyageYear',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'id_voyage_order',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'id_sailing_order',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textAreaRow($model,'ActualRoute',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldRow($model,'CrewIdMaster',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'CloseVoyageReportDate',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'ActualStartDate',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'ActualEndDate',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'StandardFuel',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'StandardLayTime',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'ActualFuel',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'ActualLayTime',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'StartFuelStock',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'Bunker',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'LastFuelStock',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'AE_Over',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'Deviation',array('class'=>'span5')); ?>

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
