let hasil = 0; 
let a = prompt("Hi! Mau Lihat Perkalian Berapa");
if (isNaN(a)) {
    console.log("Harap Masukkan Angka Yaa");
} else if (a ==" " || a =="")  {
    console.log("Masukkan Angka");
} else {
    let b = prompt("Mau Dikalikan Dengan Berapa");
    if (isNaN(b)) {
        console.log("Harap Masukkan Angka Yaa");
    } else if (b == " " || b == "") {
        console.log("Masukkan Angka");
    } else {
        for (let i = 1; i <= b; i++) {
            let result = i * a;
            hasil += result;
            console.log(i + " x " + a + " = " + result);
        }
        console.log("Hasil Seluruh Perkalian : " + hasil);
    }
}