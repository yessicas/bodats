

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'crew-form',
	
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data')
)); ?>


<?php echo $form->errorSummary($model); ?>

<div class ="view">

	<div class="imgleft">
		<br>
		<br>
		<?php 
			//echo"<figure class='cap-left'>"; // untuk hover  ubah foto

			$repo = "repository/crew/";
			$DEF_FILE = ImageDisplayer::displayDefaultFile($repo , "defaultuser.jpg");
			if($model->Photo != ""){
				$file = $repo.$model->Photo;
				
				if(file_exists($file)){
					//echo ImageDisplayer::displaySmallFotoWithConditional($repo, $model->foto, $model->userid, $model->userid);
					echo ImageDisplayer::displayformFile($repo , $model->Photo);
				}else{
					echo $DEF_FILE;
				}
			}else{
				echo $DEF_FILE;
			}	

			//$url = Yii::app()->createUrl("crew/uploadfoto");
			//echo '<a href="'.$url .'" class="various fancybox.ajax"><span class="menu_icon icon-edit"></span> Ubah Foto Profil</a>';
			//echo"<figcaption><a href='$url'class='various fancybox.ajax' style='color:#ffffff;'>".Yii::t('strings','Upload Photo')." </a></figcaption>"; 
			//echo"</figure>";  // untuk hover  ubah foto
			
		?>
	
	<?php echo $form->fileFieldRow($model,'Photo',array('style'=>'width:200px','margin-left:-75px','maxlength'=>250)); ?>
	</div>

<h4 style="color:#BD362F;"> Basic Info </h4>


	<?php //echo $form->textFieldRow($model,'NIP',array('class'=>'span5','maxlength'=>255)); ?>

	<?php //echo $form->textFieldRow($model,'VesselId',array('class'=>'span5','maxlength'=>32)); ?>
	
	<?php echo $form->textFieldRow($model,'SeaManCode',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'EmployeeRegisteredNumber',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'CrewName',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'PlaceOfBirth',array('class'=>'span5','maxlength'=>32)); ?>

	<label class="control-label required" for="DateOfBirth"><?php echo $model::model()->getAttributeLabel('DateOfBirth'); ?> <span class="required">*</span></label> <!-- label -->

	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	'model'=>$model,
	//'language'=>Yii::app()->language='id',
	'attribute'=>'DateOfBirth',
	'options'=>array(
						'showAnim'=>'slideDown',
						'dateFormat'=>'yy-mm-dd',          
						'changeMonth'=>true,
						'changeYear'=>true,
						'showOn'=>'focus',
						'showButtonPanel' => true,
					),
	'htmlOptions'=>array(
	'style'=>'width:100px;'),
	)); ?>	
	<?php echo $form->error($model,'DateOfBirth'); ?>

	<?php //echo $form->textFieldRow($model,'DateOfBirth',array('class'=>'span5')); ?>
	<br> <br>

	<?php echo $form->textAreaRow($model,'Address',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'PhoneNumber',array('class'=>'span5','maxlength'=>13)); ?>

	<?php echo $form->textFieldRow($model,'MobileNumber',array('class'=>'span5','maxlength'=>13)); ?>

	<?php //echo $form->textAreaRow($model,'Email',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'CurrentResidence',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php //echo $form->textFieldRow($model,'Status',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'Profession',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->dropDownListRow($model,'MaritalStatus',array('SINGLE'=>'SINGLE','MARRIED'=>'MARRIED','DIVORCE'=>'DIVORCE'),
	 array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span2'));?>

	<?php echo $form->textFieldRow($model,'NameOfSpouse',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'NameOfChildren',array('class'=>'span5','maxlength'=>32)); ?>
</div>

	<div class="view">
	<h4 style="color:#BD362F;"> Status Info </h4>
	
	<?php echo $form->dropDownListRow($model,'id_crew_position',CHtml::listData(CrewPosition::model()->findAll(), 'id_crew_position', 'crew_position'),
    array('prompt'=>'--Select--','class'=>'span2'));?>
	<?php echo $form->dropDownListRow($model,'Status',array('candidate'=>'candidate', 'crew'=>'crew', 'retired'=>'retired'),array('prompt'=>'--Select--','class'=>'span3'));?>
	<?php echo $form->dropDownListRow($model,'StatusOwn',array('OWN'=>'OWN', 'OUTSOURCE'=>'OUTSOURCE'),array('prompt'=>'--Select--','class'=>'span3'));?>
	<?php echo $form->dropDownListRow($model,'StatusRelief',array('Relief'=>'Relief', 'Non Relief'=>'Non Relief'),array('prompt'=>'--Select--','class'=>'span3'));?>

	</div>

<div class="view">
	<h4 style="color:#BD362F;"> Payment Info </h4>

	<?php echo $form->textAreaRow($model,'BankAccountNumber',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'BankName',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'AccountHolder',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'GovernmentFileTaxNumber',array('class'=>'span5','maxlength'=>32)); ?>
</div>

<div class="view">
	<h4 style="color:#BD362F;"> Certification Info </h4>


	<?php //echo $form->textFieldRow($model,'AuditTime',array('class'=>'span5','maxlength'=>32)); ?>

	<?php //echo $form->textFieldRow($model,'AuditActivity',array('class'=>'span5','maxlength'=>32)); ?>

	<?php //echo $form->textFieldRow($model,'StatusRelief',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->dropDownListRow($model,'CertificateLevel',CHtml::listData(CertificateLevel::model()->findAll(), 'certiface_level', 'certiface_level'),
    array('prompt'=>'--Select--','class'=>'span2'));?>
	

	<?php //echo $form->textFieldRow($model,'CertificateLevel',array('class'=>'span5','maxlength'=>255)); ?>
	<br>


	<div class="imgleft">
		<br>
		<br>
		<?php 
			//echo"<figure class='cap-left'>"; // untuk hover  ubah foto

			$reposerti = "repository/fotosertifikat/";
			$DEF_FILE = ImageDisplayer::displayDefaultFile($reposerti , "defaultuser.jpg");
			if($model->FotoSertifikat != ""){
				$file = $reposerti.$model->FotoSertifikat;
				
				if(file_exists($file)){
					//echo ImageDisplayer::displaySmallFotoWithConditional($repo, $model->foto, $model->userid, $model->userid);
					echo ImageDisplayer::displayformFile2($reposerti , $model->FotoSertifikat);
				}else{
					echo $DEF_FILE;
				}
			}else{
				echo $DEF_FILE;
			}	

			//$url = Yii::app()->createUrl("crew/uploadfoto");
			//echo '<a href="'.$url .'" class="various fancybox.ajax"><span class="menu_icon icon-edit"></span> Ubah Foto Profil</a>';
			//echo"<figcaption><a href='$url'class='various fancybox.ajax' style='color:#ffffff;'>".Yii::t('strings','Upload Photo')." </a></figcaption>"; 
			//echo"</figure>";  // untuk hover  ubah foto
			
		?>

	<?php echo $form->fileFieldRow($model,'FotoSertifikat',array('style'=>'width:200px','maxlength'=>250)); ?>
</div>

	<div class="imgleft">
		<br>
		<br>
		<?php 
			//echo"<figure class='cap-left'>"; // untuk hover  ubah foto

			$repoijazah = "repository/fotoijazah/";
			$DEF_FILE = ImageDisplayer::displayDefaultFile($reposerti , "defaultuser.jpg");
			if($model->FotoIjazah != ""){
				$file = $repoijazah.$model->FotoIjazah;
				
				if(file_exists($file)){
					//echo ImageDisplayer::displaySmallFotoWithConditional($repo, $model->foto, $model->userid, $model->userid);
					echo ImageDisplayer::displayformFile2($repoijazah , $model->FotoIjazah);
				}else{
					echo $DEF_FILE;
				}
			}else{
				echo $DEF_FILE;
			}	

			//$url = Yii::app()->createUrl("crew/uploadfoto");
			//echo '<a href="'.$url .'" class="various fancybox.ajax"><span class="menu_icon icon-edit"></span> Ubah Foto Profil</a>';
			//echo"<figcaption><a href='$url'class='various fancybox.ajax' style='color:#ffffff;'>".Yii::t('strings','Upload Photo')." </a></figcaption>"; 
			//echo"</figure>";  // untuk hover  ubah foto
			
		?>

	<?php echo $form->fileFieldRow($model,'FotoIjazah',array('style'=>'width:200px','maxlength'=>250)); ?> 
	</div>

	<br><br><br>
	<br><br><br>
	<br>

	<?php echo $form->textAreaRow($model,'Notes',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php //echo $form->textFieldRow($model,'Photo',array('class'=>'span5','maxlength'=>255)); ?>

	<?php //echo $form->textFieldRow($model,'LastMutationId',array('class'=>'span5','maxlength'=>255)); ?>

</div>
</td>
	</tr>
</table>


<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>
<?php $this->endWidget(); ?>


<?php 
$this->widget('application.extensions.fancybox.EFancyBox', array(
    'target'=>'.popup_foto',
    'config'=>array(
        'maxWidth'    => 800,
        'maxHeight'   => 600,
        'fitToView'   => false,
        'width'       => 400,
        'height'      => 'auto',
        'autoSize'    => false,
        'closeClick'  => false,
        'closeBtn'    =>true,  
      
       //'title'=>'dfsf',
        
        'helpers'=>array(
            'title'=>array( 'type' => 'inside' ), // inside or outside
            'overlay'=>array( 'closeClick' => false ), 
         
        ),
        'openEffect'  => 'elastic',
        'closeEffect' => 'elastic',
      

    ),
));
?>

<?php

$this->widget('application.extensions.fancybox.EFancyBox', array(
    'target'=>'.various',
    'config'=>array(
        'maxWidth'    => 800,
        'maxHeight'   => 600,
        'fitToView'   => false,
        'width'       => 400,
        'height'      => 'auto',
        'autoSize'    => false,
        'closeClick'  => false,
        'closeBtn'    =>true,  
      
       //'title'=>'dfsf',
        
        'helpers'=>array(
            'title'=>false, // inside or outside
            'overlay'=>array( 'closeClick' => false ), 
         
        ),
        'openEffect'  => 'elastic',
        'closeEffect' => 'elastic',
      

    ),
));
?>