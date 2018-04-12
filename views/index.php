<main class="mt-4">
  <div class="container">
    <div class="row">
      <div class="col-6 m-auto">
<!--        todo: if not logged  - else ...-->

        <p class="text-center alert-dark font-weight-bold">Hello, <?=$userName?></p>
        <h1 class="display-3 text-center">My Todos</h1>

	      <?php if (!empty($todos)): ?>
          <section class="todos-list-section mt-4">
            <ul class="todos-list list-group" data-todos-list-id="<?= $todosId; ?>">
              <li class="list-group-item">
                <input class="todos-list__new-todo" placeholder="What needs to be done?">
              </li>
              <?php foreach ($todos as $todo): ?>
                <li class="todos-list__todo-item list-group-item">
                  <?= $todo->title; ?>
                  <input class="todo-item__checkbox" type="checkbox" <?php if ($todo->isDone) echo 'checked' ?>>
                </li>
              <?php endforeach; ?>
            </ul>
          </section>
	      <?php endif; ?>

      </div>
    </div>

    <?php if (!$isUserLogged): ?>
      <div class="row mt-5">
        <div class="col-4 m-auto">
          <p class="text-center font-weight-bold">Want to make your own todos?<br> Sign in or sign up then!</p>
          <div class="text-center">
            <a href="/sign-in">Sign in</a> / <a href="/sign-up">Sign up</a>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>
</main>