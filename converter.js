document.getElementById("accept").onclick = switchValue;

function switchValue() {
    const x = parseInt(document.getElementById("bottle").value);
    const y = parseInt(document.getElementById("volume").value);
    const z = parseFloat(document.getElementById("alko").value);

    let result;

    result = x * y * z * 0.01;

    document.getElementById("result").innerHTML = "Ilość czystego alkoholu: " + result + " ml";
    

    if (result < 80) {
        document.getElementById("komunikat").innerHTML = "Rozważna ilość";
      
        
    } else if (result >= 80 && result < 120) {
        document.getElementById("komunikat").innerHTML = "Ostrożnie!";
       
        
    } else if (result >= 120) {
        window.location.href = "https://kcpu.gov.pl/";
    }
}