# Gaspari Backend

Step essenziali per avviare il backend:

## 1. Clonare la repository

Apri una nuova finestra del Terminale, assicurati di essere nella directory di destinazione che preferisci ed esegui:
```yaml
git clone https://github.com/0xDEMXN/gaspari-backend
```

## 2. Inizializzazione

Per inizializzare il progetto, esegui questi comandi, uno per volta:
```yaml
cd gaspari-backend # posizionati all'interno della directory del progetto
composer install # installa tutte le dipendenze e gli script che servono
cp .env.example .env # fai una copia del file environment di esempio
php artisan key:generate # genera la encryption key di Laravel
```

## 3. Configurare il database

Apri il file appena generato nel tuo editor preferito e modifica le seguenti linee inserendo i dati della configurazione che andrai ad utilizzare per il progetto:
```yaml
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gaspari
DB_USERNAME=root
DB_PASSWORD=
```

È il momento di definire la struttura del database, per farlo, ti basta eseguire le migrations:
```yaml
php artisan migrate
```
Se non esiste già un database chiamato `gaspari`, Laravel ti chiederà di crearlo in automatico, rispondi Sì!

## 4. Avvio

Per avviare il backend, esegui il seguente comando:
```yaml
php artisan serve
```

Se hai fatto tutto correttamente, sulla tua console apparirà un link al quale troverai la pagina di benvenuto di Laravel.
