<main class="mt-4">
  <div class="container">
    <div class="row">
      <div class="col-6 m-auto">

<!--        --><?php //foreach ($todos as $todo): ?>
<!--          <section class="item">-->
<!--            <h1>--><?//= $todo['title']; ?><!--</h1>-->
<!--            <p>--><?//= $todo['content']; ?><!--</p>-->
<!--            <a href="items/--><?//= $todo['id']; ?><!--">View one item</a>-->
<!--          </section>-->
<!--        --><?php //endforeach; ?>
        <p class="text-center alert-dark font-weight-bold">Hello, <?=$userName?></p>
        <h1 class="display-3 text-center">My Todos</h1>

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