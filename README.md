![Logo AI Solutions](http://aisolutions.tec.br/wp-content/uploads/sites/2/2019/04/logo.png)

# AI Solutions

## Teste para novos candidatos (PHP/Laravel)

### Introdução

Este teste utiliza PHP 8.1, Laravel 10 e um banco de dados SQLite simples.

1. Faça o clone desse repositório;
1. Execute o `composer install`;
1. Crie e ajuste o `.env` conforme necessário
1. Execute as migrations e os seeders;

### Primeira Tarefa:

Crítica das Migrations e Seeders: Aponte problemas, se houver, e solucione; Implemente melhorias;

### Segunda Tarefa:

Crie a estrutura completa de uma tela que permita adicionar a importação do arquivo `storage/data/2023-03-28.json`, para a tabela `documents`. onde cada registro representado neste arquivo seja adicionado a uma fila para importação.

Feito isso crie uma tela com um botão simples que dispara o processamento desta fila.

Utilize os padrões que preferir para as tarefas.

### Terceira Tarefa:

Crie um test unitário que valide o tamanho máximo do campo conteúdo.

Crie um test unitário que valide a seguinte regra:

Se a categoria for "Remessa" o título do registro deve conter a palavra "semestre", caso contrário deve emitir um erro de registro inválido.
Se a caterogia for "Remessa Parcial", o titulo deve conter o nome de um mês(Janeiro, Fevereiro, etc), caso contrário deve emitir um erro de registro inválido.


Boa sorte!


#### Passos para subir ambiente

1. Criando branch - git checkout -b feature/up_environment
2. Copiando arquivo env - cp .env.example .env
3. composer install
4. php artisan key:generate

### Passos para realizar a Task-1
1. Foi modificado a tabela categories colocando o increments no [ ID ] e acrescentando o campo activate.
2. Na tabela documents Foi corrigida a forma de realizar um relacionamento entre a tabela categories e documents mantendo assim sua integridade
* increments no [ ID ] e acrescentando o campo activate.
3. A model da tabela categories foi criado respeitando o relacionamento entre ela a a tabela documents, também foi criado a rules ( regras ) para serem sempre adicionados campos necessários para a integração da mesma
4. A model da tabela documents foi criado respeitando o relacionamento entre ela a a tabela categories, também foi criado a rules ( regras ) para serem sempre adicionados campos necessários para a integração da mesma

5. Segue imagem do migration seeds ![Título da imagem](img-readm\migrate_seeds.png)

### Passos para realizar a Task-2
1. Na tela de abertura do ambiente conforme imagem criei um button de upload para realizar o procedimento das filas do json a ser upado.
2. Foi desenvolvida validação do tipo de arquivo que está sendo upado em liguagem ( javascript )
3. Foi feito o tratamento em ( jquery ) para o envio do json a ser processado e inserido na tabela conforme solicitado respeitando as regras de relacionamento entre as tabelas.
4. Foi criado um designer bem ( simples ) apenas para demonstrar o conhecimento em css, html, javascript e jquery e também a organização dos mesmos.
![Título da imagem](img-readm\Tela_task_2.png)
5. Para uma vizualização mais amigavel retornei os dados para mostra em tabela caso o mesmo tenha tido sucesso na inserção segue imagens.
6. No BackEnd foi desenvolvido o critério de tratamento dos dados recebidos do Json para que não houve retundancia e mantendo o relacionamento entre as tabelas.
![Título da imagem](img-readm\Base_1.png)
![Título da imagem](img-readm\Base_2.png)

