var nama = prompt('Masukkan nama Anda');
console.log(nama);

switch(nama) {
    default :
    console.log('Masukkan Nama Anda Terlebih Dahulu');
    break;
}
var Pertanyaan1 = prompt('Sudahkah kamu sedekah hari ini ? Yes atau No')
Pertanyaan1 = Pertanyaan1.toUpperCase();
switch(Pertanyaan1) {
    case 'YES':
        var Pertanyaan2 = prompt('Dengan senyuman ? Yes atau No');
        Pertanyaan2 = Pertanyaan2.toUpperCase();
        switch(Pertanyaan2) {
            case 'YES':
                var angka = prompt('Berapa kali kamu sedekah hari ini ? 1 atau 2');
                if (angka == 1){
                    console.log('Senyumnya ditambah lagi yah');
                }else if (angka == 2){
                    console.log('Kamu luarbiasa');
        }
                break;
            case 'NO':
                console.log('Senyum dulu yah');
                break;
        }
        break;
    case 'NO':
        console.log('Jangan lupa tambah dengan senyuman');   
        break;
    default :
    console.log('Masukkan input yang benar yaitu Yes atau No');
    break;
}
