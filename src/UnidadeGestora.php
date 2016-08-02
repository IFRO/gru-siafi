<?php
/**
 * Created by PhpStorm.
 * User: jorgevilaca
 * Date: 21/12/15
 * Time: 13:44
 */

namespace GruSiafi;

/**
*
*/
class UnidadeGestora
{

    private $codigo;

    private $gestao;

    private $nomeUnidade;

    private $codigoRecolhimento;

    private $codigoCorrelacao;


    /**
     * Construtor
     *
     * @param $codigo
     * @param $gestao
     * @param $nomeUnidade
     * @param $codigoRecolhimento
     * @param $codigoCorrelacao
     */
    function __construct(
        $codigo = null,
        $gestao = null,
        $nomeUnidade = null,
        $codigoRecolhimento = null,
        $codigoCorrelacao = null)
    {
        $this
            ->setCodigo($codigo)
            ->setGestao($gestao)
            ->setNomeUnidade($nomeUnidade)
            ->setCodigoRecolhimento($codigoRecolhimento)
            ->setCodigoCorrelacao($codigoCorrelacao);
    }

    /**
     * @return mixed
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * @param mixed $codigo
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * @param mixed $gestao
     * @return UnidadeGestora
     */
    public function setGestao($gestao)
    {
        $this->gestao = $gestao;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getGestao()
    {
        return $this->gestao;
    }

    /**
     * @return mixed
     */
    public function getNomeUnidade()
    {
        return $this->nomeUnidade;
    }

    /**
     * @param mixed $nomeUnidade
     */
    public function setNomeUnidade($nomeUnidade)
    {
        $this->nomeUnidade = $nomeUnidade;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCodigoRecolhimento()
    {
        return $this->codigoRecolhimento;
    }

    /**
     * @param mixed $codigoRecolhimento
     */
    public function setCodigoRecolhimento($codigoRecolhimento)
    {
        $this->codigoRecolhimento = $codigoRecolhimento;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCodigoCorrelacao()
    {
        return $this->codigoCorrelacao;
    }

    /**
     * @param mixed $codigoRecolhimento
     */
    public function setCodigoCorrelacao($codigoCorrelacao)
    {
        $this->codigoCorrelacao = $codigoCorrelacao;

        return $this;
    }

    public function toArray()
    {
        // TODO: Verificar necessidade de informar tambem o nome do recolhimento
        return [
            'codigo_favorecido'   => $this->getCodigo(),
            'gestao'              => $this->getGestao(),
            'nome_favorecido'     => $this->getNomeUnidade(),
            'codigo_recolhimento' => $this->getCodigoRecolhimento(),
            'codigo_correlacao'   => $this->getCodigoCorrelacao()
        ];
    }
}
