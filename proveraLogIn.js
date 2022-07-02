/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */

function proveri() {
    var k_ime = document.formaLogIn.ime.value;
    var sif = document.formaLogIn.sifra.value;
    
    
    if(k_ime==''){
        alert("Niste uneli korisnicko ime");
        return false;
    }
    
    if(sif==''){
        alert("Niste uneli lozinku");
        return false;
    }
    
    return true;
}

function proveriReg() {
    var loz = document.formaRegistracija.lozinka.value;
    var loz2 = document.formaRegistracija.lozinka2.value;
    var tel = document.formaRegistracija.telefon.value;
    var pib = document.formaRegistracija.PIB.value;
    var ime = document.formaRegistracija.ime.value;
    var k_ime = document.formaRegistracija.kor_ime.value;
    var email = document.formaRegistracija.email.value;
    var nazivP = document.formaRegistracija.nazivPreduzeca.value;
    var matbr = document.formaRegistracija.matbr.value;
    var adr = document.formaRegistracija.drzava.value;
    
    if(loz=='' || loz2==''){
        alert("Niste uneli lozinku");
        return false;
    }
    
    if(loz!=loz2){
        alert("Lozinke nisu iste!");
        return false;
    }
    
    
    var lozreg = /^[a-z]|[A-Z](?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[\.@#$%^&-+=()])(?=\\S+$).{8,12}$/;
    
    if(!lozreg.test(loz))
    {
        alert("Lozinka nije u dobrom formatu! Zeljeni format je: min 8 max 12 karaktera"
                + " bar jedno veliko slovo, jedan broj i jedan specijalni karakter."
                + " Mora pocinjati slovom.");
        return false;
    }
    
    if(tel=='' || pib=='' || ime=='' || k_ime=='' || email=='' || nazivP=='' || matbr=='' || adr==''){
        alert("Niste uneli sva potrebna polja");
        return false;
    }
    
    var emailreg = /^\w+@\w{3,}\.\w{2,}$/;
    
    if(!emailreg.test(email))
    {
        alert("Mejl adresa nije u dobrom formatu!");
        return false;
    }
    
    var pibreg = /^[1-9]\d{8}$/;
    
    if(!pibreg.test(pib))
    {
        alert("PIB nije u dobrom formatu!");
        return false;
    }
    
    return true;
}

function proveriLoz(){
    var loz1 = document.formaLozinka.trenutna.value;
    var loz = document.formaLozinka.sifra.value;
    var loz2 = document.formaLozinka.sifra2.value;
    
    if(loz=='' || loz2=='' || loz1==''){
        alert("Niste uneli sve potrebne podatke.");
        return false;
    }
    
    if(loz!=loz2){
        alert("Lozinke nisu iste!");
        return false;
    }
    
    if(loz==loz2 && loz2==loz1){
        alert("Uneli ste sve iste lozinke!");
        return false;
    }
    
    var lozreg = /^[a-z]|[A-Z](?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,12})$/;
    
    if(!lozreg.test(loz))
    {
        alert("Lozinka nije u dobrom formatu! Zeljeni format je: min 8 max 12 karaktera"
                + " bar jedno veliko slovo, jedan broj i jedan specijalni karakter."
                + " Mora pocinjati slovom.");
        return false;
    }
    return true;   
}

document.on('click', '.add_field', function() {
  '<input type="text" class="input" name="field[]" value="">'.insertAfter('.input:last');
})