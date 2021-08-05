<?php

class Product
{
    public function action_create($id){
        echo "GET параметр ". key($_GET) ." равен " . $_GET[key($_GET)] ;

    }

}