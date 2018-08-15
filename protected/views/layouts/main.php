<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
    <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/css/iconcareerln.png" type="image/x-icon" /> 
	
	<!-- Base HREF -->
	<?php if($_SERVER["SERVER_NAME"] == "203.215.48.86") { ?>
	<base href="http://<?php echo $_SERVER["SERVER_NAME"].":80".Yii::app()->request->baseUrl;?>/index.php">
	<?php } else{ ?>
	<base href="http://<?php echo $_SERVER["SERVER_NAME"].":80".Yii::app()->request->baseUrl;?>/index.php">
	<?php }?>

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/mainstyle.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/animate.css/animate.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/animate.css/animate.min.css" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap/css/bootstrap-yii.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap/css/jquery-ui-bootstrap.css"/>

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/gantt/gantti.css"/>

<!-- di matiin yang menu ngikutin saat scroll (fix scroll)
    <script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/css/fix_scroll/animated-scrol.js' ></script>
    <script type="text/javascript">
        $(function() {
            var offset = $("#sidebar").offset();
            var topPadding = 50;
            $(window).scroll(function() {
                if ($(window).scrollTop() > offset.top) {
                    $("#sidebar").stop().animate({
                        marginTop: $(window).scrollTop() - offset.top + topPadding
                    });
                } else {
                    $("#sidebar").stop().animate({
                        marginTop: 18
                    });
                };
            });
        });
    </script>
-->

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<div  id="page">
	<!-- header -->
	
	<div id="header">
		<div id="logo">
			
            <b><?php //echo CHtml::encode(Yii::app()->name); ?></b>
            <img src ="<?php echo Yii::app()->request->baseUrl; ?>/images/layout/logotop.png" align = "left">

            <?php 
            /*
            <?php $currentLang = Yii::app()->language;?>
            <?php echo CHtml::form(); ?>
            <div id="langdrop" align="right" style="font-size:14px; margin-right:15px; color:#ffffff;"> <?php echo Yii::t('strings','Language'); ?> :
            <?php echo CHtml::dropDownList('_lang', $currentLang, array(
                'en' => 'English', 'id' => 'Indonesia'), array('submit' => '' , 'style'=>'width:120px; height:27px; margin-top:9px;')); ?>
            </div>
            <?php echo CHtml::endForm(); ?>
            */
            ?>
            <?php
            $criteria = new CDbCriteria();
            $criteria->condition = 'id_currency <> 1';
            $curency=Currency::model()->findAll($criteria); // exchange rate

            $criteria_update = new CDbCriteria();
            $criteria_update->limit = 1;
            $criteria_update->order = 'change_rate_updated desc';
            $last_update=Currency::model()->find($criteria_update); // last update exchange rate

            $dt = new DateTime($last_update->change_rate_updated);
            $date_last_update = $dt->format('Y-m-d'); // last update exchange rate format tanggal


            $criteriafuel = new CDbCriteria();
            $fuel=Fuel::model()->findAll($criteriafuel);

            $criteria_update_fuel = new CDbCriteria();
            $criteria_update_fuel->limit = 1;
            $criteria_update_fuel->order = 'fuel_price_updated desc';
            $last_update_fuel=Fuel::model()->find($criteria_update_fuel);

            $dt_fuel = new DateTime($last_update_fuel->fuel_price_updated);
            $date_last_update_fuel = $dt_fuel->format('Y-m-d');
            ?>
            <div align="right">
            <div id="langdrop"  style="padding-right:10px;font-size:10px; border-radius:5px; margin-right:15px; background-color:#C4E4F8; width:500px;">
              <?php  

              if (!Yii::app()->user->isGuest) {

            

              $model = new Authassignment();
              $datas = $model->findByAttributes(array('userid'=>Yii::app()->user->id));

                if($datas->itemname =='CUS'){
                       echo "";
                }

                else {


              foreach($curency as $list_curency){
                echo $list_curency->currency.' = '.NumberAndCurrency::formatCurrency($list_curency->change_rate.' ');
                echo '<a class="various fancybox.ajax" rel="" title="update"  href="'.Yii::app()->createUrl("currency/updatecurrency/id/".$list_curency->id_currency).'"><i class="icon-pencil"></i></a> ';
              }
              if(date("Y-m-d") > $date_last_update){
              echo '<font style="color:#DA5B40"> ['.Yii::app()->dateFormatter->formatDateTime($last_update->change_rate_updated, 'medium').']'.'</font>'.' by '.$last_update->change_rate_updated_by;
        
              }else{
              echo '<font style="color:#0C6F9E"> ['.Yii::app()->dateFormatter->formatDateTime($last_update->change_rate_updated, 'medium').']'.'</font>'.' by '.$last_update->change_rate_updated_by;
              }
              ?>
                <br>

              <?php
               foreach($fuel as $list_fuel){
                echo $list_fuel->fuel.' = '.NumberAndCurrency::formatCurrency($list_fuel->fuel_price).' '.$list_fuel->Currency->currency.' ';
                echo '<a class="various fancybox.ajax" rel="" title="update"  href="'.Yii::app()->createUrl("fuel/updatefuel/id/".$list_fuel->id_fuel).'"><i class="icon-pencil"></i></a> ';
               }

               if(date("Y-m-d") > $date_last_update_fuel){
                 echo '<font style="color:#DA5B40"> ['.Yii::app()->dateFormatter->formatDateTime($last_update_fuel->fuel_price_updated, 'medium').']'.'</font>'.' by '.$last_update_fuel->fuel_price_updated_by;
               }
               else{
                 echo '<font style="color:#0C6F9E"> ['.Yii::app()->dateFormatter->formatDateTime($last_update_fuel->fuel_price_updated, 'medium').']'.'</font>'.' by '.$last_update_fuel->fuel_price_updated_by;
               }
           }
       }
              ?>

            </div>
            </div>
            

         </div>
	</div>
	<!-- header -->

		<!-- notifications-->
		<?php
           if(!Yii::app()->user->isGuest){ 
                // notification biasa
                $crit = new CDbCriteria();
                //$crit->condition = "(notif_status = 'NEW' OR notif_status = 'UNREAD') AND userid='".Yii::app()->user->id."'";
                $crit->condition = "notif_status = 'NEW' AND userid='".Yii::app()->user->id."'";
                $crit->limit=5;
                $crit->order="notif_date desc";
                $pemberitahuan=Notification::model()->findAll($crit);
				
				// all notif 
				$critALL = new CDbCriteria();
                //$crit->condition = "(notif_status = 'NEW' OR notif_status = 'UNREAD') AND userid='".Yii::app()->user->id."'";
                $critALL->condition = "notif_status = 'NEW' AND userid='".Yii::app()->user->id."'";
                $critALL->order="notif_date desc";
                $pemberitahuanAll=Notification::model()->findAll($critALL);
				
				
                $item_notification = array();

                $jumlah_pemberitahuan = count($pemberitahuan); 
				$jumlah_pemberitahuan_all = count($pemberitahuanAll); 
                if( $jumlah_pemberitahuan > 0){
                    $label= '<sup class="note"><span class="badge badge-warning" style="margin-right:-20px;">'.$jumlah_pemberitahuan_all.'</span></sup>';
                    foreach($pemberitahuan as $list_notification)
                    {
						$item_notification[]='---';
						//$item_notification[]= array('label' =>'<b>'.$list_notification->notif_tittle.'</b><br>'.$list_notification->notif_message.'<br>', 'url' => array('/notification/view','id'=>$list_notification->id_notification,'c'=>SecurityGenerator::SecurityDisplay($list_notification->code_id)) ,'linkOptions' => array('style'=>'font-size:9pt'),);
						$item_notification[]= array('label' =>$list_notification->notif_tittle, 'url' => array('/notification/view','id'=>$list_notification->id_notification,'c'=>SecurityGenerator::SecurityDisplay($list_notification->code_id)) ,'linkOptions' => array('style'=>'font-size:9pt'),);
                    }
                    $item_notification[]='---';
                    $item_notification[]= array('label' =>'<center><b>'.Yii::t('strings','View All').'</b></center>', 'url' => array('/notification/index') ,'linkOptions' => array('style'=>'font-size:10pt'),);
             
                }
                else {
                     $label= '&nbsp' ;
                }
                // end notifications biasa

                //message notifications

                $criteria = new CDbCriteria();
                $criteria->condition = "status = 'new' AND to_inbox='".Yii::app()->user->id."'";
                $criteria->limit=5;
                $criteria->order="date desc";
                $pemberitahuan_message=MessageInbox::model()->findAll($criteria);
                $item_notification_message = array();

                $jumlah_pemberitahuan_message = count($pemberitahuan_message);  
                if( $jumlah_pemberitahuan_message > 0){

                    $label_message= '<sup class="note"><span class="badge badge-warning" style="margin-right:-20px;">'.$jumlah_pemberitahuan_message.'</span></sup>';
                    foreach($pemberitahuan_message as $list_notification_message)
                    {
                    $item_notification_message[]='---';
                    $item_notification_message[]= array('label' =>Yii::t('strings','Messages From').' <b>'.$list_notification_message->fromuser->full_name.' ('.$list_notification_message->from_inbox.')</b>', 'url' => array('/messageinbox/view','id'=>$list_notification_message->id_inbox,'c'=>SecurityGenerator::SecurityDisplay($list_notification_message->code_id)) ,'linkOptions' => array('style'=>'font-size:9pt'),);
                    }
                    $item_notification_message[]='---';
                    $item_notification_message[]= array('label' =>'<center><b>'.Yii::t('strings','View All').'</b></center>', 'url' => array('/messageinbox/admin') ,'linkOptions' => array('style'=>'font-size:10pt'),);
             
                }
                 else {
                     $label_message= '&nbsp';
                }
            }

            else{
				$label= '';
				$label_message= '';
				$item_notification = array();
				$item_notification_message = array();
            }

		?>
		<!-- End notifications-->

<!-- navbar menu  -->
<?php
	$this->widget(
    'bootstrap.widgets.TbNavbar',
    array(
        'type' => null, // null or 'inverse'
        'brand' => '',
        'brandUrl' => '#',
        'collapse' => true, // requires bootstrap-responsive.css
        'fixed' => false,
        'items' => array(
            array(
                'class' => 'bootstrap.widgets.TbMenu',
                'items' => array(
                    array('label' => Yii::t('strings','Home'), 'url'=>Yii::app()->getHomeUrl(), 'icon'=>'home white'),
                ),
            ),




           array(
                'class' => 'bootstrap.widgets.TbMenu',
                'htmlOptions' => array('class' => 'pull-right'),
                'encodeLabel'=>false,
                'items' => array(


                    array(
                       
                        'label' => $label ,
                        'url' => array('/notification/index'),
                        'icon'=>'bell white',
                        'visible'=>!Yii::app()->user->isGuest,
                        'linkOptions' => array('data-toggle' => 'tooltip','title'=>Yii::t('strings','Notifications')),
                        'items' => $item_notification,
                    ),

                    array(
                       
                        'label' => $label_message ,
                        'url' => '',
                        'icon'=>'envelope white',
                        'visible'=>!Yii::app()->user->isGuest,
                        'linkOptions' => array('data-toggle' => 'tooltip','title'=>Yii::t('strings','Message')),
                        'items' => $item_notification_message,
                    ),
                   
                    array(
                       
                        'label' => Yii::app()->user->isGuest==!'isGuest'?Yii::app()->user->id:'Guest',
                       // 'label'=>'Admin',
                        'url' => '#',
                        'icon'=>'user white',
                        'visible'=>!Yii::app()->user->isGuest,
                        'items' => array(
                                        array('label' => Yii::t('strings','Change Password'), 'icon'=>'lock', 'url'=>array('/users/cpass') ),
                                         '---',
                                        array('label' => Yii::t('strings','Logout'), 'icon'=>'off', 'url'=>array('/site/logout') ),
                                        /*
                                        array(
                                             'template'=>'<li>
                                                          <a href="'.Yii::app()->createUrl("datadiri/view").'"> <img src ="./css/administrator-icon.png" height=20 width=20>Profil</a>
                                                          </li>'                   
                                               ),
                                        */
                                        )
                    ),
                    

        
                ),
            ),
        ),
    )
);

?>
<!-- end navbar menu  -->

	<?php
	//Breadcumb sementara juga dimatikan karena fitur ini tidak terlalu penting untuk aplikasi social network
	/*
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
		'links'=>$this->breadcrumbs,
	)); ?><!-- breadcrumbs -->

	<?php endif?>
	*/
	?>


	<?php echo $content; ?>

	<div class="clear"></div>




    <div id="footerpml">
        <div id="logo2"></div>
    	<div id="footerpml-wrap">
        	<div id="logo"></div>

            <p>&copy; 2011 - <?php echo date("Y");?> PATRIA Maritime Lines. All rights reserved.</p>
        </div>
    </div>

	
</div><!-- page -->

</body>
</html>

