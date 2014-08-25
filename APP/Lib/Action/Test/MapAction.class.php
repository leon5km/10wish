<?php

class MapAction extends Action{
	public function index(){
		echo "This is Map index.";
	}
	
	public function route(){
		/*
		 * 读取文件
		 */
		$json = file_get_contents("./Data/Upload/gpsTrack.txt");
		
		/*
		 * 解析JSON字符串
		 */
		/*
		$json = '
{"points":[{"locType":161,"longitude":113.261248,"locTime":"2014-08-12 20:18:15","latitude":23.13765,"speed":0,"route_id":3},{"locType":161,"longitude":113.261228,"locTime":"2014-08-12 20:18:37","latitude":23.13766,"speed":0,"route_id":4},{"locType":161,"longitude":113.26122,"locTime":"2014-08-12 20:18:47","latitude":23.137683,"speed":0,"route_id":4},{"locType":161,"longitude":113.261204,"locTime":"2014-08-12 20:18:57","latitude":23.137754,"speed":0,"route_id":4},{"locType":161,"longitude":113.261192,"locTime":"2014-08-12 20:19:07","latitude":23.137698,"speed":0,"route_id":4},{"locType":161,"longitude":113.261229,"locTime":"2014-08-12 20:19:16","latitude":23.137759,"speed":0,"route_id":4},{"locType":161,"longitude":113.261229,"locTime":"2014-08-12 20:19:16","latitude":23.137759,"speed":0,"route_id":4},{"locType":161,"longitude":113.261229,"locTime":"2014-08-12 20:19:16","latitude":23.137759,"speed":0,"route_id":4},{"locType":161,"longitude":113.261229,"locTime":"2014-08-12 20:19:16","latitude":23.137759,"speed":0,"route_id":4},{"locType":161,"longitude":113.261229,"locTime":"2014-08-12 20:19:16","latitude":23.137759,"speed":0,"route_id":4},{"locType":161,"longitude":113.261124,"locTime":"2014-08-12 20:20:07","latitude":23.137715,"speed":0,"route_id":4},{"locType":161,"longitude":113.261124,"locTime":"2014-08-12 20:20:07","latitude":23.137715,"speed":0,"route_id":4},{"locType":161,"longitude":113.261124,"locTime":"2014-08-12 20:20:07","latitude":23.137715,"speed":0,"route_id":4},{"locType":161,"longitude":113.261226,"locTime":"2014-08-12 20:20:37","latitude":23.137685,"speed":0,"route_id":4},{"locType":161,"longitude":113.261226,"locTime":"2014-08-12 20:20:37","latitude":23.137685,"speed":0,"route_id":4},{"locType":161,"longitude":113.261226,"locTime":"2014-08-12 20:20:37","latitude":23.137685,"speed":0,"route_id":4},{"locType":161,"longitude":113.261246,"locTime":"2014-08-12 20:21:07","latitude":23.137691,"speed":0,"route_id":4},{"locType":161,"longitude":113.261246,"locTime":"2014-08-12 20:21:07","latitude":23.137691,"speed":0,"route_id":4},{"locType":161,"longitude":113.261246,"locTime":"2014-08-12 20:21:07","latitude":23.137691,"speed":0,"route_id":4},{"locType":161,"longitude":113.261246,"locTime":"2014-08-12 20:21:07","latitude":23.137691,"speed":0,"route_id":4},{"locType":161,"longitude":113.26122,"locTime":"2014-08-12 20:21:47","latitude":23.137712,"speed":0,"route_id":4},{"locType":161,"longitude":113.26122,"locTime":"2014-08-12 20:21:47","latitude":23.137712,"speed":0,"route_id":4},{"locType":161,"longitude":113.26122,"locTime":"2014-08-12 20:21:47","latitude":23.137712,"speed":0,"route_id":4},{"locType":161,"longitude":113.26122,"locTime":"2014-08-12 20:21:47","latitude":23.137712,"speed":0,"route_id":4},{"locType":161,"longitude":113.26122,"locTime":"2014-08-12 20:21:47","latitude":23.137712,"speed":0,"route_id":4}]}
				';
		*/
		$content = json_decode($json,true);
		
		/*
		 * 输出对象数组到模板的JS变量中
		 */
		/*
		$mapPoints = array(
				array(114.00100, 22.550000), 
				array(114.00130, 22.550000),
				array(114.00160, 22.550000), 
				array(114.00200, 22.550000),
				array(114.00300, 22.550500), 
				array(114.00400, 22.550000),
				array(114.00500, 22.550000), 
				array(114.00505, 22.549800),
				array(114.00510, 22.550000), 
				array(114.00515, 22.550000),
				array(114.00525, 22.550400), 
				array(114.00537, 22.549500)
		);
		*/
		$mapPoints = $content['points'];
		
		$pointsJsTxt = "[\n";
		foreach ($mapPoints as $mapPoint){
			$y = $mapPoint['latitude'];
			$x = $mapPoint['longitude'];
			$pointsJsTxt = $pointsJsTxt."new BMap.Point(".$x.",".$y."),\n";
		}
		$pointsJsTxt = $pointsJsTxt."]";
		
		$this->assign("pointsJsTxt",$pointsJsTxt);
		
		$this->display('route');
		
	}
	
	
}
?>