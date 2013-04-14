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

    <script language="Javascript" type="text/javascript">//<![CDATA[
      function OnLoad() {
        // create a tabbed mode search control
        var tabbed = new GSearchControl();
        // add an additional term to the query
        // in this case filetype:pdf
	
<?php
//start loop on document values array
header("Content-Type:text/html;charset=utf-8");
$arr_len = count($dataarr);
$identify = 0;
for($i=0; $i < $arr_len; $i++ )
{
	//最多显示30条记录
	if(!empty($dataarr[$i]) && $identify <= $identify_nums)
	{
		echo "var searcher = new GwebSearch(); \n";
        echo "searcher.setUserDefinedLabel(' 文件抄袭结果查询列表') \n";
        echo "searcher.setQueryAddition('\"".$dataarr[$i] ."\"'); \n";//按照切分字符串进行发送，获得结果。
        echo "searcher.SMALL_RESULTSET ;\n";
		echo "tabbed.addSearcher(searcher); \n";
		$identify++;
	}
}
?>

        // draw in tabbed layout mode
        var drawOptions = new GdrawOptions();
        drawOptions.setDrawMode(GSearchControl.DRAW_MODE_TABBED);
        tabbed.draw(document.getElementById("search_control_tabbed"));
    
        tabbed.execute(" ");
      }
      GSearch.setOnLoadCallback(OnLoad);
    //]]>
    </script>
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
                    <td width="437" class="greenlist"><div align="center" class="headerOrange">结果列表 : <?=$_POST["file_name"];?></div></td>
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
			<div class="search-control" id="search_control_tabbed">请稍等...</div>			</td>
          </tr>
          <tr>
            <td valign="top"><?= $res_num;?>&nbsp;</td>
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