<div class="view">

<table width="100%" id="userview<?php echo $data->userid ?>" style="margin-bottom:0px;border-radius:5px;">
	<tr>

		<!-- foto user berdasarkan type-->
		<td width = "50" style="vertical-align:top;">
		<?php 
		echo $this->renderPartial('list_data_user', array('userid'=>$data->userid,'type'=>$data->type));
		?>
		</td>

	

		<td>
		<?php 
		$modelfrienshippending=Friendship::model()->findByAttributes(array('from_userid'=>Yii::app()->user->id,'to_userid'=>$data->userid,'status'=>'PENDING'));
		$modelfrienshipactive=Friendship::model()->findByAttributes(array('from_userid'=>Yii::app()->user->id,'to_userid'=>$data->userid,'status'=>'ACTIVE'));
		$modelfrienshiprejected=Friendship::model()->findByAttributes(array('from_userid'=>Yii::app()->user->id,'to_userid'=>$data->userid,'status'=>'REJECTED'));
		
		if ($data->userid==Yii::app()->user->id){
		echo "";
		}
		else if($modelfrienshippending==true){
			echo "Invitation has Sent";
		}

		else if($modelfrienshipactive==true){
			echo "Friend";
		}

		else if($modelfrienshiprejected==true){
			echo CHtml::ajaxButton("Invite", array('friend/singleinvite','userid'=>$data->userid), array('success'=>'allFine'),array('class'=>'btn btn-info btn-small', 'id'=>'user'.$data->userid));
		}

		else{
			//echo CHtml::link(CHtml::encode($data->nama_lengkap),array('#')); 
			//echo CHtml::ajaxLink('Hapus', $this->createUrl('forumtopic/deletecommafafent/id/'.$data->userid),array('type'=>'POST'),array('id'=>'user'.$data->userid));
			echo CHtml::ajaxButton("Invite", array('friend/singleinvite','userid'=>$data->userid), array('success'=>'allFine'),array('class'=>'btn btn-info btn-small', 'id'=>'user'.$data->userid));
		}
		 ?>
		</td>
	</tr>
</table>

</div>
