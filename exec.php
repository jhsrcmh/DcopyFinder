<?php

	/*
	 * 这里是底层和php连接的中间件
	*/
	//获得目标目录所有文件
	function get_all_result() {
		include("config.php");
		$dir = $dcopyfind_file_dir;
		$array = array();
		$directory = "files\\";
		$result = array();
		if (is_dir($dir)) {
			if ($handle = opendir($dir)) {
				while (false !== ($file = readdir($handle))) {
					if ($file != "." && $file != "..") {
						$array[] = $file;
						//echo "$file\n";
					}
				}
				closedir($handle);
			}
		}
		//递归对比
		$i = 0;
		$j = 0;
		$length = count($array);
		for($i = 0; $i < $length; $i++) {
			for($j = $i+1; $j < $length; $j++) {
				$sp = exec($sim_dir." -e -p -s -r100 files\\".$array[$i].' files\\'.$array[$j], $out, $info);
				//这里是标准out输出项
				//print_r($out);//print '\n\n';
				$result[] = $out;
			}
		}
		return $result;
	}
	
	function get_comparison_by_file($filename) {
		require("config.php");
		$result = array();
		$array = get_dir_files($dcopyfind);
		for($i = 0; $i < count($array); $i++) {
			if($filename != $array[$i]) {
				$result[] = get_info_by_two_file($filename, $array[$i]);
			}
		}
		return $result;
	}
	function get_dir_files($dir) {
		//$dir = 'd:\wamp\www\TestAlpagrism\files';
		$array = array();
		$directory = "files\\";
		$result = array();
		if (is_dir($dir)) {
			if ($handle = opendir($dir)) {
				while (false !== ($file = readdir($handle))) {
					if ($file != "." && $file != "..") {
						$file = iconv("GB2312", "UTF-8", $file);
						$array[] = $file;
						//echo "$file\n";
					}
				}
				closedir($handle);
			}
		}
		return $array;
	}
	
	/**
	 * 获得两个文件的测试信息
	 * @param unknown_type $filenameSource
	 * @param unknown_type $filenameDestination
	 * @return unknown
	 */
	function get_info_by_two_file($filenameSource, $filenameDestination) {
		require("config.php");
		$prompt = exec($sim_dir." -e -p -s files\\".$filenameSource.' files\\'.$filenameDestination, $out, $info);
		return $out;
	}
//system("d:\wamp\www\TestAlpagrism\sim_text.exe -e -p -s -r100 files/*", $info);
?>