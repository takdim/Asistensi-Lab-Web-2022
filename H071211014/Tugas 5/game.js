var images = 
["3_of_clubs.png",
"4_of_clubs.png",
"5_of_clubs.png",
"6_of_clubs.png",
"7_of_clubs.png",
"8_of_clubs.png",
"9_of_clubs.png",
".10_of_clubs.png",
".jack_of_clubs.png",
".queen_of_clubs.png",
".king_of_clubs.png",
".ace_of_clubs.png",
"2_of_diamonds.png",
"3_of_diamonds.png",
"4_of_diamonds.png",
"5_of_diamonds.png",
"6_of_diamonds.png",
"7_of_diamonds.png",
"8_of_diamonds.png",
"9_of_diamonds.png",
"10_of_diamonds.png",
"jack_of_diamonds.png",
"queen_of_diamonds.png",
"king_of_diamonds.png",
"ace_of_diamonds.png",
"2_of_hearts.png",
"3_of_hearts.png",
"4_of_hearts.png",
"5_of_hearts.png",
"6_of_hearts.png",
"7_of_hearts.png",
"8_of_hearts.png",
"9_of_hearts.png",
"10_of_hearts.png",
"jack_of_hearts.png",
"queen_of_hearts.png",
"king_of_hearts.png",
"ace_of_hearts.png",
"2_of_spades.png",
"3_of_spades.png",
"4_of_spades.png",
"5_of_spades.png",
"6_of_spades.png",
"7_of_spades.png",
"8_of_spades.png",
"9_of_spades.png",
"10_of_spades.png",
"jack_of_spades.png",
"queen_of_spades.png",
"king_of_spades.png",
"ace_of_spades.png"];

function StartGame() {
    if (parseInt(document.getElementById("taruhan").value) <= 0 || document.getElementById("taruhan").value == '') {
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
    document.getElementById("StartGame").innerHTML = "TRY AGAIN?";
    document.getElementById("taruhan").disabled = false;
}
function Lose() {
    gameOver();
    document.getElementById("Money").innerHTML = document.getElementById("Money").innerHTML - document.getElementById("taruhan").value;
    document.getElementById("winCondition").innerHTML = "You Lose";
}
function Win() {
    gameOver();
    document.getElementById("Money").innerHTML = parseInt(document.getElementById("Money").innerHTML)  + (document.getElementById("taruhan").value * 5);
    document.getElementById("winCondition").innerHTML = "You Win";
}
function createMoney() {
    document.getElementById("Money").innerHTML = parseInt(document.getElementById("Money").innerHTML) + 10000;
}
function activateCheat() {
    var cheat = document.getElementById("CHEAT");
    var cheatDisplay = cheat.style.display;
    cheat.style.display = 'block';
}
function deactivateCheat() {
    var cheat = document.getElementById("CHEAT");
    var cheatDisplay = cheat.style.display;
    cheat.style.display = 'none';
}