<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <a class="navbar-brand" href="#">TRANS MANAGER</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">

      <li class="{{ Request::is('/parvadajumi') ? 'active' : '' }}" class="nav-item active">
        <a  class="nav-link" href="/parvadajumi">PĀRVADĀJUMI</a>
      </li>

      <li class="{{ Request::is('/vietas') ? 'active' : '' }}" class="nav-item">
        <a class="nav-link" href="/vietas">VIETAS</a>
      </li>

      <li class="{{ Request::is('/kompanijas') ? 'active' : '' }}" class="nav-item">
        <a class="nav-link" href="/kompanijas">KOMPĀNIJAS</a>
      </li>

    </ul>
  </div>
</nav>