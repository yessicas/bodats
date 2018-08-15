<?php

require('Calendar.php'); 

class Gantti {

  var $cal       = null;
  var $data      = array();
  var $first     = false;
  var $last      = false;
  var $options   = array();
  var $cellstyle = false;
  var $blocks    = array();
  var $blocks2    = array();
  var $months    = array();
  var $days      = array();
  var $seconds   = 0;

  function __construct($data, $params=array()) {
    
    $defaults = array(
      'title'      => false,
      'cellwidth'  => 40,
      'cellheight' => 40,
      'today'      => true,
    );
        
    $this->options = array_merge($defaults, $params);    
    $this->cal     = new Calendar();
    $this->data    = $data;
    $this->seconds = 60*60*24;

    $this->cellstyle = 'style="width: ' . $this->options['cellwidth'] . 'px; height: ' . $this->options['cellheight'] . 'px"';
    
    // parse data and find first and last date  
    $this->parse();                
                    
  }

  function parse() {
    
    //foreach($this->data as $d) {

    foreach ($this->data as $key => $val) {
      // print $this->data[$i][0]['label'].'<br>';

      $this->blocks[] = array(
        'label' => $this->data[$key][0]['label'],
        'jettyorigin' => $this->data[$key][0]['jettyorigin'],
        'jettydestination' => $this->data[$key][0]['jettydestination'],
        'urlblock' => $this->data[$key][0]['urlblock'],
        //'start' => $start = strtotime($this->data[$key][0]['start']),
        //'end'   => $end   = strtotime($this->data[$key][0]['end']),
        'class' => @$this->data[$key][0]['class'],
        'urlclass' => @$this->data[$key][0]['urlclass'],
      );

     // hanya yang punya satu jadwal 
     

    
    }


     foreach ($this->data as $key => $val) {
      // print $this->data[$i][0]['label'].'<br>';

      for ($h = 0; $h < count($this->data[$key]); ++$h) {
        //print $this->data[$i][$h]['label'].'-'.$this->data[$i][$h]['start'];

          $this->blocks2[] = array(
            'label' => $this->data[$key][$h]['label'],
            'jettyorigin' => $this->data[$key][$h]['jettyorigin'],
            'jettydestination' => $this->data[$key][$h]['jettydestination'],
            'urlblock' => $this->data[$key][$h]['urlblock'],
            'start' => $start2= $this->data[$key][$h]['start'],
            'end'   => $end2= $this->data[$key][$h]['end'],
            'class' => @$this->data[$key][$h]['class'],
            'urlclass' => @$this->data[$key][$h]['urlclass'],
          );
      
      if($start2!='' || $end2!=''){
        if(!$this->first || $this->first > $start2) $this->first =strtotime($start2);
        if(!$this->last  || $this->last  < $end2)   $this->last  = strtotime($end2);
      }

      else {
         $monthseacrh=isset($_GET['monthseacrh']) ? $_GET['monthseacrh'] : date("m") ;
         $yearseacrh=isset($_GET['yearseacrh']) ? $_GET['yearseacrh'] : date("Y") ;
         $dateno=$yearseacrh.'-'.$monthseacrh.'-01';
         $this->first =strtotime($dateno);
         $this->last =strtotime($dateno);
      }

      }
    
    }

    //}
    
    $this->first = $this->cal->date($this->first);
    $this->last  = $this->cal->date($this->last);

    $current = $this->first->month();
    $lastDay = $this->last->month()->lastDay()->timestamp;

    // build the months      
    while($current->lastDay()->timestamp <= $lastDay) {
      $month = $current->month();
      $this->months[] = $month;
      foreach($month->days() as $day) {
        $this->days[] = $day;
      }
      $current = $current->next();
    }
        
  }

  function render() {
    
    $html = array();
    
    // common styles    
    $cellstyle  = 'style="line-height: ' . $this->options['cellheight'] . 'px; height: ' . $this->options['cellheight'] . 'px"';
    $wrapstyle  = 'style="width: ' . $this->options['cellwidth'] . 'px"';
    $totalstyle = 'style="width: ' . (count($this->days)*$this->options['cellwidth']) . 'px"';
    // start the diagram    
    $html[] = '<div class="gantt">';    

    // set a title if available
    if($this->options['title']) {
      $html[] = '<div class="title">' . $this->options['title'] . '</div>';
    }

    // sidebar with labels
    $html[] = '<aside>';
    $html[] = '<ul class="gantt-labels" style="margin-top: ' . (($this->options['cellheight']*2)+1) . 'px">';
    foreach($this->blocks as $i => $block) {
      $html[] = '<li class="gantt-label"><strong ' . $cellstyle . '>' . $block['label'] . '</strong></li>';      
    }
    $html[] = '</ul>';
    $html[] = '</aside>';

    // data section
    $html[] = '<section class="gantt-data">';
        
    // data header section
    $html[] = '<header>';

    // months headers
    $html[] = '<ul class="gantt-months" ' . $totalstyle . '>';
    foreach($this->months as $month) {
      $html[] = '<li class="gantt-month" style="width: ' . ($this->options['cellwidth'] * $month->countDays()) . 'px"><strong ' . $cellstyle . '>' . $month->name() . '</strong></li>';
    }                      
    $html[] = '</ul>';    

    // days headers
    $html[] = '<ul class="gantt-days" ' . $totalstyle . '>';
    foreach($this->days as $day) {

      $weekend = ($day->isWeekend()) ? ' weekend' : '';
      $today   = ($day->isToday())   ? ' today' : '';

      $html[] = '<li class="gantt-day' . $weekend . $today . '" ' . $wrapstyle . '><span ' . $cellstyle . '>' . $day->padded() . '</span></li>';
    }                      
    $html[] = '</ul>';    
    
    // end header
    $html[] = '</header>';

    // main items
    $html[] = '<ul class="gantt-items" ' . $totalstyle . '>';



        
// blockkkkkk

    foreach ($this->data as $key => $val) {

       if(count($this->data[$key])==1){
             //echo'ul';
            $html[] = '<li class="gantt-item">';
      

              // days
              $html[] = '<ul class="gantt-days">';
              foreach($this->days as $day) {

                $weekend = ($day->isWeekend()) ? ' weekend' : '';
                $today   = ($day->isToday())   ? ' today' : '';

                $html[] = '<li class="gantt-day' . $weekend . $today . '" ' . $wrapstyle . '><span ' . $cellstyle . '>' . $day . '</span></li>';
              }                      
              $html[] = '</ul>';  



              //print $this->data[$i][0]['label'];
              $data1=array();
              $data1[] = array(
              'label' => $this->data[$key][0]['label'],
              'jettyorigin' => $this->data[$key][0]['jettyorigin'],
              'jettydestination' => $this->data[$key][0]['jettydestination'],
              'urlblock' => $this->data[$key][0]['urlblock'],
              'start' => $start = strtotime($this->data[$key][0]['start']),
              'end'   => $end   = strtotime($this->data[$key][0]['end']),
              'class' => @$this->data[$key][0]['class'],
              'urlclass' => @$this->data[$key][0]['urlclass'],
            );
              foreach($data1 as $data1s => $data1ss) {
              // the block
              $days   = (($data1ss['end'] - $data1ss['start']) / $this->seconds);
              $offset = (($data1ss['start'] - $this->first->month()->timestamp) / $this->seconds);
              $top    = round($i * ($this->options['cellheight'] + 1));
              $left   = round($offset * $this->options['cellwidth']);
              $width  = round(($days+1) * $this->options['cellwidth'] - 9); // plus satu
              $height = round($this->options['cellheight']-8);
              $class  = ($data1ss['class']) ? ' ' . $data1ss['class'] : '';
              $days_plus_satu=$days+1;


              /**/

               if($data1ss['class']==''){
                  $nameblock='';
                }

              if($data1ss['class']=='shipping-order'){
                if($days_plus_satu >= 4){
                  $nameblock=$data1ss['jettyorigin']."-".$data1ss['jettydestination'];
                }else{
                  $nameblock=$days_plus_satu;
                }
              }

              if($data1ss['class']=='maintenence'){
                if($days_plus_satu >= 4){
                  $nameblock='Maintenance';
                }else{
                  $nameblock=$days_plus_satu;
                }
              }

              /**/

              $html[] = '<span class="gantt-block' . $class . '" style="left: ' . $left . 'px; width: ' . $width . 'px; height: ' . $height . 'px"><strong class="gantt-block-label">' .'<a href="'.$data1ss['urlblock'].'" class="'.$data1ss['urlclass'].'">'.$nameblock.'</a>'. '</strong></span>';
              }

             //echo'ul';
             $html[] = '</li>';
             //echo'<br>';
          }


           else if(count($this->data[$key])>1){

          //echo 'ul';
          //echo'<br>';
           $html[] = '<li class="gantt-item">';
      

              // days
          $html[] = '<ul class="gantt-days">';
              foreach($this->days as $day) {

                $weekend = ($day->isWeekend()) ? ' weekend' : '';
                $today   = ($day->isToday())   ? ' today' : '';

          $html[] = '<li class="gantt-day' . $weekend . $today . '" ' . $wrapstyle . '><span ' . $cellstyle . '>' . $day . '</span></li>';
              }                      
           $html[] = '</ul>';  


          for ($h = 0; $h < count($this->data[$key]); ++$h) {
         // print $this->data[$i][$h]['label'].'-'.$this->data[$i][$h]['start'];
             $data2=array();
              $data2[] = array(
              'label' => $this->data[$key][$h]['label'],
              'jettyorigin' => $this->data[$key][$h]['jettyorigin'],
              'jettydestination' => $this->data[$key][$h]['jettydestination'],
              'urlblock' => $this->data[$key][$h]['urlblock'],
              'start' => $start = strtotime($this->data[$key][$h]['start']),
              'end'   => $end   = strtotime($this->data[$key][$h]['end']),
              'class' => @$this->data[$key][$h]['class'],
              'urlclass' => @$this->data[$key][$h]['urlclass'],
            );
          //echo'<br>';

              foreach($data2 as $data2s => $data2ss) {
              // the block
              $days   = (($data2ss['end'] - $data2ss['start']) / $this->seconds);
              $offset = (($data2ss['start'] - $this->first->month()->timestamp) / $this->seconds);
              $top    = round($i * ($this->options['cellheight'] + 1));
              $left   = round($offset * $this->options['cellwidth']);
              $width  = round(($days+1) * $this->options['cellwidth'] - 9); // plus satu
              $height = round($this->options['cellheight']-8);
              $class  = ($data2ss['class']) ? ' ' . $data2ss['class'] : '';
              $days_plus_satu=$days+1;

              /**/

              if($data2ss['class']==''){
                  $nameblock='';
                }

               if($data2ss['class']=='shipping-order'){
                if($days_plus_satu >= 4){
                  $nameblock=$data2ss['jettyorigin']."-".$data2ss['jettydestination'];
                }else{
                  $nameblock=$days_plus_satu;
                }
              }

              if($data2ss['class']=='maintenence'){
                if($days_plus_satu >= 4){
                  $nameblock='Maintenance ';
                }else{
                  $nameblock=$days_plus_satu;
                }
              }

              /**/

              $html[] = '<span class="gantt-block' . $class . '" style="left: ' . $left . 'px; width: ' . $width . 'px; height: ' . $height . 'px"><strong class="gantt-block-label">' .'<a href="'.$data2ss['urlblock'].'" class="'.$data2ss['urlclass'].'">'.$nameblock.'</a>'. '</strong></span>';
              }

          }

          //echo 'ul';
          //echo'<br>';

          $html[] = '</li>';
         
          
      }

      
    
    }
    
// blockkkkkk



    $html[] = '</ul>';    
    
    if($this->options['today']) {
    
      // today
      $today  = $this->cal->today();
      $offset = (($today->timestamp - $this->first->month()->timestamp) / $this->seconds); 
      $left   = round($offset * $this->options['cellwidth']) + round(($this->options['cellwidth'] / 2) - 1);
          
      if($today->timestamp > $this->first->month()->firstDay()->timestamp && $today->timestamp < $this->last->month()->lastDay()->timestamp) {
        $html[] = '<time style="top: ' . ($this->options['cellheight'] * 2) . 'px; left: ' . $left . 'px" datetime="' . $today->format('Y-m-d') . '">Today</time>';
      }

    }
    
    // end data section
    $html[] = '</section>';    

    // end diagram
    $html[] = '</div>';

    return implode('', $html);
      
  }
  
  function __toString() {
    return $this->render();
  }

}
