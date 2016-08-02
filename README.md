# GRU Siafi

Este módulo tem a intenção de ser uma ponte para a geração do boleto GRU a partir do site do tesouro, diretamente no seu site

## Uso

O projeto é baseado em [composer](https://getcomposer.org/).

Crie um diretório e inicie um projeto composer com o comando `composer init`.

Inclua no seu projeto a dependência deste módulo com o comando `composer require ifro/gru-siafi`.

Crie um diretório *public* dentro do seu projeto e acrescente um arquivo `index.php`.

`mkdir public`
`touch public/index.php`

No arquivo *index.php*, inclua o autoload do composer:

```php
<?php

require __DIR__.'/../vendor/autoload.php';
```

Faça o *use* das classes necessárias:

```php
use \GruSiafi\UgIfro;
use \GruSiafi\UnidadeGestora;
use \GruSiafi\GruSiafi;
use \GruSiafi\DadosGru;
use \GruSiafi\Recolhimento as R;
```

Inicialize e configure o objeto que define a UG (Unidade Gestora) para qual o boleto
está sendo gerado

```php
$ug = new UnidadeGestora();
$ug->setCodigo('158148')
    ->setGestao('26421')
    ->setCodigoCorrelacao('10428')
    ->setNomeUnidade('INST.FED.DE EDUC.,CIENC.E TEC.DE RONDONIA')
    ->setCodigoRecolhimento(R::TAXA_DE_INSCRICAO_EM_CONCURSO_PUBLICO);
```

Inicialize os dados da GRU informado um sequencial único, CPF, Nome do Contribuinte e os valores:

```php
$dadosGru = new DadosGru(
    '1000123456',
    '123.456.789-00',
    'FULANO DE TAL',
    '80,00',
    '80,00');
```

Inicialize o objeto da GRU passando o objeto da Unidade Gestora e os dados da GRU.
Configure os cabeçalhos da resposta para o tipo PDF, obtenha o PDF e imprima na resposta.

```php
$gruSiafi = new GruSiafi($ug, $dadosGru);

header("Content-type:application/pdf");
header("Content-Disposition:inline");

echo $gruSiafi->getPDF();
```

Você pode iniciar o servidor de testes com o comando:

`php -S 0.0.0.0:8083 -t public`

Abra seu navegador na URL `http://localhost:8083`, você deverá ver a sua GRU gerada em PDF na janela do seu navegador.
