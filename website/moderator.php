<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
        crossorigin="anonymous">
    <style type="text/css">
        
        body {
            background: #eee;
            background-image: url("../resources/wallpaper2.png");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size: cover;
}

        .wrapper {
            margin: 70px;
        }

        .form-signin {
            max-width: 380px;
            margin: 0 auto;
            background-color: #fff;
            padding: 15px 40px 50px;
            border: 1px solid #e5e5e5;
            border-radius: 10px;
        }

        .form-signin input[type="text"],
        .form-signin input[type="password"] {
            margin-bottom: 20px;
        }

        .form-signin #api {
            margin-bottom: 40px;
        }

        .form-signin .form-signin-heading {
            margin-bottom: 50px;
        }

        .jumbotron {
            background: #eee;
            text-align: center;
        }

        #register {
            margin-top: 10px;
        }

        #logo {
            margin-top: 50px;
            text-align: center;
        }

        .container{
            margin: auto;
        }

        h1{
            margin-bottom: 2rem;
        }
        
        h1 > span {
            margin-left: 2.3rem;
            color: white;
            font-size: 30px;
            border-bottom: 1px solid black;
            padding-bottom: 5px;
            border-color: #6545c9;
        }

        /* scrolltable rules */
        table  { 
            margin-top:  20px; display: inline-block; overflow: auto; 
        }
        th div { 
            margin-top: -20px; position: absolute; 
        }

        /* design */
        table:not(.fixed_header) { 
            padding-left: 3rem;
            border-collapse: collapse; 
            width: 20rem;
        }
        tr { 
            background: #FFF; 
            width: 20rem;
        }
        th {
            color: purple;
            width: 20rem;
        }
        td{
            height: 35px;
            border-bottom: solid;
            width: 20rem;
        }
        .fixed_header{
            width: 400px;
            table-layout: fixed;
            border-collapse: collapse;
        }

        .fixed_header tbody{
            display:block;
            width: 100%;
            overflow: auto;
            height: 100px;
        }

        .fixed_header thead tr {
            display: block;
        }

        .fixed_header thead {
            background: black;
            color:#fff;
        }

        .fixed_header th, .fixed_header td {
            padding: 5px;
            text-align: left;
            width: 200px;
        }
        .table-container{
            margin: auto;
            width: 50%;
            padding: 10px;
            padding-top: 50px;
        }

    </style>
</head>

<body>
    <script defer src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
    <header>    

        
        <nav class="navbar navbar-light" style="background-color: #6545c9">
            <a class="navbar-brand" ></a>
            <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn my-2 my-sm-0" type="submit" style="background-color:	white; color: #6545c9">Search</button>
            </form>
        </nav>
        


    </header>

    <h1><span>Reports</span></h1>

<div class="container">
  <div class="row">
    <div class="col">
      <table style="height: 150px; ">
  <tr> <th><div>Questions</div> <th>
  <tr> <td>Question 1 <td>
  <tr> <td>Question 2<td>
  <tr> <td>Question 3<td>
  <tr> <td>Question 4<td>
  <tr> <td>Question 5<td>
  <tr> <td>Question 6<td>
  <tr> <td>Question 7<td>
  <tr> <td>Question 8<td>
</table>
    </div>
    <div class="col">
      <table style="height: 150px; ">
  <tr> <th><div>Answers</div> <th>
  <tr> <td>Answer 1<td>
  <tr> <td>Answer 2<td>
  <tr> <td>Answer 3<td>
  <tr> <td>Answer 4<td>
  <tr> <td>Answer 5<td>
  <tr> <td>Answer 6<td>
  <tr> <td>Answer 7<td>
  
</table>
    </div>
    <div class="col">
      <table style="height: 150px; ">
  <tr> <th><div>Comments</div> <th>
  <tr> <td>Comment 1<td>
  <tr> <td>Comment 2<td>
  <tr> <td>Comment 3<td>
  <tr> <td>Comment 4<td>
  <tr> <td>Comment 5<td>
</table>
    </div>
  </div>
  
</div>
<div class="table-container">
    <table class="fixed_header">
    <thead>
        <tr>
        <th>Username</th>
        <th>Name</th>
        <th>Score</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <td>john1</td>
        <td>john</td>
        <td>81</td>
        </tr>
        <tr>
        <td>mary1999</td>
        <td>Mary</td>
        <td>8</td>
        </tr>
        <tr>
        <td>Susieiei</td>
        <td>Susan</td>
        <td>666</td>
        </tr>
        <tr>
        <td>Tony</td>
        <td>Anthony</td>
        <td>43</td>
        </tr>
        <tr>
        <td>stan</td>
        <td>Marshall</td>
        <td>-56</td>
        </tr>
    </tbody>
    </table>
</div>


</body>

</html>