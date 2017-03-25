<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="jquery/jquery.js"></script>
<script src="angular.js"></script>
<script src="angular.min.js"></script>
<link rel="stylesheet/less" type="text/css" href="css/style.less">
<script type="text/javascript" src="less.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body >
	<div id="Ad"><h1>Apraxia</h1></div><br>
	<div id="menuDiv">
		<a class="c" href="game.html">Play   </a>
		<a id="a2" class="c" href="#">High-Scores  </a>
		<a id="a3" class="c" href="#"> Help</a>
	</div>
<div id="toleft"></div>
	<div ng-app="myApp" ng-controller="myCtrl" id="hi"><ul>
  <li ng-repeat="x in g | orderBy:'-score' ">
    <p>{{cou()+') '+ x.name + '..............................' + x.score }}</p>
  </li>
</ul>
 </div>

	<div id="help">
		<p>Apraxia is a motor disorder caused by damage to the brain.</p>
		<p>When the wolf goes wild, your left will be your right,</p><br>
		<p>His bloody eyes' lights on, your down will go upon</p>
		<p>When rabbit's face is shown , his eyes will lead you on </p><br>
		<p>Your up will be his eyes, hurry or she dies! </p>
	</div>
<script>


var a=-204;
var b=false;
	$(function(){
	function runIt()
	 	{
		var x=(Math.random()*100)-50;
		var y=(Math.random()*100)-50;
		$("h1").animate({"marginLeft":a+x,"marginTop":y},20);
		$("h1").animate({"marginLeft":a,"marginTop":0},20);
		var x=Math.random()*100-50;
		var y=Math.random()*100-50;
		$("h1").animate({"marginLeft":a+x,"marginTop":y},20);
		$("h1").animate({"marginLeft":a,"marginTop":0},20);
		var x=Math.random()*100-50;
		var y=Math.random()*100-50;
		$("h1").animate({"marginLeft":a+x,"marginTop":y},20);
		$("h1").animate({"marginLeft":a,"marginTop":0},20);
	}
	runIt();
	setInterval(runIt, 1000);

	$("#a2").click(function(){
		if(b){
		$("#help").animate({"height":"1px"},1000);
		$("#help").hide(100);
			b=false;}
		$("#menuDiv").animate({"left":"-600px"},1000);
		$("#hi").animate({"left":"5%"},1000);
		$("#toleft").show(1000);

	});
	$("#toleft").click(function(){
		$("#menuDiv").animate({"left":"50%"},1000);
		$("#hi").animate({"left":"105%"},1000);
		$("#toleft").hide(1000);
	});

	$("#a3").click(function(){
		if(!b){
		$("#help").show(100);
		$("#help").animate({"height":"100px"},1000);
		b=true;}
		else{
		$("#help").animate({"height":"1px"},1000);
		$("#help").hide(100);
			b=false;}
	});

});</script>
<script>
var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope, $http){

	$scope.g;
	$scope.ll=0;
	$scope.cou=function(){
			$scope.ll+=1;
			return $scope.ll-($scope.g.length*10);
	};
	$http.get("users.php").success(function(response)
	{
		$scope.g=response.players;
		console.log($scope.g.length);
	});
	var z=0;
	var kinput=document.body;
	kinput.onkeydown  = handle;
	function handle(e){

		var f;
		$(function(){
			f=$(window).height();
		});
		f*=(-0.6);f+=10;
		var h=f/56;
		h*=-1;h+=0.5;
		if(e.keyCode==40){if(z<($scope.g.length/h)){
			$(function(){
					z++;
					$("ul").animate({"marginTop":(z*(f)+20)},500);
				});
		}}


			if(e.keyCode==38){if(z>0){
				$(function(){
						z--;
						$("ul").animate({"marginTop":(z*(f)+20)},500);
					});
			}}
	}
});
</script>
</body>
</html>
