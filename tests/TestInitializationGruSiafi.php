<?php

use \GruSiafi\UgIfro;
use GruSiafi\UnidadeGestora;
use \GruSiafi\GruSiafi;
use \GruSiafi\DadosGru;
use \GruSiafi\Recolhimento as R;

class TestInitializationGruSiafi extends PHPUnit_Framework_TestCase
{
    public function testConstruction () {

        // IFRO
       $ug = new UnidadeGestora();
       $ug  ->setCodigo('158148')
            ->setGestao('26421')
            ->setNomeUnidade('INST.FED.DE EDUC.,CIENC.E TEC.DE RONDONIA')
            ->setCodigoRecolhimento(R::TAXA_DE_INSCRICAO_EM_CONCURSO_PUBLICO);

        // $ug = new UgIfro();
        // $ug->setCodigoRecolhimento(R::TAXA_DE_INSCRICAO_EM_CONCURSO_PUBLICO);

        $dadosGru = new DadosGru(
            '1000123456',
            '123.456.789-00',
            'FULANO DE TAL',
            '80,00',
            '80,00');

        $gruSiafi = new GruSiafi($ug, $dadosGru);
        $this->assertNotNull($gruSiafi);
        try {
            $gruSiafi->savePDF("boleto-gru-".rand().".pdf");

        } catch (GuzzleHttp\Exception\ServerException $e) {
            $resp = $e->getResponse();
            $responseBodyAsString = $resp->getBody()->getContents();
            $myfile = fopen("./error.txt", "w") or die("Unable to open file!");
            fwrite($myfile, $responseBodyAsString);
            fclose($myfile);
        }

    }
}
