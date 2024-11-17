<?php 
include('layouts/header.php');

echo "<div class='text-center mt-4'>
    <a href='index.php' class='btn btn-secondary'>Voltar para a Página Inicial</a>
</div>";

$data_nascimento = $_POST['data_nascimento'];

if (!$data_nascimento) {
    echo "<div class='alert alert-danger'>Por favor, insira uma data válida.</div>";
    exit;
}

list($ano, $mes, $dia) = explode("-", $data_nascimento);
$data_nascimento_formatada = "$dia/$mes";

$signos = simplexml_load_file("signos.xml");

$signo_encontrado = null;

$data_nascimento_datetime = DateTime::createFromFormat('d/m', $data_nascimento_formatada);

foreach ($signos->signo as $signo) {
    $data_inicio_datetime = DateTime::createFromFormat('d/m', $signo->dataInicio);
    $data_fim_datetime = DateTime::createFromFormat('d/m', $signo->dataFim);
    $data_inicio_datetime->setDate($ano, $data_inicio_datetime->format('m'), $data_inicio_datetime->format('d'));
    $data_fim_datetime->setDate($ano, $data_fim_datetime->format('m'), $data_fim_datetime->format('d'));
    if ($data_fim_datetime < $data_inicio_datetime) {
        $data_fim_datetime->modify('+1 year');
    }
    if ($data_nascimento_datetime >= $data_inicio_datetime && $data_nascimento_datetime <= $data_fim_datetime) {
        $signo_encontrado = $signo;
        break;
    }
}
if ($signo_encontrado) {
    echo "<div class='card mt-4 p-4 shadow'>
            <h2 class='text-center'>Seu signo é {$signo_encontrado->signoNome}</h2>
            <p>{$signo_encontrado->descricao}</p>
          </div>";
} else {
    echo "<div class='alert alert-warning'>Não foi possível determinar seu signo. Verifique os dados.</div>";
}
?>
