<?php
$this->breadcrumbs=array(
	'Data Perusahaan'=>array('view'),
	$model->nama_perusahaan,
);

$this->menu=array(
array('label'=>'List DataPerusahaan','url'=>array('index')),
array('label'=>'Create DataPerusahaan','url'=>array('create')),
array('label'=>'Update DataPerusahaan','url'=>array('update','id'=>$model->id_perusahaan)),
array('label'=>'Delete DataPerusahaan','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_perusahaan),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage DataPerusahaan','url'=>array('admin')),
);
?>

<?php if(Yii::app()->user->hasFlash('success')):?>
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

<center>
<h3 class= "header"><img src="repository/icon/companybig.jpg"> <?php echo Yii::t('strings','Company Profile') ?> <?echo $model->nama_perusahaan ?>
<span class="header-line"><img src="repository/icon/headline.png"></span>
</h3>
</center>


<div class ="view">
<table width="100%">
	<tr>
		<td width = "210" style="vertical-align:top;">
		<?php
			echo"<figure class='cap-left'>"; // untuk hover  ubah foto

			$repo = "repository/company/";
			$DEF_FILE = ImageDisplayer::displayDefaultFile($repo , "defaultcompany.jpg");
			if($model->foto_profil != ""){
				$file = $repo.$model->foto_profil;
				
				if(file_exists($file)){
					//echo ImageDisplayer::displaySmallFotoWithConditional($repo, $model->foto, $model->userid, $model->userid);
					echo ImageDisplayer::displayCustomFile($repo , $model->foto_profil, "FC");
				}else{
					echo $DEF_FILE;
				}
			}else{
				echo $DEF_FILE;
			}	

			$url = Yii::app()->createUrl("dataperusahaan/uploadfoto");
			//echo '<a href="'.$url .'" class="various fancybox.ajax"><span class="menu_icon icon-edit"></span> Ubah Foto Profil</a>';
			echo"<figcaption><a href='$url'class='various fancybox.ajax' style='color:#ffffff;'>".Yii::t('strings','Upload Photo')."</a></figcaption>"; 
			echo"</figure>";  // untuk hover  ubah foto
		?>
		</td>
		<td style="vertical-align:top;">
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
//'type' => 'striped bordered condensed',
'type' => 'striped  condensed',
'cssFile' => Yii::app()->baseUrl .'/css/left_label_detil_view.css',
'data'=>$model,
'attributes'=>array(
		//'id_perusahaan',
		'nama_perusahaan',
        'deskripsi',
		'alamat',
		'BidangUsaha.bidang_usaha',
		'izin_usaha',
        'Country.country_name',
		//'foto_logo',
		//'foto_profil',
),
)); ?>

<div align="right">
<?php 
$url = Yii::app()->createUrl("dataperusahaan/update/id/".$model->id_perusahaan."/c/".SecurityGenerator::SecurityDisplay($model->code_id));
echo '<a href="'.$url .'" class="various fancybox.ajax"><span class="menu_icon icon-edit" style="margin-right:4px;"></span>'.Yii::t('strings','Update').'</a>';
?>
</div>
</td>
	</tr>
</table>
</div>

<?php
	if(isset($sukses)){
		$url = Yii::app()->createUrl("dataperusahaan/view");
		echo '<div class="info">'.Yii::t('strings','Upload Photos succeeded. If the images in the picture has not seemed to change, it is likely your browser cache.').'
        <br>'.Yii::t('strings','Please').' <b><a href="'.$url.'">refresh</a></b> '.Yii::t('strings','Back to your browser by clicking').'  <b><a href="'.$url.'">'.Yii::t('strings','this link').' </a></b>. </div>';
    }
?>

<?php
$this->widget('application.extensions.fancybox.EFancyBox', array(
    'target'=>'.popup_foto',
    'config'=>array(
        'maxWidth'    => 800,
        'maxHeight'   => 600,
        'fitToView'   => false,
        'width'       => 'auto',
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
        'width'       => 'auto',
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


