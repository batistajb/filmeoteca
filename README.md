##Prova CROMG

Para utilizar o projeto basta rodar as migrations ou se preferir utilizar o dump do BD que está na raiz do projeto.

```
composer install
```

```
php artisan migrate
```

Copie o arquivo .env.example e cole com o nome de .env

```
php artisan key:generate
```

Foi utilizado o sistema de autenticação padrão do laravel pela session, com isso você poderá se cadastrar, o perfil padrão é
o de usuário "comum".

Não houve necessidade de implementar um sistema de autorização complexo. Com o perfil "user" pode escolher os filmes favoritos, editar, adicionar, alterar e excluir informações do seu perfil. O cadastro pode ser
completado após o registro, o usuário poderá inserir quantos endereços e contatos quiser.
Na tela inicial é apresentado os 3 filmes mais favoritos por todos os usuários.

No perfil "administrador" existe um gráfico no dashboard com um ranking dos 5 principais filmes. O administrador pode acompanhar os usuários cadastrados, filmes de interesse, e visualizar um resumo dos usuários e filmes cadastrados.

Nos teste com phpunit foram feitos testes dos modelos e seus respectivos relacionamentos, faltaram os testes das interfaces.

Acrescentei as seeders das tabelas  com dados falsos. Para ter acesso à área administrativa deverá rodar a seeder.

```
php artisan db:seed
```

Login: admin@admin.com

senha:123456

Também é necessário criar um link simbólico para a aplicação mostrar no front os arquivos de upload.

```
php artisan storage:link
```

```
php artisan serve
```

Acesse http://localhost:8000
