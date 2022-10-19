var images = ["./img/2_of_clubs.png",
"./img/3_of_clubs.png",
"./img/4_of_clubs.png",
"./img/5_of_clubs.png",
"./img/6_of_clubs.png",
"./img/7_of_clubs.png",
"./img/8_of_clubs.png",
"./img/9_of_clubs.png",
"./img/10_of_clubs.png",
"./img/jack_of_clubs.png",
"./img/queen_of_clubs.png",
"./img/king_of_clubs.png",
"./img/ace_of_clubs.png",
"./img/2_of_diamonds.png",
"./img/3_of_diamonds.png",
"./img/4_of_diamonds.png",
"./img/5_of_diamonds.png",
"./img/6_of_diamonds.png",
"./img/7_of_diamonds.png",
"./img/8_of_diamonds.png",
"./img/9_of_diamonds.png",
"./img/10_of_diamonds.png",
"./img/jack_of_diamonds.png",
"./img/queen_of_diamonds.png",
"./img/king_of_diamonds.png",
"./img/ace_of_diamonds.png",
"./img/2_of_hearts.png",
"./img/3_of_hearts.png",
"./img/4_of_hearts.png",
"./img/5_of_hearts.png",
"./img/6_of_hearts.png",
"./img/7_of_hearts.png",
"./img/8_of_hearts.png",
"./img/9_of_hearts.png",
"./img/10_of_hearts.png",
"./img/jack_of_hearts.png",
"./img/queen_of_hearts.png",
"./img/king_of_hearts.png",
"./img/ace_of_hearts.png",
"./img/2_of_spades.png",
"./img/3_of_spades.png",
"./img/4_of_spades.png",
"./img/5_of_spades.png",
"./img/6_of_spades.png",
"./img/7_of_spades.png",
"./img/8_of_spades.png",
"./img/9_of_spades.png",
"./img/10_of_spades.png",
"./img/jack_of_spades.png",
"./img/queen_of_spades.png",
"./img/king_of_spades.png",
"./img/ace_of_spades.png",];

function StartGame() {
    document.getElementById("winCondition").innerHTML = " ";
    if (document.getElementById("Money").innerHTML == 0) {
        alert("Uang anda habis, Mohon reset")
    } else if (parseInt(document.getElementById("taruhan").value) <= 0 || document.getElementById("taruhan").value == '') {
        alert("Nilai tidak boleh kosong atau kurang dari 0")
    } else if (parseInt(document.getElementById("Money").innerHTML) >= document.getElementById("taruhan").value) {
        document.getElementById("Nilai").innerHTML = 0;
        for (let index = 0; index < document.getElementById("card").childNodes.length;) {
            document.getElementById("card").removeChild(document.getElementById("card").firstChild)
        }
        getCard();
        getCard();
        document.getElementById("getCard").disabled = false;
        document.getElementById("taruhan").disabled = true;
        document.getElementById("StartGame").disabled = true;
    } else {
        alert("Uang anda tidak cukup")
    }
}

function getCard(){
    let number1 = RandomNumber(0, 12);
    let number2 = RandomNumber(0, 3);
    let number3 = number1 + (13 * number2);
    let img = document.createElement('img');
    img.width = "100";
    img.src = images[number3];
    document.getElementById("card").appendChild(img);
    nilaiAkhir(number1);
}

function RandomNumber(min, max) {
    return Math.round(Math.random() * (max - min) + min);
}

function nilaiAkhir(tambah) {
    let Nilai = document.getElementById("Nilai");
    if (tambah == 12) {
        if(document.getElementById("Nilai").innerHTML < 11) {
            tambah = 9;
        } else {
            tambah = -1;
        }
    } else if (tambah >= 9) {
        tambah = 8;
    }
    let nilaiStatic = Nilai.innerHTML;
    nilaiStatic = parseInt(nilaiStatic);
    Nilai.innerHTML = (tambah + 2) + nilaiStatic;
    if(Nilai.innerHTML > 21) {
        Lose();
    } else if (Nilai.innerHTML == 21) {
        Win();
    }
}

function gameOver() {
    document.getElementById("getCard").disabled = "disable";
    document.getElementById("StartGame").disabled = false;
    document.getElementById("StartGame").innerHTML = "Try Again?";
    document.getElementById("taruhan").disabled = false;
}
function Lose() {
    gameOver();
    document.getElementById("Money").innerHTML = document.getElementById("Money").innerHTML - document.getElementById("taruhan").value;
    document.getElementById("winCondition").innerHTML = "You Lose";
}
function Win() {
    gameOver();
    document.getElementById("Money").innerHTML = parseInt(document.getElementById("Money").innerHTML) + (document.getElementById("taruhan").value * 5);
    document.getElementById("winCondition").innerHTML = "You Win";
}
function resetMoney() {
    document.getElementById("Money").innerHTML = 5000;
    document.getElementById("winCondition").innerHTML = " ";
}