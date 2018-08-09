<?php global $_SERVER_URL; ?>
<?php 
$styleString = "000000,993300,333300,003300,003366,000080,333399,333333,800000,FF6600,808000,808080,008080,0000FF,666699,808080,FF0000,FF9900,99CC00,339966,33CCCC,3366FF,800080,999999,FF00FF,FFCC00,FFFF00,00FF00,00FFFF,00CCFF,993366,C0C0C0,FF99CC,FFCC99,FFFF99,CCFFCC,CCFFFF,99CCFF,CC99FF,FFFFFF";
$colorList = explode(",",$styleString);
 ?>
<style type="text/css">
body
{
	overflow:hidden;
}
.color_div
{
	margin:2px;/*FireFox열람기에서*/
	*margin:3px;/*IE열람기사용일때*/
	width:12px;
	height:12px;
	border:1px #808080 solid;
}
</style>
<script type="text/javascript" language="javascript" src="<?php print($_SERVER_URL); ?>js/jquery-1.7.1.min.js"> </script>
<script type="text/javascript" language="javascript" src="<?php print($_SERVER_URL); ?>js/myfunction.js"> </script>
<script type="text/javascript">


/*************全选函数***********/
function select_all(id)
{
	if(id && id != "undefined")
	{
		var objs = $(id).getElementsByTagName("input");
	}
	else
	{
		var objs = window.document.getElementsByTagName("input");
	}
	for(var i=0; i<objs.length; i++)
	{
		if(objs[i].type.toLowerCase() == "checkbox" ) objs[i].checked = true;
	}
}
/***************全不选函数***********/
function select_none(id)
{
	if(id && id != "undefined")
	{
		var objs = $(id).getElementsByTagName("input");
	}
	else
	{
		var objs = window.document.getElementsByTagName("input");
	}
	
	//alert(objs.length);
	for(var i=0; i<objs.length; i++)
	{
		if(objs[i].type.toLowerCase() == "checkbox" ) objs[i].checked = false;
		if(objs[i].type.toLowerCase() == "text" ) objs[i].value = "";
	}
}
/*****************反选函数**************/
function select_anti(id)
{
	if(id && id != "undefined")
	{
		var objs = $(id).getElementsByTagName("input");
	}
	else
	{
		var objs = window.document.getElementsByTagName("input");
	}
	for(var i=0; i<objs.length; i++)
	{
		if(objs[i].type.toLowerCase() == "checkbox" )
		{
			if(objs[i].checked == true)
			{
				objs[i].checked = false;
			}
			else
			{
				objs[i].checked = true;
			}
		}
	}
}


//var sub_style = parent.$("#<?php echo $subject_input;?>");
//var style = parent.$("#<?php echo $inputname;?>");

var title_input = parent.document.getElementById("<?php echo $title_input;?>");
var title_style = parent.document.getElementById("<?php echo $title_style;?>");

function ok()
{
	
	var style_msg = "";
	var bold = document.getElementById("bold").checked;
	//alert(bold);return;
	if(bold)
	{
		style_msg += "font-weight:bold;";
	}
	var italic = document.getElementById("italic").checked;
	if(italic)
	{
		style_msg += "font-style:italic;";
	}
	var underline = document.getElementById("underline").checked;
	if(underline)
	{
		style_msg += "text-decoration:underline;";
	}
	var fontcolor = document.getElementById("fontcolor").value;
	if(fontcolor)
	{
		style_msg += "color:"+fontcolor+";";
	}
	var bgcolor = document.getElementById("bgcolor").value;
	if(bgcolor)
	{
		style_msg += "background-color:"+bgcolor+";";
	}
	//alert(bgcolor);return;
	//스타일을 적용 해볼 입력란과 스타일을 저장 할 히든컨트롤이 없으면 실행 중지
	//alert(title_input);return;
	//alert(title_style);return;
	if(title_input==null || title_style==null)	return;
		
	title_style.value = style_msg;
	//alert(title_style.id); 
	//	alert(style_msg);return;
	//------직접 스타일 효과를 현시한다.
	style_subject = title_input.style.cssText;
	style_subject = style_subject.toLowerCase();//소문자로 변경시킨다.

	//--------중복되는 스타일을 제거한다.
	style_subject = style_subject.replace(/font-weight: bold;/g,"");

	style_subject = style_subject.replace(/font-style: italic;/g,"");

	style_subject = style_subject.replace(/text-decoration: underline;/g,"");

	style_subject = style_subject.replace(/color: \w+;/g,"");

	style_subject = style_subject.replace(/background-color: \w+;/g,"");

	title_input.style.cssText = style_subject + ";" + style_msg;
	//-------------关闭
	//alert(style_subject);return;
	parent.Layer.over();
	title_input.focus();
}
</script>
<style>
	td
	{
		font-size:12px;
	}
</style>
<div id="popen_msg" style="display:none"></div>

<div>
<table cellpadding="0" cellspacing="0">
<tr>
	<td style="font-size:12px;">폰트스타일：</td>
	<td><input type="checkbox" name="bold" id="bold" value="bold"></td>
	<td><img src="<?php print($_SERVER_URL); ?>images/bold.gif" border="0"></td>
	<td><input type="checkbox" name="italic" id="italic" value="italic"></td>
	<td><img src="<?php print($_SERVER_URL); ?>images/italic.gif" border="0" align="absmiddle"></td>
	<td><input type="checkbox" name="underline" id="underline" value="underline"></td>
	<td><img src="<?php print($_SERVER_URL); ?>images/underline.gif" border="0" align="absmiddle"></td>
</tr>
</table>
</div>

<table>
<tr>
	<td>
		<div class="table1">
		<table cellpadding="0" cellspacing="0" class="table">
		<tr>
			<td colspan="3" class="table" onclick="select_color('')" onmouseover="fontcolor_over(this,'')" onmouseout="this.className='table'">
				<table cellpadding="0" cellspacing="0">
				<tr>
					<td><div style="margin-left:2px;*margin-left:3px;width:12px;height:12px;border:1px #808080 solid;background:#000;"><div></div></div></td>
					<td style="cursor:default">&nbsp;자동</td>
				</tr>
				</table>
			</td>
			<td colspan="2" align="right">문자색：</td>
			<td colspan="3" class="table"><input type="text" readonly id="fontcolor" name="fontcolor" style="width:60px"></td>
		</tr>
		<tr>
			<?php $_i=0;$colorList=(is_array($colorList))?$colorList:array();foreach($colorList AS  $key=>$value){$_i++; ?>
			<td class="table" onclick="select_color('#<?php echo $value;?>')" onmouseover="fontcolor_over(this,'#<?php echo $value;?>')" onmouseout="this.className='table'"><div class="color_div" style="background:#<?php echo $value;?>;"><div></div></div></td>
			<?php if($_i%8===0){echo '</tr><tr>';}?>
			<?php } ?>
		</tr>
		</table>
		</div>
	</td>
	<td>
		<div class="table1">
		<table cellpadding="0" cellspacing="0" class="table">
		<tr>
			<td colspan="3" class="table" onclick="select_bg('')" onmouseover="bgcolor_over(this,'')" onmouseout="this.className='table'">
				<table cellpadding="0" cellspacing="0">
				<tr>
					<td><div style="margin-left:2px;*margin-left:3px;width:12px;height:12px;border:1px #808080 solid;background:#000;"><div></div></div></td>
					<td style="cursor:default">&nbsp;자동</td>
				</tr>
				</table>
			</td>
			<td colspan="2" align="right">배경색：</td>
			<td colspan="3" class="table"><input type="text" readonly id="bgcolor" name="bgcolor" style="width:60px"></td>
		</tr>
		<tr>
			<?php $_i=0;$colorList=(is_array($colorList))?$colorList:array();foreach($colorList AS  $key=>$value){$_i++; ?>
			<td class="table" onclick="select_bg('#<?php echo $value;?>')" onmouseover="bgcolor_over(this,'#<?php echo $value;?>')" onmouseout="this.className='table'"><div class="color_div" style="background:#<?php echo $value;?>;"><div></div></div></td>
			<?php if($_i%8===0){echo '</tr><tr>';}?>
			<?php } ?>
		</tr>
		</table>
		</div>
	</td>
</tr>
</table>

<script type="text/javascript">
function select_color(val)
{
	if(val && val != "undefined")
	{
		$("#fontcolor").val(val);
		$("#fontcolor").css('backgroundColor', val);
	}
	else
	{
		$("#fontcolor").val( "");
		$("#fontcolor").css('backgroundColor', "");
	}
}

function fontcolor_over(m,val)
{
	//alert($("#fontcolor"));
	m.className = "table1";
	$("#fontcolor").css('backgroundColor',val);
}

function bgcolor_over(m,val)
{
	//alert(val + ' back');
	m.className = "table1";
	$("#bgcolor").css('backgroundColor', val);
}

function select_bg(val)
{
	if(val && val != "undefined")
	{
		$("#bgcolor").val(val);
		$("#bgcolor").css('backgroundColor', val);
	}
	else
	{
		$("#bgcolor").val("");
		$("#bgcolor").css('backgroundColor', "");
	}
}

//--------------

function chkIfUse(styleText)
{
	if(!styleText || styleText == "undefined")		return false;

	var array = new Array();
	array = styleText.split(";");
	var length = array.length;
	for(i=0;i<length;i++)
	{
		if(array[i])
		{
			if(array[i].toLowerCase() == "font-weight:bold")
			{
				$("bold").checked = true;
			}
			if(array[i].toLowerCase() == "font-style:italic")
			{
				$("italic").checked = true;
			}
			if(array[i].toLowerCase() == "text-decoration:underline")
			{
				$("underline").checked = true;
			}
			//-----------
			var t_array = new Array;
			t_array = array[i].split(":");
			if(t_array[0].toLowerCase() == "color")
			{
				$("fontcolor").value = t_array[1] ? t_array[1] : "";
			}
			if(t_array[0].toLowerCase() == "background-color")
			{
				$("bgcolor").value = t_array[1] ? t_array[1] : "";
			}
		}
	}
}
chkIfUse(parent.$("<?php echo $inputname;?>").value);
</script>

</body>
</html>