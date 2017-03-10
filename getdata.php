<?php

 // 0 - temp, 1 - internal ip, 2 - external ip, 3 - uptime, 4 - current storage space, 5 - max storage space



         $proc_temp = shell_exec("cat /sys/class/thermal/thermal_zone0/temp")/1000;


 
        $ipinternal = shell_exec("hostname -I");
        str_replace("\n", "", $ipinternal);


        $ipexternal = shell_exec("dig +short myip.opendns.com @resolver1.opendns.com");
        str_replace("\n", "", $ipexternal);

        /* not effective 

        $uptime = shell_exec("uptime -p");
        $uptime = str_replace("up ", "", $uptime);
        $uptime = str_replace(" days, ", "|", $uptime);
        $uptime = str_replace(" hours, ", "|", $uptime);

        $uptime = str_replace(" minutes", "|", $uptime);
        $uptime = str_replace(" minute", "|", $uptime);
        
        */
        function secondsToTime($inputSeconds) {
  $then = new DateTime(date('Y-m-d H:i:s', $inputSeconds));
  $now = new DateTime(date('Y-m-d H:i:s', time()));
  $diff = $then->diff($now);
  return array('years' => $diff->y, 'months' => $diff->m, 'days' => $diff->d, 'hours' => $diff->h, 'minutes' => $diff->i, 'seconds' => $diff->s);
}

$uptime = (secondsToTime(time() - floor(shell_exec("tail /proc/uptime"))));

        $used = shell_exec("df -H --total --output=used");
        $used = preg_split ('/$\R?^/m', $used);
        $used = $used[count($used)-1];

        $total = shell_exec("df -H --total --output=size");
        $total = preg_split ('/$\R?^/m', $total);
        $total = $total[count($total)-1];

$data = array(
    $proc_temp, 
    $ipinternal,
    $ipexternal,
    $uptime,
    $used,
    $total
);

$data = json_encode($data);
$data = str_replace(" \\n","",$data);
$data = str_replace("\\n","",$data);
$data = str_replace(" \\n","",$data);
$data = str_replace("G","",$data);

echo($data);