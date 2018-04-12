<main class="mt-4">
	<div class="container">
		<div class="row">
			<div class="col-4 m-auto">
				<section class="sign-up-section text-center">

          <?php if ($isUserCreated): ?>
            <h2>You've been successfully signed up!</h2>
            <!--redirect the signed up user to home page-->
            <script>
              window.setTimeout(
                function() {
                  window.location.href = '/sign-in';
                }, 1200)
            </script>
          <?php else: ?>

          <?php if (!empty($errors)): ?>
            <ul class="list-group">
            <?php foreach ($errors as $error): ?>
              <li class="list-group-item list-group-item-danger"><?= $error ?></li>
            <?php endforeach; ?>
            </ul>
          <?php endif; ?>

          <form class="form-signin text-center" method="post" action="/sign-up">
						<h1 class="h3 mb-3 font-weight-normal">Not a user yet? Sign up then!</h1>
						<label for="inputUsername" class="sr-only">Username</label>
						<input id="inputUsername" name="username" class="form-control mb-1" placeholder="Username" value="<?=
						$username ?>" required
						       autofocus>
						<label for="inputEmail" class="sr-only">Email</label>
						<input type="email" id="inputEmail" name="email" class="form-control mb-1" placeholder="Email address"
						       value="<?= $email ?>"
						       required>
						<label for="inputPassword" class="sr-only">Password</label>
						<input type="password" id="inputPassword" name="password" class="form-control mb-1" placeholder="Password"
						       required>

						<input class="btn btn-lg btn-primary btn-block mt-3" name="submit-sign-up" type="submit" value="Sign up">
						<p class="mt-5 mb-3 text-muted">&copy; 2018</p>
					</form>
					<a href="/">Go back to home page</a>

          <?php endif; ?>

        </section>
			</div>
		</div>
	</div>
</main>