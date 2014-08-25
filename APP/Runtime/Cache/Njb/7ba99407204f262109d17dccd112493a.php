<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<h3>P1、用户分布情况</h3>
<table>
	<thead>
		<th>区域</th>
		<th>用户数</th>
		<!-- 
		<th>登录用户数</th>
		<th>登录次数</th>
		 -->
	</thead>
	<tbody>
		<?php if(is_array($data1)): foreach($data1 as $key=>$v1): ?><tr>
			<td><?php echo ($v1["name"]); ?></td>
			<td><?php echo ($v1["yhs"]); ?></td>
			<!-- 
			<td><?php echo ($v1["dlyhs"]); ?></td>
			<td><?php echo ($v1["dlcs"]); ?></td>
			 -->
		</tr><?php endforeach; endif; ?>
		<tr>
			<td>用户总数</td>
			<td></td>
		</tr>
	</tbody>
</table>
<h3>P2、登录次数统计</h3>
<h4>试点县登录人员数量统计</h4>
<h4>试点县登录人员占比分析</h4>
<h3>P3、登录频率统计</h3>
<h4>试点县登陆频次统计</h4>
<h4>试点县登陆人员平均登陆频次分析</h4>
<h3>P4、日志上报数量及使用频次分析</h3>
<h4>日志上报数量统计走向</h4>
<h4>日志上报人均使用频率分析</h4>
<h3>P5、日志上报使用人数分析</h3>
<h4>日志上报使用人数统计走向</h4>
<h4>日志上报功能使用人数占比</h4>
<h3>P6、田园相册数量及使用频次分析</h3>
<h4>田园相册上传相片数量</h4>
<h4>田园相册人均使用频率分析</h4>
<h3>P7、各县使用情况总结</h3>
<!-- 
 -->
</body>
</html>