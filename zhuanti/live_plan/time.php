<?php

date_default_timezone_set('PRC');

echo "当前时间：".date('Y-m-d H:i:s');

$day = strtotime( date('Y-m-d') );

echo '<br>';

echo "12：00=》". $day;
