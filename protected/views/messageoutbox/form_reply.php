<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'message-outbox-form',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<div class="view">
<p class="help-block"><i><?php echo Yii::t('strings','Fields with') ?>  <span class="required">*</span> <?php echo Yii::t('strings','are required') ?></i></p>

<div class = "animated flash">
<?php echo $form->errorSummary($model); ?>
</div>


	<?php echo $form->hiddenField($model,'from_outbox',array('class'=>'span5','maxlength'=>250, 'value'=>$users, 'readonly'=>'readonly')); ?>
	<?php //echo $form->textFieldRow($modelInbox,'from',array('class'=>'span5','maxlength'=>250, 'value'=>$users, 'readonly'=>'readonly')); ?>

	<?php //echo $form->textFieldRow($modelInbox,'from',array('class'=>'span5','maxlength'=>250)); ?>

	<?php echo $form->hiddenField($model,'to_outbox',array('class'=>'span5','maxlength'=>32, 'value'=>$from_inbox, 'readonly'=>'readonly')); ?>
	<?php //echo $form->textFieldRow($modelInbox,'to',array('class'=>'span5','maxlength'=>32)); ?>
	

	<?php 
	$modelusers=Users::model()->findByAttributes(array('userid'=>$from_inbox));
	if($modelusers){
		$full_name=$modelusers->full_name;
		echo  '<b>'.Yii::t('strings','To'),"</b> : ", $full_name. " (".$from_inbox.")";
	}
	else {
		throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}
	?>
	

	<br>

	<?php echo $form->hiddenField($model,'title',array('class'=>'span5','maxlength'=>250, 'value'=>"Re : " .$title, 'readonly'=>'readonly')); ?>
	<b> <?php echo Yii::t('strings','Title'),"</b> : Re : ", $title;?>
	<br>
	<br>
	<?php echo $form->textAreaRow($model,'message',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<br> 

	<?php /*echo $form->labelEx($model,'date'); ?>

	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	'model'=>$model,
	//'language'=>Yii::app()->language='id',
	'attribute'=>'date',
	'options'=>array(
						'showAnim'=>'slideDown',
						'dateFormat'=>'yy-mm-dd',          
						'changeMonth'=>true,
						'changeYear'=>true,
						'showOn'=>'focus',
						'showButtonPanel' => true,
					),
	'htmlOptions'=>array(
	'style'=>'width:80px;'),
	)); ?>	
	<?php echo $form->error($model,'date'); */ ?> 

	<?php //echo $form->textFieldRow($model,'date',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'status',array('class'=>'span5','maxlength'=>0)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>Yii::t('strings','Send'),
		)); ?>
</div>
</div>

<?php $this->endWidget(); ?>
