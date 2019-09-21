#Trabalho-APWEB

Repositório para armazenar o projeto prático da disciplina Análise e Projeto de Aplicações Web do Curso de Engenharia de Software da UFMS.

 - Drive: https://drive.google.com/drive/folders/1eMM9eVZ70-DiGEjlxq3E8nO7E_pwuSLL
 
 - Trello: https://trello.com/b/J4pRP33R/trabalho-apweb

---

**PostgreSQL**

Procura o arquivo php.ini no diretorio do seu PHP e descomente a seguinte linha:
- extension=pdo_pgsql

No arquivo .env do seu projeto laravel mude:
- DB_CONNECTION=pgsql

Em config/database.php deixe:
- 'default' => env('DB_CONNECTION', 'pgsql')

---

**Outros**

https://github.com/barryvdh/laravel-ide-helper

https://laravel.com/docs/6.x

---

**Comandos**

Quando clonar: 
     composer install
     npm install
     cp .env.example .env

php artisan serve

npm run watch
