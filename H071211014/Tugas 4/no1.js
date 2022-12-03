var nama = prompt("Hi! Masukkan nama kamuu");
var a = prompt("Apakah Anda sudah mengikuti asistensi? YES or NO");
if (a.toLowerCase() == "yes") {
    var as = prompt("Sudah asistensi berapa kali? 1 atau 2");
    if (as == "1") {
        alert("Masih harus asistensi sekali lagi yaa," + nama);
    } else if (as == "2") {
        alert("Good job!! " + nama);
    } else {
        console.log("Masukkan input yang benar, yaitu 1 atau 2");
    }
} else if (a.toLowerCase() == "no") {
    alert("Jangan lupa dikerjakan tugas praktikumnya yaa!");
} else {
    console.log("Masukkan input yang benar, yaitu YES atau NO")
}


