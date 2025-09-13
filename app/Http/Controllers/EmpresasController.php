<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Empresas;

use Illuminate\Support\Facades\Storage;

class EmpresasController extends Controller
{
    public function index()
    {
        $empresas = Empresas::all();
        return view('empresas.index', compact('empresas'));
    }

    public function exibir_inclusao()
    {
        $empresas = Empresas::all();
        return view('empresas.exibir_inclusao', compact('empresas'));
    }

    public function importar()
    {
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '-1');
        
        $inicio = microtime(true);

        $caminhoArquivo = storage_path('app/empresas.txt');

        $leituraArquivo = fopen($caminhoArquivo, "r");

        $limite = 1000;
        $dados = [];
        $contador = 0;

        while (($linha = fgets($leituraArquivo))) {
            $campos = explode(';', trim($linha));

            if (count($campos) < 7) {
                continue;
            }

            $dados[] = [
                'cnpj_basico' => $campos[0],
                'razao_social' => $campos[1],
                'natureza_juridica' => $campos[2],
                'qualificacao' => $campos[3],
                'capital_social' => $campos[4],
                'porte' => $campos[5],
                'ente_federativo_responsavel' => $campos[6]
            ];

            if (count($dados) >= $limite) {
                Empresas::insert($dados);
                $contador += count($dados);
                $dados = [];
            }
        }

        if (!empty($dados)) {
            Empresas::insert($dados);
            $contador += count($dados);
        }

        fclose($leituraArquivo);

        $fim = microtime(true);
        $tempo = $fim - $inicio;
        $usoMemoria = memory_get_peak_usage(true);
        $usoMemoriaMB = round($usoMemoria / 1024 / 1024, 2);

        return "Importação concluída com sucesso!<br>
            Total de registros: {$contador}.<br>
            Tempo total: " . round($tempo, 2) . " segundos.<br>
            Pico de memória: {$usoMemoriaMB} MB";
    }

}
