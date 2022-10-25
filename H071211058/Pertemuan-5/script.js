let uang = 5000;
let sum = 0;
let cards = [];
let bet = 0;

document.getElementById("uang").innerHTML = "Your Money : Rp. " + uang;

function start() {
	bet = document.getElementById("bet").value;
	cards = [];

	document.getElementById("c1").innerHTML = "";
	document.getElementById("sum").innerHTML = "";
	document.getElementById("caption").innerHTML = "";
	if (bet === "") {
		alert("Set your bet first");
	} else if (bet == 0) {
		alert("Set your bet first");
	} else if (bet > uang) {
		alert("Your money is less than your bet");
	} else if (bet < 0) {
		alert("Bet must be > 0");
	} else {
		uang -= bet;
		document.getElementById("uang").innerHTML = "Your Money : Rp. " + uang;
		function randomIntFromInterval(min, max) {
			// min and max included
			return Math.floor(Math.random() * (max - min + 1) + min);
		}
		const c1 = randomIntFromInterval(1, 11);
		const c2 = randomIntFromInterval(1, 11);
		cards.push(c1);
		cards.push(c2);
		document.getElementById("c1").innerHTML = cards.join(" ");

		sum = c1 + c2;
		document.getElementById("sum").innerHTML = sum;
		document.getElementById("take").disabled = false;
		document.getElementById("start").innerText = "Play Again?";
	}
	document.getElementById("bet").value = "";
	cek();
}

document.getElementById("take").disabled = true;
function take() {
	if (sum < 21) {
		function randomIntFromInterval(min, max) {
			// min and max included
			return Math.floor(Math.random() * (max - min + 1) + min);
		}
		const c3 = randomIntFromInterval(1, 11);
		cards.push(c3);

		document.getElementById("c1").innerHTML = cards.join(" ");
		sum += c3;
		document.getElementById("sum").innerHTML = sum;
		cek();
	}
}

function cek() {
	if (sum === 21) {
		document.getElementById("caption").innerHTML = "You Got BlackJack!";
		uang += bet * 6;
		document.getElementById("uang").innerHTML = "Your Money : Rp. " + uang;
	} else if (sum > 21) {
		document.getElementById("caption").innerHTML = "You Lose!";
		setTimeout(() => {
			if (uang === 0) {
				alert("Your money = 0 Please Reset Your Money");
			}
		}, 1000);
	}
}

function reset() {
	location.reload();
}