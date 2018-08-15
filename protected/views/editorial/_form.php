<?php
/* @var $this ArticleController */
/* @var $model MemberArticle */
/* @var $form CActiveForm */

?>


<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'member-article-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

<div class="view">

	<div class = "animated flash">
	<?php echo $form->errorSummary($model); ?>
	</div>
		
	<?php $this->widget('bootstrap.widgets.TbLabel', array(
		'type'=>'info', // 'success', 'warning', 'important', 'info' or 'inverse'
		'label'=>'Silakan tulis artikel dengan format yang baik dan susunan yang teratur.',
	)); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'Title'); ?>
		<?php echo $form->textField($model,'Title',array('class'=>'span9', 'size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'Title'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'IDArticleTopic'); ?>
		<?php echo $form->dropDownList($model,'IDArticleTopic',CHtml::listData(ArticleTopic::model()->findAll(), 'IDArticleTopic', 'ArticleTopic'),
		array('prompt'=>'--Pilih --'));  // pake auto conplete atau yang lainnya lebih bagus?> 
		<?php echo $form->error($model,'IDArticleTopic'); ?>
	</div>

	
	<div class="row">
		<!--<label>Sub Title</label>-->
		<?php 
		$val = isset($model->subtitle->SubtitleTopic)?$model->subtitle->SubtitleTopic: "-";
		//echo CHtml::textField('judul', $val, array('size'=>20,'maxlength'=>100)) 
		?>
		<?php /*echo $form->error($model,'Title');  */?>
		
		<?php echo $form->labelEx($model,'IDSubtitle'); ?>
		<?php  
                $this->widget('zii.widgets.jui.CJuiAutoComplete', array(  
                	//'model'=>$model,
					//'attribute'=>'IDSubtitle',
					 'name'=>'autosubtitle',
                     'value'=>$val,  
                     'source'=>$this->createUrl('Editorial/autosubtitle'),  
                     'options'=>array(  
                          'showAnim'=>'fold',  
                          'minLength' => '1',  
                          'select'=>'js:function( event, ui ) {  
                               $("#MemberArticle_IDSubtitle").val(ui.item.id);   
                          }'  
                     ),  
                ));  
          ?>
    <?php echo $form->hiddenField($model,'IDSubtitle',array('size'=>60,'maxlength'=>200)); ?>
	<?php echo $form->error($model,'IDSubtitle'); ?>

	</div>

	<div class="row">
	<?php echo $form->labelEx($model,'PublishedDateTime'); ?>
	<?php $this->widget( 'ext.EJuiTimePicker.EJuiTimePicker', array(
		'model' => $model, // Your model
		'language'=>'id',
		'attribute' => 'PublishedDateTime', // Attribute for input
		'options' => array(
				'showOn'=>'focus',
				'dateFormat'=>'yy-mm-dd',
				),
		'htmlOptions' => array(
				'style'=>'width:150px;', // styles to be applied
				'size' => '10',    // textField maxlength
		),
	)); ?>
	
	<?php echo $form->error($model,'PublishedDateTime'); ?>
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
	<?php
	/*
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
	*/
	?>
	
	<?php	/*$this->widget('application.extensions.cleditor.ECLEditor', array(
			'model'=>$model,
			'attribute'=>'Content',
			'options'=>array(
				'width'=>'100%',
				'height'=>400,
				'useCSS'=>true,
			),
			'value'=>$model->Content,));
			*/
		?>

	<?php //echo $form->labelEx($model,'Content'); ?>
		<?php
		  $this->widget(
		    'bootstrap.widgets.TbCKEditor',
		    array(
		        'model' => $model,
		        'attribute' => 'Content',
		       
		    )
		);

	?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('strings','Save') : Yii::t('strings','Save')); ?>
	</div>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->