<html>

	<head>
	
	</head>
	
	<body>
		<form action="index.php?m=article&a=del" method= "post" >
			<a href = "index.php?m=manage&a=index">返回</a><br/><br/>
			<table width=100%" border="0">
				<tr height="20%" height="20">
					<td ><b></b></td>
					<td ><b>ID</b></td>
					<td  width="50%"><b>标题</b></td>
					<td width="40%" style="height:20px;width:50px;overflow-y:hidden"><b>内容</b></td>
					<td width="40%"><b>发表时间</b></td>
				</tr>
			<?php foreach($articles as $value) :?>
				<tr height="20%" height="20">
					<td><input type="checkbox" name="del[]" value= "<?=$value['aid'];?>" /></td>
					<td ><?=$value['aid'];?></td>
					<td  width="50%"><?=$value['title'];?></td>
					<td width="40%" height="20" style="height:20px;overflow-y:hidden"><?=$value['article'];?></td>
					<td width="40%"><?=$value['createtime'];?></td>
				</tr>
			
			<?php endforeach;?>
			
			
			
			</table>
			<br />
			<input type="submit" value="删除" />
		</form>
		<br/>
		
		<a href="<?=$page['first'];?>">首页</a>
		<a href="<?=$page['prev'];?>">上一页</a>
		<a href="<?=$page['next'];?>">下一页</a>
		<a href="<?=$page['end'];?>">尾页</a>
	</body>

</html>