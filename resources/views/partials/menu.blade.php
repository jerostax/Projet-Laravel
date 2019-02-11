
<h1 class="navbar-brand mb-0 h1" id='title'>Boutique La Maison</h1>

<nav class="navbar navbar-expand-lg navbar-light ">

<ul class="navbar-nav mr-auto">
    <li class="nav-item ">
        <a class="nav-link" href="{{url('/')}}">ACCUEIL</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">SOLDES</a>
      </li>
      @forelse($categories as $id => $title)
      <li class="nav-item">
          <a class="nav-link" href="{{url('categorie', $id)}}">{{$title}}</a>
      </li>
      @empty 
                <li>Aucun genre pour l'instant</li>
                @endforelse
    </ul>
</nav>