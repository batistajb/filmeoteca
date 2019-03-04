# filmeoteca
Prova CROMG

Para utilizar o projeto basta rodar as migrations ou se preferir utlizar o dummp do BD que esta na raiz do prejeto.

Foi utilizado o sistema de autenticação padrão do laravel pela session, com isso você poderá se cadastrar, o perfil padrão é
o de usuário "comum". Para ter acesso a área administrativa deverá rodar a SeederTableUser. Login: admin@admin.com, e senha:123456.

Não houve necessidade de implmentar um sistema de autorização complexo. Com o perfil "user" pode escolher os flmes favoritos, editar, adicionar, alterar e esxcluir informações do seu perfil. O cadastro pode ser 
completado após o registro, o usuário poderá iserir quntos endereços e contatos quiser.
Na tela inicial é apresentado os 3 filmes mais favoritados por todos os usuários. 

No perfil "administrador" existe um gráfico no dashborad com um ranking dos 5 principais filmes. O administrador pode acompanhar os usuários
cadastrados, filmes de interesse, e visualizar um resumo dos usuários e filmes cadastrados.

Nos teste com phpunit foram feitos testes dos models e seus respectivos relacionamentos, faltaram os testes das interfaces. 

Acrescentei as seeders das tabelas  com dados falsos, ao rodar php artisan db:seed serão acrescentados alguns dados falsos, inclusive
o usuário padrão.
