<?php
$randInt = rand(1,100);
echo "Your new random value is $randInt \n";
echo "\n";
// $months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

// foreach($months as $x => $x_value) {
//     echo "$x_value \n";
// }

// sort($months);
// foreach($months as $x => $x_value) {
//     echo "$x_value \n";
// }

$months = array();

date_default_timezone_set("America/New_York");
for($m=1;$m<=12;$m++){ 
    $month=date("F",mktime(0,0,0,$m,1,2000)); 
    //$mon["$month"]=$m; 
    array_push($months, $month);
    echo "$month \n";
} 
echo "\n";

sort($months);
foreach($months as $x => $x_value) {
    echo "$x_value \n";
}

?>