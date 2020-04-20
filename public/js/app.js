function addEventListeners() {
    /*let itemCheckers = document.querySelectorAll('article.card li.item input[type=checkbox]');
    [].forEach.call(itemCheckers, function(checker) {
        checker.addEventListener('change', sendItemUpdateRequest);
    });

    let itemCreators = document.querySelectorAll('article.card form.new_item');
    [].forEach.call(itemCreators, function(creator) {
        creator.addEventListener('submit', sendCreateItemRequest);
    });

    let itemDeleters = document.querySelectorAll('article.card li a.delete');
    [].forEach.call(itemDeleters, function(deleter) {
        deleter.addEventListener('click', sendDeleteItemRequest);
    });

    let cardDeleters = document.querySelectorAll('article.card header a.delete');
    [].forEach.call(cardDeleters, function(deleter) {
        deleter.addEventListener('click', sendDeleteCardRequest);
    });*/

    let answerDeleters = document.querySelectorAll('#delete');
    [].forEach.call(answerDeleters, function(deleter) {
        deleter.addEventListener('click', sendDeleteAnswerRequest);
    });

    let answerCreator = document.querySelector('div.form-group .btn.my-2.my-sm-0');
    if (answerCreator != null)
        answerCreator.addEventListener('click', sendCreateAnswerRequest);
}

function encodeForAjax(data) {
    if (data == null) return null;
    return Object.keys(data).map(function(k) {
        return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&');
}

function sendAjaxRequest(method, url, data, handler) {
    let request = new XMLHttpRequest();
    request.open(method, url, true);
    request.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.addEventListener('load', handler);
    request.send(encodeForAjax(data));
}

function sendItemUpdateRequest() {
    let item = this.closest('li.item');
    let id = item.getAttribute('data-id');
    let checked = item.querySelector('input[type=checkbox]').checked;

    sendAjaxRequest('post', '/api/item/' + id, { done: checked }, itemUpdatedHandler);
}

function sendDeleteItemRequest() {
    let id = this.closest('li.item').getAttribute('data-id');

    sendAjaxRequest('delete', '/api/item/' + id, null, itemDeletedHandler);
}

function sendDeleteCardRequest(event) {
    let id = this.closest('article').getAttribute('data-id');

    sendAjaxRequest('delete', '/api/cards/' + id, null, cardDeletedHandler);
}

function itemUpdatedHandler() {
    let item = JSON.parse(this.responseText);
    let element = document.querySelector('li.item[data-id="' + item.id + '"]');
    let input = element.querySelector('input[type=checkbox]');
    element.checked = item.done == "true";
}

function itemDeletedHandler() {
    if (this.status != 200) window.location = '/';
    let item = JSON.parse(this.responseText);
    let element = document.querySelector('li.item[data-id="' + item.id + '"]');
    element.remove();
}

function cardDeletedHandler() {
    if (this.status != 200) window.location = '/';
    let card = JSON.parse(this.responseText);
    let article = document.querySelector('article.card[data-id="' + card.id + '"]');
    article.remove();
}

function answerDeletedHandler() {
  let answer = JSON.parse(this.responseText);
  let li = document.querySelector('li#answer[data-id="' + answer.id + '"]');
  li.remove();
}

function sendDeleteAnswerRequest() {
  let id = this.closest('li#answer').getAttribute('data-id');

  sendAjaxRequest('delete', '/api/answer/' + id, answerDeletedHandler);
}

function answerAddedHandler() {
    
    let answer = JSON.parse(this.responseText);

    if (this.status != 200) window.location = '/question/'+ answer.question_id;
    
    // Create the new answer
    let new_answer = createAnswer(answer);

    // Reset the new card answer
    let form = document.querySelector('div.form-group .btn.my-2.my-sm-0');
    form.querySelector('input[type=text]').value = "";
}

function sendCreateAnswerRequest(event) {

    let content = document.getElementById("exampleFormControlTextarea1").value;
    let question_index = this.closest('.container-fluid#question-div').getAttribute('data-id'); 

    if (content != '')
        sendAjaxRequest('put', '/api/answer', { content: content, question_index: question_index }, answerAddedHandler);

    event.preventDefault();

}

function createAnswer(answer) {
    let new_answer = document.createElement('article');
    new_answer.classList.add('answer');
    new_answer.setAttribute('data-id', answer.id);
    new_answer.innerHTML = `
    <div class="form-group">
        <label for="exampleFormControlTextarea1"></label>
        <form class="new_answer">
          <input type="text" class="form-control" id="exampleFormControlTextarea1" name="answer" placeholder="Do you know the answer to this question?">
        <form class="new_answer">
        <button class="btn my-2 my-sm-0" type="submit">Answer</button>
    </div>`;

    let creator = new_answer.querySelector('div.form-group .btn.my-2.my-sm-0');
    creator.addEventListener('submit', sendCreateAnswerRequest);

    return new_answer;
}

addEventListeners();