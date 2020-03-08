<?php
    include_once("../templates/tpl_common.php");

    draw_main_document();
?>

    <link rel="stylesheet" href="../css/about.css">
</head>

<body>
    <header>    
        <?php 
            draw_nav_bar("full_nav");
        ?>
    </header>

    <section id="about">
        <article>
            <h1>About answerly</h1>
            <p>Within the scope of the LBAW course, we were proposed to develop a web application for collaborative Questions and Answers. For this to be a commendable product, we want to assure a great user experience where the questions are easy to find and the answers helpful to the user. We aim to have an easily navigable website. A good interface is very important and the users need to be comfortable browsing the site.</p>
            <p>Throughout life, we often find ourselves wondering about questions that surely a stranger, somewhere out there knows the answer and there is no way for him to reach out to us. With our project, we aim to tackle that by building a clean and trustworthy platform where relevant questions are asked and pertinent answers are replied.</p>
        </article>
        <article>
            <h1>Contacts</h1>
            <p>Antonio Pedro Reis Ribeiro Sousa Dantas, <span>up201703878@fe.up.pt</span><p>
            <p>Eduardo João Santana Macedo, <span>up201703658@fe.up.pt</span></p>
            <p>Miguel Teixeira Cardoso, <span>up201706162@fe.up.pt</span></p>
            <p>Roberto Dias Mourato, <span>up201705616@fe.up.pt</span></p>
        </article>
    </section>

<?php
    draw_footer();
?>