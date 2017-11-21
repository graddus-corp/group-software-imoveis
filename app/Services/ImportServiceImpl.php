<?php

namespace GroupSoftware\Services;

use Storage;
use XmlParser;
use GroupSoftware\Services\Interfaces\ImportService;
use GroupSoftware\Validators\ImportValidator;
use GroupSoftware\Repositories\Interfaces\PropertiesRepository;

class ImportServiceImpl implements ImportService {

    private $repository;

    public function __construct(PropertiesRepository $repository) {
        $this->repository = $repository;
    }

    public function import(array $request) {
        (new ImportValidator($request, null))->create();

        $xml = XmlParser::load($request['xml']);
        $properties = $user = $xml->parse([
            'properties' => ['uses' => 'Imoveis.Imovel[CodigoImovel>code,TipoImovel>type,Cidade>city,UF>state,Bairro>neighborhood,Numero>number,Complemento>complement,CEP>zipcode,PrecoVenda>sale_price,PrecoLocacao>rental_price,PrecoLocacaoTemporada>seasonal_rental_price,AreaTotal>area,QtdDormitorios>bedrooms,QtdSuites>suites,QtdBanheiros>bathrooms,QtdSalas>rooms,QtdVagas>garage,Observacao>description,Fotos.Foto.URLArquivo>image]']
        ]);

        if(count($properties['properties']) > 0)
            $this->repository->insert($properties['properties']);

    }

}
