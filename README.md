#Aplicaç]ao para fins de teste

Commits feito com o branch municipal

Subir aplicação com php artisan serve

Configurar banco de dados no arquivo .env

execultar o comando php artisan migrate

Importar o sql das cidades e estados no banco
No arquivo AppServiceProvider.php
metodo boot()
{
    \Illuminate\Support\Facades\Schema::defaultStringLength(191);
}

instalar os pacotes de dependecias do Nodejs com npm install