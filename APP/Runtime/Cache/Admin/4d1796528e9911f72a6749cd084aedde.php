<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<table>
	<thead>
		<tr>
			<th>ID</th>
			<th>发布者</th>
			<th>内容</th>
			<th>发布时间</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
        <?php if(is_array($wish)): foreach($wish as $key=>$): ?><tr>
                        <td><?php echo ($v["id"]); ?></td>
                        <td><?php echo ($v["username"]); ?></td>
                        <td><?php echo ($v["content"]); ?></td>
                        <td><?php echo ($v["time"]); ?></td>
                        <td>删除</td>
                </tr><?php endforeach; endif; ?>
	</tbody>
</table>
</body>
</html>