//Nomor1
do {
    var nama = prompt("Masukkan Nama Anda!");

    if (!nama.replace(/\s/g, '').length || !isNaN(nama)) {
        console.log("Masukkan nama anda dengan benar!");
    }
}
while (!nama.replace(/\s/g, '').length);
do {
    var umur = prompt("Masukkan Umur Anda!");
    if(isNaN(umur))
    console.log("Mohon Masukkan Angka!");
    else if(umur>100||umur<1)
    console.log("Serius Umur Anda Begitu?");
}
while (isNaN(umur) || umur > 100 || umur < 1);

do{
    var berenang = prompt("Apakah Anda Sudah Bisa Berenang ? (Ya atau Tidak)")
    if (berenang.toUpperCase()=="YA")
    console.log("Orang Tuamu Pasti Bangga ",nama);
    else if (berenang.toUpperCase()=="TIDAK"){
        if(umur<5)
    console.log("Nanti Latihan Berenang Ya",nama);
    else if (umur<15)
    console.log("Ayo Cepat Pergi Latihan Berenang",nama);
    else
    console.log("Parah Ey, Cepat Ambil Kursus Berenang",nama);
    }
    else 
        console.log("Mohon Masukkan Ya atau Tidak!");
}
while(!berenang.replace(/\s/g, '').length||!berenang.toUpperCase()=="YA"||!berenang.toUpperCase()=="TIDAK")

//Nomor 2
do{
    var jumlah=0;
    var bilangan = prompt("Perkalian Berapa?");
    if(isNaN(bilangan)||!bilangan.replace(/\s/g, '').length)
    console.log("Input Bukan Angka")
    else{
        var batas = prompt("Ingin dikalikan sampai berapa?");
        if(isNaN(batas)||!batas.replace(/\s/g, '').length)
        console.log("Input Bukan Angka");
        else{
            for(i=1;i<=batas;i++){
                var hitung=i*bilangan;
                jumlah+=hitung;
                console.log(i+' x '+bilangan+" = "+i*bilangan);
            }
            console.log("Hasil seluruh Perkalian: "+jumlah);
        }
    }
}while(isNaN(bilangan)||isNaN(batas)||!bilangan.replace(/\s/g, '').length||!batas.replace(/\s/g, '').length);

//Nomor 3
var kalimat=prompt("Masukkan Kalimat:");
loop1:
for(i=0;i<kalimat.length;i++){
    var jumlah=0;
    for(j=0;j<kalimat.length;j++){
        if(kalimat.charAt(i).toLowerCase()==kalimat.charAt(j).toLowerCase()&&i>j)
        continue loop1;
        else if (kalimat.charAt(i).toLowerCase()==kalimat.charAt(j).toLowerCase())
        jumlah+=1;
    }
    console.log(kalimat.charAt(i).replace(/\s/g,"spasi")+" = "+jumlah)
}