@extends('template.layout')

@section('page-content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-warning text-center">
                                    <i class="ti-home"></i>
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p>Imóveis</p>
                                    <h5>{{$count}}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr />
                            <div class="stats">
                                <i class="ti-info-alt"></i> Número total de imóveis cadastrados
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Imóveis</h4>
                        <p class="category">Lista de imóveis cadastrados</p>
                    </div>
                    <div class="content m-t-15">

                        <div class="m-b-30">
                            <a href="{{route('properties.create')}}" class="btn btn-lg btn-success">
                                <i class="ti-plus"></i> Cadastrar Imóvel
                            </a>
                        </div>

                        <table id="tbl-properties" class="display" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Tipo</th>
                                    <th>Imóvel</th>
                                    <th>Endereço</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>Área(m2)</th>
                                    <th>Preço(R$)</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#tbl-properties').DataTable({
                'language': {
                    "sEmptyTable": "Nenhum registro encontrado",
                    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sInfoThousands": ".",
                    "sLengthMenu": "_MENU_ resultados por página",
                    "sLoadingRecords": "Carregando...",
                    "sProcessing": "Processando...",
                    "sZeroRecords": "Nenhum registro encontrado",
                    "sSearch": "Pesquisar",
                    "oPaginate": {
                        "sNext": "Próximo",
                        "sPrevious": "Anterior",
                        "sFirst": "Primeiro",
                        "sLast": "Último"
                    },
                    "oAria": {
                        "sSortAscending": ": Ordenar colunas de forma ascendente",
                        "sSortDescending": ": Ordenar colunas de forma descendente"
                    }
                },
                'ajax' : "{{route('ajax.properties.list')}}",
                'columns' : [
                    {'data' : 'code'},
                    {'data' : 'type'},
                    {'data' : 'property'},
                    {'data' : 'street'},
                    {'data' : 'number'},
                    {'data' : 'complement'},
                    {'data' : 'neighborhood'},
                    {'data' : 'city'},
                    {'data' : 'state'},
                    {'data' : 'sale_price'},
                    {'data' : 'rental_price'},
                    {'data' : 'seasonal_rental_price'},
                    {'data' : 'area'},
                    {'data' : 'total'},
                    {'data' : 'id'}
                ],
                'columnDefs': [
                    {
                        'targets' : 1,
                        'render' : function(data, type, row) {
                            if(data == 'Casa')
                                return 'Casa';
                            else if(data == 'Apartamento')
                                return 'Apartamento';
                            else
                                return '-';
                        }
                    },
                    {
                        'targets' : 2,
                        'render' : function(data, type, row) {
                            if(data == null || data == '')
                                return '-';
                            else
                                return data;
                        }
                    },
                    {
                        'targets' : 3,
                        'render' : function(data, type, row) {
                            var street = '';
                            var number = '';
                            var complement = '';
                            var neighborhood = '';
                            var city = '';
                            var state = '';

                            if(row.street == null || row.street == '')
                                street = '';
                            else
                                street = row.street + ', ';

                            if(row.number == null || row.number == '')
                                number = '';
                            else
                                number = row.number + ', ';

                            if(row.complement == null || row.complement == '')
                                complement = '';
                            else
                                complement = row.complement + ', ';

                            if(row.neighborhood == null || row.neighborhood == '')
                                neighborhood = '';
                            else
                                neighborhood = row.neighborhood + ', ';

                            if(row.city == null || row.city == '')
                                city = '';
                            else
                                city = row.city + ', ';

                            if(row.state == null || row.state == '')
                                state = '';
                            else
                                state = row.state;

                            return street + number + complement + neighborhood + city + state;
                        }
                    },
                    {
                        'targets' : 4,
                        'visible' : false
                    },
                    {
                        'targets' : 5,
                        'visible' : false
                    },
                    {
                        'targets' : 6,
                        'visible' : false
                    },
                    {
                        'targets' : 7,
                        'visible' : false
                    },
                    {
                        'targets' : 8,
                        'visible' : false
                    },
                    {
                        'targets' : 9,
                        'visible' : false
                    },
                    {
                        'targets' : 10,
                        'visible' : false
                    },
                    {
                        'targets' : 11,
                        'visible' : false
                    },
                    {
                        'targets' : 13,
                        'render' : function(data, type, row) {
                            if(row.sale_price != null && row.sale_price != 0)
                                return row.sale_price;
                            else if(row.rental_price != null && row.rental_price != 0)
                                return row.rental_price;
                            else if(row.seasonal_rental_price!= null && row.seasonal_rental_price != 0)
                                return row.seasonal_rental_price;
                            else
                                return '-';
                        }
                    },
                    {
                        'targets' : 14,
                        'searchable': false,
                        'orderable': false,
                        'render' : function(data) {
                            var actions = '' +
                                    '<a href="imoveis/'+data+'"><i class="ti-pencil-alt" title="Editar"></i></a>&nbsp;&nbsp;' +
                                    '<a class="action-delete" href="javascript:void(0)" onclick="actionDelete('+data+')"><i class="ti-trash" title="Excluir"></i></a>';

                            return actions;
                        }
                    }
                ],
            });
        });
    </script>
@endsection
