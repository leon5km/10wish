<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Track</title>
<style type="text/css">
	html{height:100%}
	body{height:100%;margin:0px;padding:0px}
	#controller{width:100%; border-bottom:3px outset; height:30px; filter:alpha(Opacity=100); -moz-opacity:1; opacity:1; z-index:10000; background-color:lightblue;}
	#container{height:100%}
</style>  
<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.5&ak=D2b4558ebed15e52558c6a766c35ee73"></script>
<script type="text/javascript">
//获取所有点的坐标
/*
var points = [
	new BMap.Point(114.00100, 22.550000), new BMap.Point(114.00130, 22.550000),
	new BMap.Point(114.00160, 22.550000), new BMap.Point(114.00200, 22.550000),
	new BMap.Point(114.00300, 22.550500), new BMap.Point(114.00400, 22.550000),
	new BMap.Point(114.00500, 22.550000), new BMap.Point(114.00505, 22.549800),
	new BMap.Point(114.00510, 22.550000), new BMap.Point(114.00515, 22.550000),
	new BMap.Point(114.00525, 22.550400), new BMap.Point(114.00537, 22.549500),
];

*/
var points = <?php echo ($pointsJsTxt); ?>;

var centerPoint;

function init() {

	//初始化地图,选取第一个点为起始点
	map = new BMap.Map("container");
	map.centerAndZoom(points[0], 15);
	map.enableScrollWheelZoom();
	map.addControl(new BMap.NavigationControl());
	map.addControl(new BMap.ScaleControl());
    map.addControl(new BMap.OverviewMapControl({isOpen: true}));

    map.addOverlay(new BMap.Polyline(points, {strokeColor: "black", strokeWeight: 5, strokeOpacity: 1}));

}

</script>
</head>  
   
<body onload="init();">  
	<div id="container"></div>
</body>  
</html>