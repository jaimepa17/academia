// index.js
// Escucha el click en el botón de exportar y muestra un console.log

// --- DARK MODE SWITCH ---
function syncDarkSwitch() {
    var darkSwitch = document.getElementById('btnToggleDarkMode');
    if (!darkSwitch) return;
    var isDark = document.documentElement.classList.contains('dark');
    darkSwitch.checked = isDark;
}
// Al cargar la página, aplica el modo guardado
if (localStorage.getItem('darkMode') === 'true') {
    document.documentElement.classList.add('dark');
} else {
    document.documentElement.classList.remove('dark');
}
document.addEventListener('DOMContentLoaded', function() {
    var darkSwitch = document.getElementById('btnToggleDarkMode');
    syncDarkSwitch();
    if (darkSwitch) {
        darkSwitch.addEventListener('change', function() {
            document.documentElement.classList.toggle('dark');
            localStorage.setItem('darkMode', document.documentElement.classList.contains('dark'));
            syncDarkSwitch();
        });
    }
    var btn = document.getElementById('btnExportarExcel');
    if (btn) {
        btn.addEventListener('click', function() {
        });
    }
});
