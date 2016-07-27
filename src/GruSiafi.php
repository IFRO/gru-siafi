<?php
namespace GruSiafi;

/**
*
*/
class GruSiafi
{
    // TODO: get from config
    private static $baseUrl = "http://consulta.tesouro.fazenda.gov.br/";

    private static $gerarPdfPath = 'gru_novosite/gerarPDF.asp';

    /**
     * Unidade Gestora
     * @var
     */
    private $ug;

    /**
     * Dados gerais da GRU
     *
     * @var
     */
    private $dadosGru;

    /**
     * @return mixed
     */
    public function getDadosGru()
    {
        return $this->dadosGru;
    }

    /**
     * @param mixed $dadosGru
     */
    public function setDadosGru($dadosGru)
    {
        $this->dadosGru = $dadosGru;
    }

    /**
     * @param mixed $ug
     * @return GruSiafi
     */
    public function setUg($ug)
    {
        $this->ug = $ug;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUg()
    {
        return $this->ug;
    }

    /**
     * Obtem o PDF
     * @return string
     */
    public function getPDF()
    {
        $form_params = array_merge(
            $this->getUg()->toArray(),
            $this->getDadosGru()->toArray()
        );

        // os parametros devem ser todos convertidos para string
        foreach ($form_params as $key => $value) {
            $form_params[$key] = (string) $value;
        }

        $data = [
            //'allow_redirects' => true,
            'timeout' => 30,
            'headers' => [
                "cache-control" => "no-cache",
                "content-type"  => "application/x-www-form-urlencoded",
            ],
            'form_params' => $form_params,
        ];

        $response = $this->client->post(static::$gerarPdfPath, $data);

        return $response->getBody();
    }

    /*
     * Salva o PDF no caminho indicado
     */
    public function savePDF($filePath)
    {
        if (!isset($filePath)) {
            throw new Exception("Caminho para o arquivo não informado.", 1);
        }

        $pdf = fopen($filePath, "w") or
            die("Unable to open file!");

        fwrite($pdf, $this->getPDF());

        fclose($pdf);

        return true;
    }


    /**
     * Inicializa um objeto GruSiafi
     *
     * @param UnidadeGestora $ug
     * @param DadosGru $dadosGru
     */
    function __construct(UnidadeGestora $ug, DadosGru $dadosGru)
    {
        $this->setUg($ug);

        $this->setDadosGru($dadosGru);

        $this->client = new \GuzzleHttp\Client(['base_uri' => static::$baseUrl]);
    }

}
