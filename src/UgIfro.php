<?php
/**
 * Created by PhpStorm.
 * User: jorgevilaca
 * Date: 21/12/15
 * Time: 13:44
 */

namespace GruSiafi;

class UgIfro extends UnidadeGestora
{
    public function __construct()
    {
        $this
            ->setCodigo('158148')
            ->setGestao('26421')
            ->setCodigoCorrelacao('10428')
            ->setNomeUnidade('INST.FED.DE EDUC.,CIENC.E TEC.DE RONDONIA');
    }
}
