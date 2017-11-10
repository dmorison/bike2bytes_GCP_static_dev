console.log("Hello ES6!");

const myArray = [3, 2, 7, 11, 8];

let mapArray = myArray.map((x) => {
	return x * 2;
});

let redArray = mapArray.reduce((sum, x) => {
	return sum + x;
}, 0);

console.log(myArray);
console.log('-------------');
console.log(mapArray);
console.log('-------------');
console.log(redArray);