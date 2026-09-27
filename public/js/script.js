document.addEventListener('DOMContentLoaded', function () {

    const pulsante = document.getElementById('menuToggle');
    const menu = document.getElementById('nav');

    if (pulsante && menu) {
        pulsante.addEventListener('click', function () {
            menu.classList.toggle('aperto');
        });
    }
    const bottoniFiltro = document.querySelectorAll('.filtro');
    const schede = document.querySelectorAll('.card-giocatore');

    bottoniFiltro.forEach(function (bottone) {
        bottone.addEventListener('click', function () {

            bottoniFiltro.forEach(function (b) {
                b.classList.remove('attivo');
            });
            bottone.classList.add('attivo');

            const ruoloScelto = bottone.dataset.ruolo;

            schede.forEach(function (scheda) {
                if (ruoloScelto === 'tutti' || scheda.dataset.ruolo === ruoloScelto) {
                    scheda.style.display = 'block';
                } else {
                    scheda.style.display = 'none';
                }
            });
        });
    });
});