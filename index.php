<?php
define('TODAY','this month');

try{
  if(!isset($_GET['t']) || $_GET['t'] === null || $_GET['t'] === TODAY){
    $currentMonthObjct = new DateTime('today');
    $t = sprintf('%d-%d',$currentMonthObjct->format('Y'),$currentMonthObjct->format('m'));
    $prev = $t.' -1 month';
    $next = $t.' +1 month';
  }else{
    $t = $_GET['t'];
    $prev = $t.'-1 month';
    $next = $t.'+1 month';
  }
}catch(Exception $e){
   $e->getMessage();
}
//make currentYearMonth $presentYearMonth $nextYearMonth String to get DatePeriod object
var_dump($t);
$currentYearMonth = $t;
$previousYearMonth = $prev;
$nextYearMonth = $next;
$currentMonthPeriod = new DatePeriod(new DateTime('first day of'.$currentYearMonth),new DateInterval('P1D'),new DateTime('first day of'.$nextYearMonth));
$previousMonthPeriod = new DatePeriod(new DateTime('last sunday of'.$previousYearMonth),new DateInterval('P1D'),new DateTime('first day of'.$currentYearMonth));
$nextMonthPeriod = new DatePeriod(new DateTime('first day of'.$nextYearMonth),new DateInterval('P1D'),new DateTime('first sunday of'.$nextYearMonth));

 ?>
 <!DOCTYPE html>
 <html lang='ja'>
      <head>
            <meta charset='UTF-8'>
            <meta name="viewport" content="width=device-width">
            <meta name="description" content="my second calendar to skill up PHP">
            <title>Calendar-2</title>
            <link rel="stylesheet" href="calendar.css">
      </head>
      <body>
            <header>
                  <h2>Second Calendar</h2>
            </header>
            <section id="container">
                  <table row="7" col="7" id='table'>
                         <thead>
                               <td class="red">SUN</td>
                               <td class="black">MON</td>
                               <td class="black">TUE</td>
                               <td class="black">WED</td>
                               <td class="black">THU</td>
                               <td class="black">FRI</td>
                               <td class="blue">SAT</td>
                         </thead>
                         <tbody>

                                  <?php foreach($previousMonthPeriod as $day):?>
                                      <?php if($day->format('w') === '0'):?>
                                      <tr><td class='gray'><?=sprintf('%d',$day->format('d'));?></td>
                                      <?php elseif($day->format('w') === '6'):?>
                                      <td class='gray'><?=sprintf('%d',$day->format('d'));?></td></tr>
                                      <?php else:?>
                                      <td class='gray'><?=sprintf('%d',$day->format('d'));?></td>
                                      <?php endif;?>
                                  <?php endforeach;?>

                                  <?php foreach($currentMonthPeriod as $day):?>
                                       <?php if(sprintf('%d',$day->format('w')) === '0'):?>
                                         <tr><td class='red'><?=sprintf('%d',$day->format('d'));?></td>
                                       <?php elseif(sprintf('%d',$day->format('w')) === '6'):?>
                                         <td class='blue'><?=sprintf('%d',$day->format('d'));?></td></tr>
                                      <?php else:?>
                                         <td class='black'><?=sprintf('%d',$day->format('d'));?></td>
                                      <?php endif;?>
                                  <?php endforeach;?>

                                  <?php foreach($nextMonthPeriod as $day):?>
                                      <?php if($day->format('w') === '0'):?>
                                      <tr><td class='gray'><?=sprintf('%d',$day->format('d'));?></td>
                                      <?php elseif($day->format('w') === '6'):?>
                                      <td class='gray'><?=sprintf('%d',$day->format('d'));?></td></tr>
                                      <?php else:?>
                                      <td class='gray'><?=sprintf('%d',$day->format('d'));?></td>
                                      <?php endif;?>
                                  <?php endforeach;?>
                              </tr>
                         </tbody>
                         <tfoot>
                               <td colspan="2"><a href="/?t=<?=$prev;?>" class='link'> &laquo; </a></td>
                               <td colspan="3"><a href="/?t=<?=TODAY;?>" class='link'> [TODAY] </a></td>
                               <td colspan="2"><a href="/?t=<?=$next;?>" class='link'> &raquo; </a></td>
                         </tfoot>
                  </table>
            </section>
      </body>
 </html>
