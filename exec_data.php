<?php
/*******************************************
NOTICE OF COPYRIGHT                                                   //
//                                                                    //
// MKhoster document plagirism
//          http://mkhoster.com
//                                                                       
// Copyright (C) 2008
//                                                                      
// This program is free software; you can redistribute it and/or modify 
// it under the terms of the GNU General Public License as published by 
// the Free Software Foundation; version 1
//
//                                                                      
// This program is distributed in the hope that it will be useful,      
// but WITHOUT ANY WARRANTY; without even the implied warranty of       
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the        
// GNU General Public License for more details:                         
//                                                                      
//          http://www.gnu.org/copyleft/gpl.html                        
//created by Mohamed Ali
//email admin@mkhoster.com
//dtate 22-12-2008
*******************************************/

/*******************************************

*******************************************/
include_once("config.php");
include_once("msg.php");

//get file name to read it and set it's content to array 
//also do pattern check nad remove new lines
$fileto_read = $files_upload_path.$_POST["file_name"]; //获得传输过来的数据
$dataarr = array();
$temp_data = "";

//特殊字符处理，将文本中的特殊字符处理完毕。
$old_val   = array("\r\n", "\n", "\r" ,"*","'" , '"');
$replace = array("", "", "" ,"" , "\'" , '\"');

//主要获得处理后的数据,并且将数据存入$datarr中。
if (file_exists($fileto_read))
{
//open file for read
	$handle = @fopen($fileto_read, "r");
	if ($handle) {
	   while (!feof($handle)) {
       $temp_data = trim( str_replace($old_val, $replace,fgets($handle, 128)));
	   $ffind = strpos($temp_data , " " );//第一个" "的位置
	   $lfind = strrpos($temp_data , " " ) - strpos($temp_data , " " );//最后一个位置
	   $temp_data = trim(substr($temp_data,$ffind , $lfind));//截取长串，并且获得最终处理的字串
	   
	   //定义搜索文本为40字单位
	   //该点用于修补搜索少于40字的bug,by twins
	   	   if( $long_string_search && ( strlen($temp_data) < $long_string_search_value) ) {
	   	   		$dataarr[] = $temp_data;
	   	   }
		   elseif($long_string_search && ( strlen($temp_data) >= $long_string_search_value) )
		   {
	   	   		$dataarr[] = $temp_data;			
		   }
		   else
		   {
				continue;
		   }
	   }
	   fclose($handle);
	}
}
//handel error message if there is a problem finding file
else
{
echo $err_file_not_found;
}
?>