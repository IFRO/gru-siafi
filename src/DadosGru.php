<?php
/**
 * Created by PhpStorm.
 * User: jorgevilaca
 * Date: 21/12/15
 * Time: 13:03
 */

namespace GruSiafi;


class DadosGru
{
    /**
     * Número de Referência
     *
     * Número com até 20 dígitos que pode ser utilizado
     * pelo Órgão favorecido para identificar o pagamento.
     *
     * Caso o seu preenchimento seja obrigatório,
     * deve ser obtido junto ao Órgão beneficiado pelo pagamento.
     *
     * Campo obrigatório
     *
     * @var
     */
    private $referencia;

    /**
     * Competência
     *
     * Mês e ano a que se refere o recolhimento.
     *
     * Formato: MM/AAAA, onde MM representa o mês e AAAA representa o ano.
     *
     * Caso o seu preenchimento seja obrigatório,
     * deve ser obtido junto ao Órgão beneficiado pelo pagamento.
     *
     * @var
     */
    private $competencia;


    /**
     * Vencimento
     *
     * Data limite para efetuar o pagamento da GRU
     * sem a cobrança de multas e juros.
     *
     * Formato: DD/MM/AAAA, onde
     * DD representa o dia,
     * MM representa o mês e AAAA
     * representa o ano.
     *
     * Caso o seu preenchimento seja obrigatório,
     * deve ser obtido junto ao Órgão beneficiado pelo pagamento.
     *
     * @var
     */
    private $vencimento;


    /**
     * CNPJ ou CPF do Contribuinte
     *
     * Campo obrigatório
     *
     * @var
     */
    private $cnpj_cpf;

    /**
     * Nome do Contribuinte / Recolhedor
     *
     * Campo obrigatório
     *
     * @var
     */
    private $nome_contribuinte;

    /**
     * Valor Principal
     *
     * Campo obrigatório
     *
     * @var
     */
    private $valorPrincipal;

    /**
     * @var
     */
    private $descontos;

    /**
     * @var
     */
    private $deducoes;

    /**
     * @var
     */
    private $multa;

    /**
     * @var
     */
    private $juros;

    /**
     * @var
     */
    private $acrescimos;

    /**
     * Valor Total
     *
     * Valor Total = (Valor Principal) – (Descontos/Abatimentos) – (Outras Deduções) +
     *               (Mora/Multa) + (Juros/Encargos) + (Outros Acréscimos)
     *
     * Todos os valores devem ser obtidos
     * junto ao Órgão beneficiado pelo pagamento.
     *
     * Campo obrigatório
     *
     * @var
     */
    private $valorTotal;

    //private $boleto    = '3'; // 3 HTML FORMAT

    private $impressao = 'S';

    private $pagamento = '0';

    private $campo     = 'NRCR';

    private $ind       = '0';

    /**
     * @return mixed
     */
    public function getDescontos()
    {
        return $this->descontos;
    }

    /**
     * @param mixed $descontos
     * @return DadosGru
     */
    public function setDescontos($descontos)
    {
        $this->descontos = $descontos;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDeducoes()
    {
        return $this->deducoes;
    }

    /**
     * @param mixed $deducoes
     * @return DadosGru
     */
    public function setDeducoes($deducoes)
    {
        $this->deducoes = $deducoes;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMulta()
    {
        return $this->multa;
    }

    /**
     * @param mixed $multa
     * @return DadosGru
     */
    public function setMulta($multa)
    {
        $this->multa = $multa;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getJuros()
    {
        return $this->juros;
    }

    /**
     * @param mixed $juros
     * @return DadosGru
     */
    public function setJuros($juros)
    {
        $this->juros = $juros;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAcrescimos()
    {
        return $this->acrescimos;
    }

    /**
     * @param mixed $acrescimos
     * @return DadosGru
     */
    public function setAcrescimos($acrescimos)
    {
        $this->acrescimos = $acrescimos;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getValorTotal()
    {
        return $this->valorTotal;
    }

    /**
     * @param mixed $valorTotal
     * @return DadosGru
     */
    public function setValorTotal($valorTotal)
    {
        $this->valorTotal = $valorTotal;

        return $this;
    }


    /**
     * @return mixed
     */
    public function getValorPrincipal()
    {
        return $this->valorPrincipal;
    }

    /**
     * @param mixed $valorPrincipal
     * @return DadosGru
     */
    public function setValorPrincipal($valorPrincipal)
    {
        $this->valorPrincipal = $valorPrincipal;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNomeContribuinte()
    {
        return $this->nome_contribuinte;
    }

    /**
     * @param mixed $nome_contribuinte
     * @return DadosGru
     */
    public function setNomeContribuinte($nome_contribuinte)
    {
        $this->nome_contribuinte = $nome_contribuinte;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCnpjCpf()
    {
        return $this->cnpj_cpf;
    }

    /**
     * @param mixed $cnpj_cpf
     * @return DadosGru
     */
    public function setCnpjCpf($cnpj_cpf)
    {
        $this->cnpj_cpf = $cnpj_cpf;

        return $this;
    }


    /**
     * @return mixed
     */
    public function getVencimento()
    {
        return $this->vencimento;
    }

    /**
     * @param mixed $vencimento
     * @return DadosGru
     */
    public function setVencimento($vencimento)
    {
        $this->vencimento = $vencimento;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCompetencia()
    {
        return $this->competencia;
    }

    /**
     * @param mixed $competencia
     * @return DadosGru
     */
    public function setCompetencia($competencia)
    {
        $this->competencia = $competencia;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getReferencia()
    {
        return $this->referencia;
    }

    /**
     * @param mixed $referencia
     */
    public function setReferencia($referencia)
    {
        $this->referencia = $referencia;

        return $this;
    }

    public function __construct($referencia, $cpf_cnpj, $nome_contribuinte, $valorPrincipal, $valorTotal)
    {
        $this->setReferencia($referencia)
            ->setCnpjCpf($cpf_cnpj)
            ->setNomeContribuinte($nome_contribuinte)
            ->setValorPrincipal($valorPrincipal)
            ->setValorTotal($valorTotal);
    }

    public function toArray()
    {
        return get_object_vars($this);
    }
}
