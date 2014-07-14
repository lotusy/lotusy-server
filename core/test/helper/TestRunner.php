<?php
class TestRunner {

	public static function run($include) {
		include $include;

		$currentResult = array();

		foreach ($testCases as $key=>$case) {
			$input = $inputs[$key];
			if ($input=='aggregate') {
				$input = $currentResult;
			} else {
				$currentResult = $input;
			}

			$time_start = round(microtime(true)*1000);
			$case->execute($input);
			$time_end = round(microtime(true)*1000);
			$time = $time_end - $time_start;

			$result = $case->getResult();

			if (is_array($result)) {
				$currentResult = array_merge($result, $currentResult);
			}

			if ($case->validate($result)) {
				echo 'Test case - '.get_class($case).' PASSED {'.$time.'}'.PHP_EOL;
			} else {
				$case->failedAction();
			}
		}
	}
}
?>