<?php
/* @var $this ArticleController */
/* @var $model MemberArticle */
/* @var $form CActiveForm */

?>


<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'member-article-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>
	
	<?php $this->widget('bootstrap.widgets.TbLabel', array(
		'type'=>'info', // 'success', 'warning', 'important', 'info' or 'inverse'
		'label'=>Yii::t('strings','Please write the article with a good format and orderly arrangement'),
	)); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'Title'); ?>
		<?php echo $form->textField($model,'Title',array('class'=>'span9', 'size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'Title'); ?>
	</div>

	<?php
	
	/*
	<div class="row">
		<?php echo $form->labelEx($model,'Content'); ?>
		<?php echo $form->textArea($model,'Content',array('class'=>'span9', 'rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'Content'); ?>
	</div>
	*/
	
	?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'Content'); ?>
		<?php 
			$this->widget('ext.wdueditor.WDueditor',array(
					'model' => $model,
					'attribute' => 'Content',
					'language' =>'en',
					'width' =>'100%',  
					'height' =>'400',
					'toolbars' =>array(
						//'FullScreen','Source','Undo', 'Redo','Bold', 'Italic', 'Underline', 'Strike', 'Link', 'Unlink', 'Anchor',
					),
			)); 
		?>
		<?php echo $form->error($model,'Content'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('strings','Save') : Yii::t('strings','Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->