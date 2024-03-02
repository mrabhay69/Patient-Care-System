<?php

// session_start();

$pin = $_POST['pin'];

$data = file_get_contents('http://www.postalpincode.in/api/pincode/'.$pin);

$data = json_decode($data);

if(isset($data->PostOffice['0'])){
    $arr['city'] = $data->PostOffice['0']->Taluk;
    $arr['district'] = $data->PostOffice['0']->District;
    $arr['state'] = $data->PostOffice['0']->State;
 $ar = json_encode($arr);
 echo $ar;
}
else{
    echo "NO";
}

?>