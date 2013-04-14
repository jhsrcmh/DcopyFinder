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
delete file code here
*******************************************/
include_once("config.php");
if ( $_GET["mydfile"] )
{
	if ( unlink( $files_upload_path .$_GET["mydfile"] ) ) header("location:index.php?delfmsg=t");
	else echo "Error Deleteing file : " . $files_upload_path .$_GET["mydfile"];
}
else
{
header("location:index.php");
}
?>
