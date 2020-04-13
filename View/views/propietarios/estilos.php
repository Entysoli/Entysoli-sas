<?php

header ("Content-type: text/css; charset: UTF-8");

?>
* {
    margin: 0;
    padding: 0;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}

body {
    background-image: linear-gradient(120deg, #3498db, #1c3ed1);
    -webkit-background-size: cover;
    background-size: cover;
    background-attachment: fixed;
    min-height: 100vh;
}

.contenedor .form .form-header .form-title {
    font-weight: normal;
    font-family: sans-serif;
    color: rgb(0, 0, 0);
    text-align: center;
    padding: 14px 0;
}

.contenedor .form .form-header .form-title span {
    color: rgb(0, 0, 0);
}

.contenedor .form {
    background: rgb(255, 255, 255);
    width: 90%;
    max-width: 650px;
    margin: auto;
    padding: 5px 35px;
    margin-top: 30px;
    padding-bottom: 30px;
    border-radius: 10px;
}

.contenedor .form .form-label {
    display: block;
    color: rgb(0, 0, 0);
    font-size: 16px;
    font-family: Roboto;
    position: relative;
}

.contenedor .form .form-input,
.form-textarea {
    background: rgb(236, 232, 232);
    border: none;
    outline: none;
    border-bottom: 2px solid #3498db;
    width: 100%;
    padding: 12px;
    margin-bottom: 20px;
    border-radius: 2px;
    font-size: 14px;
    color: #333;
    font-family: Roboto;
}

.contenedor .form .form-textarea {
    resize: vertical;
    max-height: 150px;
    min-height: 50px;
}

.contenedor .form .btn-submit {
    display: block;
    width: 100%;
    height: 50px;
    border: none;
    background: linear-gradient(120deg, #3498db, #1642bb, #3498db);
    background-size: 200%;
    color: #fff;
    outline: none;
    cursor: pointer;
    transition: .5s;
    margin: 2px;
}

.contenedor .form .btn-submit:hover {
    background-position: right;
}

.derechos {
    position: fixed;
    bottom: 0;
    right: 0;
}


 //tablas//

.main-container {
     margin: 150px auto;
     width: 600px;
 }

 table{
     background-color: white;
     text-align: left;
     border-collapse: collapse;
     margin: 150px auto;
     width: 800px;
     height: 300px;
 }

 th, td {
     
     padding: 15px;
 }
 thead{
     background-color: #3498db;
     border-bottom: solid 5px (#3498db, #1642bb, #3498db);
     color: white;
 }

 tr:nth-child(even){
     background-color: #ddd
 }

 tr:hover td{
     background-color: #1642bb;
     color: white;
 }

