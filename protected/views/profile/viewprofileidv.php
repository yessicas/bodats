<?php
$this->breadcrumbs=array(
	'Data Diri'=>array('view'),
	$model->nama_lengkap,
);

$this->menu=array(
array('label'=>'List Data Diri','url'=>array('index')),
array('label'=>'Create Data Diri','url'=>array('create')),
array('label'=>'Update Data Diri','url'=>array('update','id'=>$model->id_data_diri)),
array('label'=>'Delete Data Diri','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_data_diri),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Data Diri','url'=>array('admin')),
);

$modelfrienshippending=Friendship::model()->findByAttributes(array('from_userid'=>Yii::app()->user->id,'to_userid'=>$model->userid,'status'=>'PENDING'));
$modelfrienshipactive=Friendship::model()->findByAttributes(array('from_userid'=>Yii::app()->user->id,'to_userid'=>$model->userid,'status'=>'ACTIVE'));


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
<h3 class= "header"><img src="repository/icon/userbig.png"> <?php echo $model->nama_lengkap; ?>
<span class="header-line"><img src="repository/icon/headline.png"></span>
</h3>
</center>


<?php if(!Yii::app()->user->isGuest){ ?>
<div align="right"  id="buttonaction">
<?php 
		if ($model->userid==Yii::app()->user->id){
		echo "";
		}

		else if($modelfrienshippending==true){
			echo "Invitation has Sent";
		}

		else if($modelfrienshipactive==true){
			echo "Friend";
		}
		else{
			echo CHtml::ajaxButton("Invite", array('friend/viewsingleinvite','userid'=>$model->userid), 
				array('update'=>'#buttonaction',
						'beforeSend' => 'function(){
		     			 $("#buttonaction").addClass("loading");}',
		    			'complete' => 'function(){
		     			 $("#buttonaction").removeClass("loading");}',),
				array('class'=>'btn btn-info btn-small', 'id'=>'user'.$model->userid));
		}
?>
</div>
<?php } ?>



<div class ="view">
<table width="100%">
	<tr>
		<td width = "210" style="vertical-align:top;">
		<?php
			//echo"<figure class='cap-left'>"; // untuk hover  ubah foto

			$repo = "repository/users/";
			$DEF_FILE = ImageDisplayer::displayDefaultFile($repo , "defaultuser.jpg");
			if($model->foto != ""){
				$file = $repo.$model->foto;
				
				if(file_exists($file)){
					//echo ImageDisplayer::displaySmallFotoWithConditional($repo, $model->foto, $model->userid, $model->userid);
					echo ImageDisplayer::displayCustomFile($repo , $model->foto, "FC");
				}else{
					echo $DEF_FILE;
				}
			}else{
				echo $DEF_FILE;
			}	

			//$url = Yii::app()->createUrl("datadiri/uploadfoto");
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
		
					//'nama_lengkap',
					'nama_panggilan',
					array(
						'name' => 'jenis_kelamin',
						'type' => 'raw',
						'value' => CHtml::encode($model->getjk()),
					),
					'tempat_lahir',
					array(
						'name' => 'tanggal_tahun_lahir',
						'type' => 'raw',
						'value' => CHtml::encode($model->getBirthdate()),
					),
					'alamat1',
					'agama',
					'LastJobStatus.status',
					'handphone',
					'user.email',
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
