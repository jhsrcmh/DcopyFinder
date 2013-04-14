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
main links here
*******************************************/
include_once("config.php");
include_once("msg.php");

$dir = "./files/";
// Open a known directory, and proceed to read its contents
if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
	$thereis_some_files = false;
	echo "<table width='100%' border='0' cellspacing='0' cellpadding='2'>\n";
		//echo "<form id='file_form' name='file_form' action='doccheck.php' method='POST' >\n";
	echo "<form id='file_form' name='file_form' action='doccheck.php' method='POST' >\n";
	echo "<input type='hidden' name='file_name' value=''>";
	echo "<tr><td align='right'><div align='right'><input type='button' value='Check file' onClick=\"getCheckedValue(this.form.listed_file,document.file_form);\"></div></td>\n";
        while (($file = readdir($dh)) !== false) {
			if ( $file == "." || $file == ".."  || $file == "index.html") continue;
            else 
			{
			$thereis_some_files = true;
			echo "<tr><td class='text'><img src='./images/dicon.jpg'> " .  $file . "</td>\n";
			echo "<td><img src='./images/hide.png' style=\"cursor:hand;\" onClick='if(confirm(\"Are you sure that you want delete this file?\")){location.href=\"del.php?mydfile=$file\"}'>&nbsp;&nbsp;<input type='radio' name='listed_file'  value='$file'></td></tr>\n";
			}
			
        } //end while
		echo "</form>\n";
		echo "</table>\n";		
		if (! ($thereis_some_files) ) echo $err_dir_empty;
        closedir($dh);
    }
}
?>

