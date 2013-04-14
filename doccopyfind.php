<?php
include("exec_data.php");
?>
<html>
<head>
<title>HIT MISS反抄袭开发小组制作</title>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="g.css">
    <style type="text/css">
/*      @import url(http://www.google.com/uds/css/gsearch.css); */
      .search-control { margin: 20px; }
      .gsc-control { width : 600px; }

      /* long form visible urls should be on */
      .gsc-webResult div.gs-visibleUrl-long {
        display : block;
      }
      .gsc-webResult div.gs-visibleUrl-short {
        display : none;
      }
    </style>

    <script src="http://www.google.com/uds/api?file=uds.js&v=1.0&key=internal-sample" type="text/javascript"></script>
</head>

<body topmargin="0" leftmargin="0">

<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="950" id="AutoNumber1" align="center">
  <tr>
    <td width="100%">
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#111111" id="AutoNumber2" style="border-collapse: collapse">
      <tr>
        <td height="84" colspan="2" style="background-color:#7CC242" class="whiteHeader">
          <div align="center">HIT-MIS DcopyFinder </div></td>
        </tr>
      <tr>
        <td width="370" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td colspan="2"><IMG SRC="images/home_03.jpg" WIDTH=290 HEIGHT=48 ALT="MKhoster"></td>
          </tr>
          <tr>
            <td colspan="2"><IMG SRC="images/home_08.jpg" WIDTH=360 HEIGHT=20 ALT=""></td>
          </tr>
          <tr>
            <td class="text">DcopyFinder（ Document Copy Finder）由哈工大信息管理与信息系统IT项目管理课程设计小组团队开发，旨在为在校学生提供在线代码抄袭检测服务。项目正在进行中，如有纰漏，敬请指正。</td>
            <td class="text">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2" class="enorange">Uploaded files: </td>
          </tr>
          <tr>
            <td colspan="2"><IMG SRC="images/home_08.jpg" WIDTH=360 HEIGHT=20 ALT=""></td>
          </tr>
          <tr>
            <td width="95%">
<?php
include("listing_content.php");
?>
            </td>
            <td width="5%"></td>
          </tr>
        </table></td>
        <td width="584" valign="top">
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#111111" id="AutoNumber3" style="border-collapse: collapse">
          
          <tr>
            <td width="580">
            <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber6">
              <tr>
                <td height="48" class="text">
                  <div align="center">
<?php
include("links.php");
?>				
                    </div></td>
                </tr>
              <tr>
                <td width="100%" valign="top">
                  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber7">
                  <tr>
                    <td width="437" class="greenlist"><div align="center" class="headerOrange">结果列表 : </div></td>
                  </tr>
                </table>                </td>
              </tr>
            </table>            </td>
          </tr>
          <tr>
            <td width="580" height="30">
			<IMG SRC="images/home_08.jpg" WIDTH=580 HEIGHT=20 ALT=""></td>
          </tr>
          <tr>
            <td width="580" valign="top">
			<div class="search-control" id="search_control_tabbed">
			<table width="545" border="0">
			<tr>
				<td>文件A</td>
				<td>A的行数</td>
				<td>文件B</td>
				<td>B的行数</td>
				<td>相似度数(%)</td>
			</tr>
			<?php
			 	//循环输出测试数据嗯
				include("exec_format.php");
				foreach($result as $data) {
					echo '<tr>';
					foreach($data as $d) {
						echo '<td>'.$d.'</td>';
					}
					echo '</tr>';
                }
			?>
              </table>
			  <p>&nbsp;</p>
			  </div>			</td>
          </tr>
          <tr>
            <td valign="top">&nbsp;</td>
          </tr>
          </table>        </td>
      </tr>
    </table>
    </td>
  </tr>
  <tr>
    <td width="100%">
    <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="953" id="AutoNumber5">
      <tr>
        <td width="371">&nbsp;</td>
        <td width="32" height="51">&nbsp;
		  </td>
        <td width="550" height="51" class="text">
          <div align="center">
            <?php
include("links.php");
?>
          </div></td>
      </tr>
    </table>
    </td>
  </tr>
  <tr>
    <td width="100%">
    <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber4">
      <tr>
        <td height="59" class="footerPower"><div align="center">copyrights 2008 MKhoster document plagirism Al rights reserved.</div></td>
        <td width="196">
			<map name="FPMap0">
            <area href="http://www.mkhoster.com" shape="rect" coords="9, 17, 124, 58">
            </map>
			<IMG SRC="images/home_28.jpg" WIDTH=196 HEIGHT=59 usemap="#FPMap0" border="0"></td>
      </tr>
    </table>
    </td>
  </tr>
  <tr>
    <td width="100%" background="images/home_29.jpg" style="background-image: url('images/home_29.jpg')">
			<IMG SRC="images/home_29.jpg" WIDTH=12 HEIGHT=30 ALT=""></td>
  </tr>
</table>

</body>

</html>