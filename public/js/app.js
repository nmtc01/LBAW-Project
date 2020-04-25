function addEventListeners() {
    let questionCreator = document.querySelector('#add_question_btn');
    if (questionCreator != null)
        questionCreator.addEventListener('click', sendCreateQuestionRequest);

    let answerDeleters = document.querySelectorAll('#delete_answer');
    [].forEach.call(answerDeleters, function(deleter) {
        deleter.addEventListener('click', sendDeleteAnswerRequest);
    });

    let questionDeleters = document.querySelectorAll('#delete_question');
    [].forEach.call(questionDeleters, function(deleter) {
        deleter.addEventListener('click', sendDeleteQuestionRequest);
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

function answerDeletedHandler() {
  let answer = JSON.parse(this.responseText);
  let li = document.querySelector('li#answer[data-id="' + answer.id + '"]');
  li.remove();
}

function questionDeletedHandler() {
    if (this.status == 200) window.location = '/';
    let question = JSON.parse(this.responseText);
    let div = document.querySelector('div#question-div[data-id="' + question.id + '"]');
    div.remove();
}

function sendDeleteAnswerRequest() {
    let id = this.closest('li#answer').getAttribute('data-id');
    sendAjaxRequest('delete', '/api/answer/' + id, null, answerDeletedHandler);
}

function sendDeleteQuestionRequest() {
    let id = this.closest('div#question-div').getAttribute('data-id');
    sendAjaxRequest('delete', '/api/question/' + id, null, questionDeletedHandler);
}

function questionAddedHandler() {
    
    let info = JSON.parse(this.responseText);

    // Reset the new answer input
    document.getElementById("formControlTextareaQuestion").value = "";
    document.getElementById("formControlTextareaDescription").value = "";
    
    // Create the new Question
    let new_question = createQuestion(info);
    
    let section = document.getElementById("questions-list");
    
    let list = document.getElementById("questions-list");

    section.before(new_question, list.childNodes[0]);

    // Focus on adding an item to the new question
    new_question.focus();

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

    // Focus on adding a new answer
    new_answer.focus();

    addEventListeners();

}

function sendCreateQuestionRequest(event) {

    let title = document.getElementById("formControlTextareaQuestion").value; 
    let description = document.getElementById("formControlTextareaDescription").value;

    if (title != '' && description !='')
        sendAjaxRequest('put', '/api/question', { title: title, description: description }, questionAddedHandler);

    event.preventDefault();

}

function sendCreateAnswerRequest(event) {

    let content = document.getElementById("exampleFormControlTextarea1").value;
    let question_index = this.closest('.container-fluid#question-div').getAttribute('data-id'); 

    if (content != '')
        sendAjaxRequest('put', '/api/answer', { content: content, question_index: question_index }, answerAddedHandler);

    event.preventDefault();

}

function createQuestion(info) {
    let new_question = document.createElement('question');
    new_question.classList.add('question');
    new_question.setAttribute('data-id', 0);
    new_question.innerHTML = `<div class="wrapper home_question container-fluid">
                                <div class="row">
                                    <div id="prof_info" class="col-2 text-center">
                                        <img src="/img/unknown.png">
                                        <p><a class="row-2 d-none d-sm-block" href="/pages/profile.php">${info[2]}</a></p>
                                    </div>
                                    <div class="col-10">
                                        <h1><a id="question-header" href="question/${info[4]}">${info[0]}</a></h1>
                                    </div>
                                </div>

                                <div class="icons">
                                    <a class="icon" href="#">
                                    <i class="fas fa-thumbs-up fa-lg">0</i>
                                    </a>
                                    <a class="icon" href="#">
                                        <i class="fas fa-thumbs-down fa-lg">0</i>
                                    </a>
                                    <a class="icon" href="#">
                                        <i class="fas fa-reply fa-lg"> 10 </i>
                                    </a>
                                    <p class="icon" id=question_date>${info[3]}</p>
                                </div>
                            </div>`;

    return new_question;

}

function createAnswer(info) {
    let new_answer = document.createElement('answer');
    new_answer.classList.add('answer');
    new_answer.innerHTML = `<li id="answer" data-id="${info[3]}">
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
                                        <a class="icon-answers" id="delete_answer">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </div>
                                </div>
                            </li>`;

    return new_answer;
}

addEventListeners();