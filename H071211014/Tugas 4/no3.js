const a = prompt("Hi! Coba Masukkan Apa Sajaa");

let letters_count = {};

for (let i = 0; i< a.length; i++) {
    let keymap = a[i];
    if (keymap == " ") {
        keymap = "spasi";
    }
    if (letters_count[keymap]) {
        letters_count[keymap] = letters_count[keymap] + 1;
    } else {
        letters_count[keymap] = 1;
    }
}
for (let i in letters_count) {
    console.log(i + " = " + letters_count[i]);
}