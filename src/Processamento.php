<?php

class Retorno {
    private $tipo_registro;
    private $codigo_ug;
    private $codigo_receita;
    private $data_transferencia;
    private $convenio;
    private $id_titulo;
    private $data_liquidacao;
    private $valor_doc;
    private $valor_desconto;
    private $valor_deducoes;
    private $valor_mora_multa;
    private $valor_juros;
    private $valor_acrescimos;
    private $valor_total;
    private $agente_finaceiro;
    private $cod_regra_dados;
    private $cod_apelido_ug;
    private $mes_ano_competencia;
    private $data_vencimento;
    private $tipo_contribuinte;
    private $id_contribuinte;
    private $validacao_receita;
    private $codigo_original_ug;
    private $validacao_ug;
    private $codigo_tipo_pagamento;
    private $autenticacao;
    private $livre;

    private $tipos_registro = [
        2 => 'GRU Simples',
        3 => 'GRU Judicial',
        4 => 'GRU Depósito '
    ];
    
    private $tipos_contribuinte = [
        0 => 'Não identificado',
        1 => 'Pessoa física',
        2 => 'Pessoa jurídica'
    ];
    
    private $validacoes_receita = [
        0 => 'receita: válida',
        1 => 'receita: inválida'
    ];
    
    private $validacoes_ug = [
        0 => 'UG/Gestão: válida',
        1 => 'UG/Gestão: inválida'
    ];
    
    private $codigos_tipo_pagamento = [
        '01' => 'Dinheiro',
        '02' => 'Cheque',
        '03' => 'Outros',
    ];

    public function getTipoRegistroDesc() {
        return $this->tipos_registro[$this->tipo_registro];
    }

    public function getTipoContribuinteDesc() {
        return $this->tipos_contribuinte[$this->tipo_contribuinte];
    }
    
    public function getValidacaoReceitaDesc() {
        return $this->validacoes_receita[$this->validacao_receita];
    }

    public function getValidacaoUgDesc() {
        return $this->validacoes_ug[$this->validacao_ug];
    }

    public function getCodigoTipoPagamentoDesc() {
        return $this->codigos_tipo_pagamento[$this->codigo_tipo_pagamento];
    }

    function __construct($dados) {
        $this->tipo_registro = $dados['tipo_registro'];
        $this->codigo_ug = $dados['codigo_ug'];
        $this->codigo_receita = $dados['codigo_receita'];
        $this->data_transferencia = $dados['data_transferencia'];
        $this->convenio = $dados['convenio'];
        $this->id_titulo = $dados['id_titulo'];
        $this->data_liquidacao = $dados['data_liquidacao'];
        $this->valor_doc = $dados['valor_doc'];
        $this->valor_desconto = $dados['valor_desconto'];
        $this->valor_deducoes = $dados['valor_deducoes'];
        $this->valor_mora_multa = $dados['valor_mora_multa'];
        $this->valor_juros = $dados['valor_juros'];
        $this->valor_acrescimos = $dados['valor_acrescimos'];
        $this->valor_total = $dados['valor_total'];
        $this->agente_finaceiro = $dados['agente_finaceiro'];
        $this->cod_regra_dados = $dados['cod_regra_dados'];
        $this->cod_apelido_ug = $dados['cod_apelido_ug'];
        $this->mes_ano_competencia = $dados['mes_ano_competencia'];
        $this->data_vencimento = $dados['data_vencimento'];
        $this->tipo_contribuinte = $dados['tipo_contribuinte'];
        $this->id_contribuinte = $dados['id_contribuinte'];
        $this->validacao_receita = $dados['validacao_receita'];
        $this->codigo_original_ug = $dados['codigo_original_ug'];
        $this->validacao_ug = $dados['validacao_ug'];
        $this->codigo_tipo_pagamento = $dados['codigo_tipo_pagamento'];
        $this->autenticacao = $dados['autenticacao'];
        $this->livre = $dados['livre'];
    }
}

class ArquivoRetorno
{
    const GRU_LINHA_REGEX = '/(?P<tipo_registro>\d{1})(?P<codigo_ug>\w{11})(?P<codigo_receita>\w{5})(?P<data_transferencia>\w{8})(?P<convenio>\w{17})(?P<id_titulo>\w{20})(?P<data_liquidacao>\w{8})(?P<valor_doc>\w{17})(?P<valor_desconto>\w{17})(?P<valor_deducoes>\w{17})(?P<valor_mora_multa>\w{17})(?P<valor_juros>\w{17})(?P<valor_acrescimos>\w{17})(?P<valor_total>\w{17})(?P<agente_finaceiro>\d{3})(?P<cod_regra_dados>\w{2})(?P<cod_apelido_ug>\w{5})(?P<mes_ano_competencia>\w{6})(?P<data_vencimento>\w{8})(?P<tipo_contribuinte>\d{1})(?P<id_contribuinte>\d{14})(?P<validacao_receita>\d{1})(?P<codigo_original_ug>\w{11})(?P<validacao_ug>\d{1})(?P<codigo_tipo_pagamento>\w{2})(?P<autenticacao>\w{20})(?P<livre>\w{32})/';

    public function __construct($caminho_arquivo) {
        $this->arquivo = fopen($caminho_arquivo,"r");
    }

    public function processar() {
        $resultado = [];

        while(! feof($this->arquivo))  {
            preg_match(self::GRU_LINHA_REGEX, fgets($this->arquivo), $dados);
            $resultado[] = new Retorno($dados);
        }
    
        fclose($this->arquivo);
        return $resultado;
    }
}
