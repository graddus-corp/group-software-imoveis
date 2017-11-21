@extends('template.layout')

@section('page-content')

<div class="content">
    <div class="container-fluid">

        @include('template.components.action-bar')
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">CADASTRAR IMÓVEL</h4>
                        <p class="category">Para cadastrar um novo imóvel, preencha o formulário abaixo.</p>
                    </div>

                    <div class="content">
                        <form action="{{route('properties.store')}}" method="POST" enctype="multipart/form-data">

                            @if(isset($update))
                                <input type="hidden" name="_id" value="{{$p['id']}}">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Código</label>
                                            <input type="text" class="form-control border-input" disabled value="{{$p['code']}}">
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Tipo</label>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="type" value="Apartamento" {{old('type', $p['type']) == 'Apartamento' ? 'checked' : ''}}>Apartamento
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="type" value="Casa" {{old('type', $p['type']) == 'Casa' ? 'checked' : ''}}>Casa</label>
                                        </div>
                                        @if($errors->has('type'))
                                            <div class="has-error">
                                                <span class="help-block">{{$errors->first('type')}}</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label>Título</label>
                                        <input type="text" class="form-control border-input" name="property" value="{{old('property', $p['property'])}}">
                                        @if($errors->has('property'))
                                            <div class="has-error">
                                                <span class="help-block">{{$errors->first('property')}}</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Área (m2)</label>
                                        <input type="text" class="form-control border-input" name="area" value="{{old('area', $p['area'])}}">
                                        @if($errors->has('area'))
                                            <div class="has-error">
                                                <span class="help-block">{{$errors->first('area')}}</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Quartos</label>
                                        <input type="text" class="form-control border-input" name="bedrooms" value="{{old('bedrooms', $p['bedrooms'])}}">
                                        @if($errors->has('bedrooms'))
                                            <div class="has-error">
                                                <span class="help-block">{{$errors->first('bedrooms')}}</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Suítes</label>
                                        <input type="text" class="form-control border-input" name="suites" value="{{old('suites', $p['suites'])}}">
                                        @if($errors->has('suites'))
                                            <div class="has-error">
                                                <span class="help-block">{{$errors->first('suites')}}</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Banheiros</label>
                                        <input type="text" class="form-control border-input" name="bathrooms" value="{{old('bathrooms', $p['bathrooms'])}}">
                                        @if($errors->has('bathrooms'))
                                            <div class="has-error">
                                                <span class="help-block">{{$errors->first('bathrooms')}}</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Salas</label>
                                        <input type="text" class="form-control border-input" name="rooms" value="{{old('rooms', $p['rooms'])}}">
                                        @if($errors->has('rooms'))
                                            <div class="has-error">
                                                <span class="help-block">{{$errors->first('rooms')}}</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Vagas de garagem</label>
                                        <input type="text" class="form-control border-input" name="garage" value="{{old('garage', $p['garage'])}}">
                                        @if($errors->has('garage'))
                                            <div class="has-error">
                                                <span class="help-block">{{$errors->first('garage')}}</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>CEP</label>
                                        <input id="ipt-zipcode" type="text" class="form-control border-input" name="zipcode" value="{{old('zipcode', $p['zipcode'])}}">
                                        @if($errors->has('zipcode'))
                                            <div class="has-error">
                                                <span class="help-block">{{$errors->first('zipcode')}}</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4 div-address">
                                    <div class="form-group">
                                        <label>Rua</label>
                                        <input id="ipt-street" type="text" class="ipt-cep form-control border-input" name="street" value="{{old('street', $p['street'])}}">
                                        @if($errors->has('street'))
                                            <div class="has-error">
                                                <span class="help-block">{{$errors->first('street')}}</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Número</label>
                                        <input type="number" class="ipt-cep form-control border-input" name="number" value="{{old('number', $p['number'])}}">
                                        @if($errors->has('number'))
                                            <div class="has-error">
                                                <span class="help-block">{{$errors->first('number')}}</span>
                                            </div>
                                        @endif
                                    </div>
                                </div><div class="col-md-3">
                                    <div class="form-group">
                                        <label>Complemento</label>
                                        <input type="text" class="ipt-cep form-control border-input" name="complement" value="{{old('complement', $p['complement'])}}">
                                        @if($errors->has('complement'))
                                            <div class="has-error">
                                                <span class="help-block">{{$errors->first('complement')}}</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5 div-address">
                                    <div class="form-group">
                                        <label>Bairro</label>
                                        <input id="ipt-neighborhood" type="text" class="form-control border-input" name="neighborhood" value="{{old('neighborhood', $p['neighborhood'])}}">
                                        @if($errors->has('neighborhood'))
                                            <div class="has-error">
                                                <span class="help-block">{{$errors->first('neighborhood')}}</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-5 div-address">
                                    <div class="form-group">
                                        <label>Cidade</label>
                                        <input id="ipt-city" type="text" class="form-control border-input" name="city" value="{{old('city', $p['city'])}}">
                                        @if($errors->has('city'))
                                            <div class="has-error">
                                                <span class="help-block">{{$errors->first('city')}}</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-2 div-address">
                                    <div class="form-group">
                                        <label>Estado</label>
                                        <input id="ipt-state" type="text" class="form-control border-input" name="state" value="{{old('state', $p['state'])}}">
                                        @if($errors->has('state'))
                                            <div class="has-error">
                                                <span class="help-block">{{$errors->first('state')}}</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Descrição</label>
                                        <textarea rows="4" class="form-control border-input" name="description">{{old('description', $p['description'])}}</textarea>
                                        @if($errors->has('description'))
                                            <div class="has-error">
                                                <span class="help-block">{{$errors->first('description')}}</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Preço de Venda (R$)</label>
                                        <input type="text" class="form-control border-input" name="sale_price" value="{{old('sale_price', $p['sale_price'])}}">
                                        @if($errors->has('sale_price'))
                                            <div class="has-error">
                                                <span class="help-block">{{$errors->first('sale_price')}}</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Preço de Locação (R$)</label>
                                        <input id="ipt-city" type="text" class="form-control border-input" name="rental_price" value="{{old('rental_price', $p['rental_price'])}}">
                                        @if($errors->has('rental_price'))
                                            <div class="has-error">
                                                <span class="help-block">{{$errors->first('rental_price')}}</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Preço de Locação para Temporada (R$)</label>
                                        <input id="ipt-state" type="text" class="form-control border-input" name="seasonal_rental_price" value="{{old('seasonal_rental_price', $p['seasonal_rental_price'])}}">
                                        @if($errors->has('seasonal_rental_price'))
                                            <div class="has-error">
                                                <span class="help-block">{{$errors->first('seasonal_rental_price')}}</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-lg btn-success btn-fill">
                                    <i class="ti-save"></i> &nbsp;Salvar
                                </button>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
