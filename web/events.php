
<?php
//
//include("pomocne/lista_horna.php");
//include("pomocne/main-menu.php");

?>

<?php
include ("pomocne/connection.php");
$hercisc=array();
$hercikal=array();
$sql7="select * from scenes ";
$run7=mysqli_query($con,$sql7);



while($row7=mysqli_fetch_assoc($run7)){

    //zadefinujeme id
    $obraz=$row7['scene'];

    //dostaneme ich do riadku
    $herciscenar=$row7['cast'];

    //dostaneme ich do pola
    $hercisc = explode(",",$herciscenar);
    //definujeme pocet hercov podla scenaru
    $pocethercovscenar=count($hercisc);
     $i=1;
            while($i<=6){
                $sql="SELECT name FROM events WHERE  STATUS='yes'and number='$i'";
                $run=mysqli_query($con,$sql);
                    while ($row=mysqli_fetch_assoc($run)){
                        $hercikal[] = $row['name'];

                    }
                //print_r($hercikal);echo "<br>";
                //cyklus eventov

                $vysledok=array_intersect($hercisc,$hercikal);
                $pocetmatch=count($vysledok);
                        if ($pocetmatch==$pocethercovscenar){
                            echo $i.". den mozeme tocit obraz  ".$obraz;echo "<br>";
                        }else
                            {

                        }
                $i++;
            }


}






//
//
//echo "<br>";
//echo "hercisc 1 :  ". $hercisc[0];echo "<br>";
//echo "hercisc 2  :  ".$hercisc[1];echo "<br>";
////echo $hercisc[2];echo "<br>";
//echo "toto je count  ". echo "<br>";
//echo "<br>";echo "<br>";
//echo "scenar obsadenie    ";
//echo " a toto print  ".
//
//echo "<br>";
//$i=3;
////
////
//echo "toto su eventy yes ked cislo je".$i ;echo "<br>";
//
//echo "pocet rows vyberu  ". $pocet=mysqli_num_rows($run);echo "<br>";
//
//
//
//
//while($row=mysqli_fetch_assoc($run)){
//
//
//
//
//};
//
//echo "hercikal 1 :  ". $hercikal[0];echo "<br>";
//echo "hercikal 2 :  ". $hercikal[1];echo "<br>";
//echo "<br>";echo "<br>";
//echo "herci dispo ten den    ";
//print_r($hercikal);echo "<br>";
//
//echo "vysledok porovnania  ". print_r($vysledok);echo "<br>";
//echo "pocet porovnania  ". ;echo "<br>";
//

?>

