// console.log("Hello ES6!");

// const myArray = [3, 2, 7, 11, 8];

// let mapArray = myArray.map((x) => {
// 	return x * 2;
// });

// let redArray = mapArray.reduce((sum, x) => {
// 	return sum + x;
// }, 0);

// console.log(myArray);
// console.log('-------------');
// console.log(mapArray);
// console.log('-------------');
// console.log(redArray);

// var w = window,
//     d = document,
//     e = d.documentElement,
//     g = d.getElementsByTagName('body')[0],
//     x = w.innerWidth || e.clientWidth || g.clientWidth,
//     y = w.innerHeight|| e.clientHeight|| g.clientHeight;
// console.log(x + ' by ' + y);

// var header = angular.element(document).find('header');
// header.css('height', y + 'px');

var app = angular.module('bikeBytesApp', []);

app.factory('dataFeed', ['$http', function($http) {
	function getFeed() {
		// return $http.get('https://docs.google.com/spreadsheets/d/1a4LB1LTsIxV5vGZDo2-mIHak6bnTbeiR6AQE1VQx0-M/pub?gid=0&single=true&output=csv');
		// return $http.get('https://spreadsheets.google.com/feeds/list/1a4LB1LTsIxV5vGZDo2-mIHak6bnTbeiR6AQE1VQx0-M/1/public/basic?alt=json');
		return $http.get('https://spreadsheets.google.com/feeds/list/1a4LB1LTsIxV5vGZDo2-mIHak6bnTbeiR6AQE1VQx0-M/od6/public/basic?hl=en_US&alt=json');
	};

	function getReadings() {
		// return $http.get('https://docs.google.com/spreadsheets/d/18ztt6VtZrHBtUXzSVWOxZ_nqRntDJuHKv1lNF_W8ePw/pubhtml?gid=0&single=true');
		return $http.get('https://spreadsheets.google.com/feeds/list/18ztt6VtZrHBtUXzSVWOxZ_nqRntDJuHKv1lNF_W8ePw/od6/public/basic?hl=en_US&alt=json');
	};

	return {
		getFeed: getFeed(),
		getReadings: getReadings()
	};
}]);

app.controller('bikeBytes', ['$scope', '$http', 'dataFeed', function($scope, $http, dataFeed) {

	dataFeed.getFeed.then(
		function success(response) {
			// console.log(response.data.feed.entry[0].content.$t);
			// console.log(response.data.feed.entry[1].content.$t);
			// console.log(response.data.feed.entry[2].content.$t);
			// console.log(response.data.feed.entry.length);

			var pushups = response.data.feed.entry[0].content.$t.split(': ');
			$scope.pushups = pushups[1];
			var book = response.data.feed.entry[1].content.$t.split(': ');
			$scope.book = book[1];
			var parkrunpb = response.data.feed.entry[2].content.$t.split(': ');
			$scope.parkrunpb = parkrunpb[1];

			// var items = [];
			// for (var i = 0; i <= response.data.feed.entry.length; i++) {
			// 	var item = response.data.feed.entry[i].content.$t;
			// 	item = item.split(': ');
			// 	console.log(item[1]);
			// 	items.push(item[1]);
			// }
			// console.log('my array: ' + items);
		},
		function error(response) {
			console.log(response);
		}
	);

	dataFeed.getReadings.then(
		function success(response) {
			var count = response.data.feed.entry.length;
			$scope.readingsCount = count;
			var latest = [];
			for (var i = (count - 3); i < count; i++) {
				var reading = response.data.feed.entry[i].content.$t.split(', ');
				var readingTitle = reading[2].split(': ');
				readingTitle = readingTitle[1];
				var readingLink = reading[3].split(': ');
				readingLink = readingLink[1];
				var readObj = {
					title: readingTitle,
					link: readingLink
				}
				latest.unshift(readObj);
			}
			$scope.readings = latest;
		},
		function error(response) {
			console.log(response);
		}
	);

}]);
