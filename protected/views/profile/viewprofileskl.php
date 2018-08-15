<?php
$this->breadcrumbs=array(
	'Sekolah'=>array('view'),
	$model->nama_sekolah,
);

$this->menu=array(
array('label'=>'List Sekolah','url'=>array('index')),
array('label'=>'Create Sekolah','url'=>array('create')),
array('label'=>'Update Sekolah','url'=>array('update','id'=>$model->id_sekolah)),
array('label'=>'Delete Sekolah','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_sekolah),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Sekolah','url'=>array('admin')),
);

$modelfrienshippending=Friendship::model()->findByAttributes(array('from_userid'=>Yii::app()->user->id,'to_userid'=>$modelusersekolah->userid,'status'=>'PENDING'));
$modelfrienshipactive=Friendship::model()->findByAttributes(array('from_userid'=>Yii::app()->user->id,'to_userid'=>$modelusersekolah->userid,'status'=>'ACTIVE'));


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

<div class="well">
<h4>View Data Sekolah <?php echo $model->nama_sekolah; ?></h4>
<hr>

<?php if(!Yii::app()->user->isGuest){ ?>
<div align="right"  id="buttonaction">
<?php 
        if ($modelusersekolah->userid==Yii::app()->user->id){
        echo "";
        }

        else if($modelfrienshippending==true){
            echo "Invitation has Sent";
        }

        else if($modelfrienshipactive==true){
            echo "Friend";
        }
        else{
            echo CHtml::ajaxButton("Invite", array('friend/viewsingleinvite','userid'=>$modelusersekolah->userid), 
                array('update'=>'#buttonaction',
                        'beforeSend' => 'function(){
                         $("#buttonaction").addClass("loading");}',
                        'complete' => 'function(){
                         $("#buttonaction").removeClass("loading");}',),
                array('class'=>'btn btn-info btn-small', 'id'=>'user'.$modelusersekolah->userid));
        }
?>
</div>
<?php } ?>
</div>

<div class ="view">
<table width="100%">
	<tr>
		<td width = "210" style="vertical-align:top;">
		<?php
			//echo"<figure class='cap-left'>"; // untuk hover  ubah foto

			$repo = "repository/school/";
			$DEF_FILE = ImageDisplayer::displayDefaultFile($repo , "defaultschool.jpg");
			if($model->foto_1 != ""){
				$file = $repo.$model->foto_1;
				
				if(file_exists($file)){
					//echo ImageDisplayer::displaySmallFotoWithConditional($repo, $model->foto, $model->userid, $model->userid);
					echo ImageDisplayer::displayCustomFile($repo , $model->foto_1, "FC");
				}else{
					echo $DEF_FILE;
				}
			}else{
				echo $DEF_FILE;
			}	

			//$url = Yii::app()->createUrl("Sekolah/uploadfoto");
			//echo '<a href="'.$url .'" class="various fancybox.ajax"><span class="menu_icon icon-edit"></span> Ubah Foto Profil</a>';
			//echo"<figcaption><a href='$url'class='various fancybox.ajax' style='color:#ffffff;'>Ubah Foto </a></figcaption>"; 
			//echo"</figure>";  // untuk hover  ubah foto
		?>
		</td>
		<td style="vertical-align:top;">
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
//'type' => 'striped bordered condensed',
'type' => 'striped  condensed',
'cssFile' => Yii::app()->baseUrl .'/css/left_label_detil_view.css',
'data'=>$model,
'attributes'=>array(
		//'id_sekolah',
		'nama_sekolah',
		'nama_sekolah_short',
		'alamat_sekolah',
		'kategori',
		array('label'=>'Kab/Kota','value'=>$model->MstKabupatenkota->nama),
		//'id_kota',
		'telepon_1',
		'telepon_2',
		'email',
		'website',
		//'logo',
		//'foto_1',
		//'foto_2',
		'deskripsi',
		'type',
		'akreditasi',
),
)); ?>


<div align="right">
<?php 
//$url = Yii::app()->createUrl("sekolah/update/id/".$model->id_sekolah."/c/".SecurityGenerator::SecurityDisplay($model->code_id));
//echo '<a href="'.$url .'" class="various fancybox.ajax"><span class="menu_icon icon-edit"></span> Ubah Data Sekolah</a>';
?>
</div>
</td>
	</tr>
</table>
</div>

<?php
	if(isset($sukses)){
		$url = Yii::app()->createUrl("sekolah/view");
		echo '<div class="info">Upload Foto sudah berhasil. Jika foto pada gambar belum tampak berubah, ada kemungkinan cache browser anda. 
		<br>Silakan <b><a href="'.$url.'">refresh</a></b> kembali browser anda dengan klik <b><a href="'.$url.'">link ini.</a></b>. </div>';
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





<?php /* $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_sekolah',
		'nama_sekolah',
		'nama_sekolah_short',
		'alamat_sekolah',
		'kategori',
		'id_kota',
		'telepon_1',
		'telepon_2',
		'email',
		'website',
		'logo',
		'foto_1',
		'foto_2',
		'deskripsi',
		'type',
		'akreditasi',
),
)); */?>
