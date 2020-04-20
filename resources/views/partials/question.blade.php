<div class="container-fluid">
    <div class="wrapper col-md-5">
        <div class="row flex-row-reverse">
            <div class="col-sm-9">
                <h1>How to generate a random string of a fixed length in Go?</h1>
            </div>
            <div id="prof-img" class="col-sm-3 text-center">
                <a class="row-sm" href="profile.php">
                    <img src="../resources/bob_iger.jpeg" alt="Generic placeholder image">
                </a>
                <p class="row-sm text-truncate"><a href="profile.php">pedro_dantas</a></p>
            </div>
        </div>
        <div>
            <p>I want a random string of characters only (uppercase or lowercase), no numbers, in Go. What is the fastest and simplest way to do this?</p>

            <div class=icons>
                <a class="icon" href="#">
                    <i class="fas fa-thumbs-up fa-lg"> 35</i>
                </a>
                <a class="icon" href="#">
                    <i class="fas fa-thumbs-down fa-lg"> 4</i>
                </a>
                <a class="icon" href="#">
                    <i class="fas fa-arrow-right fa-lg"> follow</i>
                </a>
                <a class="icon-answers" href="#">
                    <i class="fas fa-bug"> Report</i>
                </a>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1"></label>
                <textarea class="form-control" placeholder="Do you know the answer to this question?"id="exampleFormControlTextarea1" rows="4"></textarea>
                <button class="btn my-2 my-sm-0" type="submit">Answer</button>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1"></label>
                <textarea class="form-control" placeholder="Do you want to comment this question?"id="exampleFormControlTextarea1" rows="2"></textarea>
                <button class="btn my-2 my-sm-0" type="submit">Comment</button>
            </div>

            <h2 class="mt-0">Comments</h2>

            <div class="media-body">
                <?php
                //draw_comment("nmtc01","Here's a meta topic discussing basic questions. Personally, I think basic questions are ok if written well and are on-topic. Look at the answers below, they illustrate a bunch of things that would be useful for someone new to go. For loops, type casting, make(), etc.");
                //draw_comment("edu1234","This question does not show any research effort - That's what I was referring to. He shows no research effort. No effort at all (an attempt, or even stating that he looked online, which he obviously hasn't). Although it would be useful for someone new, this site is not focused on teaching new people. It's focused on answering specific programming problems/questions, not tutorials/guides. Although it could be used for the latter, that is not the focus, and thus this question should be closed. Instead, its spoonfed");
                ?>
            </div>                
            <h2 class="mt-0">Answers</h2>
            
            <ul class="list-unstyled">
                <?php
                    /*$img = array("will-ferrel.jpg", "robert-jr.jpg");
                    $user = array("will99", "cr7fan");
                    $answer = array("The question asks for the the fastest and simplest way. Let's address the fastest part too. We'll arrive at our final, fastest code in an iterative manner. Benchmarking each iteration can be found at the end of the answer.
                    All the solutions and the benchmarking code can be found on the Go Playground. The code on the Playground is a test file, not an executable.",
                    "I have the exact same problem, I don't know how to do it!");
                    $score = array(33,-2);

                    draw_answer($img[0], $user[0], $answer[0], $score[0]);
                    draw_answer($img[1], $user[1], $answer[1], $score[1]);*/
                ?>
            </ul>
        </div>
    </div>
</div>