<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>后台管理</title>
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="<?php echo $this->getWebSkinPath()."css/admin.css";?>" />
	<meta name="robots" content="noindex,nofollow">
	<link rel="shortcut icon" href="favicon.ico" />
	<script type="text/javascript" charset="UTF-8" src="/eter/runtime/_systemjs/jquery/jquery-1.11.3.min.js"></script><script type="text/javascript" charset="UTF-8" src="/eter/runtime/_systemjs/jquery/jquery-migrate-1.2.1.min.js"></script>
	<script type="text/javascript" charset="UTF-8" src="/eter/runtime/_systemjs/artdialog/artDialog.js"></script><script type="text/javascript" charset="UTF-8" src="/eter/runtime/_systemjs/artdialog/plugins/iframeTools.js"></script><link rel="stylesheet" type="text/css" href="/eter/runtime/_systemjs/artdialog/skins/aero.css" />
	<script type="text/javascript" charset="UTF-8" src="/eter/runtime/_systemjs/form/form.js"></script>
	<script type="text/javascript" charset="UTF-8" src="/eter/runtime/_systemjs/autovalidate/validate.js"></script><link rel="stylesheet" type="text/css" href="/eter/runtime/_systemjs/autovalidate/style.css" />
	<script type="text/javascript" charset="UTF-8" src="/eter/runtime/_systemjs/artTemplate/artTemplate.js"></script><script type="text/javascript" charset="UTF-8" src="/eter/runtime/_systemjs/artTemplate/artTemplate-plugin.js"></script>
	<script type='text/javascript' src="<?php echo $this->getWebViewPath()."javascript/common.js";?>"></script>
	<script type='text/javascript' src="<?php echo $this->getWebViewPath()."javascript/admin.js";?>"></script>
	<script type='text/javascript' src="<?php echo $this->getWebViewPath()."javascript/menu.js";?>"></script>
</head>
<body>
	<div class="container">
		<div id="header">
			<div class="logo">
				<a href="<?php echo IUrl::creatUrl("/system/default");?>"><img src="<?php echo $this->getWebSkinPath()."images/admin/logo.png";?>" width="303" height="43" /></a>
			</div>
			<div id="menu">
				<ul name="menu">
				</ul>
			</div>
			<p><a href="<?php echo IUrl::creatUrl("/systemadmin/logout");?>">退出管理</a> <a href="<?php echo IUrl::creatUrl("/system/admin_repwd");?>">修改密码</a> <a href="<?php echo IUrl::creatUrl("/system/default");?>">后台首页</a> <a href="<?php echo IUrl::creatUrl("");?>" target='_blank'>商城首页</a> <span>您好 <label class='bold'><?php echo isset($this->admin['admin_name'])?$this->admin['admin_name']:"";?></label>，当前身份 <label class='bold'><?php echo isset($this->admin['admin_role_name'])?$this->admin['admin_role_name']:"";?></label></span></p>
		</div>
		<div id="info_bar">
			<label class="navindex"><a href="<?php echo IUrl::creatUrl("/system/navigation");?>">快速导航管理</a></label>
			<span class="nav_sec">
			<?php $adminId = $this->admin['admin_id']?>
			<?php $query = new IQuery("quick_naviga");$query->where = "admin_id = $adminId and is_del = 0";$items = $query->find(); foreach($items as $key => $item){?>
			<a href="<?php echo isset($item['url'])?$item['url']:"";?>" class="selected"><?php echo isset($item['naviga_name'])?$item['naviga_name']:"";?></a>
			<?php }?>
			</span>
		</div>

		<div id="admin_left">
			<ul class="submenu"></ul>
			<div id="copyright"></div>
		</div>

		<div id="admin_right">
			<?php $siteConfigObj = new Config("site_config");$site_config = $siteConfigObj->getInfo();?>

<div class="headbar">
	<div class="position"><span>系统</span><span>></span><span>第三方平台</span><span>></span><span>微信平台</span></div>
</div>
<div class="content_box">
	<div class="content form_content">
		<form action="#" method="post" name="wechat">
			<table class="form_table">
				<colgroup>
					<col width="150px" />
					<col />
				</colgroup>
				<tr>
					<th>微商城帮助：</th>
					<td>
						<a href='http://www.aircheng.com' target='_blank'>
							<?php if(extension_loaded("OpenSSL")){?>不知道如何配置？<?php }else{?>系统没有开启OpenSSL组件无法使用此功能<?php }?>
						</a>
					</td>
				</tr>

				<tr>
					<th>URL(服务器地址)：</th>
					<td>
						<?php if(IWeb::$app->config['rewriteRule'] == 'pathinfo'){?>
						<span class="orange"><?php echo IUrl::getHost();?><?php echo IUrl::creatUrl("/block/wechat");?></span>
						<label>复制到<微信公众平台后台-开发者中心>URL（服务器地址）</label>
						<?php }else{?>
						<span class="red">必须开启伪静态 【系统】——【网站设置】——【系统设置】——【开启伪静态】</span>
						<?php }?>
					</td>
				</tr>
				<tr>
					<th>Token(令牌)：</th>
					<td>
						<input type='text' class='normal' name='wechat_Token' pattern='required' alt='公众号Token必须填写'  />
						<label>把填写Token(令牌)复制到<微信公众平台后台-开发者中心>的Token中，必须保持两边一致</label>
					</td>
				</tr>
				<tr>
					<th>AppID：</th>
					<td>
						<input type='text' class='normal' name='wechat_AppID' pattern='required' alt='AppID必须填写' />
						<label>登录到<微信公众平台后台-开发者中心>可以获得</label>
					</td>
				</tr>
				<tr>
					<th>AppSecret：</th>
					<td>
						<input type='text' class='normal' name='wechat_AppSecret' pattern='required' alt='AppSecret必须填写' />
						<label>登录到<微信公众平台后台-开发者中心>可以获得</label>
					</td>
				</tr>
				<tr>
					<th>微信用户自动注册登录：</th>
					<td>
						<select name="wechat_AutoLogin">
							<option value="0">关闭</option>
							<option value="1">开启</option>
						</select>
						<label>根据用户手机微信号自动绑定商城，此功能只针对专门做微商城的用户,不能与WAP，PC端账号同步</label>
					</td>
				</tr>
				<tr>
					<th>公众平台菜单：</th>
					<td>
						<table class="list_table" style="width:700px">
							<colgroup>
								<col />
								<col width="350px" />
								<col width="80px" />
							</colgroup>

							<thead>
								<tr>
									<th>菜单名称</th>
									<th>连接地址</th>
									<th>操作</th>
								</tr>
							</thead>

							<tbody id="menuBox"></tbody>

							<tfoot>
								<tr><td colspan="3" style="text-align:left"><button type='button' class='btn' onclick='addMainMenu([]);'><span>添加菜单</span></button></td></tr>
							</tfoot>
						</table>

						<p><label>微信公众账号菜单设置，<连接地址> 填写伪静态的时候比如：" /site/index " 会自动转化为微信oauth授权登录连接</label></p>
					</td>
				</tr>

				<tr><td></td><td><button class="submit" type="button" onclick="submitConfig();"><span>保 存</span></button></td></tr>
			</table>
		</form>
	</div>
</div>

<!--菜单项模板-->
<script type='text/html' id='menuTemplate'>
<%if(isChild == true){%>
<tr name="child<%=menuIndex%>">
	<td><input type='text' class='small' name='menuChildName<%=menuIndex%>' value='<%=menuData.name%>' style='margin-left:50px' /></td>
	<td><input type='text' class='normal' name='menuChildLink<%=menuIndex%>' value='<%=menuData.url%>' alt='<%=menuData.url%>' title='<%=menuData.url%>' /></td>
	<td><a href="javascript:void(0);" onclick="delChildMenu(this);"><img class="operator" src="<?php echo $this->getWebSkinPath()."images/admin/icon_del.gif";?>" alt="删除" title="删除" /></a></td>
</tr>
<%}else{%>
<tr name="parent<%=menuIndex%>">
	<td><input type='text' class='small' name='menuName' value='<%=menuData.name%>' menuIndex="<%=menuIndex%>" /></td>
	<td><input type='text' class='normal' name='menuLink' value='<%=menuData.url%>' alt='<%=menuData.url%>' title='<%=menuData.url%>' /></td>
	<td>
		<a href="javascript:addChildMenu(<%=menuIndex%>,[]);"><img class="operator" src="<?php echo $this->getWebSkinPath()."images/admin/icon_add.gif";?>" alt="添加子菜单" title="添加子菜单" /></a>
		<a href="javascript:delParentMenu(<%=menuIndex%>);"><img class="operator" src="<?php echo $this->getWebSkinPath()."images/admin/icon_del.gif";?>" alt="删除" title="删除" /></a>
	</td>
</tr>
<%}%>
</script>

<script type='text/javascript'>
jQuery(function()
{
	var formobj = new Form('wechat');
	formobj.init(<?php echo JSON::encode($site_config);?>);

	//获取菜单信息
	$.getJSON('<?php echo IUrl::creatUrl("/system/wechat_getmenu");?>',function(json)
	{
		if(json.result == 'success')
		{
			var menuData = jQuery.parseJSON(json.data);
			if(menuData.button)
			{
				for(var index in menuData.button)
				{
					var item = menuData.button[index];
					addMainMenu(item);
					if(item.sub_button)
					{
						for(var i in item.sub_button)
						{
							var itemSec = item.sub_button[i];
							addChildMenu(index,itemSec);
						}
					}

				}
			}
		}
		else
		{
			alert(json.msg);
		}
	});
});

//ajax提交信息
function submitConfig()
{
	var wechat_Token     = $('[name="wechat_Token"]').val();
	var wechat_AppID     = $('[name="wechat_AppID"]').val();
	var wechat_AppSecret = $('[name="wechat_AppSecret"]').val();
	var wechat_AutoLogin = $('[name="wechat_AutoLogin"]').val();

	$.post("<?php echo IUrl::creatUrl("/system/save_conf");?>",{"wechat_Token":wechat_Token,"wechat_AppID":wechat_AppID,"wechat_AppSecret":wechat_AppSecret,"wechat_AutoLogin":wechat_AutoLogin},function(content)
	{
		saveMenu();
	});
}

//保存菜单
function saveMenu()
{
	var menuNum = $('tr[name^="parent"]').length;
	var buttonObject = {"button":[]};

	for(var i=0;i<menuNum;i++)
	{
		var tempName = $("input[name='menuName']:eq("+i+")").val();
		if(!tempName)
		{
			continue;
		}
		var tempLink = $("input[name='menuLink']:eq("+i+")").val();
		var item     = {"type":"view","name":tempName};

		//存在子菜单
		var menuIndex = $("input[name='menuName']:eq("+i+")").attr("menuIndex");
		var childNum = $("tr[name='child"+menuIndex+"']").length;
		if(childNum > 0)
		{
			item.sub_button = [];
			for(var j=0;j<childNum;j++)
			{
				var tempChildName = $("input[name='menuChildName"+menuIndex+"']:eq("+j+")").val();
				if(!tempChildName)
				{
					continue;
				}
				var tempChildLink = $("input[name='menuChildLink"+menuIndex+"']:eq("+j+")").val();
				var tempItem      = {"type":"view","name":tempChildName,"url":tempChildLink};
				item.sub_button.push(tempItem);
			}
		}
		else
		{
			item.url = tempLink;
		}
		buttonObject.button.push(item);
	}

	$.post("<?php echo IUrl::creatUrl("/system/wechat_setmenu");?>",{"menuData":JSON.stringify(buttonObject)},function(json)
	{
		if(json.result == 'success')
		{
			alert('菜单修改成功');
		}
		else
		{
			alert(json.msg);
		}
	},'json');
}

/**
 * 添加菜单
 * @param menuData {"type":"view","name":"微商城","url":"连接地址","sub_button":[]}
 */
function addMainMenu(menuData)
{
	var parentMenuLength = $("tr[name^='parent']").length;
	if(parentMenuLength >= 3)
	{
		alert("菜单数量最多不能超过3个");
		return;
	}
	var menuHtml = template.render('menuTemplate',{"isChild":false,"menuIndex":parentMenuLength,"menuData":menuData});
	$('#menuBox').append(menuHtml);
}

/**
 * 添加二级菜单
 * @param menuIndex 菜单索引值
 * @param menuData {"type":"view","name":"微商城","url":"连接地址","sub_button":[]}
 */
function addChildMenu(menuIndex,menuData)
{
	var childMenuLength = $("tr[name='child"+menuIndex+"']").length;
	if(childMenuLength >= 5)
	{
		alert("子菜单的数量不能超过5个");
		return;
	}
	var parentObj = $("tr[name='parent"+menuIndex+"']");
	var menuHtml  = template.render('menuTemplate',{"isChild":true,"menuIndex":menuIndex,"menuData":menuData});
	parentObj.after(menuHtml);
}

//删除主菜单
function delParentMenu(menuIndex)
{
	$("tr[name='parent"+menuIndex+"']").remove();
	$("tr[name='child"+menuIndex+"']").remove();
}

//删除子菜单
function delChildMenu(selfObj)
{
	$(selfObj).parent().parent().remove();
}
</script>
		</div>
	</div>

	<script type='text/javascript'>
	//隔行换色
	$(".list_table tr:nth-child(even)").addClass('even');
	$(".list_table tr").hover(
		function () {
			$(this).addClass("sel");
		},
		function () {
			$(this).removeClass("sel");
		}
	);

	//后台菜单创建
	<?php $menu = new Menu($this->admin);?>
	var data = <?php echo $menu->submenu();?>;
	var current = '<?php echo IUrl::getUri();?>';
	initMenu(data,current);
	</script>
</body>
</html>
