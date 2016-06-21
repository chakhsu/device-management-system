<?php 
require_once '../include.php';
checkLogined();
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>实验室仪器设备借调管理系统 - 广东石油化工学院</title>
    <link rel="stylesheet" type="text/css" href="../public/styles/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="../public/styles/css/main.css"/>
</head>
<body>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo"><img src="../public/images/logo_index.png"></h1>
        </div>
        <div class="top-info-wrap">实验室仪器设备借调管理系统</div>
    </div>
</div>
<div class="container clearfix">
    <div class="sidebar-wrap">
        <div class="sidebar-title">
            <h1>菜单</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <a href="#"><i class="icon-font">&#xe008;</i>设备管理</a>
                    <ul class="sub-menu">
                        <li><a href="addDev.php" target="mainFrame">添加设备</a></li>
                        <li><a href="listDev.php" target="mainFrame">设备列表</a></li>
                        <li><a href="addCate.php" target="mainFrame">添加分类</a></li>
                        <li><a href="listCate.php" target="mainFrame">设备分类</a></li>
                        <li><a href="listDevImages.php" target="mainFrame">图片列表</a></li>
                    </ul>
                </li>
				<li>
                    <a href="#"><i class="icon-font">&#xe006;</i>实验室管理</a>
                    <ul class="sub-menu">
                        <li><a href="addLab.php" target="mainFrame">添加实验室</a></li>
                        <li><a href="listLab.php" target="mainFrame">实验室列表</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>用户管理</a>
                    <ul class="sub-menu">
						<li><a href="addRole.php" target="mainFrame">添加身份</a></li>
                        <li><a href="listRole.php" target="mainFrame">身份列表</a></li>
                        <li><a href="addUser.php" target="mainFrame">添加用户</a></li>
                        <li><a href="listUser.php" target="mainFrame">用户列表</a></li>
						<li><a href="addAdmin.php" target="mainFrame">添加管理员</a></li>
						<li><a href="listAdmin.php" target="mainFrame">管理员列表</a></li>
                    </ul>
                </li>
				<li>
                    <a href="#"><i class="icon-font">&#xe005;</i>借还管理</a>
                    <ul class="sub-menu">
                        <li><a href="listRecord.php" target="mainFrame">借用申请</a></li>
                        <li><a href="RecordTable.php" target="mainFrame">借还记录列表</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!--/sidebar-->
    <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><span>
			<b>欢迎您
            <?php 
			if(isset($_SESSION['adminNickName'])){
				echo $_SESSION['adminNickName'];
			}elseif(isset($_COOKIE['adminNickName'])){
				echo $_COOKIE['adminNickName'];
			}
            ?>
            </b>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="icon icon_i" onclick="myrefresh()">首页</a><a href="profile.php" target="mainFrame" class="icon icon_p">个人资料</a><a href="#" class="icon icon_n" onclick="mainFrame.window.location.reload()">刷新</a><a href="doAdminAction.php?act=logout" class="icon icon_e">退出</a>
        </span></div>
        </div>
        <div class="result-wrap">
		<iframe name="mainFrame" src="listDev.php" id="mainFrame" frameborder="0" scrolling="no" width="100%"></iframe>
		<script type="text/javascript">
		var browserVersion = window.navigator.userAgent.toUpperCase();
		var isOpera = false, isFireFox = false, isChrome = false, isSafari = false, isIE = false;
		function reinitIframe(iframeId, minHeight) {
			try {
				var iframe = document.getElementById(iframeId);
				var bHeight = 0;
				if (isChrome == false && isSafari == false)
					bHeight = iframe.contentWindow.document.body.scrollHeight;

				var dHeight = 0;
				if (isFireFox == true)
					dHeight = iframe.contentWindow.document.documentElement.offsetHeight + 2;
				else if (isIE == false && isOpera == false)
					dHeight = iframe.contentWindow.document.documentElement.scrollHeight;
				else if (isIE == true && ! -[1, ] == false) { }
				else
					bHeight += 3;

				var height = Math.max(bHeight, dHeight);
				if (height < minHeight) height = minHeight;
				iframe.style.height = height + "px";
			} catch (ex) { }
		}
		function startInit(iframeId, minHeight) {
			isOpera = browserVersion.indexOf("OPERA") > -1 ? true : false;
			isFireFox = browserVersion.indexOf("FIREFOX") > -1 ? true : false;
			isChrome = browserVersion.indexOf("CHROME") > -1 ? true : false;
			isSafari = browserVersion.indexOf("SAFARI") > -1 ? true : false;
			if (!!window.ActiveXObject || "ActiveXObject" in window)
				isIE = true;
			window.setInterval("reinitIframe('" + iframeId + "'," + minHeight + ")", 100);
		} 
		startInit('mainFrame', 560);
		
		function myrefresh(){
			   window.location.reload();
		}
		</script>
        </div>
    </div>
    <!--/main-->
</div>
<div class="footer clearfix">
© 2016 广东石油化工学院 - 计算机与电子信息学院
</div>
</body>
</html>