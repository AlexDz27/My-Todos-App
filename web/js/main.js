/* Utils */
const KEY_ENTER = 13;
// todo: window location without local (agnostic)


let xhr = null;
if (window.XMLHttpRequest) {
  xhr = new XMLHttpRequest();
} else {
  xhr = new ActiveXObject('Microsoft.XMLHTTP')
}

function makeRequest(type, url, requestObj) {
  if (!xhr) {
    console.log('Cannot create an XHR instance');
    return false;
  }

  xhr.addEventListener('load', respondWithData);
  xhr.open(type, url);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.send(`username=${encodeURIComponent(requestObj.username)}&email=${requestObj.email}`);
}

function makeRequestJSON(type, url, requestJSON) {
  if (!xhr) {
    console.log('Cannot create an XHR instance');
    return false;
  }

  xhr.addEventListener('load', respondWithData);
  xhr.open(type, url);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.send(`changedTodos=${encodeURIComponent(requestJSON)}`);
}

function respondWithData() {
  const response = getResponseData();
  // Do something if needed
}

function getResponseData() {
  try {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        return xhr.responseText;
      } else {
        console.log('There was a problem with the request');
      }
    }
  } catch (e) {
    console.log('Caught Exception ' + e.description);
  }
}

/* Profile block of code */

if ((window.location.href === 'http://mytodos.os/profile') || (window.location.href === 'http://mytodos.os/profile/')) {
  // Style Related part
  const unameSpan = document.querySelector('.change-uname--js');
  const unameListItem = document.querySelector('.list-group-item--uname');
  const unameHeading = document.querySelector('.uname-heading--js');


  const tooltip = document.querySelector('.tooltip-text');
  const tooltipCloseBtn = document.querySelector('.tooltip-close--js');
  window.setTimeout(() => {
    tooltip.classList.add('opacity--js');
  }, 1000);
  tooltipCloseBtn.addEventListener('click', () => {
    tooltip.classList.add('no-opacity--js');
  });


  unameSpan.addEventListener('input', (evt) => {
    unameHeading.textContent = evt.target.textContent.trim();
  });


  const userDataListItems = document.querySelectorAll('.list-group-item');
  const userDataChangeSpans = document.querySelectorAll('.change--js');

  userDataChangeSpans.forEach((span) => {
    span.addEventListener('focus', () => {
      const userDataListItem = span.parentElement;
      userDataListItem.classList.add('active--anim');
    });

    span.addEventListener('focusout', () => {
      const userDataListItem = span.parentElement;
      userDataListItem.classList.remove('active--anim');
    })
  });

  // AJAX Related part
  userDataChangeSpans.forEach((span) => {
    span.addEventListener('keydown', (evt) => {
      if (evt.keyCode === KEY_ENTER) {
        evt.preventDefault();
        span.blur();

        // Making request
        let changedDataObj = {};
        userDataChangeSpans.forEach((span) => {
          const changedData = span.textContent.trim();
          const colomnToChange = span.dataset.change;

          changedDataObj[colomnToChange] = changedData; // Writing properties and values to the request object
        });

        makeRequest('POST', 'http://mytodos.os/profile/change', changedDataObj);
      }
    })
  });
}


/* Main page (todos list) block */

if (window.location.href === 'http://mytodos.os/') {
  let newTodosJson = null;

  const todosList = document.querySelector('.todos-list');
  // Turning HTML collection to array
  let todoItems = [].slice.call(document.querySelectorAll('.todos-list__todo-item'));

  const newTodoInput = document.querySelector('.todos-list__new-todo');
  newTodoInput.addEventListener('keydown', (evt) => {
    if (evt.keyCode === KEY_ENTER && newTodoInput.value !== '') {
      evt.preventDefault();
      const newTodoItemTitle = newTodoInput.value;
      newTodoInput.value = '';

      const newTodoItem = document.createElement('li');
      newTodoItem.textContent = newTodoItemTitle;
      newTodoItem.classList.add('todos-list__todo-item');
      newTodoItem.classList.add('list-group-item');

      const newTodoItemCheck = document.createElement('input');
      newTodoItemCheck.type = 'checkbox';
      newTodoItemCheck.classList.add('todo-item__checkbox');
      newTodoItem.appendChild(newTodoItemCheck);

      todosList.appendChild(newTodoItem);
      todoItems.push(newTodoItem);

      newTodosJson = getTodosData();

      makeRequestJSON('POST', 'http://mytodos.os/newTodos', newTodosJson);
    }
  });

  let todoItemsChecks = document.querySelectorAll('.todo-item__checkbox');

  todoItemsChecks.forEach((check) => {
    check.addEventListener('click', () => {
      newTodosJson = getTodosData();

      makeRequestJSON('POST', 'http://mytodos.os/newTodos', newTodosJson);
    })
  });

  function getTodosData() {
    let newTodosArr = [];

    todoItems.map((todoItem) => {
      const todoItemData = {};

      const todoItemTitle = todoItem.textContent.trim();
      const todoItemIsDone = todoItem.children[0].checked;

      todoItemData.title = todoItemTitle;
      todoItemData.isDone = todoItemIsDone;

      newTodosArr.push(todoItemData);
    });

    return JSON.stringify(newTodosArr);
  }
}