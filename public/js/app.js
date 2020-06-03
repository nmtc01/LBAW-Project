/**
 * Event listeners
 */

function addEventListeners() {
    let search = document.querySelector('#start_search');
    if (search != null) {
        search.addEventListener('keypress', sendSearchRequest);
    }

    let questionCreator = document.querySelector('#add_question_btn');
    if (questionCreator != null) {
        questionCreator.addEventListener('click', sendCreateQuestionRequest);
    }

    let answerCreator = document.querySelector('div.form-group .btn.my-2.my-sm-0');
    if (answerCreator != null)
        answerCreator.addEventListener('click', sendCreateAnswerRequest);

    let commentCreator = document.querySelector('#comment-button');
    if (commentCreator != null)
        commentCreator.addEventListener('click', sendCreateCommentRequest);

    let subcommentCreators = document.querySelectorAll('#subcomment-button');
    [].forEach.call(subcommentCreators, function(creator) {
        creator.addEventListener('click', sendCreateSubCommentRequest);
    });

    let answerDeleters = document.querySelectorAll('#delete_answer');
    [].forEach.call(answerDeleters, function(deleter) {
        deleter.addEventListener('click', sendDeleteAnswerRequest);
    });

    let commentDeleters = document.querySelectorAll('#delete_comment');
    [].forEach.call(commentDeleters, function(deleter) {
        deleter.addEventListener('click', sendDeleteCommentRequest);
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

    let questionLike = document.querySelector('.like1');
    if (questionLike != null)
        questionLike.addEventListener('click', QuestionLikeQ);

    let questionLikeP = document.querySelector('.like1P');
    if (questionLikeP != null)
        questionLikeP.addEventListener('click', QuestionLikeQ);

    let questionDislike = document.querySelector('.dislike1');
    if (questionDislike != null)
        questionDislike.addEventListener('click', QuestionDislikeQ);

    let questionDislikeP = document.querySelector('.dislike1P');
    if (questionDislikeP != null)
        questionDislikeP.addEventListener('click', QuestionDislikeQ);

    let answerLike = document.querySelectorAll('.like2');
    if (answerLike != null) {
        [].forEach.call(answerLike, function(al) {
            al.addEventListener('click', QuestionLikeA);
        });
    }

    let answerLikeP = document.querySelectorAll('.like2P');
    if (answerLikeP != null) {
        [].forEach.call(answerLikeP, function(alP) {
            alP.addEventListener('click', QuestionLikeA);
        });
    }


    let answerdislike = document.querySelectorAll('.dislike2');
    if (answerdislike != null) {
        [].forEach.call(answerdislike, function(ad) {
            ad.addEventListener('click', QuestionDislikeA);
        });
    }

    let answerdislikeP = document.querySelectorAll('.dislike2P');
    if (answerdislikeP != null) {
        [].forEach.call(answerdislikeP, function(adP) {
            adP.addEventListener('click', QuestionDislikeA);
        });
    }

    let homeLike = document.querySelectorAll('.like3');
    [].forEach.call(homeLike, function(homeL) {
        homeL.addEventListener('click', homeLikeF);
    });

    let homeDislike = document.querySelectorAll('.dislike3');
    [].forEach.call(homeDislike, function(homeD) {
        homeD.addEventListener('click', homeDislikeF);
    });

    let homeLikeP = document.querySelectorAll('.like3P');
    [].forEach.call(homeLikeP, function(homeLP) {
        homeLP.addEventListener('click', homeLikeF);
    });

    let homeDislikeP = document.querySelectorAll('.dislike3P');
    [].forEach.call(homeDislikeP, function(homeDP) {
        homeDP.addEventListener('click', homeDislikeF);
    });

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

    let commentEditors = document.querySelectorAll('.edit_comment_btn');
    if (commentEditors != null)
        [].forEach.call(commentEditors, function(editor) {
            editor.addEventListener('click', sendEditCommentRequest);
            editor.addEventListener('click', hideEditComment);
        });

    let commentUpdators = document.querySelectorAll('.save_comment_btn');
    if (commentUpdators != null)
        [].forEach.call(commentUpdators, function(updator) {
            updator.addEventListener('click', sendUpdateCommentRequest);
            updator.addEventListener('click', hideUpdateComment);
        });

    let labelAdder = document.getElementById('add_label');
    if (labelAdder != null)
        labelAdder.addEventListener('click', sendAddLabelRequest);

    // following questions

    let followQuestions = document.querySelectorAll('.followH');
    if (followQuestions != null)
        [].forEach.call(followQuestions, function(follower) {
            follower.addEventListener('click', sendFollowRequestH);
        });

    let followQuestion2 = document.querySelector('.followQ');
    if (followQuestion2 != null)
        followQuestion2.addEventListener('click', sendFollowRequestQ);

    let unfollowQuestions = document.querySelectorAll('.unfollowH');
    if (unfollowQuestions != null)
        [].forEach.call(unfollowQuestions, function(follower) {
            follower.addEventListener('click', sendUnfollowRequestH);
        });

    let unfollowQuestion2 = document.querySelector('.unfollowQ');
    if (unfollowQuestion2 != null)
        unfollowQuestion2.addEventListener('click', sendUnfollowRequestQ);

    // best answer

    let selectBestAnswer = document.querySelectorAll('#best-answer-black');
    if (selectBestAnswer != null)
        [].forEach.call(selectBestAnswer, function(bestAnswer) {
            bestAnswer.addEventListener('click', setBestAnswerRequest);
        });

    let deselectBestAnswer = document.querySelectorAll('#best-answer-green');
    if (deselectBestAnswer != null)
        [].forEach.call(deselectBestAnswer, function(bestAnswer) {
            bestAnswer.addEventListener('click', setBestAnswerRequest);
        });

    let editProfile = document.querySelector('#editProfile');
    if (editProfile != null) {
        editProfile.addEventListener('click', sendEditProfileRequest);
    }
    // reports

    let resolvers = document.querySelectorAll('.resolve-btn');
    if (resolvers != null)
        [].forEach.call(resolvers, function(resolveReport) {
            resolveReport.addEventListener('click', sendResolveReportRequest);
        });

    let questionReporter = document.querySelector('#report_question');
    if (questionReporter != null) {
        questionReporter.addEventListener('click', sendReportQuestionRequest);
    }

    let answerReporters = document.querySelectorAll('.report_answer');
    if (answerReporters != null)
        [].forEach.call(answerReporters, function(reportAnswer) {
            reportAnswer.addEventListener('click', sendReportAnswerRequest);
        });

    let commentReporters = document.querySelectorAll('.report_comment');
    if (commentReporters != null)
        [].forEach.call(commentReporters, function(reportComment) {
            reportComment.addEventListener('click', sendReportCommentRequest);
        });

    // moderate

    let promoter = document.querySelector('#promote-btn');
    if (promoter != null) {
        promoter.addEventListener('click', sendPromoteRequest);
    }

    let demoter = document.querySelector('#demote-btn');
    if (demoter != null) {
        demoter.addEventListener('click', sendDemoteRequest);
    }

    let banner = document.querySelector('#ban-btn');
    if (banner != null) {
        banner.addEventListener('click', sendBanRequest);
    }

    let accountDeleter = document.querySelector('#delete-account-btn');
    if (accountDeleter != null) {
        accountDeleter.addEventListener('click', sendDeleteAccountRequest);
    }

    // notifications

    let notificationBell = document.querySelector('#dropdownMenuNotificationsButton.yellow');
    if (notificationBell != null) {
        notificationBell.addEventListener('click', sendUpdateNotificationsRequest);
    }

    // labels
    let labelDeleters = document.querySelectorAll('.x-label');
    if (labelDeleters != null)
        [].forEach.call(labelDeleters, function(deleter) {
            deleter.addEventListener('click', sendDeleteLabelRequest);
        });

    let labelCreater = document.getElementById('create_label');
    if (labelCreater != null)
        labelCreater.addEventListener('click', sendAddLabelRequest);
}


/**
 * Ajax functions
 */

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


/**
 * Handlers 
 */
function resolvedReport() {
    if (this.status == 200) {
        window.location = "/admin";
    }
}

function reportAddedHanlder() {

}

function editProfileHandler() {
    info = JSON.parse(this.responseText);

    if (this.status == 200) {
        window.location = '/user/' + info[0];
    }
}

function showSearchHandler() {
    if (this.status == 200)
        window.location = '/search/' + this.responseText;
}

function questionAddedHandler() {
    let info = JSON.parse(this.responseText);

    // Reset the new answer input
    document.getElementById("formControlTextareaQuestion").value = "";
    document.getElementById("formControlTextareaDescription").value = "";

    if (this.status == 200)
        window.location = '/question/' + info[0];

    sendCreateLabelsRequest(info[0]);
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

        let section = document.getElementsByClassName("add_comment_form")[0];
        let list = document.getElementsByClassName("add_comment_form")[0];

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

function subCommentAddedHandler() {

    //In case of user not logged in
    if (this.status == 403) {
        let older_alert = document.getElementById('alert_comment');
        if (older_alert != null)
            return;

        let new_alert = createAlert("comment");

        let section = document.getElementsByClassName("add_comment_form")[0];
        let list = document.getElementsByClassName("add_comment_form")[0];

        section.insertBefore(new_alert, list.childNodes[0]);

        return;
    }

    //Parse info
    let info = JSON.parse(this.responseText);

    // Create the new Comment
    let new_comment = createComment(info);

    // Reset the new comment input
    document.getElementById("exampleFormControlTextarea3").value = "";

    //Get elements
    let section = document.getElementById("subcomments-list");
    let list = document.getElementById("subcomments-list");

    //Add new comment
    section.insertBefore(new_comment, list.childNodes[0]);

    // Focus on adding a new comment
    new_comment.focus();

    addEventListeners();
}

function answerDeletedHandler() {
    let answer = JSON.parse(this.responseText);
    let li = document.querySelector('li#answer' + answer.id + '[data-id="' + answer.id + '"]');
    li.remove();
}

function commentDeletedHandler() {
    let comment = JSON.parse(this.responseText);
    let div = document.querySelector('div#comment' + comment.id + '[data-id="' + comment.id + '"]');
    div.remove();
}

function questionDeletedHandler() {
    if (this.status == 200) window.location = '/';
    let question = JSON.parse(this.responseText);
    let div = document.querySelector('div#question-div[data-id="' + question.id + '"]');
    div.remove();
}

function labelDeletedHandler() {
    if (this.status == 200) {
        let label = JSON.parse(this.responseText);
        let a = document.querySelector('div#question-div #question_label' + label.id);
        a.remove();
    }
}

function questionEditedHandler() {
    let info = JSON.parse(this.responseText);

    // Edit Question
    let new_title = editTitle(info);
    let new_description = editDescription(info);
    let new_label = createAddLabelBtn();

    let div_title = document.querySelector("div#question-div h1");
    let div_description = document.querySelector("div#question-div #question_description");

    div_title.innerHTML = new_title.innerHTML;
    div_description.innerHTML = new_description.innerHTML;
    div_description.after(new_label);

    // Focus 
    new_title.focus();
    new_description.focus();
    new_label.focus();

    addEventListeners();
}

function labelEditedHandler() {
    let info = JSON.parse(this.responseText);

    // Edit Label
    let new_name = editLabelName(info);
    let badge_name = document.querySelector("div#question-div #question_label" + info[1]);

    badge_name.innerHTML = new_name.innerHTML;

    // Focus 
    new_name.focus();

    addEventListeners();
}

function answerEditedHandler() {
    let info = JSON.parse(this.responseText);

    // Edit Answer
    let new_content = editAnswerContent(info);
    let div_content = document.querySelector("ul#answers-list #answer" + info[1] + " #answer_content");
    div_content.outerHTML = new_content.innerHTML;

    // Focus
    new_content.focus();

    addEventListeners();
}

function commentEditedHandler() {
    let info = JSON.parse(this.responseText);

    // Edit comment
    let new_content = editCommentContent(info);
    let div_content = document.querySelector("#comment" + info[1] + " div #comment_content");
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

    sendCreateLabelsRequest(info[2]);

    let btn = document.getElementById('add_label');
    if (btn != null)
        btn.remove();
    let labels_names = document.querySelectorAll('label_name input');
    for (let i = 0; i < labels_names.length; i++) {
        labels_names[i].outerHTML = `<a class="badge badge-dark badge-pill labels">${labels_names[i].value}
                                     </a>`;
    }

    // Focus 
    new_title.focus();
    new_description.focus();

    addEventListeners();
}

function labelUpdatedHandler() {
    let info = JSON.parse(this.responseText);

    // Update question
    let new_name = updateLabelName(info);

    let badge_name = document.querySelector("div#question-div #question_label" + info[1]);
    let labels = document.querySelectorAll("label_name input");

    badge_name.outerHTML = new_name.innerHTML;

    for (let i = 0; i < labels.length; i++) {
        labels[i].outerHTML = `<a class="badge badge-dark badge-pill labels" id="question_label">${labels[i].firstChild.value}
                                </a>`
    }

    // Focus 
    new_name.focus();

    addEventListeners();
}

function answerUpdatedHandler() {
    let info = JSON.parse(this.responseText);

    // Update answer
    let new_content = updateAnswerContent(info);
    let div_content = document.querySelector("ul#answers-list #answer" + info[1] + " #answer_content");
    div_content.outerHTML = new_content.innerHTML;

    // Focus 
    new_content.focus();

    addEventListeners();
}

function commentUpdatedHandler() {
    let info = JSON.parse(this.responseText);

    // Update answer
    let new_content = updateCommentContent(info);
    let div_content = document.querySelector("#comment" + info[1] + " div #comment_content");
    div_content.outerHTML = new_content.innerHTML;

    // Focus 
    new_content.focus();

    addEventListeners();
}

function labelStartedHandler() {
    let new_content = startLabel();
    let plus = document.getElementById('add_label');
    plus.outerHTML = new_content.innerHTML;

    // Focus
    plus.focus();

    addEventListeners();
}

// following questions
function followRequestHandlerH() {

    let info = JSON.parse(this.responseText);

    // gets the button
    let btn = document.querySelector(".questions-list[data-id='" + info[1] + "'] .followH");

    // changes the button style
    let new_unfollow = document.createElement('i');
    new_unfollow.innerHTML = `<i class="fas fa-arrow-right fa-lg unfollowH"> unfollow </i>`
    btn.outerHTML = new_unfollow.innerHTML;
    btn.innerHTML = " unfollow";

    // updates EventListeners
    addEventListeners();


    // updates sidenav
    if (info[2] <= 6) {

        let section = document.getElementById('sidenav_left');

        let new_following = document.createElement('following');
        new_following.classList.add('sidenav');
        new_following.innerHTML = `<a class="row" data-id="${info[1]}" href="question/${info[1]}"> ${info[0]}</a>`;

        section.insertBefore(new_following, section.childNodes[section.childNodes.size]);


        return new_following;

    }

}

function followRequestHandlerQ() {

    let info = JSON.parse(this.responseText);

    // gets the button
    let btn = document.querySelector(".followQ");

    // changes the button style
    let new_unfollow = document.createElement('i');
    new_unfollow.innerHTML = `<i class="fas fa-arrow-right fa-lg unfollowQ"> unfollow </i>`
    btn.outerHTML = new_unfollow.innerHTML;
    btn.innerHTML = " unfollow";

    // updates EventListeners
    addEventListeners();


    // updates sidenav
    if (info[2] <= 6) {

        let section = document.getElementById('sidenav_left');

        let new_following = document.createElement('following');
        new_following.classList.add('sidenav');
        new_following.innerHTML = `<a class="row" data-id="${info[1]}" href="${info[1]}"> ${info[0]}</a>`;

        section.insertBefore(new_following, section.childNodes[section.childNodes.size]);

        return new_following;

    }

}

function unfollowRequestHandlerH() {

    let info = JSON.parse(this.responseText);

    // gets the button
    let btn = document.querySelector(".questions-list[data-id='" + info[1] + "'] .unfollowH");

    // changes the button style
    let new_follow = document.createElement('i');
    new_follow.innerHTML = `<i class="fas fa-arrow-right fa-lg followH"> follow </i>`
    btn.outerHTML = new_follow.innerHTML;
    btn.innerHTML = " follow";

    // updates EventListeners
    addEventListeners();


    // updates sidenav
    let li = document.querySelector('a.row[data-id="' + info[1] + '"]');
    if (li != null) {
        li.remove();
    }


}

function unfollowRequestHandlerQ() {

    let info = JSON.parse(this.responseText);

    // gets the button
    let btn = document.querySelector(".unfollowQ");

    // changes the button style
    let new_unfollow = document.createElement('i');
    new_unfollow.innerHTML = `<i class="fas fa-arrow-right fa-lg followQ"> follow </i>`
    btn.outerHTML = new_unfollow.innerHTML;
    btn.innerHTML = " follow";

    // updates EventListeners
    addEventListeners();


    let li = document.querySelector('a.row[data-id="' + info[1] + '"]');
    if (li != null) {
        li.remove();
    }


}

function manageUsersHandler() {
    if (this.status == 200)
        window.location = '/admin';
}

function manageDeletedUserHandler() {
    if (this.status == 200)
        window.location = '/login';
}

/**
 * Send requests
 */

function sendEditProfileRequest() {
    let id = document.getElementById("manage_users").getAttribute('data-id');
    let first_name = document.getElementById("first_name").value;
    let last_name = document.getElementById("last_name").value;
    let email = document.getElementById("email").value;
    let description = document.getElementById("bio").value;
    let username = document.getElementById("username").value;
    let password = document.getElementById("password").value;
    let confirmPassword = document.getElementById("confirmPassword").value;

    if (password == confirmPassword) {
        sendAjaxRequest('put', '/api/user/' + id, { first_name: first_name, last_name: last_name, email: email, description: description, username: username, password: password }, editProfileHandler);
    } else {
        return;
    }
}

function sendSearchRequest(e) {
    if (e.key === 'Enter') {
        let keyword = document.getElementById("start_search").value;
        let start = document.querySelector('.dates #start_date');
        let end = document.querySelector('.dates #end_date');

        let start_date = '';
        let end_date = '';
        if (start != null)
            if (start.value != '')
                start_date = '&strDate=' + start.value;
        if (end != null)
            if (end.value != '')
                end_date = '&endDate=' + end.value;
        content = keyword + start_date + end_date;

        if (content != '')
            sendAjaxRequest('post', '/search', { content }, showSearchHandler);

        event.preventDefault();
    }
}

function sendDeleteAnswerRequest() {
    let id = this.closest('li.answer_item').getAttribute('data-id');
    sendAjaxRequest('delete', '/api/answer/' + id, null, answerDeletedHandler);
}

function sendDeleteCommentRequest() {
    let id = this.closest('.comment').getAttribute('data-id');
    sendAjaxRequest('delete', '/api/comment/' + id, null, commentDeletedHandler);
}

function sendDeleteQuestionRequest() {
    let id = this.closest('div#question-div').getAttribute('data-id');
    sendAjaxRequest('delete', '/api/question/' + id, null, questionDeletedHandler);
}

function sendDeleteLabelRequest(event) {
    let id = event.target.parentElement.getAttribute('data-id');
    sendAjaxRequest('delete', '/api/label/' + id, null, labelDeletedHandler);
}

function sendEditQuestionRequest() {
    let id = this.closest('div#question-div').getAttribute('data-id');
    let title = document.querySelector("div#question-div h1").textContent;
    let description = document.querySelector("div#question-div #question_description").textContent;

    if (title != '' && description != '')
        sendAjaxRequest('put', '/api/question/' + id, { title: title, description: description }, questionEditedHandler);

    let labels = document.querySelectorAll('.badge.badge-dark.badge-pill.labels');
    [].forEach.call(labels, function(label) {
        let label_id = label.getAttribute('data-id');
        let name = label.textContent;
        let span = label.firstChild.textContent;
        name = name.substring(0, span.length);
        if (label_id != null && name != '')
            sendAjaxRequest('put', '/api/label/' + label_id, { name: name }, labelEditedHandler);
    });
}

function sendEditAnswerRequest() {
    let div = event.target.parentElement.parentElement.parentElement.parentElement;
    let id = div.getAttribute('data-id');
    let content = document.querySelector("ul#answers-list #answer" + id + " #answer_content").textContent;

    if (content != '')
        sendAjaxRequest('put', '/api/answer/' + id, { content: content }, answerEditedHandler);
}

function sendEditCommentRequest(event) {
    let div = event.target.parentElement.parentElement.parentElement;
    let id = div.getAttribute('data-id');
    let content = document.querySelector("#comment" + id + " div #comment_content").textContent;
    if (content != '')
        sendAjaxRequest('put', '/api/comment/' + id, { content: content }, commentEditedHandler);
}

function sendUpdateQuestionRequest() {
    let id = this.closest('div#question-div').getAttribute('data-id');
    let title = document.querySelector('input#question_title').value;
    let description = document.querySelector('div#question-div input#question_description').value;

    if (title != "" && description != "")
        sendAjaxRequest('put', '/api/question/' + id + '/update', { title: title, description: description }, questionUpdatedHandler);

    let labels = document.querySelectorAll('.badge.badge-dark.badge-pill.labels');
    [].forEach.call(labels, function(label) {
        let label_id = label.getAttribute('data-id');
        let name = label.firstChild.value;
        if (label_id != null && name != '')
            sendAjaxRequest('put', '/api/label/' + label_id + '/update', { name: name }, labelUpdatedHandler);
    });
}

function sendUpdateAnswerRequest() {
    let div = event.target.parentElement.parentElement.parentElement.parentElement;
    let id = div.getAttribute('data-id');
    let content = document.querySelector('ul#answers-list #answer' + id + ' input#answer_content').value;

    if (content != "")
        sendAjaxRequest('put', '/api/answer/' + id + '/update', { content: content }, answerUpdatedHandler);
}

function sendUpdateCommentRequest() {
    let div = event.target.parentElement.parentElement.parentElement;
    let id = div.getAttribute('data-id');
    let content = document.querySelector("#comment" + id + " div #comment_content").value;

    if (content != "")
        sendAjaxRequest('put', '/api/comment/' + id + '/update', { content: content }, commentUpdatedHandler);
}

function sendCreateQuestionRequest(event) {

    let title = document.getElementById("formControlTextareaQuestion").value;
    let description = document.getElementById("formControlTextareaDescription").value;

    if (title != '' && description != '')
        sendAjaxRequest('put', '/api/question', { title: title, description: description }, questionAddedHandler);
    else {

        let older_alert = document.getElementById('alert_question');
        if (older_alert != null)
            return;

        let new_alert = createAlertQuestion();

        let section = document.getElementById("add_question_form");
        let list = document.getElementById("add_question_form");

        section.insertBefore(new_alert, list.childNodes[0]);

        return;

    }

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

function sendCreateSubCommentRequest(event) {
    let content = document.getElementById("exampleFormControlTextarea3").value;
    let answer_index = this.closest('.answer_item').getAttribute('data-id');

    if (content != '')
        sendAjaxRequest('put', '/api/comment', { content: content, answer_index: answer_index }, subCommentAddedHandler);

    event.preventDefault();

}

function sendAddLabelRequest() {
    sendAjaxRequest('put', '/api/label/', null, labelStartedHandler);
}

function sendCreateLabelsRequest(question_index) {
    let forms = document.querySelectorAll('.label_form');

    for (let i = 0; i < forms.length; i++) {
        if (forms[i] == null)
            return;
        let name = forms[i].value;
        if (name != '')
            sendAjaxRequest('post', '/api/label', { name: name, question_index: question_index });
    }
}

// following questions

function sendFollowRequestH() {

    let id = this.closest('.questions-list').getAttribute('data-id');
    sendAjaxRequest('put', '/api/question/' + id + '/follow', { id: id }, followRequestHandlerH);

}

function sendFollowRequestQ() {

    let id = this.closest('div#question-div').getAttribute('data-id');
    sendAjaxRequest('put', '/api/question/' + id + '/follow', { id: id }, followRequestHandlerQ);

}

function sendUnfollowRequestH() {

    let id = this.closest('.questions-list').getAttribute('data-id');
    sendAjaxRequest('put', '/api/question/' + id + '/unfollow', { id: id }, unfollowRequestHandlerH);

}

function sendUnfollowRequestQ() {

    let id = this.closest('div#question-div').getAttribute('data-id');
    sendAjaxRequest('put', '/api/question/' + id + '/unfollow', { id: id }, unfollowRequestHandlerQ);

}

// best answer

function setBestAnswerRequest() {

    let id = this.closest('.answer_item').getAttribute('data-id');
    let username = document.querySelector('#username-question a').innerHTML;
    sendAjaxRequest('put', '/api/answer/' + id + '/best', { id: id, username: username }, setBestAnswerHandler);

}

// reports

function sendResolveReportRequest(event) {
    let div = event.target.parentElement.parentElement.parentElement.parentElement.parentElement;
    let id = div.getAttribute('data-id');
    let type = div.getAttribute('id')

    let class1;
    let id2;

    if (type == 'reported_question' + id) {
        class1 = 'reportForQuestion';
        id2 = 'resolveReportedQuestion';
    } else if (type == 'reported_answer' + id) {
        class1 = 'reportForAnswer';
        id2 = 'resolveReportedAnswer';
    } else if (type == 'reported_comment' + id) {
        class1 = 'reportForComment';
        id2 = 'resolveReportedComment';
    } else if (type == 'reported_user' + id) {
        class1 = 'reportForUser';
        id2 = 'resolveReportedUser';
    }

    let reports = document.querySelectorAll('.modal-report.' + class1 + '' + id);
    [].forEach.call(reports, function(reports) {
        let report_id = reports.getAttribute('data-id');
        let comment = document.querySelector("#" + id2 + "" + id + " textarea").value;
        if (comment != '' && report_id != '')
            sendAjaxRequest('post', '/admin/' + report_id, { comment: comment }, resolvedReport);
    });
}

function sendReportQuestionRequest() {
    let id = document.getElementById('question-div').getAttribute('data-id');
    let elem = document.querySelector('#report_something textarea');
    let description = '';

    if (elem != null)
        description = elem.value;

    if (id != '' && description != '')
        sendAjaxRequest('put', '/api/question/' + id + '/report', { description: description }, reportAddedHanlder);

    elem.value = "";
    event.preventDefault();
}

function sendReportAnswerRequest() {
    let id = this.closest('li').getAttribute('data-id');
    let elem = document.querySelector('#collapseReportAnswer' + id + ' textarea');
    let description = '';

    if (elem != null)
        description = elem.value;

    if (id != '' && description != '')
        sendAjaxRequest('put', '/api/answer/' + id + '/report', { description: description }, reportAddedHanlder);

    elem.value = "";
    event.preventDefault();
}

function sendReportCommentRequest() {
    let id = this.closest('div.comment').getAttribute('data-id');
    let elem = document.querySelector('#collapseReportComment' + id + ' textarea');
    let description = '';

    if (elem != null)
        description = elem.value;

    if (id != '' && description != '')
        sendAjaxRequest('put', '/api/comment/' + id + '/report', { description: description }, reportAddedHanlder);

    elem.value = "";
    event.preventDefault();
}

// moderate

function sendPromoteRequest() {
    let id = this.closest('#manage_users').getAttribute('data-id');

    if (id != '')
        sendAjaxRequest('put', '/user/' + id + '/promote', null, manageUsersHandler);
}

function sendDemoteRequest() {
    let id = this.closest('#manage_users').getAttribute('data-id');

    if (id != '')
        sendAjaxRequest('put', '/user/' + id + '/demote', null, manageUsersHandler);
}

function sendBanRequest() {
    let id = this.closest('#manage_users').getAttribute('data-id');

    if (id != '')
        sendAjaxRequest('put', '/user/' + id + '/ban', null, manageUsersHandler);
}

function sendDeleteAccountRequest() {
    let id = this.closest('#manage_users').getAttribute('data-id');

    if (id != '')
        sendAjaxRequest('put', '/user/' + id + '/delete', null, manageDeletedUserHandler);
}


// notifications

function sendUpdateNotificationsRequest() {
    sendAjaxRequest('put', '/api/notification', null, notificationsHandler);
}



/**
 * Auxiliary functions
 * @param info 
 */
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

function editLabelName(info) {
    let new_name = document.createElement('name');
    new_name.innerHTML = `<input class="form-control" type="text" value="${info[0]}">`;

    return new_name;

}

function createAddLabelBtn() {
    let new_label = document.createElement('label_name');
    new_label.innerHTML = `<a class="badge badge-dark badge-pill" id="add_label">+ Label</a>`;
    return new_label;
}

function editAnswerContent(info) {
    let new_answer = document.createElement('answer');
    new_answer.classList.add('answer');
    new_answer.setAttribute('data-id', 0);
    new_answer.innerHTML = `<input id="answer_content" class="form-control" type="text" value="${info[0]}">`;

    return new_answer;
}

function editCommentContent(info) {
    let new_comment = document.createElement('comment');
    new_comment.classList.add('comment');
    new_comment.setAttribute('data-id', 0);
    new_comment.innerHTML = `<input id="comment_content" class="form-control" type="text" value="${info[0]}">`;

    return new_comment;
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

function updateLabelName(info) {
    let new_label = document.createElement('label');
    new_label.innerHTML = `<a class="badge badge-dark badge-pill labels" id="question_label${info[1]}" data-id="${info[1]}">${info[0]}
                            <span class="x-label"> x</span>
                           </a>`;

    return new_label;
}

function updateAnswerContent(info) {
    let new_question = document.createElement('question');
    new_question.classList.add('question');
    new_question.setAttribute('data-id', 0);
    new_question.innerHTML = `<p id="answer_content">${info[0]}</p>`;

    return new_question;
}

function updateCommentContent(info) {
    let new_comment = document.createElement('comment');
    new_comment.classList.add('comment');
    new_comment.setAttribute('data-id', 0);
    new_comment.innerHTML = `<p id="comment_content">${info[0]}</p>`;

    return new_comment;
}

function createAnswer(info) {
    let new_answer = document.createElement('answer');
    new_answer.classList.add('answer');
    new_answer.innerHTML = `<li id="answer${info[3]}" class="answer_item" data-id="${info[3]}">
                                <div class="row">
                                    <a class="col-sm-3 d-none d-sm-block text-center" href="/user/${info[4]}">
                                        <img src="/img/unknown.png" alt="Generic placeholder image">
                                    </a>
                                    <div class="col-sm-9">
                                        <span class="badge badge-success"><i class="fas fa-star"></i>Score ${info[2]}</span>
                                        <p id="user_ans"><a href="/user/${info[4]}"> ${info[1]} </a></p>
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
                                        <a class="icon-answers" data-toggle="collapse" href="#collapsed_comments${info[3]}">
                                            <i class="fas fa-comment">0</i>
                                        </a>
                                        <a class="icon-answers" data-toggle="collapse" data-target="#collapseReportAnswer${info[3]}" aria-expanded="false">
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
                                <div class="collapse" id="collapsed_comments${info[3]}">
                                    <div class="card card-body">
                                        <div class="form-group" id="add_comment_form">
                                            <label for="exampleFormControlTextarea2"></label>
                                            <input class="form-control" placeholder="Do you want to comment this answer?"id="exampleFormControlTextarea3">
                                            <button class="btn my-2 my-sm-0" id="subcomment-button" type="submit">Comment</button>
                                        </div>
                                        <div class="media-body" id="subcomments-list">
                                        </div>  
                                    </div>
                                </div>
                                <div class="collapse collapsed_report" id="collapseReportAnswer${info[3]}">
                                    <div class="card card-header">
                                        <h5>Help us</h5>
                                    </div>
                                    <div class="card card-body">
                                        <form>
                                            <div class="form-group">
                                                <label for="formControlTextareaQuestion">Write here a brief description of the problem</label>
                                                <textarea class="form-control" rows="5"></textarea>
                                            </div>
                                        </form>
                                        <button type="submit" class="btn btn-primary report_answer" data-toggle="collapse" data-target="#collapseReportAnswer${info[3]}">Send</button>
                                    </div>
                                </div>
                            </li>`;

    return new_answer;
}

function createComment(info) {

    let new_comment = document.createElement('div');
    new_comment.setAttribute('data-id', info[3]);
    new_comment.classList.add('comment');
    new_comment.setAttribute('id', 'comment' + info[3]);
    new_comment.innerHTML = `<div class="content">
                                <a href="/user/${info[4]}" class="username">${info[1]}</a>
                                <a class="icon-comments" data-toggle="collapse" data-target="#collapseReportComment${info[3]}" aria-expanded="false">
                                    <i class="fas fa-bug"> Report</i>
                                </a>
                                <a class="icon-comments edit_comment_btn" id="edit_comment${info[3]}">
                                    <i class="fas fa-edit"> Edit</i>
                                </a>
                                <a class="icon-comments save_comment_btn" id="save_comment${info[3]}">
                                    <i class="fas fa-save"> Save</i>
                                </a>
                                <a class="icon-comments" id="delete_comment">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                                <br>
                                <p id="comment_content">
                                    ${info[0]}
                                </p>
                            </div>
                            <div class="collapse collapsed_report" id="collapseReportComment${info[3]}">
                                <div class="card card-header">
                                    <h5>Help us</h5>
                                </div>
                                <div class="card card-body">
                                    <form>
                                        <div class="form-group">
                                            <label for="formControlTextareaQuestion">Write here a brief description of the problem</label>
                                            <textarea class="form-control" rows="2"></textarea>
                                        </div>
                                    </form>
                                    <button type="submit" class="btn btn-primary report_comment" data-toggle="collapse" data-target="#collapseReportComment${info[3]}">Send</button>
                                </div>
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

function createAlertQuestion() {
    let new_alert = document.createElement('alert');
    new_alert.classList.add('alert');
    new_alert.innerHTML = ` <div id="alert_question" class="card text-white bg-danger">
                                <div class="card-body">
                                <p class="card-text">You must fill both title and description</p>
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
    let edit_btn = document.getElementById('edit_answer' + id);
    if (edit_btn.style.display === "none") {
        edit_btn.style.display = "contents";
    } else {
        edit_btn.style.display = "none";
    }
    let update_btn = document.getElementById('save_answer' + id);
    update_btn.style.display = "contents";
}

function hideUpdateAnswer() {
    let id = event.target.parentElement.parentElement.parentElement.parentElement.getAttribute('data-id');
    let update_btn = document.getElementById('save_answer' + id);
    if (update_btn.style.display === "none") {
        update_btn.style.display = "contents";
    } else {
        update_btn.style.display = "none";
    }
    let edit_btn = document.getElementById('edit_answer' + id);
    edit_btn.style.display = "contents";
}

function hideEditComment() {
    let id = event.target.parentElement.parentElement.parentElement.getAttribute('data-id');
    let edit_btn = document.getElementById('edit_comment' + id);
    if (edit_btn.style.display === "none") {
        edit_btn.style.display = "contents";
    } else {
        edit_btn.style.display = "none";
    }
    let update_btn = document.getElementById('save_comment' + id);
    update_btn.style.display = "contents";
}

function hideUpdateComment() {
    let id = event.target.parentElement.parentElement.parentElement.getAttribute('data-id');
    let update_btn = document.getElementById('save_comment' + id);
    if (update_btn.style.display === "none") {
        update_btn.style.display = "contents";
    } else {
        update_btn.style.display = "none";
    }
    let edit_btn = document.getElementById('edit_comment' + id);
    edit_btn.style.display = "contents";
}

function startLabel() {
    let start_label = document.createElement('div');
    start_label.innerHTML = `<input class="labels badge-dark badge-pill form-control col-sm-4 label_form" type="text" placeholder="#">
                             <a class="badge badge-dark badge-pill" id="add_label">+</a>`;

    return start_label;
}

function QuestionLikeQ() {
    let id = this.closest('div#question-div').getAttribute('data-id');
    sendAjaxRequest('put', '/api/question/' + id + '/vote', { id: id }, handleLikeQ);
}

function QuestionDislikeQ() {
    let id = this.closest('div#question-div').getAttribute('data-id');
    sendAjaxRequest('put', '/api/question/' + id + '/downvote', { id: id }, handleDislikeQ);
}

function QuestionLikeA() {
    let id = this.closest('.answer_item').getAttribute('data-id');
    sendAjaxRequest('put', '/api/answer/' + id + '/vote', { id: id }, handleLikeA);
}

function QuestionDislikeA() {
    let id = this.closest('.answer_item').getAttribute('data-id');
    sendAjaxRequest('put', '/api/answer/' + id + '/downvote', { id: id }, handleDislikeA);
}


function homeLikeF() {
    let id = this.closest('div.questions-list').getAttribute('data-id');
    sendAjaxRequest('put', '/api/question/' + id + '/vote', { id: id }, handleLikeH);
}


function homeDislikeF() {
    let id = this.closest('div.questions-list').getAttribute('data-id');
    sendAjaxRequest('put', '/api/question/' + id + '/downvote', { id: id }, handleDislikeH);
}


function handleLikeQ() {
    let info = JSON.parse(this.responseText);

    let buttonl = document.querySelector('.like1');
    if (buttonl === null) buttonl = document.querySelector('.like1P');

    let buttond = document.querySelector('.dislike1');
    if (buttond === null) buttond = document.querySelector('.dislike1P');


    if (info[3] == 1) { //only like placed
        let newL = likePurple(info[0], 1);

        buttonl.outerHTML = newL.innerHTML;
        buttond.innerHTML = ' ' + info[1];
    } else if (info[3] == 2) { //like erased
        let newL = likeBlack(info[0], 1);

        buttonl.outerHTML = newL.innerHTML;
        buttond.innerHTML = ' ' + info[1];

    } else { //like added and dislike removed
        let newL = likePurple(info[0], 1);
        let newD = dislikeBlack(info[1], 1);

        buttonl.outerHTML = newL.innerHTML;
        buttond.outerHTML = newD.innerHTML;
    }

    addEventListeners();

}

function handleDislikeQ() {
    let info = JSON.parse(this.responseText);

    let buttond = document.querySelector('.dislike1');
    if (buttond === null) buttond = document.querySelector('.dislike1P');

    let buttonl = document.querySelector('.like1');
    if (buttonl === null) buttonl = document.querySelector('.like1P');


    if (info[3] == 1) { //only dislike placed
        let newD = dislikePurple(info[1], 1);

        buttond.outerHTML = newD.innerHTML;
        buttonl.innerHTML = ' ' + info[0];
    } else if (info[3] == 2) { //dislike erased
        let newD = dislikeBlack(info[1], 1);

        buttond.outerHTML = newD.innerHTML;
        buttonl.innerHTML = ' ' + info[0];

    } else { //dislike added and like removed
        let newL = likeBlack(info[0], 1);
        let newD = dislikePurple(info[1], 1);

        buttonl.outerHTML = newL.innerHTML;
        buttond.outerHTML = newD.innerHTML;
    }

    addEventListeners();

}

function handleLikeA() {
    let info = JSON.parse(this.responseText);

    /*
    let buttonl = document.querySelector('.like2');
    if (buttonl === null) buttonl = document.querySelector('.like2P');

    let buttond = document.querySelector('.dislike2');
    if (buttond === null) buttond = document.querySelector('.dislike2P');
    */
    let buttonl = document.querySelector(".answer_item[data-id='" + info[3] + "'] .like2");
    if (buttonl === null) buttonl = document.querySelector(".answer_item[data-id='" + info[3] + "'] .like2P");

    let buttond = document.querySelector(".answer_item[data-id='" + info[3] + "'] .dislike2");
    if (buttond === null) buttond = document.querySelector(".answer_item[data-id='" + info[3] + "'] .dislike2P");


    if (info[2] == 1) { //only like placed
        let newL = likePurple(info[0], 2);

        buttonl.outerHTML = newL.innerHTML;
        buttond.innerHTML = ' ' + info[1];
    } else if (info[2] == 2) { //like erased
        let newL = likeBlack(info[0], 2);

        console.log(newL);
        buttonl.outerHTML = newL.innerHTML;
        buttond.innerHTML = ' ' + info[1];

    } else { //like added and dislike removed
        let newL = likePurple(info[0], 2);
        let newD = dislikeBlack(info[1], 2);

        buttonl.outerHTML = newL.innerHTML;
        buttond.outerHTML = newD.innerHTML;
    }

    addEventListeners();

}

function handleDislikeA() {
    let info = JSON.parse(this.responseText);

    /*
    let buttond = document.querySelector('.dislike2');
    if (buttond === null) buttond = document.querySelector('.dislike2P');

    let buttonl = document.querySelector('.like2');
    if (buttonl === null) buttonl = document.querySelector('.like2P');
    */

    let buttond = document.querySelector(".answer_item[data-id='" + info[3] + "'] .dislike2");
    if (buttond === null) buttond = document.querySelector(".answer_item[data-id='" + info[3] + "'] .dislike2P");

    let buttonl = document.querySelector(".answer_item[data-id='" + info[3] + "'] .like2");
    if (buttonl === null) buttonl = document.querySelector(".answer_item[data-id='" + info[3] + "'] .like2P");


    if (info[2] == 1) { //only dislike placed
        let newD = dislikePurple(info[1], 2);

        buttond.outerHTML = newD.innerHTML;
        buttonl.innerHTML = ' ' + info[0];
    } else if (info[2] == 2) { //dislike erased
        let newD = dislikeBlack(info[1], 2);

        buttond.outerHTML = newD.innerHTML;
        buttonl.innerHTML = ' ' + info[0];

    } else { //dislike added and like removed
        let newL = likeBlack(info[0], 2);
        let newD = dislikePurple(info[1], 2);

        buttonl.outerHTML = newL.innerHTML;
        buttond.outerHTML = newD.innerHTML;
    }

    addEventListeners();

}

function handleLikeH() {
    let info = JSON.parse(this.responseText);

    let buttonl = document.querySelector(".questions-list[data-id='" + info[2] + "'] .like3");
    if (buttonl === null) buttonl = document.querySelector(".questions-list[data-id='" + info[2] + "'] .like3P");

    let buttond = document.querySelector(".questions-list[data-id='" + info[2] + "'] .dislike3");
    if (buttond === null) buttond = document.querySelector(".questions-list[data-id='" + info[2] + "'] .dislike3P");

    if (info[3] == 1) { //only like placed
        let newL = likePurple(info[0], 3);

        buttonl.outerHTML = newL.innerHTML;
        buttond.innerHTML = ' ' + info[1];
    } else if (info[3] == 2) { //like erased
        let newL = likeBlack(info[0], 3);

        buttonl.outerHTML = newL.innerHTML;
        buttond.innerHTML = ' ' + info[1];

    } else { //like added and dislike removed
        let newL = likePurple(info[0], 3);
        let newD = dislikeBlack(info[1], 3);

        buttonl.outerHTML = newL.innerHTML;
        buttond.outerHTML = newD.innerHTML;
    }

    addEventListeners();
}

function handleDislikeH() {
    let info = JSON.parse(this.responseText);


    let buttonl = document.querySelector(".questions-list[data-id='" + info[2] + "'] .like3");
    if (buttonl === null) buttonl = document.querySelector(".questions-list[data-id='" + info[2] + "'] .like3P");

    let buttond = document.querySelector(".questions-list[data-id='" + info[2] + "'] .dislike3");
    if (buttond === null) buttond = document.querySelector(".questions-list[data-id='" + info[2] + "'] .dislike3P");


    if (info[3] == 1) { //only dislike placed
        let newD = dislikePurple(info[1], 3);

        buttond.outerHTML = newD.innerHTML;
        buttonl.innerHTML = ' ' + info[0];
    } else if (info[3] == 2) { //dislike erased
        let newD = dislikeBlack(info[1], 3);

        buttond.outerHTML = newD.innerHTML;
        buttonl.innerHTML = ' ' + info[0];

    } else { //dislike added and like removed
        let newL = likeBlack(info[0], 3);
        let newD = dislikePurple(info[1], 3);

        buttonl.outerHTML = newL.innerHTML;
        buttond.outerHTML = newD.innerHTML;
    }

    addEventListeners();

}

function likePurple(nr_likes, index) {
    let new_like = document.createElement('i');
    new_like.innerHTML = ` 
     <i class="fas fa-thumbs-up fa-lg like${index}P" aria-hidden="true"> ${nr_likes}</i>
    `
    return new_like;
}

function likeBlack(nr_likes, index) {
    let new_like = document.createElement('i');
    new_like.innerHTML = ` 
     <i class="fas fa-thumbs-up fa-lg like${index}" aria-hidden="true"> ${nr_likes}</i>`
    return new_like;
}

function dislikePurple(nr_dislikes, index) {
    let new_dislike = document.createElement('i');
    new_dislike.innerHTML = `
    <i class="fas fa-thumbs-down fa-lg dislike${index}P" aria-hidden="true"> ${nr_dislikes}</i>`
    return new_dislike;
}

function dislikeBlack(nr_dislikes, index) {
    let new_dislike = document.createElement('i');
    new_dislike.innerHTML = `
    <i class="fas fa-thumbs-down fa-lg dislike${index}" aria-hidden="true"> ${nr_dislikes}</i>`
    return new_dislike;
}

// best answer

function setBestAnswerHandler() {

    if (this.status == 403) {
        return;
    }

    let info = JSON.parse(this.responseText);
    let answer_id = info[0];
    let value = info[1];

    if (value) {

        let marked_before = document.querySelector('#best-answer-green');
        if (marked_before != null) {
            // changes the button style
            let update_before = document.createElement('i');
            update_before.innerHTML = `<i class="fas fa-check-circle" id="best-answer-black"> Set as best answer</i>`
            marked_before.outerHTML = update_before.innerHTML;
            marked_before.innerHTML = " Set as best answer";
        }

        let marked_new = document.querySelector("#answer" + answer_id + "[data-id='" + answer_id + "'] #best-answer-black");
        // changes the button style
        let update_new = document.createElement('i');
        update_new.innerHTML = `<i class="fas fa-check-circle" id="best-answer-green"> Set as best answer</i>`
        marked_new.outerHTML = update_new.innerHTML;
        marked_new.innerHTML = " Set as best answer";

        // updates EventListeners
        addEventListeners();

    } else {

        let marked_new = document.querySelector("#answer" + answer_id + "[data-id='" + answer_id + "'] #best-answer-green");
        // changes the button style
        let update_new = document.createElement('i');
        update_new.innerHTML = `<i class="fas fa-check-circle" id="best-answer-black"> Set as best answer</i>`
        marked_new.outerHTML = update_new.innerHTML;
        marked_new.innerHTML = " Set as best answer";

        // updates EventListeners
        addEventListeners();

    }

}

// notifications

function notificationsHandler() {

    let bell = document.querySelector("#dropdownMenuNotificationsButton.yellow");
    bell.classList.remove('yellow');

    addEventListeners();

}


addEventListeners();