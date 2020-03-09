<?php
    include_once "../templates/tpl_common.php";

    draw_main_document();
?>

    <link rel="stylesheet" href="../css/modmin.css">
</head>

<body>   
    <header>
        <?php 
            draw_nav_bar("full_bar");
        ?>
    </header>

    <h1><span class="badge badge-secondary">Reports</span></h1>


<div class="wrapper">
   <div class="box1"><table class="table">
  <thead class="thead">
    <tr>
      
      <th scope="col">Questions</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      
      <td>Question 1</td>
    </tr>
    <tr>
      
      <td>Question 2</td>
    </tr>
    <tr>
      
      <td>Question 3</td>
    </tr>
  </tbody>
</table></div>
   <div class="box2"><table class="table">
  <thead class="thead">
    <tr>
      
      <th scope="col">Answers</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      
      <td>Answer 1</td>
    </tr>
    <tr>
      
      <td>Answer 2</td>
    </tr>
    <tr>
      
      <td>Answer 3</td>
    </tr>
  </tbody>
</table></div>
   <div class="box3">
       
<table class="table">
  <thead class="thead">
    <tr>
      
      <th scope="col">Comments</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      
      <td>Comment 1</td>
    </tr>
    <tr>
      
      <td>Comment 2</td>
    </tr>
    <tr>
      
      <td>Comment 3</td>
    </tr>
  </tbody>
</table>
   </div>
</div>



    <h1><span class="badge badge-secondary">Reported Users</span></h1>


<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Username</th>
      <th scope="col">Name</th>
      <th scope="col">Score</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>johny1</td>
      <td>John</td>
      <td>32</td>
    </tr>
    <tr>
      <td>mary123</td>
      <td>Mary</td>
      <td>25</td>
    </tr>
    <tr>
      <td>redflag</td>
      <td>Simon</td>
      <td>3</td>
    </tr>
    <tr>
      <td>Suzz987</td>
      <td>Susan</td>
      <td>-35</td>
    </tr>
  </tbody>
</table>

    <h1><span class="badge badge-secondary">Promote</span></h1>


<div class="wrapper">
   <div class="box1"><table class="table">
    <thead class="thead">
    <tr>
      <th scope="col"><span>Users</span></th>
    </tr>
    <tr>
      <th scope="col">Username</th>
      <th scope="col">Score</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>joee</td>
      <td>146</td>
    </tr>
    <tr>
      <td>doe23</td>
      <td>95</td>
    </tr>
    <tr>
      <td>penguinxD</td>
      <td>89</td>
    </tr>
    <tr>
      <td>somethinggg</td>
      <td>67</td>
    </tr>
  </tbody>
</table></div>
   <div class="box2">
    <table class="table">
    <thead class="thead">
    <tr>
      <th scope="col"><span>Moderators</span></th>
    </tr>
    <tr>
      <th scope="col">Username</th>
      <th scope="col">Score</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>johny1</td>
      <td>32</td>
    </tr>
    <tr>
      <td>mary123</td>
      <td>15</td>
    </tr>
    <tr>
      <td>redflag</td>
      <td>5</td>
    </tr>
    <tr>
      <td>Suzz987</td>
      <td>3</td>
    </tr>
  </tbody>
</table>
</div>


</div>
<?php
    draw_footer();
?>
