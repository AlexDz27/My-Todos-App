<header>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <div class="container">

      <div class="navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item <?php if (\services\Router::getUri() === '') echo 'active' ?>">
            <a class="nav-link" href="/">Home</a>
          </li>
        </ul>

        <?php if ($isUserLogged): ?>
          <a href="/profile" class="mr-3">My profile</a>
          <a href="/logout" class="mr-3" style="color: #c24848;">Log out</a>
        <?php endif; ?>

        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>

    </div>

	</nav>
</header>
