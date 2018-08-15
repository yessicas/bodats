<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'users-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	//'clientOptions'=>array('validateOnSubmit'=>true),
	//'enableClientValidation'=>true,
)); ?>


<p class="help-block"><i><?php echo Yii::t('strings','Fields with') ?> <span class="required">*</span> <?php echo Yii::t('strings','are required') ?></i></p>

<div class = "animated flash">
<?php echo $form->errorSummary($model); ?>
</div>

	<?php echo $form->textFieldRow($model,'userid',array('class'=>'span4','maxlength'=>45)); ?>

	<?php //echo $form->textFieldRow($model,'code_id',array('class'=>'span5','maxlength'=>14)); ?>

	<?php echo $form->textFieldRow($model,'full_name',array('class'=>'span4','maxlength'=>45)); ?>

	<?php //echo $form->textFieldRow($model,'full_name',array('class'=>'span3','maxlength'=>250)); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span4','maxlength'=>250)); ?>

	<?php echo $form->dropDownListRow($model,'type',CHtml::listData(Authitem::model()->findAll(), 'name', 'description'),
    array('prompt'=>'--Pilih --','class'=>'span3'));?>

	<div style="color:#3b73af">
		<?php echo Yii::t('strings','Please Use 8 - 32 characters Upper and lowercase letters and Number') ?>
		<?php 
			if(!$model->isNewRecord){
				echo '<br>'.Yii::t('strings','If You Not to change password to this user, please lets be blank');
			}
		?>
	</div>
	<?php echo $form->passwordFieldRow($model,'password',array('class'=>'span4','maxlength'=>150)); ?>

	<?php echo $form->passwordFieldRow($model,'repeatpassword',array('class'=>'span4','maxlength'=>150)); ?>


	<?php /*if (extension_loaded('gd')): ?>
        
            <?php echo CHtml::activeLabelEx($model, 'verifyCode') ?>
        	<div>
        		<?php $this->widget('CCaptcha'); ?><br/>
        		<?php echo CHtml::activeTextField($model,'verifyCode',array('class'=>'span3')); ?>
        	</div>
        	<div style="font-size:12px;"><?php echo Yii::t('strings','Type the text in the image, Text are not case sensitive')?></div>
        
	<?php endif; */ ?>

	<?php //echo $form->textFieldRow($model,'security_code',array('class'=>'span5','maxlength'=>200)); ?>

	<?php //echo $form->textAreaRow($model,'secret_question',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php //echo $form->textFieldRow($model,'answer_secret_question',array('class'=>'span5','maxlength'=>250)); ?>

	<?php //echo $form->textFieldRow($model,'status_activated',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'created_date',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'ip_addr_created',array('class'=>'span5','maxlength'=>64)); ?>

	<?php //echo $form->textFieldRow($model,'hit_count',array('class'=>'span5','maxlength'=>11)); ?>

	<?php //echo $form->textFieldRow($model,'last_login',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'last_logout',array('class'=>'span5')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			//'icon'=>'ok white',
			'label'=>$model->isNewRecord ? Yii::t('strings','Save') : Yii::t('strings','Save'),
		)); ?>
</div>


<?php $this->endWidget(); ?>
