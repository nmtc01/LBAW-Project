function addEventListeners() {
    let questionCreator = document.querySelector('#add_question_btn');
    if (questionCreator != null)
        questionCreator.addEventListener('click', sendCreateQuestionRequest);

    let answerCreator = document.querySelector('div.form-group .btn.my-2.my-sm-0');
    if (answerCreator != null)
        answerCreator.addEventListener('click', sendCreateAnswerRequest);

    let commentCreator = document.querySelector('#comment-button');
    if (commentCreator != null)
        commentCreator.addEventListener('click', sendCreateCommentRequest);

    let answerDeleters = document.querySelectorAll('#delete_answer');
    [].forEach.call(answerDeleters, function(deleter) {
        deleter.addEventListener('click', sendDeleteAnswerRequest);
    });

    let questionDeleters = document.querySelectorAll('#delete_question');
    [].forEach.call(questionDeleters, function(deleter) {
        deleter.addEventListener('click', sendDeleteQuestionRequest);
    });

    let questionEditor = document.querySelector('#edit_question');
    if (questionEditor != null) {
        questionEditor.addEventListener('click', sendEditQuestionRequest);
        questionEditor.addEventListener('click', hideEditQuestion);
    }

    let questionUpdator = document.querySelector('#save_question');
    if (questionUpdator != null) {
        questionUpdator.addEventListener('click', sendUpdateQuestionRequest);
        questionUpdator.addEventListener('click', hideUpdateQuestion);
    }

    let answerEditors = document.querySelectorAll('.edit_answer_btn');
    if (answerEditors != null)
        [].forEach.call(answerEditors, function(editor) {
            editor.addEventListener('click', sendEditAnswerRequest);
            editor.addEventListener('click', hideEditAnswer);
        });

    let answerUpdators = document.querySelectorAll('.save_answer_btn');
    if (answerUpdators != null)
        [].forEach.call(answerUpdators, function(updator) {
            updator.addEventListener('click', sendUpdateAnswerRequest);
            updator.addEventListener('click', hideUpdateAnswer);
        });
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

    // Focus on adding a new question
    new_question.focus();

}

function answerAddedHandler() {

    //In case of user not logged in
    if (this.status == 403) {
        let older_alert = document.getElementById('alert_answer');
        if (older_alert != null)
            return;

        let new_alert = createAlert("answer");

        let section = document.getElementById("add_answer_form");
        let list = document.getElementById("add_answer_form");

        section.insertBefore(new_alert, list.childNodes[0]);

        return;
    }

    //Parse info
    let info = JSON.parse(this.responseText);
    
    // Create the new Answer
    let new_answer = createAnswer(info);
    
    // Reset the new answer input
    document.getElementById("exampleFormControlTextarea1").value = "";

    //Get elements
    let section = document.getElementById("answers-list");
    let list = document.getElementById("answers-list");

    //Add new answer
    section.insertBefore(new_answer, list.childNodes[0]);

    // Focus on adding a new answer
    new_answer.focus();

    addEventListeners();

}

function commentAddedHandler() {

    //In case of user not logged in
    if (this.status == 403) {
        let older_alert = document.getElementById('alert_comment');
        if (older_alert != null)
            return;

        let new_alert = createAlert("comment");

        let section = document.getElementById("add_comment_form");
        let list = document.getElementById("add_comment_form");

        section.insertBefore(new_alert, list.childNodes[0]);

        return;
    }

    //Parse info
    let info = JSON.parse(this.responseText);

    // Create the new Comment
    let new_comment = createComment(info);

    // Reset the new comment input
    document.getElementById("exampleFormControlTextarea2").value = "";

    //Get elements
    let section = document.getElementById("comments-list");
    let list = document.getElementById("comments-list");

    //Add new comment
    section.insertBefore(new_comment, list.childNodes[0]);

    // Focus on adding a new comment
    new_comment.focus();

    addEventListeners();
}

function answerDeletedHandler() {
  let answer = JSON.parse(this.responseText);
  let li = document.querySelector('li#answer'+answer.id+'[data-id="' + answer.id + '"]');
  li.remove();
}

function questionDeletedHandler() {
    if (this.status == 200) window.location = '/';
    let question = JSON.parse(this.responseText);
    let div = document.querySelector('div#question-div[data-id="' + question.id + '"]');
    div.remove();
}

function questionEditedHandler() {
    let info = JSON.parse(this.responseText);
    
    // Edit Question
    let new_title = editTitle(info);
    let new_description = editDescription(info);
    
    let div_title = document.querySelector("div#question-div h1");
    let div_description = document.querySelector("div#question-div #question_description");

    div_title.innerHTML = new_title.innerHTML;
    div_description.innerHTML = new_description.innerHTML;
    
    // Focus 
    new_title.focus();
    new_description.focus();

    addEventListeners();
}

function answerEditedHandler() {
    let info = JSON.parse(this.responseText);
    
    // Edit Answer
    let new_content = editAnswerContent(info);
    let div_content = document.querySelector("ul#answers-list #answer"+info[3]+" #answer_content");
    div_content.outerHTML = new_content.innerHTML;
    
    // Focus
    new_content.focus();

    addEventListeners();
}

function questionUpdatedHandler() {
    let info = JSON.parse(this.responseText);
    
    // Update question
    let new_title = updateTitle(info);
    let new_description = updateDescription(info);
    
    let div_title = document.querySelector("div#question-div #question_title");
    let div_description = document.querySelector("div#question-div #question_description");

    div_title.outerHTML = new_title.innerHTML;
    div_description.outerHTML = new_description.innerHTML;
    
    // Focus 
    new_title.focus();
    new_description.focus();

    addEventListeners();
}

function answerUpdatedHandler() {
    let info = JSON.parse(this.responseText);
    
    // Update answer
    let new_content = updateAnswerContent(info);
    let div_content = document.querySelector("ul#answers-list #answer"+info[3]+" #answer_content");
    div_content.outerHTML = new_content.innerHTML;
    
    // Focus 
    new_content.focus();

    addEventListeners();
}

function sendDeleteAnswerRequest() {
    let id = this.closest('li.answer_item').getAttribute('data-id');
    sendAjaxRequest('delete', '/api/answer/' + id, null, answerDeletedHandler);
}

function sendDeleteQuestionRequest() {
    let id = this.closest('div#question-div').getAttribute('data-id');
    sendAjaxRequest('delete', '/api/question/' + id, null, questionDeletedHandler);
}

function sendEditQuestionRequest() {
    let id = this.closest('div#question-div').getAttribute('data-id');
    let title = document.querySelector("div#question-div h1").textContent; 
    let description = document.querySelector("div#question-div #question_description").textContent;

    if (title != '' && description !='')
        sendAjaxRequest('put', '/api/question/' + id, { title: title, description: description }, questionEditedHandler);
}

function sendEditAnswerRequest() {
    let div = event.target.parentElement.parentElement.parentElement.parentElement;
    let id = div.getAttribute('data-id');
    let content = document.querySelector("ul#answers-list #answer"+id+" #answer_content").textContent; 

    if (content != '')
        sendAjaxRequest('put', '/api/answer/' + id, { content: content }, answerEditedHandler);
}

function sendUpdateQuestionRequest() {
    let id = this.closest('div#question-div').getAttribute('data-id');
    let title = document.querySelector('input#question_title').value; 
    let description = document.querySelector('div#question-div input#question_description').value;

    if (title != "" && description != "")
        sendAjaxRequest('put', '/api/question/' + id + '/update', { title: title, description: description }, questionUpdatedHandler);
}

function sendUpdateAnswerRequest() {
    let div = event.target.parentElement.parentElement.parentElement.parentElement;
    let id = div.getAttribute('data-id'); 
    let content = document.querySelector('ul#answers-list #answer'+id+' input#answer_content').value;

    if (content != "")
        sendAjaxRequest('put', '/api/answer/' + id + '/update', { content: content }, answerUpdatedHandler);
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

function sendCreateCommentRequest(event) {

    let content = document.getElementById("exampleFormControlTextarea2").value;
    let question_index = this.closest('.container-fluid#question-div').getAttribute('data-id');

    if (content != '')
        sendAjaxRequest('put', '/api/comment', { content: content, question_index: question_index }, commentAddedHandler);

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

function editTitle(info) {
    let new_question = document.createElement('question');
    new_question.classList.add('question');
    new_question.setAttribute('data-id', 0);
    new_question.innerHTML = `<input id="question_title" class="form-control" type="text" value="${info[0]}">`;

    return new_question;

}

function editDescription(info) {
    let new_question = document.createElement('question');
    new_question.classList.add('question');
    new_question.setAttribute('data-id', 0);
    new_question.innerHTML = `<input id="question_description" class="form-control" type="text" value="${info[1]}">`;

    return new_question;

}

function editAnswerContent(info) {
    let new_answer = document.createElement('answer');
    new_answer.classList.add('answer');
    new_answer.setAttribute('data-id', 0);
    new_answer.innerHTML = `<input id="answer_content" class="form-control" type="text" value="${info[0]}">`;

    return new_answer;
}

function updateTitle(info) {
    let new_question = document.createElement('question');
    new_question.classList.add('question');
    new_question.setAttribute('data-id', 0);
    new_question.innerHTML = `<h1 id="question_title">${info[0]}</h1>`;

    return new_question;
}

function updateDescription(info) {
    let new_question = document.createElement('question');
    new_question.classList.add('question');
    new_question.setAttribute('data-id', 0);
    new_question.innerHTML = `<p id="question_description">${info[1]}</p>`;

    return new_question;

}

function updateAnswerContent(info) {
    let new_question = document.createElement('question');
    new_question.classList.add('question');
    new_question.setAttribute('data-id', 0);
    new_question.innerHTML = `<p id="answer_content">${info[0]}</p>`;

    return new_question;
}

function createAnswer(info) {
    let new_answer = document.createElement('answer');
    new_answer.classList.add('answer');
    new_answer.innerHTML = `<li id="answer${info[3]}" class="answer_item" data-id="${info[3]}">
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
                                    <p id="answer_content">${info[0]}</p>
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
                                        <a class="icon-answers edit_answer_btn" id="edit_answer${info[3]}">
                                            <i class="fas fa-edit"> Edit</i>
                                        </a>
                                        <a class="icon-answers save_answer_btn" id="save_answer${info[3]}">
                                            <i class="fas fa-save"> Save</i>
                                        </a>
                                        <a class="icon-answers" id="delete_answer">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </div>
                                </div>
                            </li>`;

    return new_answer;
}

function createComment(info){

    let new_comment = document.createElement('comment');
    new_comment.classList.add('comment');

    new_comment.innerHTML = `<div class="comment">
                                <p>
                                    <a href="profile.php" class="username">${info[1]} </a>
                                    <a class="icon-answers" href="#">
                                        <i class="fas fa-bug"> Report</i>
                                    </a>
                                    <br>
                                    ${info[0]}
                                </p>
                            </div>`;


    return new_comment;

}

function createAlert(type) {
    let new_alert = document.createElement('alert');
    new_alert.classList.add('alert');
    new_alert.innerHTML = ` <div id="alert_${type}" class="card text-white bg-danger">
                                <div class="card-body">
                                <p class="card-text">You have to be logged in to ${type} this question</p>
                                </div>
                            </div>`
    return new_alert;
}

function hideEditQuestion() {
    let edit_btn = document.getElementById('edit_question');
    if (edit_btn.style.display === "none") {
        edit_btn.style.display = "block";
    } else {
        edit_btn.style.display = "none";
    }
    let update_btn = document.getElementById('save_question');
    update_btn.style.display = "block";
}

function hideUpdateQuestion() {
    let update_btn = document.getElementById('save_question');
    if (update_btn.style.display === "none") {
        update_btn.style.display = "block";
    } else {
        update_btn.style.display = "none";
    }
    let edit_btn = document.getElementById('edit_question');
    edit_btn.style.display = "block";
}

function hideEditAnswer() {
    let id = event.target.parentElement.parentElement.parentElement.parentElement.getAttribute('data-id');
    let edit_btn = document.getElementById('edit_answer'+id);
    if (edit_btn.style.display === "none") {
        edit_btn.style.display = "contents";
    } else {
        edit_btn.style.display = "none";
    }
    let update_btn = document.getElementById('save_answer'+id);
    update_btn.style.display = "contents";
}

function hideUpdateAnswer() {
    let id = event.target.parentElement.parentElement.parentElement.parentElement.getAttribute('data-id');
    let update_btn = document.getElementById('save_answer'+id);
    if (update_btn.style.display === "none") {
        update_btn.style.display = "contents";
    } else {
        update_btn.style.display = "none";
    }
    let edit_btn = document.getElementById('edit_answer'+id);
    edit_btn.style.display = "contents";
}

addEventListeners();