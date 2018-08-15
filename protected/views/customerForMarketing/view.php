<?php
$this->breadcrumbs=array(
	'Customers'=>array('index'),
	$model->id_customer,
);

$this->menu=array(
	array('label'=>'Manage Customer','url'=>array('custvend/cust')),
	array('label'=>'Create Customer','url'=>array('custvend/custcreate')),
	array('label'=>'View Customer','url'=>array('custvend/custview','id'=>$model->id_customer)),
	array('label'=>'Update Customer','url'=>array('custvend/custupdate','id'=>$model->id_customer)),

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
<h2>View <font color="#BD362F"> <?php echo $model->ContactName; ?> </font></h2>
<hr>
</div>

<table width="100%" style="margin-bottom:0px;">
	<tr>
		<td width = "210" style="vertical-align:top;">
		<br>
		<?php 
			//echo"<figure class='cap-left'>"; // untuk hover  ubah foto

			$repo = "repository/customer/";
			$DEF_FILE = ImageDisplayer::displayDefaultFile($repo , "defaultuser.jpg");
			if($model->foto_customer != ""){
				$file = $repo.$model->foto_customer;
				
				if(file_exists($file)){
					//echo ImageDisplayer::displaySmallFotoWithConditional($repo, $model->foto, $model->userid, $model->userid);
					echo ImageDisplayer::displayformFile($repo , $model->foto_customer);
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
	</td>
	<td style="vertical-align:top;">
<br>
<h4 style="color:#BD362F;"> Personal Customer Info </h4>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_customer',
		//'CustomerNumber',
		
		'CompanyName',
		'CustomerCode',
		'Acronym',
		//'address_line1',
		//'address_line2',
		'Address',
		//'Street',
		'City',
		'PostalCode',
		'NPWP',
		'Telephone',
		
		'FaxNumber',
		'Email',
		
		
		//'VATreg',
		'ContactName',
	/*	'BankName',
		'BranchAddress',
		'BankCity',
		'AccountName',
		'AccountNumber',
		
		//'id_payment_top',
			array('label'=>'Term of Payment',
				  'value'=>$model->idPaymentTop->payment_top),
		
		//'id_currency',
		 array('label'=>'Curreny',
				  'value'=>$model->idCurrency->currency_type),

	*/
),
)); ?>


<hr>

<h4 style="color:#BD362F;"> Status Info </h4>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'vatReg',
		//'id_payment_top',
	'GroupCategory',
	'TypeCategory',
		
),
)); ?>




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
                'url'=>array('customerbankacc/create','id'=>$model->id_customer),
                'htmlOptions' => array(
                                        'class'=>'various fancybox.ajax',
                                        ),
            
                )); 
?> 
</div>


<?php 
//$modelcust=new CustomerBankAcc;
$this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'customer-bank-acc-grid',
'type' => 'striped bordered condensed',
'dataProvider'=>$modelzz->searchbybankacc($model->id_customer),
'filter'=>$modelzz,
'columns'=>array(
 array(
        'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
                ),
		//'id_customer_bank_acc',
		'id_customer',
		'BankName',
		'BranchAddress',
		'BankCity',
		'AccountName',
		'AccountNumber',
		 array(   
                'header'=>'Currency',
                'name'=>'id_currency',
                'value'=>'$data->cur->currency',
                'filter'=>CHtml::listData(Currency::model()->findAll(),'id_currency', 'currency'),

               // 'filter'=>array("GROUP"=>"GROUP","NON-GROUP"=>"NON-GROUP"),
                ),
		//'id_currency',

array(
 'class'=>'bootstrap.widgets.TbButtonColumn',
'buttons'=>array(
                'update'=>
                    array(
                        'url'=> 'Yii::app()->createUrl("CustomerBankAcc/update",array("id"=>$data->id_customer_bank_acc))',
                        'options'=>array(
                            'class'=>'various fancybox.ajax',
                            'rel'=>'',
                        ),
                    ),

                     'view'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("CustomerBankAcc/view",array("id"=>$data->id_customer_bank_acc))',
                        'options'=>array(
                            'class'=>'various fancybox.ajax',
                            'rel'=>'',
                        ),
                    ),

                     'delete'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("CustomerBankAcc/delete",array("id"=>$data->id_customer_bank_acc))',
                       
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
		//'vatReg',
		//'id_payment_top',
		'BankName',
		'BranchAddress',
		'BankCity',
		'AccountName',
		'AccountNumber',
		//array('label'=>'Term of Payment',
		//		  'value'=>$model->PaymentTop->payment_top),
		array('label'=>'Term Of Payment',
				'value'=>$model->TermOfPayment."  "."days"
			),
		//'TermOfPayment',
		
		//'id_currency',
		 array('label'=>'Curreny',
				  'value'=>$model->idCurrency->currency_type),
),
)); 
*/?>

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

