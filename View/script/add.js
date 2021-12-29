
function clearCharacteristics() {
    document.getElementById("sport").checked = false;
    document.getElementById("classic").checked = false;
    document.getElementById("turbo").checked = false;
    document.getElementById("economic").checked = false;
    document.getElementById("city").checked = false;
    document.getElementById("distant_travels").checked = false;
}

function goToHome() {
    window.location.href = "/home";
}