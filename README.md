![alt text](http://3.bp.blogspot.com/-ajoW2tRYtQg/U6tSKgAmSYI/AAAAAAAAAJA/uf7IQ3GArA4/s1600/logo_inurl4.png "SCANNER INURLBR")

 *  PHP Version         5.4.7
 *  php5-curl           LIB
 *  cURL Information    7.24.0
 *  Apache              2.4
 *  allow_url_fopen =   On
 *  Motor de busca      GOOGLE
 *  Permição            Leitura & Escrita
 *  Nome script para envio de post: *bot.php*

-Abrindo o scanner
---------------------------------------------------------------------------------------------
Quando o arquivo é iniciado no navegador o mesmo imprime "*SEM ACESSO!*".

Pois temos uma sec simples.
```php

    if (isset($_GET['senha']) && $_GET['senha'] == 'googleinurl') {
        $_SESSION['valida'] = 1; //SETANDO O VALIDADOR DA PAGINA
    }

```
-Assim fica o acesso:
---------------------------------------------------------------------------------------------
```
URL: http://localhost/bot.php?senha=googleinurl
```
---------------------------------------------------------------------------------------------

Configuração:
---------------------------------------------------------------------------------------------

 -**0xDORK...:** O QUE VAI SER BUSCADO||Operadores avançados do Google.
 
 -**0xPROXY + 0xPORTA..:** Caso seja bloqueado pelo Google use um proxy.

 -**0xHOST GOOGLE..:** Escolha entre 202 Domínios do google para efetuar sua busca.

 -**0xARQUIVO SAÍDA.:** ONDE VAI SER SALVO SEUS RESULTADOS DE BUSCA.

 -**0xEXPL01T.:** PARÂMETRO QUE DEVE SER INJETADO A CADA URL, NO FINAL
DAS URL'S ENCONTRADAS.
 *Assim pode ser injetado uma string que gere erros ou manipulem o servidor.*

 -**0xBUSCAR ERROS: [ PADRÃO ] OU  (x)[ PERSONALIZADO ]**

>-[ **PADRÃO** ]= '*Vai buscar erros SQL & Programação*'
   
>-[ **PERSONALIZADO** ]= '*Vai buscar erros/string PERSONALIZADOS dentro de cada site, no qual foi defenido na opção* **0xACHAR ERRO.:**'


 -**0xACHAR ERRO.:** É usado junto com a opção BUSCAR ERROS: PERSONALIZADO.

Pois foge do padrão de erros SQLI ou ERROS de programação já configurados no script.
Digamos que você deseja encontrar sites do governo que tenha a frase "*Municipal*", essa opção
possibilita isso.
Logica:

>**0xDORK=> site:.rj.gov.br**  / *Vai listar todos sites do governos Rio de Janeiro.*

>**0xACHAR ERRO.:Municipal**  / *Vai procurar a palavra "Municipal" dentro das url's*

---------------------------------------------------------------------------------------------

BUSCAR ERROS:(x)[PADRÃO]/[PERSONALIZADO]
---------------------------------------------------------------------------------------------
>PADRÃO  Busca erros no modo padrão é buscar erros SQLI + Erros de programação.
Vamos ver quais são os erros padrões do script.
Pode ou não ser junto com exploit isso vai depender de sua dork.
Algumas dorks já forçam o buscador a listar sites com erros.
Em outras situações usamos o exploit para gerar o erro desejado.
 


```php
    #ERROS MYSQL
    $erro['MYSQL-01'] = 'mysql_';
    $erro['MYSQL-02'] = 'You have an error in your SQL syntax;';
    $erro['MYSQL-03'] = 'Warning: mysql_';
    $erro['MYSQL-04'] = 'function.mysql';
    $erro['MYSQL-05'] = 'MySQL result index';
    $erro['MYSQL-06'] = 'syntax;';
    $erro['MYSQL-07'] = 'MySQL';
    #ERROS MICROSOFT
    $erro['MICROSOFT-01'] = 'Microsoft JET Database';
    $erro['MICROSOFT-02'] = 'ODBC Microsoft Access Driver';
    $erro['MICROSOFT-03'] = '500 - Internal server error';
    $erro['MICROSOFT-04'] = 'Microsoft OLE DB Provider';
    $erro['MICROSOFT-05'] = 'Unclosed quotes';
    $erro['MICROSOFT-06'] = 'ADODB.Command';
    $erro['MICROSOFT-07'] = 'ADODB.Field error';
    $erro['MICROSOFT-08'] = 'Microsoft VBScript';
    #ERROS ORACLE
    $erro['ORACLE-01'] = 'Microsoft OLE DB Provider for Oracle';
    $erro['ORACLE-02'] = 'ORA-';
    #ERROS POSTGRESQL
    $erro['POSTGRESQL-01'] = 'pg_';
    $erro['POSTGRESQL-02'] = 'Warning: pg_';
    $erro['POSTGRESQL-03'] = 'PostgreSql Error:';
    #ERROS PHP
    $erro['ERROPHP-01'] = 'Warning: include';
    $erro['ERROPHP-02'] = 'Fatal error: include';
    $erro['ERROPHP-03'] = 'Warning: require';
    $erro['ERROPHP-04'] = 'Fatal error: require';
    $erro['ERROPHP-05'] = 'ADODB_Exception';
    #ERROS ASP
    $erro['ERROASP-01'] = 'Version Information: Microsoft .NET Framework';
    $erro['ERROASP-02'] = "Server.Execute Error";
    #ERROS INDEFINIDOS
    $erro['INDEFINIDO-01'] = 'SQL';
    $erro['INDEFINIDO-02'] = 'Fatal error';
    $erro['INDEFINIDO-03'] = 'Warning';
```
---------------------------------------------------------------------------------------------

Cada url encontrada vai passar pelas validações predefinidas em sua configuração, Seja uma busca  [PADRÃO]
ou [PERSONALIZADO], chegando em seu termino o scan salva as urls validadas no arquivo txt definido.


- Video Tutorial 01 
--------
*[ SCANNER INURLMAIL 1.0 ]*

[![TUTORIAL / SCANNER INURLBR 1.0 ](http://img.youtube.com/vi/DFY2VHD5cIc/0.jpg)](http://www.youtube.com/watch?v=DFY2VHD5cIc)


- Video Tutorial 02
--------
*[ SCANNER INURLBR 1.0 ]*

[![Tutorial / SCANNER INURLBR 1.0 ](http://img.youtube.com/vi/XIuO_U91kVU/0.jpg)](http://www.youtube.com/watch?v=XIuO_U91kVU)
