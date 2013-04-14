<html>

<head>
<title>::MKhoster Document Plagiarism Checker ::...</title>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body topmargin="0" leftmargin="0">

	<table border="0" cellpadding="0" cellspacing="0"
		style="border-collapse: collapse" bordercolor="#111111" width="950"
		id="AutoNumber1" align="center">
		<tr>
			<td width="100%">
				<table width="100%" border="0" align="center" cellpadding="0"
					cellspacing="0" bordercolor="#111111" id="AutoNumber2"
					style="border-collapse: collapse">
					<tr>
						<td height="84" colspan="2" style="background-color: #7CC242"
							class="whiteHeader">
							<div align="center">MKhoster Document Plagiarism Checker</div>
						</td>
					</tr>
					<tr>
						<td width="370" valign="top"><table width="100%" border="0"
								cellspacing="0" cellpadding="0">
								<tr>
									<td colspan="2"><IMG SRC="images/home_03.jpg" WIDTH=290
										HEIGHT=48 ALT="MKhoster">
									</td>
								</tr>
								<tr>
									<td colspan="2"><IMG SRC="images/home_08.jpg" WIDTH=360
										HEIGHT=20 ALT="">
									</td>
								</tr>
								<tr>
									<td class="text">MKhoster document plagirism is an easy web
										application that enable you to check plagirism in a text
										document, Just upload your text file and start check now.</td>
									<td class="text">&nbsp;</td>
								</tr>
								<tr>
									<td colspan="2">&nbsp;</td>
								</tr>
								<tr>
									<td colspan="2">&nbsp;</td>
								</tr>
								<tr>
									<td colspan="2" class="enorange">Uploaded files:</td>
								</tr>
								<tr>
									<td colspan="2"><IMG SRC="images/home_08.jpg" WIDTH=360
										HEIGHT=20 ALT="">
									</td>
								</tr>
								<tr>
									<td width="95%">
									<?php
									include("listing_content.php");
									?></td>
									<td width="5%"></td>
								</tr>
							</table>
						</td>
						<td width="584" valign="top">
							<table width="100%" border="0" align="center" cellpadding="2"
								cellspacing="0" bordercolor="#111111" id="AutoNumber3"
								style="border-collapse: collapse">

								<tr>
									<td width="580">
										<table border="0" cellpadding="0" cellspacing="0"
											style="border-collapse: collapse" bordercolor="#111111"
											width="100%" id="AutoNumber6">
											<tr>
												<td width="100%" height="48" class="text">
													<div align="center">
														<?php
														include("links.php");
														?>
													</div>
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td width="580" height="30"><IMG SRC="images/home_08.jpg"
										WIDTH=580 HEIGHT=20 ALT="">
									</td>
								</tr>
								<tr>
									<td width="580" class="enorange"><span class="errMsg">&nbsp;Upload
											to check plagiarism: </span>
									</td>
								</tr>
								<tr>
									<td class="enorange"><div align="right">
											<a href="uploadfrm.php">&lt;&lt; Back</a>
										</div>
									</td>
								</tr>
								<tr>
									<td class="enorange">
									<?php
									error_reporting(E_ALL);

									// we first include the upload class, as we will need it here to deal with the uploaded file
									include('class.upload.php');

									// we have three forms on the test page, so we redirect accordingly
									if (!array_key_exists('action', $_POST) || $_POST['action'] == 'simple') {

										// ---------- SIMPLE UPLOAD ----------

										// we create an instance of the class, giving as argument the PHP object
										// corresponding to the file field from the form
										// All the uploads are accessible from the PHP object $_FILES
										$if = iconv('utf-8','utf-8',$_FILES['my_field']['name']);
										//echo '<h1>'.$if.'</h1>'.$_FILES['my_field']['name'];
										//echo basename($_FILES['my_field']);
										$handle = new Upload($_FILES['my_field']);
										// then we check if the file has been uploaded properly
										// in its *temporary* location in the server (often, it is /tmp)
										if ($handle->uploaded) {

											// yes, the file is on the server
											// now, we start the upload 'process'. That is, to copy the uploaded file
											// from its temporary location to the wanted location
											// It could be something like $handle->Process('/home/www/my_uploads/');
											$handle->Process('./files/');

											// we check if everything went OK
											if ($handle->processed) {
												// everything was fine !
												echo '<fieldset>';
												echo '  <legend>file uploaded with success</legend>';
												echo '  <p>File size : ' . round(filesize($handle->file_dst_pathname)/256)/4 . 'KB</p>';
												echo '  link to the file just uploaded: <a href="./files/' . $handle->file_dst_name . '">' . $handle->file_dst_name . '</a>';
												echo '</fieldset>';
											} else {
												// one error occured
												echo '<fieldset>';
												echo '  <legend>file not uploaded to the wanted location</legend>';
												echo '  Error: ' . $handle->error . '';
												echo '</fieldset>';
											}

										} else {
											// if we're here, the upload file failed for some reasons
											// i.e. the server didn't receive the file
											echo '<fieldset>';
											echo '  <legend>file not uploaded on the server</legend>';
											echo '  Error: ' . $handle->error . '';
											echo '</fieldset>';
										}

									} else if ($_POST['action'] == 'image') {

										// ---------- IMAGE UPLOAD ----------

										// we create an instance of the class, giving as argument the PHP object
										// corresponding to the file field from the form
										// All the uploads are accessible from the PHP object $_FILES
										$handle = new Upload($_FILES['my_field']);

										// then we check if the file has been uploaded properly
										// in its *temporary* location in the server (often, it is /tmp)
										if ($handle->uploaded) {

											// yes, the file is on the server
											// below are some example settings which can be used if the uploaded file is an image.
											$handle->image_resize         = true;
											$handle->image_ratio_y        = true;
											$handle->image_x              = 200;

											// now, we start the upload 'process'. That is, to copy the uploaded file
											// from its temporary location to the wanted location
											// It could be something like $handle->Process('/home/www/my_uploads/');
											$handle->Process('./test/');

											// we check if everything went OK
											if ($handle->processed) {
												// everything was fine !
												echo '<fieldset>';
												echo '  <legend>file uploaded with success</legend>';
												echo '  <img src="test/' . $handle->file_dst_name . '" />';
												$info = getimagesize($handle->file_dst_pathname);
												echo '  <p>' . $info['mime'] . ' &nbsp;-&nbsp; ' . $info[0] . ' x ' . $info[1] .' &nbsp;-&nbsp; ' . round(filesize($handle->file_dst_pathname)/256)/4 . 'KB</p>';
												echo '  link to the file just uploaded: <a href="test/' . $handle->file_dst_name . '">' . $handle->file_dst_name . '</a><br/>';
												echo '</fieldset>';
											} else {
												// one error occured
												echo '<fieldset>';
												echo '  <legend>file not uploaded to the wanted location</legend>';
												echo '  Error: ' . $handle->error . '';
												echo '</fieldset>';
											}

										} else {
											// if we're here, the upload file failed for some reasons
											// i.e. the server didn't receive the file
											echo '<fieldset>';
											echo '  <legend>file not uploaded on the server</legend>';
											echo '  Error: ' . $handle->error . '';
											echo '</fieldset>';
										}



									} else if ($_POST['action'] == 'multiple') {

										// ---------- MULTIPLE UPLOADS ----------

										// as it is multiple uploads, we will parse the $_FILES array to reorganize it into $files
										$files = array();
										foreach ($_FILES['my_field'] as $k => $l) {
											foreach ($l as $i => $v) {
												if (!array_key_exists($i, $files))
													$files[$i] = array();
												$files[$i][$k] = $v;
											}
										}

										// now we can loop through $files, and feed each element to the class
										foreach ($files as $file) {

											// we instanciate the class for each element of $file
											$handle = new Upload($file);

											// then we check if the file has been uploaded properly
											// in its *temporary* location in the server (often, it is /tmp)
											if ($handle->uploaded) {

												// now, we start the upload 'process'. That is, to copy the uploaded file
												// from its temporary location to the wanted location
												// It could be something like $handle->Process('/home/www/my_uploads/');
												$handle->Process("./test/");

												// we check if everything went OK
												if ($handle->processed) {
													// everything was fine !
													echo '<fieldset>';
													echo '  <legend>file uploaded with success</legend>';
													echo '  <p>' . round(filesize($handle->file_dst_pathname)/256)/4 . 'KB</p>';
													echo '  link to the file just uploaded: <a href="test/' . $handle->file_dst_name . '">' . $handle->file_dst_name . '</a>';
													echo '</fieldset>';
												} else {
													// one error occured
													echo '<fieldset>';
													echo '  <legend>file not uploaded to the wanted location</legend>';
													echo '  Error: ' . $handle->error . '';
													echo '</fieldset>';
												}

											} else {
												// if we're here, the upload file failed for some reasons
												// i.e. the server didn't receive the file
												echo '<fieldset>';
												echo '  <legend>file not uploaded on the server</legend>';
												echo '  Error: ' . $handle->error . '';
												echo '</fieldset>';
											}
										}

									} else if ($_POST['action'] == 'local') {

										// ---------- LOCAL PROCESSING ----------


										//error_reporting(E_ALL ^ (E_NOTICE | E_USER_NOTICE | E_WARNING | E_USER_WARNING));
										ini_set("max_execution_time",0);

										// we don't upload, we just send a local filename (image)
										$handle = new Upload($_POST['my_field']);


										// then we check if the file has been "uploaded" properly
										// in our case, it means if the file is present on the local file system
										if ($handle->uploaded) {

											// now, we start a serie of processes, with different parameters
											// we use a little function TestProcess() to avoid repeting the same code too many times
											function TestProcess(&$handle, $title = 'test', $details='') {

												$handle->Process('./test/');

												if ($handle->processed) {
													echo '<fieldset>';
													echo '  <legend>' . $title . '</legend>';
													echo '  <img src="test/' . $handle->file_dst_name . '" />';
													$info = getimagesize($handle->file_dst_pathname);
													echo '  <p>' . $info['mime'] . ' &nbsp;-&nbsp; ' . $info[0] . ' x ' . $info[1] .' &nbsp;-&nbsp; ' . round(filesize($handle->file_dst_pathname)/256)/4 . 'KB</p>';
													echo '  <pre class="code php">' . htmlentities($details) . '</pre>';
													echo '</fieldset>';
												} else {
													echo '<fieldset>';
													echo '  <legend>' . $title . '</legend>';
													echo '  Error: ' . $handle->error . '';
													echo '  <pre class="code php">' . htmlentities($details) . '</pre>';
													echo '</fieldset>';
												}
											}
											if (!file_exists("./test")) mkdir('test');

											// -----------
											TestProcess($handle, 'original file', '');

											// -----------
											$handle->image_resize          = true;
											$handle->image_ratio_y         = true;
											$handle->image_x               = 50;
											TestProcess($handle, 'width 50, height auto', "\$foo->image_resize          = true;\n\$foo->image_ratio_y         = true;\n\$foo->image_x               = 50;");

											// -----------
											$handle->image_resize          = true;
											$handle->image_ratio_x         = true;
											$handle->image_y               = 50;
											TestProcess($handle, 'height 50, width auto', "\$foo->image_resize          = true;\n\$foo->image_ratio_x         = true;\n\$foo->image_y               = 50;");

											// -----------
											$handle->image_resize          = true;
											$handle->image_y               = 50;
											$handle->image_x               = 50;
											TestProcess($handle, 'height 50, width 50', "\$foo->image_resize          = true;\n\$foo->image_y               = 50;\n\$foo->image_x               = 50;");

											// -----------
											$handle->image_resize          = true;
											$handle->image_ratio           = true;
											$handle->image_y               = 50;
											$handle->image_x               = 50;
											TestProcess($handle, 'height 50, width 50, keeping ratio', "\$foo->image_resize          = true;\n\$foo->image_ratio           = true;\n\$foo->image_y               = 50;\n\$foo->image_x               = 50;");

											// -----------
											$handle->image_resize          = true;
											$handle->image_ratio_crop      = true;
											$handle->image_y               = 50;
											$handle->image_x               = 50;
											TestProcess($handle, 'height 50, width 50, keeping ratio, cropping excedent', "\$foo->image_resize          = true;\n\$foo->image_ratio_crop      = true;\n\$foo->image_y               = 50;\n\$foo->image_x               = 50;");

											// -----------
											$handle->image_resize          = true;
											$handle->image_ratio_crop      = 'L';
											$handle->image_y               = 50;
											$handle->image_x               = 50;
											TestProcess($handle, '50x50, keeping ratio, cropping right excedent', "\$foo->image_resize          = true;\n\$foo->image_ratio_crop      = 'L';\n\$foo->image_y               = 50;\n\$foo->image_x               = 50;");

											// -----------
											$handle->image_resize          = true;
											$handle->image_ratio_crop      = 'R';
											$handle->image_y               = 50;
											$handle->image_x               = 50;
											TestProcess($handle, '50x50, keeping ratio, cropping left excedent', "\$foo->image_resize          = true;\n\$foo->image_ratio_crop      = 'L';\n\$foo->image_y               = 50;\n\$foo->image_x               = 50;");

											// -----------
											$handle->image_resize          = true;
											$handle->image_ratio_crop      = true;
											$handle->image_y               = 50;
											$handle->image_x               = 50;
											$handle->image_crop            = '0 10';
											TestProcess($handle, 'height 50, width 50, cropped, using ratio_crop', "\$foo->image_resize          = true;\n\$foo->image_ratio_crop      = true;\n\$foo->image_crop            = '0 10';\n\$foo->image_y               = 50;\n\$foo->image_x               = 50;");

											// -----------
											$handle->image_crop            = '20%';
											TestProcess($handle, '20% crop', "\$foo->image_crop            = '20%';");

											// -----------
											$handle->image_crop            = '5 20%';
											TestProcess($handle, '5px vertical and 20% horizontal crop', "\$foo->image_crop            = '5 20%';");

											// -----------
											$handle->image_crop            = '5 40 10% -20';
											TestProcess($handle, '5px top, 40px right, 10% bot. and -20px left crop', "\$foo->image_crop            = '5 40 10% -20';");

											// -----------
											$handle->image_rotate          = '90';
											TestProcess($handle, '90 degrees rotation', "\$foo->image_rotate          = '90';");

											// -----------
											$handle->image_rotate          = '180';
											TestProcess($handle, '180 degrees rotation', "\$foo->image_rotate          = '180';");

											// -----------
											$handle->image_flip            = 'H';
											TestProcess($handle, 'horizontal flip', "\$foo->image_flip            = 'H';");

											// -----------
											$handle->image_convert         = 'gif';
											$handle->image_flip            = 'V';
											TestProcess($handle, 'vertical flip, into GIF file', "\$foo->image_convert         = 'gif';\n\$foo->image_flip            = 'V';");

											// -----------
											$handle->image_rotate          = '180';
											TestProcess($handle, '180 degrees rotation', "\$foo->image_rotate          = '180';");

											// -----------
											$handle->image_convert         = 'png';
											$handle->image_flip            = 'H';
											$handle->image_rotate          = '90';
											TestProcess($handle, '90 degrees rotation and horizontal flip, into PNG', "\$foo->image_convert         = 'png';\n\$foo->image_flip            = 'H';\n\$foo->image_rotate          = '90';");
											 
											// -----------
											$handle->image_bevel           = 20;
											$handle->image_bevel_color1    = '#FFFFFF';
											$handle->image_bevel_color2    = '#000000';
											TestProcess($handle, '20px black and white bevel', "\$foo->image_bevel           = 20;\n\$foo->image_bevel_color1    = '#FFFFFF';\n\$foo->image_bevel_color2    = '#000000';");
											 
											// -----------
											$handle->image_bevel           = 5;
											$handle->image_bevel_color1    = '#FFFFFF';
											$handle->image_bevel_color2    = '#FFFFFF';
											TestProcess($handle, '5px white bevel (smooth border)', "\$foo->image_bevel           = 5;\n\$foo->image_bevel_color1    = '#FFFFFF';\n\$foo->image_bevel_color2    = '#FFFFFF';");

											// -----------
											$handle->image_border          = 5;
											$handle->image_border_color    = '#FF0000';
											TestProcess($handle, '5px red border', "\$foo->image_border          = 5;\n\$foo->image_border_color    = '#FF0000';");

											// -----------
											$handle->image_border          = '5 20 1 25%';
											$handle->image_border_color    = '#0000FF';
											TestProcess($handle, '5px top, 20px right, 1px bot. and 25% left blue border', "\$foo->image_border          = '5 20 1 25%';\n\$foo->image_border_color    = '#0000FF';");
											 
											// -----------
											$handle->image_frame           = 1;
											$handle->image_frame_colors    = '#FF0000 #FFFFFF #FFFFFF #0000FF';
											TestProcess($handle, 'flat colored frame, 4 px wide', "\$foo->image_frame           = 1;\n\$foo->image_frame_colors    = '#FF0000 #FFFFFF\n                               #FFFFFF #0000FF';");

											// -----------
											$handle->image_frame           = 2;
											$handle->image_frame_colors    = '#FFFFFF #BBBBBB #999999 #FF0000 #666666 #333333 #000000';
											TestProcess($handle, 'crossed colored frame, 7 px wide', "\$foo->image_frame           = 2;\n\$foo->image_frame_colors    = '#FFFFFF #BBBBBB\n                               #999999 #FF0000\n                               #666666 #333333\n                               #000000';");

											// -----------
											$handle->image_overlay_color   = '#FFFFFF';
											$handle->image_overlay_percent = 50;
											$handle->image_rotate          = '180';
											$handle->image_tint_color      = '#FF0000';
											TestProcess($handle, 'tint and 50% overlay and 180\' rotation', "\$foo->image_overlay_color   = '#FFFFFF';\n\$foo->image_overlay_percent = 50;\n\$foo->image_rotate          = '180';\n\$foo->image_tint_color      = '#FF0000';");

											// -----------
											$handle->image_tint_color      = '#FF0000';
											TestProcess($handle, '#FF0000 tint', "\$foo->image_tint_color      = '#FF0000';");

											// -----------
											$handle->image_overlay_color   = '#FF0000';
											$handle->image_overlay_percent = 50;
											TestProcess($handle, '50% overlay #FF0000', "\$foo->image_overlay_color   = '#FF0000';\n\$foo->image_overlay_percent = 50;");

											// -----------
											$handle->image_overlay_color   = '#0000FF';
											$handle->image_overlay_percent = 5;
											TestProcess($handle, '5% overlay #0000FF', "\$foo->image_overlay_color   = '#0000FF';\n\$foo->image_overlay_percent = 5;");

											// -----------
											$handle->image_overlay_color   = '#FFFFFF';
											$handle->image_overlay_percent = 90;
											TestProcess($handle, '90% overlay #FFFFFF', "\$foo->image_overlay_color   = '#FFFFFF';\n\$foo->image_overlay_percent = 90;");

											// -----------
											$handle->image_brightness      = 25;
											TestProcess($handle, 'brightness 25', "\$foo->image_brightness      = 25;");

											// -----------
											$handle->image_brightness      = -25;
											TestProcess($handle, 'brightness -25', "\$foo->image_brightness      = -25;");

											// -----------
											$handle->image_contrast        = 75;
											TestProcess($handle, 'contrast 75', "\$foo->image_contrast        = 75;");

											// -----------
											$handle->image_threshold        = 20;
											TestProcess($handle, 'threshold filter', "\$foo->image_threshold       = 20;");

											// -----------
											$handle->image_greyscale       = true;
											TestProcess($handle, 'greyscale', "\$foo->image_greyscale       = true;");

											// -----------
											$handle->image_negative        = true;
											TestProcess($handle, 'negative', "\$foo->image_negative        = true;");

											// -----------
											$handle->image_brightness      = 75;
											$handle->image_resize          = true;
											$handle->image_y               = 200;
											$handle->image_x               = 100;
											$handle->image_rotate          = '90';
											$handle->image_overlay_color   = '#FF0000';
											$handle->image_overlay_percent = 50;
											$handle->image_text            = 'verot.net';
											$handle->image_text_color      = '#0000FF';
											$handle->image_text_background = '#FFFFFF';
											$handle->image_text_position   = 'BL';
											$handle->image_text_padding_x  = 10;
											$handle->image_text_padding_y  = 2;
											TestProcess($handle, 'brightness, resize, rotation, overlay &amp; label', "\$foo->image_brightness      = 75;\n\$foo->image_resize          = true;\n\$foo->image_y               = 200;\n\$foo->image_x               = 100;\n\$foo->image_rotate          = '90';\n\$foo->image_overlay_color   = '#FF0000';\n\$foo->image_overlay_percent = 50;\n\$foo->image_text            = 'verot.net';\n\$foo->image_text_color      = '#0000FF';\n\$foo->image_text_background = '#FFFFFF';\n\$foo->image_text_position   = 'BL';\n\$foo->image_text_padding_x  = 10;\n\$foo->image_text_padding_y  = 2;");

											// -----------
											$handle->image_text            = 'verot.net';
											$handle->image_text_color      = '#000000';
											$handle->image_text_percent    = 80;
											$handle->image_text_background = '#FFFFFF';
											$handle->image_text_background_percent  = 70;
											$handle->image_text_font       = 5;
											$handle->image_text_padding    = 20;
											TestProcess($handle, 'overlayed transparent label', "\$foo->image_text            = 'verot.net';\n\$foo->image_text_color      = '#000000';\n\$foo->image_text_percent    = 80;\n\$foo->image_text_background = '#FFFFFF';\n\$foo->image_text_background_percent = 70;\n\$foo->image_text_font       = 5;\n\$foo->image_text_padding    = 20;");

											// -----------
											$handle->image_text            = 'verot.net';
											$handle->image_text_direction  = 'v';
											$handle->image_text_background = '#000000';
											$handle->image_text_font       = 2;
											$handle->image_text_position   = 'BL';
											$handle->image_text_padding_x  = 2;
											$handle->image_text_padding_y  = 8;
											TestProcess($handle, 'overlayed vertical plain label bottom left', "\$foo->image_text            = 'verot.net';\n\$foo->image_text_direction  = 'v';\n\$foo->image_text_background = '#000000';\n\$foo->image_text_font       = 2;\n\$foo->image_text_position   = 'BL';\n\$foo->image_text_padding_x  = 2;\n\$foo->image_text_padding_y  = 8;");

											// -----------
											$handle->image_text            = 'verot.net';
											$handle->image_text_direction  = 'v';
											$handle->image_text_color      = '#FFFFFF';
											$handle->image_text_background = '#000000';
											$handle->image_text_background_percent = 50;
											$handle->image_text_padding    = 5;
											TestProcess($handle, 'overlayed vertical label', "\$foo->image_text            = 'verot.net';\n\$foo->image_text_direction  = 'v';\n\$foo->image_text_color      = '#FFFFFF';\n\$foo->image_text_background = '#000000';\n\$foo->image_text_background_percent = 50;\n\$foo->image_text_padding    = 5;");

											// -----------
											$handle->image_text            = 'verot.net';
											$handle->image_text_percent    = 50;
											$handle->image_text_background  = '#0000FF';
											$handle->image_text_x          = -5;
											$handle->image_text_y          = -5;
											$handle->image_text_padding    = 5;
											TestProcess($handle, 'overlayed label with absolute negative position', "\$foo->image_text            = 'verot.net';\n\$foo->image_text_percent    = 50;\n\$foo->image_text_background  = '#0000FF';\n\$foo->image_text_x          = -5;\n\$foo->image_text_y          = -5;\n\$foo->image_text_padding    = 5;");

											// -----------
											$handle->image_text            = 'verot.net';
											$handle->image_text_background = '#0000FF';
											$handle->image_text_background_percent = 25;
											$handle->image_text_x          = 5;
											$handle->image_text_y          = 5;
											$handle->image_text_padding    = 20;
											TestProcess($handle, 'overlayed transparent label with absolute position', "\$foo->image_text            = 'verot.net';\n\$foo->image_text_background = '#0000FF';\n\$foo->image_text_background_percent = 25;\n\$foo->image_text_x          = 5;\n\$foo->image_text_y          = 5;\n\$foo->image_text_padding    = 20;");

											// -----------
											$handle->image_text            = "verot.net\nclass\nupload";
											$handle->image_text_background = '#000000';
											$handle->image_text_background_percent = 75;
											$handle->image_text_font       = 1;
											$handle->image_text_padding    = 10;
											TestProcess($handle, 'text label with multiple lines and small font', "\$foo->image_text            = \"verot.net\\nclass\\nupload\";\n\$foo->image_text_background = '#000000';\n\$foo->image_text_background_percent = 75;\n\$foo->image_text_font       = 1;\n\$foo->image_text_padding    = 10;");

											// -----------
											$handle->image_text            = "verot.net\nclass\nupload";
											$handle->image_text_color      = '#000000';
											$handle->image_text_background = '#FFFFFF';
											$handle->image_text_background_percent = 60;
											$handle->image_text_padding    = 3;
											$handle->image_text_font       = 3;
											$handle->image_text_alignment  = 'R';
											$handle->image_text_direction  = 'V';
											TestProcess($handle, 'vertical multi-lines text, right aligned', "\$foo->image_text            = \"verot.net\\nclass\\nupload\";\n\$foo->image_text_color      = '#000000';\n\$foo->image_text_background = '#FFFFFF';\n\$foo->image_text_background_percent = 60;\n\$foo->image_text_padding    = 3;\n\$foo->image_text_font       = 3;\n\$foo->image_text_alignment  = 'R';\n\$foo->image_text_direction  = 'V';");

											// -----------
											$handle->image_text            = "verot.net\nclass\nupload";
											$handle->image_text_background = '#000000';
											$handle->image_text_background_percent = 50;
											$handle->image_text_padding    = 10;
											$handle->image_text_x          = -5;
											$handle->image_text_y          = -5;
											$handle->image_text_line_spacing = 10;
											TestProcess($handle, 'text label with 10 pixels of line spacing', "\$foo->image_text            = \"verot.net\\nclass\\nupload\";\n\$foo->image_text_background = '#000000';\n\$foo->image_text_background_percent = 50;\n\$foo->image_text_padding    = 10;\n\$foo->image_text_x          = -5;\n\$foo->image_text_y          = -5;\n\$foo->image_text_line_spacing = 10;");

											// -----------
											$handle->image_text            = "verot.net\nclass\nupload";
											$handle->image_text_background = '#000000';
											$handle->image_text_padding    = 10;
											$handle->image_text_font       = "fonts/bmreceipt.gdf";
											$handle->image_text_line_spacing = 2;
											TestProcess($handle, 'text label with external GDF font', "\$foo->image_text            = \"verot.net\\nclass\\nupload\";\n\$foo->image_text_background = '#000000';\n\$foo->image_text_padding    = 10;\n\$foo->image_text_font       = \"fonts/bmreceipt.gdf\";\n\$foo->image_text_line_spacing = 2;");

											// -----------
											$handle->image_text            = "PHP";
											$handle->image_text_color      = '#FFFF00';
											$handle->image_text_background = '#FF0000';
											$handle->image_text_padding    = 10;
											$handle->image_text_font       = "fonts/atommicclock.gdf";
											TestProcess($handle, 'text label with external GDF font', "\$foo->image_text            = 'PHP';\n\$foo->image_text_color      = '#FFFF00';\n\$foo->image_text_background = '#FF0000';\n\$foo->image_text_padding    = 10;\n\$foo->image_text_font       = \"fonts/atommicclock.gdf\";");

											// -----------
											$handle->image_reflection_height = '40px';
											TestProcess($handle, '40px reflection', "\$foo->image_reflection_height = '40px';");

											// -----------
											$handle->image_reflection_height = '50%';
											$handle->image_text            = "verot.net\nclass\nupload";
											$handle->image_text_background = '#000000';
											$handle->image_text_padding    = 10;
											$handle->image_text_line_spacing = 10;
											TestProcess($handle, 'text label and 50% reflection', "\$foo->image_text            = \"verot.net\\nclass\\nupload\";\n\$foo->image_text_background = '#000000';\n\$foo->image_text_padding    = 10;\n\$foo->image_text_line_spacing = 10;\n\$foo->image_reflection_height = '50%';");

											// -----------
											$handle->image_reflection_height = '40px';
											$handle->image_reflection_space = 10;
											TestProcess($handle, '40px reflection and 10 pixels space', "\$foo->image_reflection_height = '40px';\n\$foo->image_reflection_space = 10;");

											// -----------
											$handle->image_reflection_height = 60;
											$handle->image_reflection_space = -40;
											TestProcess($handle, '60px reflection and -40 pixels space', "\$foo->image_reflection_height = 60;\n\$foo->image_reflection_space = -40;");

											// -----------
											$handle->image_reflection_height = 50;
											$handle->image_reflection_opacity = 100;
											TestProcess($handle, '50px reflection and 100% opacity', "\$foo->image_reflection_height = 50;\n\$foo->image_reflection_opacity = 100;");

											// -----------
											$handle->image_reflection_height = 50;
											$handle->image_reflection_opacity = 20;
											TestProcess($handle, '50px reflection and 20% opacity', "\$foo->image_reflection_height = 50;\n\$foo->image_reflection_opacity = 20;");

											// -----------
											$handle->image_reflection_height = '50%';
											$handle->image_reflection_color = '#000000';
											TestProcess($handle, '50% reflection, black background', "\$foo->image_reflection_height = '50%';\n\$foo->image_reflection_color = '#000000';");

											// -----------
											$handle->image_watermark       = "watermark.png";
											TestProcess($handle, 'overlayed watermark (alpha transparent PNG)', "\$foo->image_watermark       = 'watermark.png';");

											// -----------
											$handle->image_watermark       = "watermark.png";
											$handle->image_watermark_position = 'BR';
											TestProcess($handle, 'overlayed watermark, bottom right position', "\$foo->image_watermark       = 'watermark.png';\n\$foo->image_watermark_position = 'BR;");

											// -----------
											$handle->image_watermark       = "watermark.png";
											$handle->image_watermark_x     = 10;
											$handle->image_watermark_y     = 10;
											$handle->image_greyscale       = true;
											TestProcess($handle, 'watermark on greyscale pic, absolute position', "\$foo->image_watermark       = 'watermark.png';\n\$foo->image_watermark_x     = 10;\n\$foo->image_watermark_y     = 10;\n\$foo->image_greyscale       = true;");

											// -----------
											$handle->jpeg_size             = 3072;
											TestProcess($handle, 'desired JPEG size set to 3KB', "\$foo->jpeg_size             = 3072;");

											// -----------
											$handle->image_convert         = 'jpg';
											$handle->jpeg_quality          = 10;
											TestProcess($handle, 'JPG quality set to 10%', "\$foo->image_convert         = 'jpg';\n\$foo->jpeg_quality          = 10;");

											// -----------
											$handle->image_convert         = 'jpg';
											$handle->jpeg_quality          = 80;
											TestProcess($handle, 'JPG quality set to 80%', "\$foo->image_convert         = 'jpg';\n\$foo->jpeg_quality          = 80;");


										} else {
        // if we are here, the local file failed for some reasons
        echo '<fieldset>';
        echo '  <legend>local file error</legend>';
        echo '  Error: ' . $handle->error . '';
        echo '</fieldset>';
    }


									}


									//echo '<p><a href="index.html">do another test</a></p>';
									/*
									 echo '<pre>';
									echo($handle->log);
									echo '</pre>';
									*/
									?></td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td width="100%">
				<table border="0" cellpadding="0" cellspacing="0"
					style="border-collapse: collapse" bordercolor="#111111" width="953"
					id="AutoNumber5">
					<tr>
						<td width="371">&nbsp;</td>
						<td width="32" height="51">&nbsp;</td>
						<td width="550" height="51" class="text">
							<div align="center">
								<?php
include("links.php");
?>
							</div>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td width="100%">
				<table border="0" cellpadding="0" cellspacing="0"
					style="border-collapse: collapse" bordercolor="#111111"
					width="100%" id="AutoNumber4">
					<tr>
						<td height="59" class="footerPower"><div align="center">copyrights
								2008 MKhoster document plagirism Al rights reserved.</div>
						</td>
						<td width="196"><map name="FPMap0">
								<area href="http://www.mkhoster.com" shape="rect"
									coords="9, 17, 124, 58">
							</map> <IMG SRC="images/home_28.jpg" WIDTH=196 HEIGHT=59
							usemap="#FPMap0" border="0">
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td width="100%" background="images/home_29.jpg"
				style="background-image: url('images/home_29.jpg')"><IMG
				SRC="images/home_29.jpg" WIDTH=12 HEIGHT=30 ALT="">
			</td>
		</tr>
	</table>

</body>

</html>
