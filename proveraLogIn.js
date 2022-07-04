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

function proveriReg(t) {
    if(t==1){
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
    }
    else{
        var loz = document.formaDodajNar.lozinka.value;
        var loz2 = document.formaDodajNar.lozinka2.value;
        var tel = document.formaDodajNar.telefon.value;
        var pib = document.formaDodajNar.PIB.value;
        var ime = document.formaDodajNar.ime.value;
        var k_ime = document.formaDodajNar.kor_ime.value;
        var email = document.formaDodajNar.email.value;
        var nazivP = document.formaDodajNar.nazivPreduzeca.value;
        var matbr = document.formaDodajNar.matbr.value;
        var adr = document.formaDodajNar.drzava.value;
        var rabata = document.formaDodajNar.rabata.value;
        var br_dana = document.formaDodajNar.br_dana.value;
        
        if(rabata=='' || !br_dana)
        {   alert("Niste popunili rabatu i broj dana.");
            return false;
        }
        
        if(isNaN(rabata)){
            alert("Rabata mora da bude broj");
            return false;
        }
        
        var c = parseFloat(rabata);
        if(c<0 || c>100){
            alert("Rabata mora biti u opsegu od 0 do 100");
            return false;
        }
    }
    
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

function proveriPrvi(){
    var sifra1 = document.formaPrviLog.elements['sifra[]'];
    if (sifra1[0].value==''){
        alert("Niste uneli sifru delatnosti");
        return false;
    }
    
    var racuni = document.formaPrviLog.elements['racun[]'];
    if (racuni[0].value==''){
        alert("Niste uneli racun");
        return false;
    }
    var regerac = /^\d{3}-\d{12}-\d{2}$/;
    for(var i=0; racuni.length; i++){
        if(!regerac.test(racuni[i].value) && racuni[i].value!='')
        {
            alert("Broj racuna nije u dobrom formatu");
            return false;
        }
    }
    
    var banke = document.formaPrviLog.elements['banka[]'];
    if (banke[0].value==''){
        alert("Niste uneli banku");
        return false;
    }
    
    var lok = document.formaPrviLog.elements['objekat[]'];
    if (lok[0].value==''){
        alert("Niste uneli lokaciju");
        return false;
    }

    return true;
}

function proveriRacun(){
    var racuni = document.formaDodajR.racunD.value;
    if (racuni==''){
        alert("Niste uneli racun");
        return false;
    }
    var regerac = /^\d{3}-\d{12}-\d{2}$/;
    if(!regerac.test(racuni))
    {
        alert("Broj racuna nije u dobrom formatu");
        return false;
    }
    
    var banke = document.formaDodajR.bankaD.value;
    if (banke==''){
        alert("Niste uneli banku");
        return false;
    }
    return true;
}

function proveriKasu(){
    var lok = document.formaDodajK.objekatD.value;
    if (lok==''){
        alert("Niste uneli lokaciju");
        return false;
    }
    return true;
}
        
function proveriOsnovni(){
    var tel = document.formaOsnovni.telefon.value;
    var ime = document.formaOsnovni.ime.value;
    var email = document.formaOsnovni.email.value;
    var matbr = document.formaOsnovni.matbr.value;
    var adr = document.formaOsnovni.adresa.value;
    
    if(tel=='' || ime=='' || email=='' || matbr=='' || adr==''){
        alert("Niste uneli sva potrebna polja");
        return false;
    }
    
    var emailreg = /^\w+@\w{3,}\.\w{2,}$/;
    
    if(!emailreg.test(email))
    {
        alert("Mejl adresa nije u dobrom formatu!");
        return false;
    }
    return true;
}

function proveriPIB(){
    var pib = document.prekoPIB.pib2.value;
    var rabata = document.prekoPIB.rabata2.value;
    var dani = document.prekoPIB.br_dana2.value;
    
    if(!dani || rabata==''){
        alert("Unesite PIB broj dana i rabatu.");
        return false;
    }
    
    if(isNaN(rabata)){
        alert("Rabata mora da bude broj");
        return false;
    }
    
    var c = parseFloat(rabata);
    if(c<0 || c>100){
        alert("Rabata mora biti u opsegu od 0 do 100");
        return false;
    }
            
    if(pib==''){
        alert("Unesite PIB za pretragu.");
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