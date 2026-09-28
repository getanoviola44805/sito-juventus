document.addEventListener('DOMContentLoaded', function () {

    // ===== MENU A PANINO =====

    const pulsante = document.getElementById('menuToggle');
    const menu = document.getElementById('nav');

    if (pulsante && menu) {
        pulsante.addEventListener('click', function () {
            menu.classList.toggle('aperto');
        });
    }

    // ===== FILTRI DELLA ROSA =====

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

    // ===== VALIDAZIONE REGISTRAZIONE =====

    const formRegistrazione = document.getElementById('formRegistrazione');

    if (formRegistrazione) {
        formRegistrazione.addEventListener('submit', function (event) {

            const nome = formRegistrazione.querySelector('[name="name"]').value.trim();
            const email = formRegistrazione.querySelector('[name="email"]').value.trim();
            const password = formRegistrazione.querySelector('[name="password"]').value;
            const conferma = formRegistrazione.querySelector('[name="password_confirmation"]').value;

            const errori = [];

            if (nome.length < 3 || nome.length > 50) {
                errori.push('Il nome deve avere tra 3 e 50 caratteri.');
            }
            if (!emailValida(email)) {
                errori.push('Inserisci un indirizzo email valido.');
            }
            if (password.length < 8) {
                errori.push('La password deve avere almeno 8 caratteri.');
            }
            if (!/[0-9]/.test(password)) {
                errori.push('La password deve contenere almeno un numero.');
            }
            if (password !== conferma) {
                errori.push('Le due password non coincidono.');
            }

            if (errori.length > 0) {
                event.preventDefault();
            }
            mostraErrori(formRegistrazione, errori);
        });
    }

    // ===== VALIDAZIONE LOGIN =====

    const formLogin = document.getElementById('formLogin');

    if (formLogin) {
        formLogin.addEventListener('submit', function (event) {

            const email = formLogin.querySelector('[name="email"]').value.trim();
            const password = formLogin.querySelector('[name="password"]').value;

            const errori = [];

            if (!emailValida(email)) {
                errori.push('Inserisci un indirizzo email valido.');
            }
            if (password === '') {
                errori.push('Inserisci la password.');
            }

            if (errori.length > 0) {
                event.preventDefault();
            }
            mostraErrori(formLogin, errori);
        });
    }

    // ===== CLASSIFICA SERIE A (API football-data.org) =====

    const corpoClassifica = document.getElementById('corpoClassifica');

    if (corpoClassifica) {
        fetch('/api/classifica')
            .then(function (risposta) {
                if (!risposta.ok) {
                    throw new Error('Errore ' + risposta.status);
                }
                return risposta.json();
            })
            .then(function (squadre) {
                corpoClassifica.innerHTML = '';

                squadre.forEach(function (s) {
                    const riga = document.createElement('tr');

                    if (s.squadra.includes('Juventus')) {
                        riga.classList.add('juve');
                    }

                    aggiungiCella(riga, s.posizione);

                    const cellaSquadra = document.createElement('td');
                    cellaSquadra.classList.add('col-squadra');

                    const stemma = document.createElement('img');
                    stemma.src = s.stemma;
                    stemma.alt = '';

                    const nome = document.createElement('span');
                    nome.textContent = s.squadra;

                    cellaSquadra.appendChild(stemma);
                    cellaSquadra.appendChild(nome);
                    riga.appendChild(cellaSquadra);

                    aggiungiCella(riga, s.giocate);
                    aggiungiCella(riga, s.vinte);
                    aggiungiCella(riga, s.pareggiate);
                    aggiungiCella(riga, s.perse);
                    aggiungiCella(riga, s.differenza);
                    aggiungiCella(riga, s.punti);

                    corpoClassifica.appendChild(riga);
                });
            })
            .catch(function () {
                corpoClassifica.innerHTML =
                    '<tr><td colspan="8" class="caricamento">Classifica non disponibile al momento.</td></tr>';
            });
    }

    // ===== METEO ALLO STADIUM (API Open-Meteo) =====

    const boxMeteo = document.getElementById('meteo');

    if (boxMeteo) {
        fetch('/api/meteo')
            .then(function (risposta) {
                if (!risposta.ok) {
                    throw new Error('Errore ' + risposta.status);
                }
                return risposta.json();
            })
            .then(function (dati) {
                boxMeteo.innerHTML = '';

                const temperatura = document.createElement('p');
                temperatura.classList.add('meteo-temp');
                temperatura.textContent = Math.round(dati.temperatura) + '°C';

                const descrizione = document.createElement('p');
                descrizione.textContent = descriviMeteo(dati.codice) +
                    ' · vento ' + Math.round(dati.vento) + ' km/h';

                boxMeteo.appendChild(temperatura);
                boxMeteo.appendChild(descrizione);
            })
            .catch(function () {
                boxMeteo.innerHTML = '<p class="caricamento">Meteo non disponibile al momento.</p>';
            });
    }

    // ===== FUNZIONI DI SUPPORTO =====

    function emailValida(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }

    function mostraErrori(form, errori) {
        const lista = form.querySelector('.errori-js') || document.querySelector('.errori-js');

        if (!lista) {
            return;
        }

        lista.innerHTML = '';

        if (errori.length === 0) {
            lista.style.display = 'none';
            return;
        }

        errori.forEach(function (testo) {
            const voce = document.createElement('li');
            voce.textContent = testo;
            lista.appendChild(voce);
        });

        lista.style.display = 'block';
    }

    function aggiungiCella(riga, valore) {
        const cella = document.createElement('td');
        cella.textContent = valore;
        riga.appendChild(cella);
    }

    function descriviMeteo(codice) {
        if (codice === 0) return 'Sereno';
        if (codice <= 3) return 'Parzialmente nuvoloso';
        if (codice <= 48) return 'Nebbia';
        if (codice <= 67) return 'Pioggia';
        if (codice <= 77) return 'Neve';
        if (codice <= 82) return 'Rovesci';
        if (codice <= 86) return 'Rovesci di neve';
        return 'Temporale';
    }

});