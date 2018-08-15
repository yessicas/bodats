
<script>function finebarge(data) {
             
                var json = JSON.parse(data);
               // alert(json["message"]);
               $("#error_message_barge_mode").html(json["message"]);
               $('#Barge').val(json["id_vessel"]);
              // $('#VesselName').val(json["VesselName"]);
				
        }
</script>


<script>
$(document).ready(function(){

// ketika blur atau on exit dari field 

var notblankmessage='<?php echo Yii::t("strings","Cannot Blank") ?>';

$('#PortLoading').blur(function () {  
	if(this.value ==''){
		$("#error_message_port_loading_mode").html(notblankmessage);
	}else{
		$("#error_message_port_loading_mode").html('');
	}
 });


$('#PortUnLoading').blur(function () {  
	if(this.value ==''){
		$("#error_message_port_unloading_mode").html(notblankmessage);
	}else{
		$("#error_message_port_unloading_mode").html('');
	}
 });


$('#Tug').blur(function () {  
	if(this.value ==''){
		$("#error_message_tug_mode").html(notblankmessage);
	}else{
		$("#error_message_tug_mode").html('');
	}
 });

$('#Barge').blur(function () {  
	if(this.value ==''){
		$("#error_message_barge_mode").html(notblankmessage);
	}else{
		$("#error_message_barge_mode").html('');
	}
 });

$('#quantity').blur(function () {  
	if(this.value ==''){
		$("#error_message_quantity_mode").html(notblankmessage);
	}else{
		$("#error_message_quantity_mode").html('');
	}
 });


 $('#quantity').keyup(function () {  
	      // setiap karakter yang diketik selain angka akan langsung dihapus   
	      this.value = this.value.replace(/[^0-9\.]/g,'');
	    });

	$('#calculateform').submit(function(){
		 var PortLoadingVal=$('#PortLoading').val() ;
		 var PortUnLoadingVal=$('#PortUnLoading').val() ;
		 var TugVal=$('#Tug').val() ;
		 var BargeVal=$('#Barge').val() ;
		 var quantityVal=$('#quantity').val() ;

		 if(PortLoadingVal == ''){
		 	//alert('not ok');
		 	$("#error_message_port_loading_mode").html(notblankmessage);
		 	return false;
		}

		else if(PortUnLoadingVal == ''){
		 	//alert('not ok');
		 	$("#error_message_port_unloading_mode").html(notblankmessage);
		 	return false;
		}

		else if(TugVal == ''){
		 	//alert('not ok');
		 	$("#error_message_tug_mode").html(notblankmessage);
		 	return false;
		}

		else if(BargeVal == ''){
		 	//alert('not ok');
		 	$("#error_message_barge_mode").html(notblankmessage);
		 	return false;
		}
		else if(quantityVal == ''){
		 	//alert('not ok');
		 	$("#error_message_quantity_mode").html(notblankmessage);
		 	return false;
		}

		else{
			return true ;
		}

	});

});

</script>


<?php
$this->breadcrumbs=array(
	'Customer Voices'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Calculator','url'=>array('demand/caculat')),
);
?>


<?php
if(Yii::app()->user->hasFlash('success')):?>

<div class = "animated flash">
	<?php
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

<div id="content">
<h2>Freight Calculator</h2>
<hr>
</div>

<div class="alert alert-block alert-info" style="width:98%; padding:5px">
Please note that freight cost was generated from our references tables. For actual cost and quotation, you can contact our marketing staff.
</div>

<div class="view">
	<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'calculateform',
	'action'=>'demand/result',
    'method'=>'post',
    'type'=>'horizontal',
)); ?>
		<?php /*
		$model = "asdasd";
		*/ ?>
		
	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="freightCalculator_PortLoading"><?php echo "PortLoading &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
		<?php echo CHtml::dropDownList('PortLoading','',CHtml::listData(Jetty::model()->findAll(array(
           'order' => 'JettyName ASC',
       )), 'JettyId', 'JettyName'),
			array('prompt'=>Yii::t('strings','-- Select Port Of Loading --'),'class'=>'span4'));?>
	<div  id="error_message_port_loading_mode" style="color: #b94a48; margin-left:40px;padding-top:3px;"></div>
	</div>
	</div>

	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="freightCalculator_PortUnloading"><?php echo "PortUnloading &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
	<?php echo CHtml::dropDownList('PortUnLoading','',CHtml::listData(Jetty::model()->findAll(array(
           'order' => 'JettyName ASC',
       )), 'JettyId', 'JettyName'),
			array('prompt'=>Yii::t('strings','-- Select Port Of Unloading --'),'class'=>'span4'));?>
	<div  id="error_message_port_unloading_mode" style="color: #b94a48; margin-left:40px;padding-top:3px;"></div>
	</div>
	</div>

	
	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="freightCalculator_Tug"><?php echo "Tug &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
	<?php 
				echo CHtml::dropDownList('Tug','',CHtml::listData(Vessel::model()->findAll(array(
					'condition' => 'VesselType = :VesselType',
					'order'=>'VesselName ASC',
					'params' => array(
					':VesselType' => "TUG",
					),
				)), 'id_vessel', 'VesselName'),
					array('prompt'=>Yii::t('strings','-- Select Tug --'),'class'=>'span4',
					'ajax' => array('type'=>'POST', 'url'=>CController::createUrl('settypetugbarge/FindBargeVesselByTugVessel') /*, 'update'=>'#id_update'*/,'success'=>'finebarge')));
			?>
	<div  id="error_message_tug_mode" style="color: #b94a48; margin-left:40px;padding-top:3px;"></div>
	</div>
	</div>


	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="freightCalculator_Barge"><?php echo "Barge &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
	 <?php 
				echo CHtml::dropDownList('Barge','',CHtml::listData(Vessel::model()->findAll(array(
					'condition' => 'VesselType = :VesselType',
					'order'=>'VesselName ASC',
					'params' => array(
					':VesselType' => "BARGE",
					),
				)), 'id_vessel', 'VesselName'),
					array('prompt'=>Yii::t('strings','-- Select Barge --'),'class'=>'span4',
					));
			?>
	<div  id="error_message_barge_mode" style="color: #b94a48; margin-left:40px;padding-top:3px;"></div>
	
	</div>
	</div>


	
	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="freightCalculator_Quantity"><?php echo "Quantity &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
		<?php echo CHtml::textField('quantity','',array('class'=>'span2', 'maxLength'=>10)); ?> MT
		<div  id="error_message_quantity_mode" style="color: #b94a48; margin-left:40px;padding-top:3px;"></div>

	</div>
	</div>
		
		
<?php /*

		<div class="row buttons">
		<?php echo CHtml::link('Calculate',array('demand/result'),
		array('class'=>'calculate-button btn btn-primary')); ?>
			</div>
		*/ ?>

<div class="form-actions">

		<?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type'=>'primary',
            'label'=>'Display',
        )); 
?>
	</div>

		</div>

<?php $this->endWidget(); ?>