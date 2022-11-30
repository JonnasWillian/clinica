<?php

include '../dados/conexaoBD.php';

conectar($hostname,$bd,$usuario,$senha);

require '../vendor/autoload.php';

$array = $_POST['array'];

$arr2 = str_split($array, 98);

$sql = "SELECT * FROM clientes WHERE nome = '".$_POST['nome']."'";
$resultado = mysqli_query($mysql, $sql) or die ("Falha na consulta !" . $sql);

foreach($resultado as $cad){

    $nome = $cad['nome'];
    $email = $cad['email'];
    $idade = $cad['idade'];
    $telefone = $cad['telefone'];
    $planSaude = $cad['planSaude'];
    $probSaude = $cad['probSaude'];
    $doutor = $cad['doutor'];
    $num_plan = $cad['num_plan'];
    $cpf = $cad['cpf'];
}

//echo "<pre>";var_dump($nome, $email, $idade, $telefone, $planSaude, $probSaude, $doutor);exit;

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$dompdf = new \Dompdf\Dompdf;

$html = "<html>

<head>
    <style>

    .array{
        min-width:100px;
    }

    .arrayFunction{
        min-width:100px;
        font-size:14px;
    }

        @page {
            margin: 0cm 0cm;
        }

        .center{
            text-align:center;
        }

        .centerCenter{
            text-align:center;
            color:Grey;
        }

        body {
            margin-top: -3cm;
            margin-left: 1cm;
            margin-right: 0cm;
            margin-bottom: 2cm;
            font-family: Arial, Helvetica, sans-serif;
        }

        header: nth-child(n+1){
            display: none;
        } 

        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 3cm;
        }

        .form: nth-child(n+6){
            display: none;
        } 

        .page:after {
            content: counter(page, my-sec-counter);
        }
        .pageFinal:after {
            content: counter(page, my-sec-counter);
        }

        .fixarRodape {
            bottom: -12;
            position: fixed;
            width: 95%;
            text-align: center;
            display: inline-block;
        }
        
        .fixarRodape: nth-child(n+0){
            display: none;
        } 
          

        footer {
            position: fixed; 
            bottom: 0cm; 
            left: 0cm; 
            right: 0cm;
            height: 2cm;
        }

        .entregas{
            font: 25px;
        }

        .inicio{
            background: rgba(173,216,230, 0.4);
            width:100%;
        }

        .obs{
            text-align:left;
            width:1004px;
            text-align:justify;
        }

        .valores{
            width:100px;
        }

        .dados{
            width:100px;
        }
        .entrega{
            white-space: nowrap;
            text-overflow: ellipsis;
        }

        @page { margin: 120px 50px 80px 50px; } #head{ font-size: 20px; text-align: center; height: 130px; width: 100%; position: fixed; top: -130px; left: 0; right: 0; margin: auto; } #body{ width: 600px; position: relative; margin: auto; } #footer { position: fixed; bottom: 0; width: 100%; text-align: right; border-top: 1px solid gray; } #footer .page:after{ content: counter(page); }


    </style>
    
</head>

<body>

    <footer class = fixarRodape>
        <div class = page> Página </div> 
    </footer>
    
    </header>

    <br>"
;
//<option>Cristiane Moura dos Santos</option>
//<option>Marcela Silva Bandeira Moura</option>

if (($doutor == 'Marcela Silva Bandeira Moura') && ($planSaude == 'Bradesco') ){
    $html .= "
        <div class='centerCenter'>
            <h4>Marcela Silva Bandeira Moura</h4>
            <span>Cpf: 027.732.135-21 -- CRFITO: 325685-F</span>
        </div>
        <div class='center'>
        <h2><b>Recebido</b></h2>
        <p> R$ 2400,00 </p>
    </div>

    <div class='center'>
        <p> Recebi do SR(a). $nome, associado ao plano de Saúde Bradesco matrícula $num_plan a 
        importância de R$2400,00 (dois mil e quatrocentos reais) referente a 40 sessões de FISIOTERAPIA,
         segundo a tabela AMB/90,  sob código 25.05.005-2 realizadas nas seguintes datas: </p>
    </div>

    </div>

    <div class='arrayFunction'>
    ";
    foreach ($arr2 as $newarray){$html .= "
        <p> ".$newarray ." </p>
    ";}
    $html .= "
    </div><br><br>

    <div class='center'>
        <h2> RELATÓRIO </h2>
        <p> 
        O(a) paciente $nome apresenta quadro de lombociatalgia com irradiação para MMII e dorsalgia, 
        associados a processos degenerativos e desvios posturais, na qual muitas vezes limita suas atividades de
         vida diária. Indicado fisioterapia por tempo indeterminado para melhora da dor e da qualidade de vida. 
         Indicada TENS, US, INFRA, fortalecimento, analgesia de intensidade com crioterapia, e evoluir com 
         alongamentos.
        </p>
    </div><br><br>

</div>

</body>
<title>Ficha<title>
</html>";


}else if (($doutor == 'Cristiane Moura dos Santos') && ($planSaude == 'Bradesco')){
    $html .= "
    <div class='centerCenter'>
        <h4>Cristiane Moura dos Santos</h4>
        <span>Cpf: 048.076.715-70 -- CRFITO: 187768-F</span>
    </div>
    <div class='center'>
    <h2><b>Recebido</b></h2>
    <p> R$ 2400,00 </p>
</div>

<div class='center'>
    <p> Recebi do SR(a). $nome, associado ao plano de Saúde Bradesco matrícula $num_plan a 
    importância de R$2400,00 (dois mil e quatrocentos reais) referente a 40 sessões de FISIOTERAPIA,
     segundo a tabela AMB/90,  sob código 25.05.005-2 realizadas nas seguintes datas: </p>
</div>

</div>

<div class='arrayFunction'>
";
foreach ($arr2 as $newarray){$html .= "
    <p> ".$newarray." </p>
";}
$html .= "
</div><br><br>

<div class='center'>
    <h2> RELATÓRIO </h2>
    <p> 
    O(a) paciente $nome apresenta quadro de lombociatalgia com irradiação para MMII e dorsalgia, 
    associados a processos degenerativos e desvios posturais, na qual muitas vezes limita suas atividades de
     vida diária. Indicado fisioterapia por tempo indeterminado para melhora da dor e da qualidade de vida. 
     Indicada TENS, US, INFRA, fortalecimento, analgesia de intensidade com crioterapia, e evoluir com 
     alongamentos.
    </p>
</div><br><br>

</div>

</body>
<title>Ficha<title>
</html>";
}else if (($doutor == 'Cristiane Moura dos Santos') && ($planSaude == 'Sulamerica')){
    $html .= "
    <div class='centerCenter'>
        <h4>Cristiane Moura dos Santos</h4>
        <span>Cpf: 048.076.715-70 -- CRFITO: 187768-F</span>
    </div>
    <div class='center'>
    <h2><b>Recebido</b></h2>
    <p> R$ 900,00 </p>
</div>

<div class='center'>
    <p> Recebi do SR(A). $nome a importância de novecentos reais referente a 10 sessões de 
    FISIOTERAPIA sob código da AMB 25050052, 25060040, 25060104 realizadas no(a) Sr.(a) acima, nas seguintes datas:
     </p>
</div>

</div>

<div class='arrayFunction'>
";
foreach ($arr2 as $newarray){$html .= "
    <p> ".$newarray." </p>
";}
$html .= "
</div><br><br>

<div class='center'>
    <h2> RELATÓRIO </h2>
    <p> 
    O(A) paciente $nome apresenta quadro de dor lombar baixa com irradiação para MMII e cervicalgia com 
    irradiação para MMSS, associados a desvios posturais, na qual muitas vezes limita suas atividades de vida diária. 
    Indicado fisioterapia por tempo indeterminado para melhora da qualidade de vida. Indicado fortalecimento, treino 
    de marcha, analgesia de intensidade com crioterapia, TENS, US, INFRA e evoluir com alongamentos. Indicação de 
    fisioterapia por mais de 50 sessões. 
    </p>
</div><br><br>

</div>

</body>
<title>Ficha<title>
</html>";
}else if (($doutor == 'Marcela Silva Bandeira Moura') && ($planSaude == 'Sulamerica')){
    $html .= "
    <div class='centerCenter'>
    <h4>Marcela Silva Bandeira Moura</h4>
    <span>Cpf: 027.732.135-21 -- CRFITO: 325685-F</span>
</div>
    <div class='center'>
    <h2><b>Recebido</b></h2>
    <p> R$ 900,00 </p>
</div>

<div class='center'>
    <p> Recebi do SR(A). $nome a importância de novecentos reais referente a 10 sessões de 
    FISIOTERAPIA sob código da AMB 25050052, 25060040, 25060104 realizadas no(a) Sr.(a) acima, nas seguintes datas:
     </p>
</div>

</div>

<div class='arrayFunction'>
";
foreach ($arr2 as $newarray){$html .= "
    <p> ".$newarray." </p>
";}
$html .= "
</div><br><br>

<div class='center'>
    <h2> RELATÓRIO </h2>
    <p> 
    O(A) paciente $nome apresenta quadro de dor lombar baixa com irradiação para MMII e cervicalgia com 
    irradiação para MMSS, associados a desvios posturais, na qual muitas vezes limita suas atividades de vida diária. 
    Indicado fisioterapia por tempo indeterminado para melhora da qualidade de vida. Indicado fortalecimento, treino 
    de marcha, analgesia de intensidade com crioterapia, TENS, US, INFRA e evoluir com alongamentos. Indicação de 
    fisioterapia por mais de 50 sessões. 
    </p>
</div><br><br>

</div>

</body>
<title>Ficha<title>
</html>";
}else if (($doutor == 'Marcela Silva Bandeira Moura') && ($planSaude == 'Unimed')){
    $html .= "
    <div class='centerCenter'>
    <h4>Marcela Silva Bandeira Moura</h4>
    <span>Cpf: 027.732.135-21 -- CRFITO: 325685-F</span>
</div>
    <div class='center'>
    <h2><b>Recebido</b></h2>
    <p> R$ 1200,00 </p>
</div>

<div class='center'>
    <p>
    Recebi do(a) SR(A). $nome, inscrita no CPF $cpf, a importância de mil e duzentos reais 
    referente a 20(vinte) sessões de FISIOTERAPIA sob código da AMB 25050052, 25060040, 25060104 realizadas no(a) 
    Sr.(a) acima, nas seguintes datas:
    </p>
</div>

</div>

<div class='arrayFunction'>
";
foreach ($arr2 as $newarray){$html .= "
    <p> ".$newarray." </p>
";}
$html .= "
</div><br><br>

<div class='center'>
    <h2> RELATÓRIO </h2>
    <p> 
    O(A) paciente $nome apresenta quadro de dor lombar baixa com irradiação para MMII e cervicalgia com 
    irradiação para MMSS, associados a desvios posturais, na qual muitas vezes limita suas atividades de vida diária.
     Indicado fisioterapia por tempo indeterminado para melhora da qualidade de vida. Indicado fortalecimento, treino 
     de marcha, analgesia de intensidade com crioterapia, TENS, US, INFRA e evoluir com alongamentos. Indicação de 
     fisioterapia por mais de 50 sessões. 
    </p>
</div><br><br>

</div>

</body>
<title>Ficha<title>
</html>";
}else if (($doutor == 'Cristiane Moura dos Santos') && ($planSaude == 'Unimed')){
    $html .= "
    <div class='centerCenter'>
        <h4>Cristiane Moura dos Santos</h4>
        <span>Cpf: 048.076.715-70 -- CRFITO: 187768-F</span>
    </div>
    <div class='center'>
    <h2><b>Recebido</b></h2>
    <p> R$ 1200,00 </p>
</div>

<div class='center'>
    <p>
    Recebi do(a) SR(A). $nome, inscrita no CPF $cpf, a importância de mil e duzentos reais 
    referente a 20(vinte) sessões de FISIOTERAPIA sob código da AMB 25050052, 25060040, 25060104 realizadas no(a) 
    Sr.(a) acima, nas seguintes datas:
    </p>
</div>

</div>

<div class='arrayFunction'>
";
foreach ($arr2 as $newarray){$html .= "
    <p> ".$newarray." </p>
";}
$html .= "
</div><br><br>

<div class='center'>
    <h2> RELATÓRIO </h2>
    <p> 
    O(A) paciente $nome apresenta quadro de dor lombar baixa com irradiação para MMII e cervicalgia com 
    irradiação para MMSS, associados a desvios posturais, na qual muitas vezes limita suas atividades de vida diária.
     Indicado fisioterapia por tempo indeterminado para melhora da qualidade de vida. Indicado fortalecimento, treino 
     de marcha, analgesia de intensidade com crioterapia, TENS, US, INFRA e evoluir com alongamentos. Indicação de 
     fisioterapia por mais de 50 sessões. 
    </p>
</div><br><br>

</div>

</body>
<title>Ficha<title>
</html>";
}

$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream('Ficha.pdf', ["Attachment" => false]);
$pdf = $dompdf->output();

?>