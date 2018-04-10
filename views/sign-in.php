<main class="mt-4">
	<div class="container">
		<div class="row">
			<div class="col-4 m-auto">
				<section class="sign-in-section text-center">

					<?php if (!empty($errors)): ?>
            <ul class="list-group">
							<?php foreach ($errors as $error): ?>
                <li class="list-group-item list-group-item-danger"><?= $error ?></li>
							<?php endforeach; ?>
            </ul>
					<?php endif; ?>

          <form class="form-signin text-center" method="post" action="/sign-in">
            <h1 class="h3 mb-3 font-weight-normal">Sign in</h1>
            <label for="inputUsername" class="sr-only">Username</label>
            <input id="inputUsername" name="username" class="form-control mb-1" placeholder="Username" value="<?=
						$username ?>" required
                   autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" name="password" class="form-control mb-1" placeholder="Password"
                   required>

            <input class="btn btn-lg btn-primary btn-block mt-3" name="submit-sign-in" type="submit" value="Sign in">
            <p class="mt-5 mb-3 text-muted">&copy; 2018</p>
          </form>
          <a href="/">Go back to home page</a>

				</section>
			</div>
		</div>
	</div>
</main>