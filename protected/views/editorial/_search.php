<?php
/* @var $this ArticleController */
/* @var $model MemberArticle */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'IDArticle'); ?>
		<?php echo $form->textField($model,'IDArticle',array('size'=>21,'maxlength'=>21)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IDMember'); ?>
		<?php echo $form->textField($model,'IDMember',array('size'=>21,'maxlength'=>21)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Title'); ?>
		<?php echo $form->textField($model,'Title',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IDSubtitle'); ?>
		<?php echo $form->textField($model,'IDSubtitle',array('size'=>21,'maxlength'=>21)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Content'); ?>
		<?php echo $form->textArea($model,'Content',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'UsingFormat'); ?>
		<?php echo $form->textField($model,'UsingFormat'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IDArticleTopic'); ?>
		<?php echo $form->textField($model,'IDArticleTopic',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IDSubject'); ?>
		<?php echo $form->textField($model,'IDSubject',array('size'=>21,'maxlength'=>21)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'articlecode'); ?>
		<?php echo $form->textField($model,'articlecode',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Tanggal'); ?>
		<?php echo $form->textField($model,'Tanggal'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TanggalWaktu'); ?>
		<?php echo $form->textField($model,'TanggalWaktu'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TanggalUpdate'); ?>
		<?php echo $form->textField($model,'TanggalUpdate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DayDigit'); ?>
		<?php echo $form->textField($model,'DayDigit'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isDisplayWritter'); ?>
		<?php echo $form->textField($model,'isDisplayWritter'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Kontributor'); ?>
		<?php echo $form->textField($model,'Kontributor',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isDisplayKontributor'); ?>
		<?php echo $form->textField($model,'isDisplayKontributor'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Editor'); ?>
		<?php echo $form->textField($model,'Editor',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isDisplayEditor'); ?>
		<?php echo $form->textField($model,'isDisplayEditor'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isAprroved'); ?>
		<?php echo $form->textField($model,'isAprroved'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PublishedDate'); ?>
		<?php echo $form->textField($model,'PublishedDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PublishedDateTime'); ?>
		<?php echo $form->textField($model,'PublishedDateTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PublishedDateDayDigit'); ?>
		<?php echo $form->textField($model,'PublishedDateDayDigit',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SumberInformasi'); ?>
		<?php echo $form->textArea($model,'SumberInformasi',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isDeleted'); ?>
		<?php echo $form->textField($model,'isDeleted'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isNotTopView'); ?>
		<?php echo $form->textField($model,'isNotTopView'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isNotTopComment'); ?>
		<?php echo $form->textField($model,'isNotTopComment'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Point'); ?>
		<?php echo $form->textField($model,'Point'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Rating'); ?>
		<?php echo $form->textField($model,'Rating'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Hit'); ?>
		<?php echo $form->textField($model,'Hit',array('size'=>21,'maxlength'=>21)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CommentHit'); ?>
		<?php echo $form->textField($model,'CommentHit'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->