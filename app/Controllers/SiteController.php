<?php

namespace Core\_abstracts;

class SiteController extends Controller
{
    function index(){
        return $this->render('index');
    }
}
