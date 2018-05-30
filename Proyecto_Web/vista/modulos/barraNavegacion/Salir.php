<?php

if (isset($_SESSION["Ingeniero"])) {
    session_destroy();
    header("location:Inicio");
}


