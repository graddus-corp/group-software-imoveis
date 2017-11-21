@extends('template.layout')

@section('page-content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">PERFIL</h4>
                        <p class="category">Visualize o perfil (currículo) do candidato.</p>
                    </div>
                    <div class="content m-t-15">
                        <div id="pdf">
                            <embed src="{{asset('/assets/pdf/CV_LucasHenriqueCruzCosta.pdf')}}" type="application/pdf" width="100%" height="500px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
