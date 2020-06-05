<?php
class Month {
	public function fiveLaterMonth() {
		$m = date("m", strtotime("+5 month"));
		echo "今から５ヶ月後は" . $m . "月です\n";
	}
}
?>
<?php
echo "prob.3-1\n";
$month = new Month;
echo $month->fiveLaterMonth() . "\n";
?>
<?php
echo "prob.3-2\n";
$month = Month::fiveLaterMonth();
echo $month . "\n";
?>
