## Laraburguer - Sistema De Hamburgueria

Project in Laravel, Composer, Vue, Pusher

## Installation

1. clonar a repo
1. `composer install`
1. renomeie ou copie o arquivo .env.example para .env
1. Digite suas credenciais de banco de dados no seu arquivo .env
1. Altere `BROADCAST_DRIVER` para `pusher` no seu `.env` file
1. Digite suas credenciais do Pusher no seu arquivo .env. Se necessário, altere o cluster em config / broadcasting.php
1. `php artisan migrate`
1. `php artisan key:generate`
1. Digite sua chave Pusher em `resources/assets/js/bootstrap.js`. Se necessário, altere o cluster também
1. `npm install`
1. `npm run dev`
1. Visite localhost:8000 


