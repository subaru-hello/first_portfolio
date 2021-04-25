<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lesson Sample Site</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css?<?php echo date('Ymd-Hi'); ?>">
    <script src="https://cdn.jsdelivr.net/npm/vue-sticky@3.3.4/dist/vue-sticky.js"></script>

    <link rel="stylesheet" type="text/css" href="css/sp.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>



    <nav class="concept-nav" v-class="motion: position > 50" v-sticky="{ zIndex: 1, stickyTop: 45, disabled: false}">
        <div class="logo"><a href="index.php"><img src="./cafe/img/logo.png" alt="Cafe"></a></div>
        <div class="g_nav">
            <div class="menu" id="menu-click-first">はじめに</a></div>
            <div class="menu" id="menu-click-exp">体験</a></div>
            <div class="menu" class="contact"><a href="contact.php">お問い合わせ</a></div>
        </div>
        <div class="sign" v-on="click: openModal"><a href="#" class="modal_open link">サインイン</a></div>
    </nav>
