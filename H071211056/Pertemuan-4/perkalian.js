var number = prompt ("Perkalian Berapa?");
var bum    = prompt("Ingin Dikalikan Sampai Berapa?");
let hasil;
let hasil_perkalian = 0;

for (i=1; i<=bum; i++)
{
    hasil = number * i;
    hasil_perkalian += hasil;
    console.log(number + "x" + i + "=" + number*i);

    }
console.log("Hasil seluruh perkalian = " + hasil_perkalian);
