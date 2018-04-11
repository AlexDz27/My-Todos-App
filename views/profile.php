<main class="mt-4">
  <div class="container">
    <div class="row">
      <div class="col-6 m-auto">

        <h1 class="text-center">Hello, <span class="uname-heading--js"><?= $userData['username'] ?></span></h1>
<!--        todo: make a vue component for changeing user data...!!-->

        <section>
          <ul class="list-group user-data-list text-center">
<!--            <li class="list-group-item">Username: <input></li>-->
            <li class="list-group-item list-group-item--uname">Username:
              <span contenteditable="true"
                    data-change="username"
                    class="change--js change-uname--js">
                <?= $userData['username']; ?>
              </span>
              <span class="tooltip-text">
                <button class="tooltip-close--js" type="button">&#x2716;</button>
                You can change your profile data here. Just edit your info and hit <b>Enter</b> to
                submit the changes.
              </span>
            </li>
            <li class="list-group-item">
              Email:
              <span data-change="email" contenteditable="true"
                    class="change--js">
                <?= $userData['email']; ?>
              </span>
            </li>

<!--            <li class="list-group-item list-group-item--notice">-->
<!--              You can also change your password:-->
<!--            </li>-->
<!---->
<!--            <li class="list-group-item">-->
<!--              Old password:-->
<!--              <span data-change="email" contenteditable="true"-->
<!--                    class="change--js">-->
<!--                <input type="password" data-change="old-pass">-->
<!--              </span>-->
<!--            </li>-->
<!--            <li class="list-group-item">-->
<!--              New password:-->
<!--              <span data-change="email" contenteditable="true"-->
<!--                    class="change--js">-->
<!--                <input type="password" data-change="new-pass">-->
<!--              </span>-->
<!--            </li>-->
          </ul>
        </section>

      </div>
    </div>
  </div>
</main>