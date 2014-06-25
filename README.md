


Coloque o nome do seu script como bot.php
---------------------------------------------------------------------------------------------

Abrindo o scanner...
Quando o arquivo é iniciado no navegador o mesmo
imprime "SEM ACESSO!".

Pois temos uma sec simples.

    <CODE>
    if (isset($_GET['senha']) && $_GET['senha'] == 'googleinurl') {
        $_SESSION['valida'] = 1; //SETANDO O VALIDADOR DA PAGINA
    }
    </CODE>


Assim fica o acesso:

URL: http://localhost/bot.php?senha=googleinurl

---------------------------------------------------------------------------------------------


Agora vamos efetuar uma pesquisa simples.
Configuração:

 -*DORK...: O QUE VAI SER BUSCADO||Operadores avançados do Google.

 - PROXY + PORTA..: Caso seja bloquiado pelo Google use um proxy.

 - HOST GOOGLE..: Escolha entre 202 Domínios do google para efetuar
 sua busca.

 - *ARQUIVO SAÍDA.:ONDE VAI SER SALVO SEUS RESULTADOS DE BUSCA.

 - 0xEXPL01T.: PARÂMETRO QUE DEVE SER INJETADO A CADA URL, NO FINAL
 DAS URL'S ENCONTRADAS.
 Assim pode ser injetado uma string que gere erros ou manipulem o servidor.

 - *BUSCAR ERROS: [ PADRÃO ] /  (x)[ PERSONALIZADO ]
 VOU EXPLICAR O PERSONALIZADO  PRIMEIRO.

 - ACHAR ERRO.:É usado junto com a opção *BUSCAR ERROS: PERSONALIZADO.
 Pois foge do padrão de erros SQLI ou ERROS de programação ja configurados
 no script.
 Digamos que você deseja encontrar sites do governo que tenha a frase
 "Municipal".
 Usamos uma dork
 DORK=> site:.rj.gov.br  / Vai listar todos sites do governos Rio de Janeiro.
 ACHAR ERRO.:Municipal  / Vai procurar a palavra "Municipal" dentro das url's
 encontradas com a Dork acima.
 VAMOS LÁ.....
 AGORA VAMOS AGUARDAR....
 Depois de alguns minutos....
 O Scanner valida todo o html da url.
 agora vamos para busca de erros padrão do script.
---------------------------------------------------------------------------------------------

 - *BUSCAR ERROS: (x)[ PADRÃO ] /  [ PERSONALIZADO ]
 PADRÃO  Busca erros no modo padrão é buscar erros SQLI + Erros de programação.
 Vamos ver quais são os erros padrões do script.
 Pode ou não ser junto com exploit isso vai depender de sua dork.
 Algumas dorks já forçam o buscador a listar sites com erros.
 Em outras situações usamos o exploit para gerar o erro desejado.
 
```php

    <CODE>
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
    </CODE>
```
---------------------------------------------------------------------------------------------
AGORA VAMOS USAR O MODO SIMPLES COM EXPLOIT PADRÃO SQLI.

Exemplo de uso

DORK[0]=> inurl:cgi/cgilua.exe/sys/start.htm?sid=1

Com essa dork ele vai buscar na url cgi/cgilua.exe/sys/start.htm?sid=1[SEU EXPLOIT]
E injetar o exploit no final de cada resultado.
Ficamdo da seguinte forma:

http://www.site01.com.br/pasta/cgi/cgilua.exe/sys/start.htm?sid=1'0x272D2D3B
http://www.site02.com.br/cgi/cgilua.exe/sys/start.htm?sid=5'0x272D2D3B
http://site03.gov.br/pasta1/pasta2/cgi/cgilua.exe/sys/start.htm?sid=2'0x272D2D3B

O script vai executar internamente as urls encontradas + Exploits.
Achando algum erro padrão dentro do html da pagina é logo destacado como vull.
