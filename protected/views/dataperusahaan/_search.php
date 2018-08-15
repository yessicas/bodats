<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id_perusahaan',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'nama_perusahaan',array('class'=>'span5','maxlength'=>150)); ?>

		<?php echo $form->textFieldRow($model,'alamat',array('class'=>'span5','maxlength'=>250)); ?>

		<?php echo $form->textFieldRow($model,'izin_usaha',array('class'=>'span5','maxlength'=>250)); ?>

		<?php echo $form->textAreaRow($model,'deskripsi',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textAreaRow($model,'bidang_usaha',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldRow($model,'foto_logo',array('class'=>'span5','maxlength'=>150)); ?>

		<?php echo $form->textFieldRow($model,'foto_profil',array('class'=>'span5','maxlength'=>150)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
