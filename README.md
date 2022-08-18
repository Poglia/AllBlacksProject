# Migra��o Torcedores - AllBlacks para um ambiente Remoto

## ?? Constru�do com

* [PHP](https://www.php.net/) - A linguagem usada
* [Composer](https://getcomposer.org/) - Gerenciador de Pacotes
* [PostgreSQL](https://www.postgresql.org/) - Banco de Dados

## ? Introdu��o

Este � um programa fict�cio de armazenamento de dados de um grupo de torcedores de um time de rugby feito em PHP + Composer e com a ajuda de algumas bibliotecas como: phpoffice/phpspreadsheet e ext-pdo

O programa Le uma Planilha Excel(xlsx) que � considerada a base local dos torcedores e arquivos de atualiza��o(xml) desses torcedores.

Armazenando esses dados em um servidor localhost via PostgreSQL - Alem disso possui a utilidade de Envio de Email para os torcedores ainda ativos

Foi feito um pequeno front-end para manter o mesmo universo do site do AllBlacks.

O software ainda tem alguns pequenos bugs mas o objetivo final foi cumprido - Teste Avaliativo empresa P21 Sistemas 


### ? Pr�-requisitos

```
PHP 8 Ou superior
PostgreSQL
Composer
```

A menos que use um container Docker para a aplica��o sugiro trocar seu [  *php.ini* ] pelo comitado no projeto para que funcione via servidor embutido do PHP
```
php -S localhost:5432
```

## ? Come�ando

Clone o projeto para a sua maquina e crie um novo banco de dados postgres

## ? Arquivos

### Esse projeto possui na pasta [arquivos] os modelos:

clientes.xlsx : referente a planilha excel de inicia��o;

dados.xml     : referente ao arquivo de atualiza��o

php-example.ini   : caso o projeto nao rode com o [ *php.ini* ] da sua m�quina  

desafioP21.pdf :  Desafio solicitado pela empresa
## ?? Configurando o Composer

Na pasta do projeto ja com o composer instalado na sua m�quina ou ambiente virtual
```
composer install
```
Esse comando vai ler o [ * composer.json * ] e instalar as depend�ncias necess�rias para o projeto rodar   


## ? Configura��o Banco

Adicione as informa��es sobre seu BD no arquivo: [ *.env-example* ] 
Essas informa��es ser�o usadas em Config/Connection.php.

Ap�s isso troque o nome do arquivo para [ *.env* ] e suas variaveis do projeto estar�o configuradas logo seu banco de dados ja est� lincado com a aplica��o.

Para testar entre em [ * exe_atualizar_arquivo.php * ]: e descomente os ECHOs de conex�o, e com o server rodando clique no bot�o UPDATE para ver qual das mensagens aparece.

Ap�s isso pode rodar a query para a cria��o da tabela que � usada no projeto
```
CREATE TABLE torcedores (
    id_torcedor serial PRIMARY KEY,
    nm_torcedor VARCHAR ( 100 ) NOT NULL,
    nr_doc VARCHAR ( 30 ) NOT NULL,
    nr_cep VARCHAR ( 30 ) NOT NULL,
    ds_endereco VARCHAR ( 150 ),
    nm_bairro VARCHAR ( 150 ),
    nm_cidade VARCHAR ( 150 ),
    ds_uf VARCHAR ( 150 ),
    nr_telefone VARCHAR ( 25 ),
    ds_email VARCHAR ( 50 ),
    id_ativo SMALLINT DEFAULT 0
);
```


## ? Funcionamento

O projeto le 2 tipos de arquivos (xlsx) e (xml)!

Se no Upload do Formul�rio for adicionado um arquivo (xlsx) o banco de dados RESETA e SOBRESCREVE os dados salvos no banco pelos dados da nova planilha.
O processo ocorre dessa forma porque teoricamente a planilha dos dados s� seria usada 1 vez.

Apenas para migrar os dados de um ambiente local para um ambiente remoto.

Se no Upload do Formul�rio for adicionado um arquivo (xml) o software trata ele como uma atualiza��o e atualizar� os dados do banco
fazendo um INSERT ou UPDATE na tabela dependendo da existencia ou nao desse dado no banco.

Se por acaso algum desses dados estiver em falta no banco � possivel adiciona-los a um documento xml no mesmo formato dos DOCS DE EXEMPLO e adicionar as informa��es

O sistema interpretar� o Numero do Documento daquele usuario e Atualizar� os dados dele no banco com os que vierem desse novo arquivo!

---
Baseado no README de - [Armstrong Loh�ns](https://gist.github.com/lohhans) ?