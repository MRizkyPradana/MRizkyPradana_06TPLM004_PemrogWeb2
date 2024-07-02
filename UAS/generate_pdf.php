<?php
require('fpdf.php');
include 'config.php';

class PDF extends FPDF {
    function Header() {
        $this
