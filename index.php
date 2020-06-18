<?php
$t = '2020-03';
//make currentYearMonth $presentYearMonth $nextYearMonth String to get DatePeriod object
$currentYearMonth = $t;
$presentYearMonth = $t.'-1 month';
$nextYearMonth = $t.'+1 month';
$currentMonthPeriod = new DatePeriod(new DateTime('first day of'.$currentYearMonth),new DateInterval('P1D'),new DateTime('first day of'.$nextYearMonth));

var_dump($currentMonthPeriod);
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
                  <table row="7" col="7">
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
                                  <?php foreach($currentMonthPeriod as $day):?>
                                       <?php if(sprintf('%d',$day->format('w')) === '0'):?>
                                         <tr><td class='red'><?=sprintf('%d',$day->format('d'));?></td>
                                       <?php elseif(sprintf('%d',$day->format('w')) === '6'):?>
                                         <td class='blue'><?=sprintf('%d',$day->format('d'));?></td></tr>
                                      <?php else:?>
                                         <td class='black'><?=sprintf('%d',$day->format('d'));?></td>
                                      <?php endif;?>
                                  <?php endforeach;?>

                         </tbody>
                         <tfoot>
                               <td colspan="2"><a href=""> &lqua; </a></td>
                               <td colspan="3"><a href=""> [TODAY] </a></td>
                               <td colspan="2"><a href=""> &rquo; </a></td>
                         </tfoot>
                  </table>
            </section>
      </body>
 </html>
