<center>
<h3 class= "header"><img src="repository/icon/lockbig.png"> <?php echo Yii::t('strings','Change Password') ?>
<span class="header-line"><img src="repository/icon/headline.png"></span>
</h3>
</center>

<?php
if(Yii::app()->user->hasFlash('success')):?>
<div class = "animated flash">
	<?
    $this->widget('bootstrap.widgets.TbAlert', array(
    'block' => true,
    'fade' => true,
    'closeText' => '&times;', // false equals no close link
    'alerts' => array( // configurations per alert type
        // success, info, warning, error or danger
        'success' => array('closeText' => '&times;'), 

    ),
));
    ?>
</div>
<?php endif; ?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'users-form',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<div class="view">
<p class="help-block"><i><?php echo Yii::t('strings','Fields with') ?> <span class="required">*</span> <?php echo Yii::t('strings','are required') ?></i></p>

<div class = "animated flash">
<?php //echo $form->errorSummary($model); ?>
</div>
	
	<?php echo $form->passwordFieldRow($model,'old_password',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->passwordFieldRow($model,'password',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->passwordFieldRow($model,'repeatpassword',array('class'=>'span5','maxlength'=>150)); ?>


	<div class ="alert alert-block alert-info" style="padding: 10px 10px 10px 5px;">
	<?php echo '<i>'.Yii::t('strings','Mohon Diisi Untuk Keamanan jika anda Lupa Password').'</i>'; ?>
	<br>
	<br>
	<?php echo $form->textFieldRow($model,'secret_question',array('rows'=>6, 'cols'=>50, 'class'=>'span4')); ?>

	<?php echo $form->textFieldRow($model,'answer_secret_question',array('rows'=>6, 'cols'=>50, 'class'=>'span4')); ?>
	</div>


<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			//'icon'=>'ok white',
			'label'=>Yii::t('strings','Save'),
		)); ?>
</div>
</div>

<?php $this->endWidget(); ?>
