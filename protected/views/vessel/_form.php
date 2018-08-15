
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'vessel-form',
	//'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>



<?php echo $form->errorSummary($model); ?>
<div class ="view">

	<div class="imgleft">
		<br>
		<br>
		<?php 
			//echo"<figure class='cap-left'>"; // untuk hover  ubah foto

			$repo = "repository/vessel/";
			$DEF_FILE = ImageDisplayer::displayDefaultFile($repo , "defaultuser.jpg");
			if($model->foto_vessel != ""){
				$file = $repo.$model->foto_vessel;
				
				if(file_exists($file)){
					//echo ImageDisplayer::displaySmallFotoWithConditional($repo, $model->foto, $model->userid, $model->userid);
					echo ImageDisplayer::displayformFile($repo , $model->foto_vessel);
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
	
	<?php echo $form->fileFieldRow($model,'foto_vessel',array('style'=>'width:200px','margin-left:-95px','maxlength'=>250)); ?>
	</div>
	<br>

	<?php echo $form->textFieldRow($model,'VesselName',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->dropDownlistRow($model,'Status',array("OWN"=>"OWN","TC"=>"TC","SPOT"=>"SPOT","ANCHOR"=>"ANCHOR","FUEL"=>"FUEL","UNSET"=>"UNSET"),
	array('class'=>'span2','maxlength'=>0)); ?>


	<?php echo $form->dropDownlistRow($model,'VesselType',array("TUG"=>"TUG","BARGE"=>"BARGE"),
	array('prompt'=>'--Pilih --','class'=>'span2','maxlength'=>0,'onChange' => 'javascript:enable(this.selectedIndex, "vesseltype")')); ?>
	
	<div id="tug" style="display:none;">
	<?php echo $form->textFieldRow($model,'Power',array('class'=>'span3','append' => 'Hp')); ?>
	<br><br><br>
	</div>
	
	<div id="barge"  style="display:none;">
	<?php echo $form->textFieldRow($model,'BargeSize',array('class'=>'span3','append' => 'Feet')); ?>
	<?php echo $form->textFieldRow($model,'Capacity',array('class'=>'span3','append' => 'MT')); ?>
	<br><br><br>
	</div>
	
	<?php // echo $form->textFieldRow($model,'VesselDate',array('class'=>'span5')); ?>

	<?php // echo $form->textFieldRow($model,'RunningHour',array('class'=>'span5')); ?>

	<?php // echo $form->textFieldRow($model,'LastDateMaintenance',array('class'=>'span5')); ?>

	<?php // echo $form->textFieldRow($model,'LastRHMaintenance',array('class'=>'span5')); ?>

	<?php // echo $form->textFieldRow($model,'inventoryid',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'VesselChecklist',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>
</div>

<?php $this->endWidget(); ?>


<!-- javascript foto picture-->
<script>
function enable(id)
{

 //alert(id);
 
  if(id==0){ // tug
    //alert(id);
    var el = document.getElementById("tug");
    el.style.display = 'none';
	var el2 = document.getElementById("barge");
    el2.style.display = 'none';
  }
  
  if(id==1){ // tug
    //alert(id);
    var el = document.getElementById("tug");
    el.style.display = 'inline';
	var el2 = document.getElementById("barge");
    el2.style.display = 'none';
  }
  
  if(id==2){ // barge
    //alert(id);
    var el = document.getElementById("barge");
    el.style.display = 'inline';
	var el2 = document.getElementById("tug");
    el2.style.display = 'none';
  }
  
  
}
</script>

<?php
if(!$model->isNewRecord){

        if($model->VesselType == "TUG")
          $cmbval = 1;
       if($model->VesselType == "BARGE")
          $cmbval = 2;
        
        echo '<script>enable('.$cmbval.');</script>';
    }

else {
?>	 
	<script>
	 var x = document.getElementById('Vessel_VesselType');
	 var s= x.selectedIndex;
     enable(s);
    </script>

<?php
}
?>