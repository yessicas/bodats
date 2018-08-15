<?php
$this->breadcrumbs=array(
	'Crews'=>array('index'),
	$model->CrewId,
);


$this->menu=array(
    array('label'=>'Manage Crew','url'=>array('cre/crew')),
	array('label'=>'Create Crew','url'=>array('cre/crewcreate')),
	array('label'=>'View Crew','url'=>array('cre/crewview','id'=>$model->CrewId)),
	array('label'=>'Update Crew','url'=>array('cre/crewupdate','id'=>$model->CrewId)),

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
<h2>View Crew  <font color="#BD362F"> <?php echo $model->CrewName; ?> </font></h2>
<hr>
</div>

<div class="view">
<table width="100%" style="margin-bottom:0px;">
	<tr>
		<td width = "210" style="vertical-align:top;">
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
	</td>
		<td style="vertical-align:top;">

<h4 style="color:#BD362F;"> Personal Info </h4>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'CrewName',
		'PlaceOfBirth',
		'DateOfBirth',
		'Address',
		'PhoneNumber',
		'MobileNumber',
		'CurrentResidence',
),
)); ?>

<hr>

<h4 style="color:#BD362F;"> Status Info </h4>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		/*'CrewName',
		'PlaceOfBirth',
		'DateOfBirth',
		'Address',
		'PhoneNumber', */
		'Status',
		'StatusOwn',
		'StatusRelief',
),
)); ?>

<hr>


<h4 style="color:#BD362F;"> Payment Info </h4>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		
		'BankAccountNumber',
		'BankName',
		'AccountHolder',
		'GovernmentFileTaxNumber',
		
),
)); ?>

<hr>

<h4 style="color:#BD362F;"> Certification Info </h4>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
	
		'CertificateLevel',

		array(
			'label'=>'Foto Sertifikat',
			'type'=>'raw',
			'value'=>ImageDisplayer::displayformFile2("repository/fotosertifikat/",$model->FotoSertifikat),
	
			),
		//'FotoSertifikat',
		array(
			'label'=>'Foto Ijazah',
			'type'=>'raw',
			'value'=>ImageDisplayer::displayformFile2("repository/fotoijazah/",$model->FotoIjazah),
			),
		//'FotoIjazah',
		'Notes',
		//'Photo',
		//'LastMutationId',
),
)); ?>
		</td>
	</tr>
</table>

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

