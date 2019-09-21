<h1>Trabalho-APWEB</h1>

Repositório para armazenar o projeto prático da disciplina Análise e Projeto de Aplicações Web do Curso de Engenharia de Software da UFMS.

**Configuração do BD para postgre:**

- Procura o arquivo php.ini no diretorio do seu PHP e descomente a seguinte linha: extension=pdo_pgsql
  
- No arquivo .env do seu projeto laravel muda: DB_CONNECTION=pgsql
    
- Em config/database.php deixe: 'default' => env('DB_CONNECTION', 'pgsql')
  
- Altere DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME e DB_PASSWORD no .env para como configurado no seu postgre

**Links:**

Documentação: https://laravel.com/docs/6.x

Drive: https://drive.google.com/drive/folders/1eMM9eVZ70-DiGEjlxq3E8nO7E_pwuSLL

Trello: https://trello.com/b/J4pRP33R/trabalho-apweb

Autocomplete para IDE: https://github.com/barryvdh/laravel-ide-helper

**Comandos uteis:**

php artisan serve

npm run watch

php artisan route:list


