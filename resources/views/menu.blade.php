
<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"> PIZZARIA ITÁLIA EXPRESS 🍕</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{url('encomenda/create')}}">Pedidos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('sugestao/create')}}">FeedBacks</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('reserva/create')}}"> Reservas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('')}}"> Inicio</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Área ADM
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{url('reserva')}}">Listagem Reserva </a></li>
              <li><a class="dropdown-item" href="{{url('encomenda')}}"> Listagem Pedidos</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="{{url('sugestao')}}"> Listagem FeedBacks</a></li>
            </ul>
          </li>

        </ul>

      </div>
    </div>
  </nav>
