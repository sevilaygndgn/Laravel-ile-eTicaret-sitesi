<nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{route('anasayfa')}}">
                   Anasayfa
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <form class="navbar-form navbar-left" action="{{route('urun_ara')}}" method="post">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="aranan" id="navbar-search" class="form-control" placeholder="Ara">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
                <ul class="nav navbar-nav navbar-right">
                       @if(Sentinel::getUser() == TRUE)

         <li class="nav-item">
          <a class="nav-link" href="{{route('site.getLogout')}}">{{Sentinel::getUser()->email}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('site.getLogout')}}">Çıkış Yap</a>
        </li>

        @else
                    <li><a href="#"><i class="fa fa-shopping-cart"></i> Sepet <span class="badge badge-theme">5</span></a></li>
                    <li><a href="{{route('site.getLogin')}}">Oturum Aç</a></li>
                    <li><a href="{{route('site.getRegister')}}">Kaydol</a></li>
                @endif
                    <li class="dropdown">
                        <a href="{{route('site.getProfile')}}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Profil <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Siparişlerim</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Çıkış</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>