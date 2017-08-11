<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="public/css/bootstrap.min.css" rel="stylesheet" />
    <title></title>
    <link href="public/css/Common11.css" rel="stylesheet" />
    <link href="public/css/Index11.css" rel="stylesheet" />
</head>
<body>
    <div class="header">

        <img class="logo" src="public/images/logo.png" />
        <label class="logo-title">通用后台模板</label>
        <ul class="inline">
            <li>
                <img src="public/images/32/client.png" />&nbsp;&nbsp;欢迎您,Admin
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle mymsg" data-toggle="dropdown" href="#"><img src="public/images/32/166.png" />&nbsp;&nbsp;修改个人信息<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="?m=manage&a=index&num=4">修改密码</a></li>
                </ul>

            </li>
            <li>
                <img src="public/images/32/200.png" />&nbsp;&nbsp;<a class="loginout" href="index.php">返回</a>
            </li>

        </ul>


    </div>


    <div class="nav">

        <ul class="breadcrumb">
            <li>
                <img src="public/images/32/5025_networking.png" />
            </li>
            <li><a href="index.php">首页</a> <span class="divider">>></span></li>
            <li class="active"></li>
        </ul>
    </div>



    <div class="container-fluid content">
        <div class="row-fluid">
            <div class="span2 content-left">
                <div class="accordion">
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                                <img class="left-icon" src="public/images/32/5026_settings.png" /><span class="left-title">系统设置</span>
                            </a>
                        </div>
                        <div id="collapseOne" class="accordion-body collapse in">
                            <div class="accordion-inner">
                                <img class="left-icon-child" src="public/images/32/4962_sitemap.png" /><span class="left-body"> <a href="index.php?m=manage&a=index&num=1">管理员设置</a></span>
                            </div>
                            <div class="accordion-inner">
                                <img class="left-icon-child" src="public/images/32/4957_customers.png" /><span class="left-body"> <a href="index.php?m=manage&a=index&num=2">博客管理</a></span>

                            </div>
                            <div class="accordion-inner">
                                <img class="left-icon-child" src="public/images/32/4992_user.png" /><span class="left-body"> <a href="index.php?m=manage&a=index&num=3">回帖管理</a></span>

                            </div>
                            <div class="accordion-inner">
                                <img class="left-icon-child" src="public/images/32/612.png" /><span class="left-body"> 待完善</span>

                            </div>
                            <div class="accordion-inner">
                                <img class="left-icon-child" src="public/images/32/8.png" /><span class="left-body"> 敬请期待</span>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
			<?php if($num == 1): ?>
            <div class="span10 content-right">
			
			<div style="text-align:center;color:red"><b>管理员信息</b></div>
				<div style="margin-left:15px;">
               <table width="1060" border="1"  >
						<tr align="center" >
							<td><b>id</b></td>
							<td><b>管理员</b></td>
							<td><b>创建时间</b></td>
						</tr>
						<?php foreach($data as $key => $value) :?>
						<tr align="center" style="color:#aaa;">
							<td><?=$key + 1;?></td>
							<td><?=$value['username'];?></td>
							<td><?=date('Y-m-d',$value['createtime']);?></td>
						</tr>
						<?php endforeach;?>
			   </table>
				</div>
			   <br />
			   <div style="background:#ccc;font-weight:bold;">&nbsp;&nbsp;添加管理员</div>
			   <br />
			   <form action="index.php?m=User&a=insert" method="post" >
					&nbsp;用&nbsp;户&nbsp;&nbsp;名：<input type="text" name="username" />*<br />
					
					&nbsp;密 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码：<input type="password" name="password" />*<br/>
					&nbsp;确认密码：<input type="password" name="repassword" />*<br/>
					&nbsp;验&nbsp;证&nbsp;&nbsp;码：<input type="text" name="verify" />*&nbsp;&nbsp;&nbsp;<img src="index.php?m=User&a=verify" onclick="this.src='index.php?m=user&a=verify&r='+Math.random()" /><br/>
					<input type="submit" value="新增" style="border-radius:8px;"/>
			   </form>
            </div>
			<?php endif;?>
			<!--发表博客管理-->
			<?php if($num == 2): ?>
				<?php if($del == 0): ?>
            <div class="span10 content-right" >
			
			<div style="text-align:center;color:red"><b>个人博客信息</b>
				<div style="float:right;"><a href="index.php?m=manage&a=index&num=2&del=1">博客回收站</a></div>
			</div>
			<div style="margin-left:30px;">
               <table width="1060" border="1"  >
						<tr align="center" >
							<td><b>id</b></td>
							<td><b>标题</b></td>
							<td><b>创建时间</b></td>
							<td><b>管理</b></td>
						</tr>
							
							<?php foreach($atdata as $key => $value) :?>
							<tr align="center" style="color:#aaa;">
								<td><?=$key + 1;?></td>
								<td><?=$value['title'];?></td>
								<td><?=date('Y-m-d',$value['createtime']);?></td>
								<td>
									<a href="index.php?m=article&a=del&aid=<?=$value['aid'];?>">删除</a>
								</td>
							</tr>
							<?php endforeach;?>
						
						
			   </table>
			</div>
			   <div style="float:right;">
				<a href="<?=$render['first'];?>" style="color:red;padding-right:20px;">首页</a>
				<a href="<?=$render['prev'];?>" style="color:blue;padding-right:20px;">上一页</a>
				<a href="<?=$render['next'];?>" style="color:pink;padding-right:20px;">下一页</a>
				<a href="<?=$render['end'];?>" style="color:green;padding-right:20px;">尾页</a>
				</div>
			   
            </div>
			<?php endif;?>	
			<?php if($del == 1): ?>
			<div class="span10 content-right">
			
			<div style="text-align:center;color:red"><b>回收博客信息</b>
				<div style="float:right;"><a href="index.php?m=manage&a=index&num=2" style="margin-right:32px;">返回</a></div>
			</div>
				<div style="margin-left:30px;">
               <table width="1060" border="1"  >
						<tr align="center" >
							<td><b>id</b></td>
							<td><b>标题</b></td>
							<td><b>创建时间</b></td>
							<td><b>管理</b></td>
						</tr>
							<?php foreach($atdata1 as $key => $value) :?>
							<tr align="center" style="color:#aaa;">
								<td><?=$key + 1;?></td>
								<td><?=$value['title'];?></td>
								<td><?=date('Y-m-d',$value['createtime']);?></td>
								<td>
									<a href="index.php?m=article&a=huifu&aid=<?=$value['aid'];?>">恢复</a>
								</td>
							</tr>
							<?php endforeach;?>
							 </table>
					</div>
			   <div style="float:right;">
				<a href="<?=$render['first'];?>" style="color:red;padding-right:20px;">首页</a>
				<a href="<?=$render['prev'];?>" style="color:blue;padding-right:20px;">上一页</a>
				<a href="<?=$render['next'];?>" style="color:pink;padding-right:20px;">下一页</a>
				<a href="<?=$render['end'];?>" style="color:green;padding-right:20px;">尾页</a>
				</div>
			   
            </div>
						<?php endif;?>
			<?php endif;?>
			
			<!--回帖管理-->
			<?php if($num == 3): ?>
				<?php if($del == 0): ?>
            <div class="span10 content-right">
			
			<div style="text-align:center;color:red"><b>游客回帖信息</b>
				<div style="float:right;"><a href="index.php?m=manage&a=index&num=3&del=1" style="margin-right:13px;">回帖回收站</a></div>
			</div>
				<div style="margin-left:30px;">
               <table width="1060" border="1"  >
						<tr align="center" >
							<td><b>id</b></td>
							<td><b>上级id</b></td>
							<td><b>标题</b></td>
							<td><b>创建时间</b></td>
							<td><b>管理</b></td>
						</tr>
							
							<?php foreach($redata as $key => $value) :?>
							<tr align="center" style="color:#aaa;">
								<td><?=$key + 1;?></td>
								<td><?=$value['rid'];?></td>
								<td><?=$value['article'];?></td>
								<td><?=date('Y-m-d',$value['createtime']);?></td>
								<td>
									<a href="index.php?m=Article&a=delreplay&rid=<?=$value['rid'];?>">删除</a>
								</td>
							</tr>
							<?php endforeach;?>
						
						
			   </table>
				</div>
			   <div style="float:right;">
				<a href="<?=$render['first'];?>" style="color:red;padding-right:20px;">首页</a>
				<a href="<?=$render['prev'];?>" style="color:blue;padding-right:20px;">上一页</a>
				<a href="<?=$render['next'];?>" style="color:pink;padding-right:20px;">下一页</a>
				<a href="<?=$render['end'];?>" style="color:green;padding-right:20px;">尾页</a>
				</div>
			   
            </div>
			<?php endif;?>	
			<?php if($del == 1): ?>
			<div class="span10 content-right">
			
			<div style="text-align:center;color:red"><b>回收回帖信息</b>
				<div style="float:right;"><a href="index.php?m=manage&a=index&num=3" style="margin-right:32px;">返回</a></div>
			</div>
               <table width="1060" border="1"  >
						<tr align="center" >
							<td><b>id</b></td>
							<td><b>上级id</b></td>
							<td><b>标题</b></td>
							<td><b>创建时间</b></td>
							<td><b>管理</b></td>
						</tr>
							<?php foreach($redata1 as $key => $value) :?>
							<tr align="center" style="color:#aaa;">
								<td><?=$key + 1;?></td>
								<td><?=$value['rid'];?></td>
								<td><?=$value['article'];?></td>
								<td><?=date('Y-m-d',$value['createtime']);?></td>
								<td>
									<a href="index.php?m=article&a=replayhuifu&rid=<?=$value['rid'];?>">恢复</a>
								</td>
							</tr>
							<?php endforeach;?>
							 </table>
			   <div style="float:right;">
				<a href="<?=$render['first'];?>" style="color:red;padding-right:20px;">首页</a>
				<a href="<?=$render['prev'];?>" style="color:blue;padding-right:20px;">上一页</a>
				<a href="<?=$render['next'];?>" style="color:pink;padding-right:20px;">下一页</a>
				<a href="<?=$render['end'];?>" style="color:green;padding-right:20px;">尾页</a>
				</div>
			   
            </div>
				<?php endif;?>
			<?php endif;?>
			
			<?php if($num == 4): ?>
				<form action="index.php?m=User&a=changePwd" method="post" >
				
					管理账号：<input type="text" name="username" /> <br />
					原来密码：<input type="password"  name="password" /> <br />
					新的密码：<input type="password"  name="newpassword" /> <br />
					确认密码：<input type="password"  name="repassword" /> <br />
					<input type="submit"  value="修改" style="margin-left:70px;"/> <br />
				</form>
			
			<?php endif;?>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="foot"></div>
    <script src="public/js/jquery-1.9.1.min.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
    <script src="public/js/Index.js"></script>
	<div style="text-align:center;">
<p>源自:<a href="http://www.mycodes.net/" target="_blank">落叶秋凉</a></p>
</div>

</body>
</html>
