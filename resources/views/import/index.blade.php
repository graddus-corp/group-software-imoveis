@extends('template.layout')

@section('page-content')

<div class="content">
    <div class="container-fluid">

        @include('template.components.action-bar')
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">IMPORTAR IMÓVEIS</h4>
                        <p class="category">Para importar os imóveis, faça upload do arquivo XML e aguarde a finalização do processo.</p>
                    </div>

                    <div class="content m-t-15">
                        <div class="xml-form">
                            <form action="{{route('import.upload')}}" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="form-group files" action="{{route('import.upload')}}" method="POST" enctype="multipart/form-data">
                                    <label>Upload do XML (Tamanho máximo: 2048 KB)</label>
                                    <input type="file" class="form-control" name="xml">
                                    @if($errors->has('xml'))
                                        <div class="has-error">
                                            <span class="help-block">{{$errors->first('xml')}}</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-lg btn-success btn-fill">
                                        <i class="ti-import"></i> &nbsp;Importar
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
</div>

@endsection
