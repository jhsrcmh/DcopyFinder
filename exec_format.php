<?php
  /**
   * 这里是php前台和后端的算法代码连接的桥梁，通过这个文件，可以与底层数据做一个
   * 很好的桥接，实现前后端分离。
   */
  include("exec.php");
  include_once("config.php");
  include_once("msg.php");
  //get file name to read it and set it's content to array
  //also do pattern check nad remove new lines
  $test_file_name = $_POST["file_name"];
  //$fileto_read = $files_upload_path.$_POST["file_name"];
  $fileto_read = $files_upload_path.'\\'.$test_file_name; //获得传输过来的数据
  $dataarr = array();
  $temp_data = "";
  
  //特殊字符处理，将文本中的特殊字符处理完毕。
  $old_val   = array("\r\n", "\n", "\r" ,"*","'" , '"');
  $replace = array("", "", "" ,"" , "\'" , '\"');
  //echo $fileto_read;
  //主要获得处理后的数据,并且将数据存入$datarr中。
  if (file_exists($fileto_read))
  {
	  //文件存在，执行exec进行解析,获得所有的对比结果记录1...n的对比。
	  $result = get_comparison_by_file($test_file_name);
	  //重构result的格式：
	  //接下来进行算法删选,使用twins算法。
	  $result = sort_Plagiarism_by_twins($result);
  }
  //handel error message if there is a problem finding file
  else
  {
  	echo $err_file_not_found;
  }
  
  /**
   * 根据命令行的回显结果，分离出格式化的数据，存储在数组里
   * @param unknown_type $result
   * @return Ambigous <number, multitype:multitype:number  >
   */
  function sort_Plagiarism_by_twins($result) {
  	$array = array(array(5));
  	$k = 0;
  	foreach($result as $aresult) {
     	//如果没有抄袭嫌疑
     	if(count($aresult) == 4) {
     		for($i =0; $i < 3; $i++) {
     			if($i < 2) {
     				$temp_string = explode(":", $aresult[$i]);
     				$temp_string_two = explode("\\", $temp_string[0]);
     				$array[$k][$i] = $temp_string_two[1];
     				$array[$k][$i+2] = $temp_string[1];
     			}
     			else {
     				$array[$k][$i+2] = "0";
     			}
     		}
     	}
     	else {
     		//echo '<h1>'.count($aresult).'</h1>';
     		for($i =0; $i < count($aresult); $i++) {
				if($i < 2) {
					$temp_string = explode(":", $aresult[$i]);
					$temp_string_two = explode("\\", $temp_string[0]);
					$array[$k][$i] = $temp_string_two[1];
					$array[$k][$i+2] = $temp_string[1];
				}
				else {
					//如果没有字串，不做处理
					if(strstr($aresult[$i], "%", true) == "") {
					} else {
						$array[$k][4] = get_percent_by_info($aresult[$i]);
						//$array[$k][4] = "100";
					}
				}
     		}
     	}
     	$k++;
     }
     return $array;
  }
  
  /**
   * 从长串中获得字符串，获得匹配数目;
   * @param unknown_type $str
   * @return unknown
   */
  function get_percent_by_info($str) {
  	$regex = '^\d{1,}$^';
  	$matches = array();
  	$str_temp = explode(" ", $str);
	$array = array();
  	foreach($str_temp as $t) {
  		if(preg_match($regex, $t, $matches)){
  			//var_dump($matches);
  			$array[] = $t;
  		}
  	}
	if(count($array)==1) {
		return $array[0];
	}else {
		if(int($array[0]) <= int($array[1])) {
			return $array[0];
		}
		return $array[1];
	}
  }
?>