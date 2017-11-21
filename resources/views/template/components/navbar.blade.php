<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar bar1"></span>
                <span class="icon-bar bar2"></span>
                <span class="icon-bar bar3"></span>
            </button>
            <a class="navbar-brand" href="#"></a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<p>{{Auth::user()['name']}}</p>
							<b class="caret"></b>
                      </a>
                      <ul class="dropdown-menu">
                          <li>
                              <a href="{{route('profile.index')}}">
                                  <i class="ti-user"></i> &nbsp;Perfil
                              </a>
                          </li>
                          <li>
                              <a href="{{route('authentication.signout')}}" style="color: #E74430">
                                  <i class="ti-power-off"></i> &nbsp;Sair
                              </a>
                          </li>
                      </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
