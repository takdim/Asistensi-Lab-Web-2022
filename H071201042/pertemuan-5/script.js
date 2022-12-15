let t100 = document.getElementById("100");
let t500 = document.getElementById("500");
let t1000 = document.getElementById("1000");
let allIn = document.getElementById("AllIn");
let taruhan = document.getElementById("taruhan");
let uang = document.getElementById("uang");
let kondisi = document.getElementById("kondisi");
let kartuP = document.getElementById("kartuP");
let sum = document.getElementById("sumP");
let kartuB = document.getElementById("Kbandar");
let sumB = document.getElementById("Sbandar");
let kartu = [];
let kartuBandar = [];
let blackJack = false;
let jtaruhan = 0;
let uangJ = 5000;
let sumJ = 0;
let sumbJ = 0;
let cek;

t100.onclick = function () {
    if (jtaruhan >= uangJ)
        alert("Uang anda tidak cukup");
    else
        jtaruhan += 100;
    taruhan.innerText = jtaruhan;
}
t500.onclick = function () {
    if (jtaruhan >= uangJ)
        alert("Uang anda tidak cukup");
    else
        jtaruhan += 500;
    taruhan.innerText = jtaruhan;
}
t1000.onclick = function () {
    if (jtaruhan  >= uangJ)
        alert("Uang anda tidak cukup");
    else
        jtaruhan += 1000;
    taruhan.innerText = jtaruhan;
}
allIn.onclick = function () {
    jtaruhan = uangJ;
    taruhan.innerText = jtaruhan;
}

document.getElementById("resetTaruhan").onclick = function () {
    jtaruhan = 0;
    taruhan.innerText = jtaruhan;
}

document.getElementById("stand").onclick = function () {
    if (cek == false) {
        console.log(sumbJ);
        for (i = 0; sumbJ <= 17; i++) {
            let kartuu = getRandomCard();
            sumbJ += kartuu;
            kartuBandar.push(kartuu);

            kartuB.textContent = "Kartu Bandar:"
            for (let x of kartuBandar) {
                kartuB.textContent += x + ",";
            }
            cek = true;
        }
        sumB.textContent = "Jumlah Kartu Bandar: " + sumbJ;

    }
    if (sumbJ > 21 && blackJack == false) {
        kondisi.textContent = "You Won";
        uangJ += jtaruhan * 2;
        uang.innerText = uangJ;
        console.log(uangJ);
        blackJack = true;
    }
    else if (sumbJ < sumJ && sumJ < 22 && blackJack == false) {
        kondisi.textContent = "You Won";
        uangJ += jtaruhan * 2;
        uang.innerText = uangJ;
        console.log(uangJ);
        blackJack = true;
    }
    else if (sumbJ == sumJ && blackJack==false) {
        kondisi.textContent = "Draw";
        uangJ += jtaruhan;
        blackJack = true;
    }
    else if(sumbJ>sumJ&&blackJack==false) {
        kondisi.textContent = "You Lose";
        blackJack = true;
    }


}



function mulai() {
    if (uangJ == 0)
        reset()
    else if (jtaruhan <= 0)
        alert("Masukkan taruhan terlebih dahulu");
    else if (jtaruhan > uangJ)
        alert("Uang anda tidak cukup");
    else {
        cek = false;
        blackJack = false;
        stand = false;
        start.innerText = "play again?"
        uangJ -= jtaruhan;
        uang.innerText = uangJ;
        console.log(uangJ);
        kartu = [getRandomCard()]
        sumJ = kartu[0];
        let kartuu = getRandomCard();
        sumJ += kartuu;
        kartu.push(kartuu);
        t100.disabled;
        kartuBandar = [getRandomCard()]
        sumbJ = kartuBandar[0];
        perbarui();
    }
}

function perbarui() {
    kartuP.textContent = "Kartu anda :";
    for (let x of kartu) {
        kartuP.textContent += x + ",";
    }
    sum.textContent = "Sum: " + sumJ;

    kartuB.textContent = "Kartu Bandar :"
    kartuB.textContent += kartuBandar[0] + ",";
    sumB.textContent = "Jumlah Kartu Bandar: " + sumbJ;

    if (sumJ <= 20) {
        kondisi.textContent = "Ambil Kartu Lagi?";
    }
    else if (sumJ == 21) {
        kondisi.textContent = "Blackjack!";
        blackJack = true;
        cek = true;
        uangJ += jtaruhan * 6;
        uang.innerText = uangJ;
        console.log(uangJ);
    } else {
        kondisi.textContent = "You Lose, Try Again!";
        cek = true;
    }
}

function newCard() {
    if (cek == false && blackJack == false) {
        let kartuu = getRandomCard();
        sumJ += kartuu;
        kartu.push(kartuu);
        perbarui();
    }
}

function getRandomCard() {
    let kartuBaru = Math.floor(Math.random() * 10) + 1;
    if (kartuBaru > 10) {
        return 10;
    } else if (kartuBaru == 1) {
        if (sumJ + kartuBaru < 11 || sumbJ + kartuBaru < 11)
            return 11;
        else
            return 1;
    } else {
        return kartuBaru;
    }
}

function reset() {
    uangJ = 5000;
    uang.textContent = uangJ;
}


