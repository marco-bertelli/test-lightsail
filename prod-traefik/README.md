
# Configurazione ambiente
Operazioni da NON fare in ambiente di staging ma in preparazione a staging.
* andare nel file .env e cambiare il **dominio** e **project name**

* andare in /settings/nginx-conf/nginx.conf e modificare il server name con lo stesso nome **dominio** scelto sopra

# avviare il progetto nella macchina di prod con traefik:

* clonare la repo de progetto con git clone : **url repo progetto**

* Passare sul branch prod

   - git checkout -b master

* spostarsi in  **nome progetto**/prod-traefik e lanciare:
 - docker-compose up --build

* Accedere al container e lanciare il comando di inizializzazione:
   - ./be.sh
   
   - drupal-first-run