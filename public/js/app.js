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

  sendAjaxRequest('delete', '/api/answer/' + id, null, answerDeletedHandler);
}

function answerAddedHandler() {
    
    //let answer = JSON.parse(this.responseText);
    let info = JSON.parse(this.responseText);
    
    // Create the new Answer
    let new_answer = createAnswer(info);

    // Reset the new answer input
    document.getElementById("exampleFormControlTextarea1").value = "";
    
    let section = document.getElementById("answers-list");
    
    let list = document.getElementById("answers-list");

    section.insertBefore(new_answer, list.childNodes[0]);

    // Focus on adding an item to the new card
    new_answer.focus();

}

function sendCreateAnswerRequest(event) {

    let content = document.getElementById("exampleFormControlTextarea1").value;
    let question_index = this.closest('.container-fluid#question-div').getAttribute('data-id'); 

    if (content != '')
        sendAjaxRequest('put', '/api/answer', { content: content, question_index: question_index }, answerAddedHandler);

    event.preventDefault();

}

function createAnswer(info) {

    //let path = "/img/unknown.png";
    
    let new_answer = document.createElement('answer');
    new_answer.classList.add('answer');
    new_answer.setAttribute('data-id', 0);
    new_answer.innerHTML = `<li id="answer">
                                <div class="row">
                                    <a class="col-sm-3 d-none d-sm-block text-center" href="../pages/profile.php">
                                        <img src="/img/unknown.png" alt="Generic placeholder image">
                                    </a>
                                    <div class="col-sm-9">
                                        <span class="badge badge-success"><i class="fas fa-star"></i>Score ${info[2]}</span>
                                        <p id="user_ans"><a href="../pages/profile.php"> ${info[1]} </a></p>
                                    </div>
                                </div>
                                <div class="ans-body">
                                    <p>${info[0]}</p>
                                    <div class=icons-answers>
                                        <a class="icon-answers" href="#">
                                            <i class="fas fa-thumbs-up"> 0 </i>
                                        </a>
                                        <a class="icon-answers" href="#">
                                            <i class="fas fa-thumbs-down"> 0 </i>
                                        </a>
                                        <a class="icon-answers" href="#">
                                            <i class="fas fa-comment">0</i>
                                        </a>
                                        <a class="icon-answers" href="#">
                                            <i class="fas fa-bug"> Report</i>
                                        </a>
                                    </div>
                                </div>
                                </li>`;

    return new_answer;

}

addEventListeners();