<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id_spal',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'id_quotation',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'SpalNumber',array('class'=>'span5','maxlength'=>64)); ?>

		<?php echo $form->textFieldRow($model,'SpalNo',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'SpalMonth',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'SpalYear',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'SpalDate',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'JenisMuatan',array('class'=>'span5','maxlength'=>250)); ?>

		<?php echo $form->textFieldRow($model,'TotalMaxMuatan',array('class'=>'span5','maxlength'=>250)); ?>

		<?php echo $form->textFieldRow($model,'KondisiAngkutan',array('class'=>'span5','maxlength'=>250)); ?>

		<?php echo $form->textFieldRow($model,'PengirimanBarang',array('class'=>'span5','maxlength'=>250)); ?>

		<?php echo $form->textFieldRow($model,'UangTambang',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'DemurageCost',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'KeagenanKapal',array('class'=>'span5','maxlength'=>250)); ?>

		<?php echo $form->textFieldRow($model,'AsuransiKapal',array('class'=>'span5','maxlength'=>250)); ?>

		<?php echo $form->textFieldRow($model,'AsuransiBarang',array('class'=>'span5','maxlength'=>250)); ?>

		<?php echo $form->textFieldRow($model,'PihakKedua1',array('class'=>'span5','maxlength'=>250)); ?>

		<?php echo $form->textFieldRow($model,'PihakKedua2',array('class'=>'span5','maxlength'=>250)); ?>

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
