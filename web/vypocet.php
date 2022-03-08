

<?php
include ("pomocne/connection.php");
session_start();
$myactors=$_SESSION['project_id']."actors";
$mybusy=$_SESSION['project_id']."busy";
$myvypocet=$_SESSION['project_id']."vypocet";
$myscenes=$_SESSION['project_id']."scenes";


$plan_date="0";
$scene="0";
$pd="0";



$myscenes=$_SESSION['project_id']."scenes";

$hercisc=array();
$hercikal=array();
$datumy=array();
$zav=array();
array_splice($hercisc,0);
echo"tu sa ukazu vsetky obrazy ktore je mozne natocit dany den podla zaneprazdnenosti hercov v obrazoch";
//vycisti vypocet
$sqltrunc=      "truncate table $myvypocet";echo" <br>";
$vycisti=mysqli_query($con,$sqltrunc);

//vyberie dni s kalendaru
$sql5="SELECT distinct date FROM $mybusy order by date";
$run5=mysqli_query($con,$sql5);
while($row5=mysqli_fetch_assoc($run5)){
    $datumy []= $row5['date'];}

    foreach ($datumy as $datum){
        echo "<br>";
                echo "den sa rovna ". $den= date('Y-m-d', $datum);echo "<br>";

echo "kod sa rovna ". strtotime($den);echo "<br>";



                    // vyberie hercov ktory v jednotlive dni maju status 1 alebo 2
                    $sql="SELECT * FROM $mybusy WHERE date=$datum AND STATUS in(1,2) ";

                    $run=mysqli_query($con,$sql);

                        while($row=mysqli_fetch_assoc($run)){
                                                          $hercikal[]= $row['user_id'];


                                                  };
                      $hh=implode(",",$hercikal);
                        echo "herci v kalendari: ". $hh;echo "<br>";echo "<br>";
                                // vyberie z druhej tabulky udaje ktore su zapisane ako string

                                $sql7="select * from $myscenes ";
                                $run7=mysqli_query($con,$sql7);
                                while($row7=mysqli_fetch_assoc($run7)) {

                                    $obraz = $row7['scene'];
                                    $herciscenar = $row7['cast_id'];
                                    $syn=$row7['synopsis'];
                                    $ie=$row7['intext'];
                                    $dn=$row7['daynight'];
                                    $set=$row7['filmset'];
                                    $pc=$row7['pagescount'];
                                    $loc=$row7['location'];
                                    $script=$row7['scriptday'];
                                    $notes=$row7['notes'];

//echo "herci v obraze ".$obraz . ": ".$herciscenar    ;echo "<br>";
                                  $hercisc = explode(",",$herciscenar);
                                         $pocethercovscenar=count($hercisc);



                                    // tu je to porovnanie

                                                          $res=array_intersect($hercikal,$hercisc);
                                                           $pocetmatch=count($res);


                                                          if ($pocetmatch>=$pocethercovscenar){
                                                              //ak prienik hercov v kalendari je rovny alebo vacsi ako hercov v scenari tak nasiel obraz ktory sa da tocit
                                                             //          echo "vysledok: ".   $obraz."   ".$ie."   ".$dn."   ";
//skuska dosadit zavazky
                                                              array_splice($zav,0);
                                                              foreach ($hercisc as $herec){
                                                                 $sql22="select * from $mybusy where user_id=$herec and status=2 and date=$datum ";
                                                                  $run22=mysqli_query($con,$sql22);
                                                                  $row=mysqli_fetch_assoc($run22);
                                                            $meno=$row['role']   ;
                                                              "toto:".   $od1=$row['event_odkedy1'] ;
                                                                  $do1=$row['event_dokedy1'] ;
                                                                  $od2=$row['event_odkedy2'] ;
                                                                  $do2=$row['event_dokedy2'] ;
                                                           // odstrani ciarky medzi nulovymi zavazkami
                                                       switch ($od1) {
                                                           case "":

                                                                  break;
                                                           default: $zav[]= (" ".$meno." ".$od1."-".$do1) ;
                                                       }
                                                       switch ($od2) {
                                                                      case "":

                                                                          break;
                                                                      default: $zav[]= ($od2."-".$do2) ;
                                                                  }


                                                              };
                                                      echo         $zavazok= implode(',',$zav);echo "<br>";

                                                          //      ak je splnene vyhladanie



                                                              $sql56 = "INSERT INTO $myvypocet  SET 
                                                                date='$datum',
                                                              
                                                                scene='$obraz',
                                                                daynight='$dn',
                                                                synopsis='$syn',
                                                                filmset='$set',
                                                                location='$loc',
                                                                scriptday='$script',
                                                                pagescount='$pc',
                                                                notes='$notes',
                                                                zavazok='$zavazok',
                                                                cast='$herciscenar',
                                                                intext='$ie'
                                                                        ";

                                                              mysqli_query($con,$sql56);

                                                                                              }else{

                                                                                        }

//

                                                                  };



        array_splice($hercikal,0);


};
                                                    echo "<br>";


                                                                    //zmena statusu na new vo vsetkych obrazoch
                                                                    $sql2 = "update $myscenes
                                                                            SET STATUS='new'
                                                                          
                                                                
                                                                        ";

                                                                        mysqli_query($con,$sql2);


                                             $sql3="SELECT distinct scene FROM $myvypocet  order by scene";
                                                     $run3=mysqli_query($con,$sql3);
                                                       while($row3=mysqli_fetch_assoc($run3)){
                                                         $obraz = $row3['scene'];
                                                           //zmena statusu na incalendar v obrazoch ktore nasiel
                                                     $sql57 = "update $myscenes
                                                                            SET status='incalendar'
                                                                            WHERE scene='$obraz'
                                                                        ";
                                                        mysqli_query($con,$sql57);
                                                        echo "<br>";
//                                                           $sql58 = "update $myscenes
//                                                                            SET status='booked'
//                                                                            WHERE scene='$obraz'and plan_date>5
//                                                                        ";
//                                                           mysqli_query($con,$sql58);

                                                           $sql59 = "update $myscenes
                                                                            SET plan_date='5'
                                                                            WHERE scene='$obraz'and status='incalendar'
                                                                        ";
                                                           mysqli_query($con,$sql59);
                                                                                            }
                                                                    $sql60 = "update $myscenes
                                                                            SET status='bad'
                                                                            WHERE status='new' and plan_date>5
                                                                        ";
                                                                      mysqli_query($con,$sql60);



                                                                    $sql60 = "update $myscenes
                                                                            SET plan_date=0
                                                                            WHERE status='new'
                                                                        ";
                                                                    mysqli_query($con,$sql60);

header("Location:kontrola.php");
echo "<br>";echo "<br>";echo "<br>";
?>

