<?php
//64bit
$trade_no=$_GET['trade_no'];
//21bit
$out_trade_no=$_GET['out_trade_no'];
$trade_status=$_GET['trade_status'];//TRADE_SUCCESS
$buyer_email=$_GET['buyer_email'];
?>

<form name="alipay_callback">
    <input name="trade_no" type="hidden" value="<?php echo $trade_no?>">
    <input name="out_trade_no" type="hidden" value="<?php echo $out_trade_no?>">
    <input name="trade_status" type="hidden" value="<?php echo $trade_status?>">
    <input name="buyer_email" type="hidden" value="<?php echo $buyer_email?>">
</form>
