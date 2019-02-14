<div class="p-3 mb-2 bg-dark text-white">
<h1 class="navbar-brand mb-0 h1" id='title'>Boutique La Maison</h1>

<nav class="navbar navbar-expand-lg navbar-light">

<ul class="navbar-nav mr-auto">
    @if(Auth::check())
          <li class="nav-item ">
            <a class="nav-link" href="{{url('/')}}">RETOUR A L'ACCUEIL</a>
          </li> 
          <li class="nav-item">    
            <a class="nav-link" href="{{route('maison.index')}}">DASHBOARD</a>
          </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('maison.create')}}">AJOUTER UN PRODUIT</a>
              </li>
              <li class="nav-item">
            <a class="nav-link" href="{{route('logout')}}"
            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     LOGOUT
                                                     </a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{csrf_field() }}
            </form>
            @else 
           
              <li class="nav-item">
                <a class="nav-link" href="{{url('/')}}">ACCUEIL</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('solde', $product->id)}}">SOLDES</a>
              </li>
              @forelse($categories as $id => $title)
      <li class="nav-item">
          <a class="nav-link" href="{{url('categorie', $id)}}">{{$title}}</a>
      </li>
      @empty 
                <li>Aucune catégorie pour l'instant</li>
                @endforelse
          <li class="nav-item">
            <a class="nav-link" href="{{route('login')}}">LOGIN</a>
          </li>
        
            @endif
    </ul>
</nav>
</div>