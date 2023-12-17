// Fungsi untuk set cookie
function setCookie(name, value, days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
}

// Fungsi untuk mendapatkan nilai cookie
function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

// Fungsi untuk menyimpan dan memperbarui state ke cookie
function saveStateToCookie(state) {
    setCookie("currentState", state, 7); // Set cookie untuk 7 hari
}

// Fungsi untuk mendapatkan state dari cookie
function getStateFromCookie() {
    return getCookie("currentState") || "No State";
}

// Jalankan fungsi ini setelah dokumen selesai dimuat
document.addEventListener("DOMContentLoaded", function () {
    // Tampilkan state dari cookie saat halaman dimuat
    document.getElementById('currentState').innerText = getStateFromCookie();
});

// Fungsi untuk menyimpan state ke cookie dan menampilkan perubahan
function saveStateAndDisplay(newState) {
    saveStateToCookie(newState);
    document.getElementById('currentState').innerText = newState;
}