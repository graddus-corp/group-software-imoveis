<!DOCTYPE html>
<html>
    <head>
        @include('template.components.head')
    </head>

    <body class="login-page">
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="m-t-120">
                            <div class="card">
                                <div class="header text-center">
                                    <h3 class="title">GROUP SOFTWARE</h3>
                                    <p class="category">Preencha os campos para entrar no sistema.</p>
                                </div>
                                <div class="content m-t-15">
                                    @include('template.components.action-bar')

                                    <form action="{{route('authentication.signin')}}" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>E-mail</label>
                                                    <input type="email" class="form-control border-input" name="email">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Senha</label>
                                                    <input type="password" class="form-control border-input" name="pass">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-lg btn-success">
                                                        <i class="ti-check"></i> &nbsp;Acessar
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @include('template.components.javascripts')
    </body>
</html>
