iswapp.controller(''iswcon', function($scope, $http){
	$scope.paytest = 'https://stageserv.interswitchng.com/test_paydirect/pay ';
	$scope.paylive = 'https://webpay.interswitchng.com/paydirect/pay ';
	$scope.pdtid = 5084;
	$scope.salt = '35C10385218FF8E23CD3C6B6E95007AD3383EC93633E36CD236AE70A873F0B70FBD377632C50ADB57E15BBBDF30C45E4FDBBAE541A49029A1E6F8591BD008B68';
	$scope.payiid = 101;
	$scope.curr = 566;
	$scope.webpay = {};
	
});