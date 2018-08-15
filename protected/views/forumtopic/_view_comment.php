		<?php
		$pagination = $widget->dataProvider->getPagination();
		$currentPage = $pagination->getCurrentPage() +1;
		?>
		
	<table width="100%" id="comment<?php echo $data->id_forum_comment ?>">
	<tr>
		<td width = "50" style="vertical-align:top;">
		<div id="foto" style="width:50px;">

		<?php

		echo $this->renderPartial('../friend/list_data_foto_user', array('userid'=>$data->user->userid,'type'=>$data->user->type));
		?>
	    </div>

		</td>



		<td style="vertical-align:top;text-align:left;">


			<?php //echo '<font color = #3b73af>'.'('.$modeluserdatadiri->userid.') '.$modeluserdatadiri->nama_lengkap.'</font>'; ?> 
			<?php 
			echo $this->renderPartial('../friend/list_data_nama_user', array('userid'=>$data->user->userid,'type'=>$data->user->type));
			?>

			(<font size = 1><?php echo Yii::app()->dateFormatter->formatDateTime($data->update_date, 'medium'); ?></font>)
			<br>


			<!-- menampilkan comment drinya sendiri yang bisa di edit dan hapus-->
			<?php if ($data->userid==Yii::app()->user->id){ ?> 
			<?php
			$this->widget('editable.EditableField', array(
		    'type' => 'textarea',
		    'mode' => 'inline',
		    'model' => $data,
		    'attribute'=> 'comment',
		  	'url'=> $this->createUrl('forumtopic/editable'),
		  	'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
		    'liveTarget'=> $widget->id, //for live update
			'htmlOptions'=> array(
             'id'=>'comment'.$data->id_forum_comment,
	        ),
	        'display' => 'js: function(value, sourceData) {
			  var escapedValue = $("<div>").text(value).html();
			  $(this).html("<div class=value_comment><font color=black>" + escapedValue + "</font></div><div align=right>|Edit|</div>")
			}',
		    ));
			?>

		</td>


			<td width = 20 style="vertical-align:bottom;">
			<div align="right">
			<?php 
			echo CHtml::Label('|'.Yii::t("strings","Delete").'|','Delete',array('onClick' => 'javascript:deletecomment('.$data->id_forum_topic.',"'.SecurityGenerator::SecurityDisplay($data->ForumTopic->code_id).'",'.$data->id_forum_comment.','.$currentPage.')','id'=>'hapuscomment'.$data->id_forum_comment,'class'=>'deleteclass')); 
			?>


			<?php
			//echo CHtml::link('Hapus', array('forumtopic/deletecomment', 'id'=>$data->id_forum_comment,'id_forum_topic'=>$data->id_forum_topic),array('confirm' => 'Anda Yakin Akan menghapus Komentar ini?','id'=>'hapuscomment'.$data->id_forum_comment,'class'=>'deleteclass'));
			//echo CHtml::ajaxLink('Hapus', $this->createUrl('forumtopic/deletecomment/id/'.$data->id_forum_comment),array('type'=>'POST','success'=>'allFinehapus'),array('confirm' => 'Anda Yakin Akan Menghapus Komentar Ini?'));
			?>
			<?php /*echo CHtml::ajaxLink("Hapus",array("forumcomment/delete","id"=>$data->id_forum_comment,"id_forum_topic"=>$data->id_forum_topic),array(
		     "beforeSend" => 'js:function(){if(confirm("Are you sure you want to delete?"))return true;}',
		     "success"=>'js:function(data){$.fn.yiiListView.update("commentlist",{});}',
		     "type"=>"post",

		          ),array("id"=>$data->id_forum_comment)); */
		    ?>
			</div>

			<!--
			<div align="right">
			<a id="edit" editable = <?php echo 'comment'.$data->id_forum_comment ?> href="#" title="Edit Commrnt">Edit</a>
			</div>
			-->


			<?php } ?>

			<!-- menampilkan comment Orang Lain yang Tidak bisa di edit dan hapus-->
			<?php if ($data->userid<>Yii::app()->user->id){ ?>
			<?php echo CHtml::encode($data->comment); ?>
			<?php } ?>

		</td>
			</tr>
		</table>
		<hr>





		
<!--
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_forum_comment')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_forum_comment),array('view','id'=>$data->id_forum_comment)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_forum_topic')); ?>:</b>
	<?php echo CHtml::encode($data->id_forum_topic); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comment')); ?>:</b>
	<?php echo CHtml::encode($data->comment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('userid')); ?>:</b>
	<?php echo CHtml::encode($data->userid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_date')); ?>:</b>
	<?php echo CHtml::encode($data->update_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ip_address')); ?>:</b>
	<?php echo CHtml::encode($data->ip_address); ?>
	<br />
-->


