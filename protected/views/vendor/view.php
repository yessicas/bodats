<?php
$this->breadcrumbs=array(
	'Vendors'=>array('index'),
	$model->id_vendor,
);

$this->menu=array(
	array('label'=>'Manage Vendor', 'url'=>array('custvend/vend')),
	array('label'=>'Create Vendor', 'url'=>array('custvend/vendcreate')),
	array('label'=>'View Vendor', 'url'=>array('custvend/vendview', 'id'=>$model->id_vendor)),
	array('label'=>'Update Vendor', 'url'=>array('custvend/vendupdate', 'id'=>$model->id_vendor)),
	array('label'=>'Delete Vendor', 'url'=>'#', 'linkOptions'=>array('submit'=>array('vendor/delete','id'=>$model->id_vendor),'confirm'=>'Are you sure you want to delete this item?')),
	
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
<h2>View Vendor #<font color="#BD362F"> <?php echo $model->VendorName ?> </font></h2>
<hr>
</div>

<div class ="view">
<table width="100%">
	<tr>
		<td width = "210" style="vertical-align:top;">
		<?php
			$repo = "repository/vendor/";
			$DEF_FILE = ImageDisplayer::displayDefaultFile($repo , "defaultuser.jpg");
			if($model->foto_vendor != ""){
				$file = $repo.$model->foto_vendor;
				
				if(file_exists($file)){
					//echo ImageDisplayer::displaySmallFotoWithConditional($repo, $model->foto, $model->userid, $model->userid);
					echo ImageDisplayer::displayformFile($repo , $model->foto_vendor);
				}else{
					echo $DEF_FILE;
				}
			}else{
				echo $DEF_FILE;
			}	

			//$url = Yii::app()->createUrl("datadiri/uploadfoto");
			//echo '<a href="'.$url .'" class="various fancybox.ajax"><span class="menu_icon icon-edit"></span> Ubah Foto Profil</a>';
		?>
		</td>
		
		<td style="vertical-align:top;">

<h4 style="color:#BD362F;"> Personal Vendor Info </h4>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_vendor',
		//'VendorNumber',
		'ContactName',
		'VendorName',
		'Address',
		'City',
		'PostalCode',
		'Telephone',
		'fax_number',
		'Email',
		'NPWP',
		'CompanyType',
		/*
		//'VendorCode',
		'vatReg',
		//'id_payment_top',
		'BankName',
		'BranchAddress',
		'BankCity',
		'AccountName',
		'AccountNumber',
		array('label'=>'Term of Payment',
				  'value'=>$model->idPaymentTop->payment_top),
		
		//'id_currency',
		 array('label'=>'Curreny',
				  'value'=>$model->idCurrency->currency_type),
				  */
),
)); ?>

 
<h4 style="color:#BD362F;"> Classification </h4>
<hr>

<?php
$hitung=VendorClassification::model()->findAllByAttributes(array('id_vendor'=>$model->id_vendor)); 

if(count($hitung) < 2){


?>



<div class="tambah">
<?php      $this->widget('bootstrap.widgets.TbButton', array(      

                'label' =>Yii::t('strings','Add Classification'),
                'icon'=>'plus white',
                'type' => 'danger',// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                //'url'=>array('create'),   
                'url'=>array('vendorclassification/create','id'=>$model->id_vendor),
                'htmlOptions' => array(
                                        'class'=>'various fancybox.ajax',
                                        ),
            
                )); 
?> 
</div>

<?php }

?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'vendor-classification-grid',
'type' => 'striped bordered condensed',
'dataProvider'=>$modelcc->searchbyclas($model->id_vendor),
'summaryText'=>' ',
//'filter'=>$modelcc,
'columns'=>array(
 array(
        'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
                ),
		//'id_vendor_classification',
		//'id_vendor',
         array(   
                'header'=>'Type',
                'name'=>'type',
               // 'value'=>'$data->type',
               // 'filter'=>CHtml::listData(Vendor::model()->findAll(),'id_vendor', 'VendorName'),

            //    'filter'=>array("AGENCY"=>"AGENCY","PRODUCT"=>"PRODUCT"),
                ),
	//	'type',
array(
 'class'=>'bootstrap.widgets.TbButtonColumn',
 'template'=>'{update} {delete}',
'buttons'=>array(
                'update'=>
                    array(
                        'url'=> 'Yii::app()->createUrl("VendorClassification/update",array("id"=>$data->id_vendor_classification))',
                        'options'=>array(
                            'class'=>'various fancybox.ajax',
                            'rel'=>'',
                        ),
                    ),

                     'view'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("VendorClassification/view",array("id"=>$data->id_vendor_classification))',
                        'options'=>array(
                            'class'=>'various fancybox.ajax',
                            'rel'=>'',
                        ),
                    ),

                     'delete'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("VendorClassification/delete",array("id"=>$data->id_vendor_classification))',
                       
                    ),
                    ),
),
),
)); ?> 

<?php /*
		 	$data=VendorClassification::model()->findAllByAttributes(array('id_vendor'=>$model->id_vendor)); ?>

		 <!---	<div class="tanggalkanan">
	<?php //echo Yii::app()->dateFormatter->formatDateTime($data->Tanggal, 'short'); ?>
</div> -->
		<div style="margin-left:80px; font-weight:bold; font-size:11px;">
		
		<?php 
		foreach ($data as $listdata) {
	echo  $listdata->type.'<br>';

		}
		
		?>
		</div>
		*/ ?>

</td>
	</tr>
</table>



<h4 style="color:#BD362F;"> Payment Info </h4>

<hr>

<div class="tambah">
<?php      $this->widget('bootstrap.widgets.TbButton', array(      

                'label' =>Yii::t('strings','Add Payment Info'),
                'icon'=>'plus white',
                'type' => 'danger',// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                //'url'=>array('create'),   
                'url'=>array('vendorbankacc/create','id'=>$model->id_vendor),
                'htmlOptions' => array(
                                        'class'=>'various fancybox.ajax',
                                        ),
            
                )); 
?> 
</div>


<?php 
//$modelven=new VendorBankAcc;
$this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'vendor-bank-acc-grid',
'type' => 'striped bordered condensed',
'dataProvider'=>$modelvv->searchbyvv($model->id_vendor),
'filter'=>$modelvv,
'columns'=>array(
 array(
        'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
                ),
		//'id_vendor_bank_acc',
		//'id_vendor',
		'BankName',
		'BranchAddress',
		'BankCity',
		'AccountName',
		'AccountNumber',
		//'Currency',
		//'id_currency',
		 array(   
                'header'=>'Currency',
                'name'=>'id_currency',
                'value'=>'$data->cur->currency',
                'filter'=>CHtml::listData(Currency::model()->findAll(),'id_currency', 'currency'),

               // 'filter'=>array("GROUP"=>"GROUP","NON-GROUP"=>"NON-GROUP"),
                ),
	
array(
 'class'=>'bootstrap.widgets.TbButtonColumn',
'buttons'=>array(
                'update'=>
                    array(
                        'url'=> 'Yii::app()->createUrl("VendorBankAcc/update",array("id"=>$data->id_vendor_bank_acc))',
                        'options'=>array(
                            'class'=>'various fancybox.ajax',
                            'rel'=>'',
                        ),
                    ),

                     'view'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("VendorBankAcc/view",array("id"=>$data->id_vendor_bank_acc))',
                        'options'=>array(
                            'class'=>'various fancybox.ajax',
                            'rel'=>'',
                        ),
                    ),

                     'delete'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("VendorBankAcc/delete",array("id"=>$data->id_vendor_bank_acc))',
                       
                    ),
                    ),
),
),
)); ?> 

<?php 
/*
$this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'vatReg',
		//'id_payment_top',
		'BankName',
		'BranchAddress',
		'BankCity',
		'AccountName',
		'AccountNumber',
		//array('label'=>'Term of Payment',
		//		  'value'=>$model->idPaymentTop->payment_top),

		array('label'=>'Term Of Payment',
				'value'=>$model->term_of_payment."  "."days"
			),
		
		//'id_currency',
		 array('label'=>'Curreny',
				  'value'=>$model->idCurrency->currency_type),
),
)); 
*/
?>

</div>

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

