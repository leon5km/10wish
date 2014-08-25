<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<h3>一、登录统计</h3>
<table>
	<thead>
		<th>区域</th>
		<th>用户数</th>
		<th>登录用户数</th>
		<th>登录次数</th>
	</thead>
	<tbody>
		<?php if(is_array($data1)): foreach($data1 as $key=>$v1): ?><tr>
			<td><?php echo ($v1["name"]); ?></td>
			<td><?php echo ($v1["yhs"]); ?></td>
			<td><?php echo ($v1["dlyhs"]); ?></td>
			<td><?php echo ($v1["dlcs"]); ?></td>
		</tr><?php endforeach; endif; ?>
	</tbody>
</table>
<h3>二、公告统计</h3>
<table>
	<thead>
		<tr>
        	<th>区域</th>
        	<th>新增公告数量</th>
        	<th>发布公告用户数</th>
		</tr>
	</thead>
	<tbody>
		<?php if(is_array($data2)): foreach($data2 as $key=>$v2): ?><tr>
			<td><?php echo ($v2["name"]); ?></td>
			<td><?php echo ($v2["noticeCount"]); ?></td>
			<td><?php echo ($v2["userCount"]); ?></td>
		</tr><?php endforeach; endif; ?>
	</tbody>
</table>
<h3>三、任务统计</h3>
<table>
	<thead>
		<th>区域</th>
		<th>新增任务数</th>
		<th>新增任务农技管理员数据</th>
		<th>新增任务农技员数</th>
	</thead>
	<tbody>
		<?php if(is_array($data3)): foreach($data3 as $key=>$v3): ?><tr>
			<td><?php echo ($v3["name"]); ?></td>
			<td><?php echo ($v3["a"]); ?></td>
			<td><?php echo ($v3["b"]); ?></td>
			<td><?php echo ($v3["c"]); ?></td>
		</tr><?php endforeach; endif; ?>
	</tbody>
</table>
<h3>四、日志统计</h3>
<table>
	<thead>
		<th>区域</th>
		<th>新增日志数</th>
		<th>发布日志用户数</th>
		<th>新增文字条数</th>
		<th>新增图片数</th>
		<th>新增音频数</th>
	</thead>
	<tbody>
		<?php if(is_array($data4)): foreach($data4 as $key=>$v4): ?><tr>
			<td><?php echo ($v4["name"]); ?></td>
			<td><?php echo ($v4["a"]); ?></td>
			<td><?php echo ($v4["b"]); ?></td>
			<td><?php echo ($v4["c"]); ?></td>
			<td><?php echo ($v4["d"]); ?></td>
			<td><?php echo ($v4["e"]); ?></td>
		</tr><?php endforeach; endif; ?>
	</tbody>
</table>
<h3>五、田园相册统计</h3>
<table>
	<thead>
		<th>区域</th>
		<th>新增照片数</th>
		<th>发布照片用户数</th>
		<th>点赞数</th>
		<th>评论数</th>
	</thead>
	<tbody>
		<?php if(is_array($data5)): foreach($data5 as $key=>$v5): ?><tr>
			<td><?php echo ($v5["name"]); ?></td>
			<td><?php echo ($v5["a"]); ?></td>
			<td><?php echo ($v5["b"]); ?></td>
			<td><?php echo ($v5["c"]); ?></td>
			<td><?php echo ($v5["d"]); ?></td>
		</tr><?php endforeach; endif; ?>
	</tbody>
</table>
<h3>六、至今未登录的用户</h3>
<table>
	<thead>
		<th>用户名</th>
		<th>地区</th>
		<th>部门</th>
		<th>年龄</th>
	</thead>
	<tbody>
		<?php if(is_array($data6)): foreach($data6 as $key=>$v6): ?><tr>
			<td><?php echo ($v6["a"]); ?></td>
			<td><?php echo ($v6["b"]); ?></td>
			<td><?php echo ($v6["c"]); ?></td>
			<td><?php echo ($v6["d"]); ?></td>
		</tr><?php endforeach; endif; ?>
	</tbody>
</table>

<h3>七、活跃用户排行</h3>
<?php if(is_array($data73)): $i = 0; $__LIST__ = $data73;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><table>
	<thead>
		<tr>
			<th><?php echo ($key); ?></th>
		</tr>
		<tr>
			<th>用户名</th>
			<th>发布日志数量</th>
			<th>登录次数</th>
		</tr>
	</thead>
	<tbody>
		<?php if(is_array($vo)): foreach($vo as $key=>$v73): ?><tr>
			<td><?php echo ($v73["real_name"]); ?></td>
			<td><?php echo ($v73["worklogCount"]); ?></td>
			<td><?php echo ($v73["logCount"]); ?></td>
		</tr><?php endforeach; endif; ?>
	</tbody>
</table><?php endforeach; endif; else: echo "" ;endif; ?>

<!-- 
<h3>七、活跃用户排行</h3>
<table>
	<thead>
		<tr>
			<th>固镇县</th>
		</tr>
		<tr>
			<th>用户名</th>
			<th>发布日志数量</th>
			<th>登录次数</th>
		</tr>
	</thead>
	<tbody>
		<?php if(is_array($data7)): foreach($data7 as $key=>$v7): ?><tr>
			<td><?php echo ($v7["real_name"]); ?></td>
			<td><?php echo ($v7["worklogCount"]); ?></td>
			<td><?php echo ($v7["logCount"]); ?></td>
		</tr><?php endforeach; endif; ?>
	</tbody>
</table>
<table>
	<thead>
		<tr>
			<th>怀远县</th>
		</tr>
		<tr>
			<th>用户名</th>
			<th>发布日志数量</th>
			<th>登录次数</th>
		</tr>
	</thead>
	<tbody>
		<?php if(is_array($data8)): foreach($data8 as $key=>$v8): ?><tr>
			<td><?php echo ($v8["real_name"]); ?></td>
			<td><?php echo ($v8["worklogCount"]); ?></td>
			<td><?php echo ($v8["logCount"]); ?></td>
		</tr><?php endforeach; endif; ?>
	</tbody>
</table>
<table>
	<thead>
		<tr>
			<th>五河县</th>
		</tr>
		<tr>
			<th>用户名</th>
			<th>发布日志数量</th>
			<th>登录次数</th>
		</tr>
	</thead>
	<tbody>
		<?php if(is_array($data9)): foreach($data9 as $key=>$v9): ?><tr>
			<td><?php echo ($v9["real_name"]); ?></td>
			<td><?php echo ($v9["worklogCount"]); ?></td>
			<td><?php echo ($v9["logCount"]); ?></td>
		</tr><?php endforeach; endif; ?>
	</tbody>
</table>


<table>
	<thead>
		<tr>
			<th>泰和县</th>
		</tr>
		<tr>
			<th>用户名</th>
			<th>发布日志数量</th>
			<th>登录次数</th>
		</tr>
	</thead>
	<tbody>
		<?php if(is_array($data10)): foreach($data10 as $key=>$v10): ?><tr>
			<td><?php echo ($v10["real_name"]); ?></td>
			<td><?php echo ($v10["worklogCount"]); ?></td>
			<td><?php echo ($v10["logCount"]); ?></td>
		</tr><?php endforeach; endif; ?>
	</tbody>
</table>
 -->
<h3>八、分数段汇总日志数</h3>
<table>
	<thead>
		<tr>
			<th>6：00 ~ 9：00</th>
			<th>9：00 ~ 12：00</th>
			<th>12：00 ~15：00</th>
			<th>15：00 ~18：00</th>
			<th>18：00 ~ 第二天6:00</th>
		</tr>
	</thead>
	<tbody>
		<?php if(is_array($data12)): foreach($data12 as $key=>$v12): ?><tr><td><?php echo ($v12["@sixToNight"]); ?></td>
			<td><?php echo ($v12["@nightTo12"]); ?></td>
			<td><?php echo ($v12["@twelveTofiften"]); ?></td>
			<td><?php echo ($v12["@fiftenToEighten"]); ?></td>
			<td><?php echo ($v12["@eightenTo24+@zeroToSix"]); ?></td>
		</tr><?php endforeach; endif; ?>
	</tbody>
</table>
<h3>九、本周累计已登录的用户数量</h3>
<table>
	<thead>
		<tr>
			<th>地区</th>
			<th>日志数量</th>
		</tr>
	</thead>
	<tbody>
		<?php if(is_array($data11)): foreach($data11 as $key=>$v11): ?><tr>
			<td><?php echo ($v11["name"]); ?></td>
			<td><?php echo ($v11["b"]); ?></td>
		</tr><?php endforeach; endif; ?>
	</tbody>
</table>

<!-- 
 -->
</body>
</html>