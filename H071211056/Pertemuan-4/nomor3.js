var kata = prompt ("Masukkan Kalimat");
var chars = kata.split("");
var count = {}; 
console.log(kata);

for (var i = 0; i < chars.length ; i++){
  if (count[chars[i]] == undefined)
    count[chars[i]] = 0;
    count[chars[i]]++
} 
for (var i in count){
  if (i == " "){
    console.log("Spasi = " + count[i])
  } else {
    console.log(i + " = " + count[i]);
  }
}


