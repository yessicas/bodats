<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<div class="title-front"><?php echo Yii::t('strings','Welcome to').' '.CHtml::encode(Yii::app()->name); ?></div>
<br>
    <p class="content-index"> 
    </p>

<div>
 <img src ="<?php echo Yii::app()->request->baseUrl; ?>/css/tugboat.jpg" class = "img-index"> 
</div>

    <div class="keterangan" align="justify">
	<p><strong>ORGANIZATION</strong><br>"Considering the potential business opportunity in coal and other energy transportation industy, PT United Tractors Pandu Engineerin (UTE) in cooperation with PT Orion Maritime Lines (OML), which specialize in transportation business, established PT Patria Maritime Lines in 2008. Since November 8 2011, PT Patria Maritime Lines (PML) is fully owned by PT United Tractors Pandu Engineering."</p>
	<p><strong>Mission</strong><br>"To provide sustainable value added for the stakeholders of  Maritime Logistic."</p>
	<p><strong>Vision</strong><br>"To be the reputable Shipping Company by providing the best services."</p>
	<p><strong>What Business Are We In</strong><br>"Services in Maritime Logistic for Energy Distribution"</p>
	<!--<p><strong>Share holders</strong><br>PT United Tractors Pandu Engineering Established since 1983, with major share 99.9% by PT United Tractors Tbk which belong to PT Astra International Tbk.</p>-->
    </div>


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
              if (!Yii::app()->user->isGuest) {

            

              $model = new Authassignment();
              $datas = $model->findByAttributes(array('userid'=>Yii::app()->user->id));

                if($datas->itemname =='CUS'){
                       echo "";
                }

                else {


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
           
              <?php  
              foreach($curency as $list_curency){
              //  echo $list_curency->currency.' = '.$list_curency->change_rate.' ';
               // echo '<a class="various fancybox.ajax" rel="" title="update"  href="'.Yii::app()->createUrl("currency/updatecurrency/id/".$list_curency->id_currency).'"><i class="icon-pencil"></i></a> ';
              }
              if(date("Y-m-d") > $date_last_update){
           //   echo '<font style="color:#DA5B40"> ['.Yii::app()->dateFormatter->formatDateTime($last_update->change_rate_updated, 'medium').']'.'</font>'.' by '.$last_update->change_rate_updated_by;

                $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
                        'id'=>'confirmaton',
                        'options'=>array(
                            'show' => 'blind',
                            'hide' => 'explode',
                            'modal' => 'true',
                            'title' => 'Remind !!!',
                            'resizable' => false,
                            //'enableSekin'=>true,
                            'width'=>300,
                            'autoOpen'=>true,
                            ),
                        ));
 
            echo 'Please immediately change the Exchange Rate, to avoid inacuracies';
             echo '<br> <font style="color:#0C6F9E; font-size:10px;"> Last Update : '.Yii::app()->dateFormatter->formatDateTime($last_update->change_rate_updated_by).' by '.$last_update->change_rate_updated_by .'</font>';
            echo '<a class="various fancybox.ajax" rel="" title="update"  href="'.Yii::app()->createUrl("currency/updatecurrency/id/".$list_curency->id_currency).'"><br><br><font style="color:#B10C0C;">Click Here For Change</font></a> ';


            $this->endWidget('zii.widgets.jui.CJuiDialog');
        
              }else{
            //  echo '<font style="color:#0C6F9E"> ['.Yii::app()->dateFormatter->formatDateTime($last_update->change_rate_updated, 'medium').']'.'</font>'.' by '.$last_update->change_rate_updated_by;
              }
              ?>
                <br>

              <?php
               foreach($fuel as $list_fuel){
          //      echo $list_fuel->fuel.' = '.$list_fuel->fuel_price.' '.$list_fuel->Currency->currency.' ';
             //   echo '<a class="various fancybox.ajax" rel="" title="update"  href="'.Yii::app()->createUrl("fuel/updatefuel/id/".$list_fuel->id_fuel).'"><i class="icon-pencil"></i></a> ';
               }

               if(date("Y-m-d") > $date_last_update_fuel && date("Y-m-d") == $date_last_update){
               //  echo '<font style="color:#DA5B40"> ['.Yii::app()->dateFormatter->formatDateTime($last_update_fuel->fuel_price_updated, 'medium').']'.'</font>'.' by '.$last_update_fuel->fuel_price_updated_by;
                $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
                        'id'=>'confirmaton',
                        'options'=>array(
                            'show' => 'blind',
                            'hide' => 'explode',
                            'modal' => 'true',
                            'title' => 'Remind !!!',
                            'resizable' => false,
                            'width'=>300,
                            'autoOpen'=>true,
                            ),
                        ));
 
           echo ' Please immediately change the Fuel Price, to avoid inacuracies.';
           echo '<br> <font style="color:#0C6F9E; font-size:10px;"> Last Update : '.Yii::app()->dateFormatter->formatDateTime($last_update_fuel->fuel_price_updated).' by '.$last_update_fuel->fuel_price_updated_by .'</font>';
            echo '<a class="various fancybox.ajax" rel="" title="update"  href="'.Yii::app()->createUrl("fuel/updatefuel/id/".$list_fuel->id_fuel).'"><br><br><font style="color:#B10C0C;">Click Here For Change</font></a> ';
            $this->endWidget('zii.widgets.jui.CJuiDialog');

               }
               else{
                 // echo '<font style="color:#0C6F9E"> ['.Yii::app()->dateFormatter->formatDateTime($last_update_fuel->fuel_price_updated, 'medium').']'.'</font>'.' by '.$last_update_fuel->fuel_price_updated_by;
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



