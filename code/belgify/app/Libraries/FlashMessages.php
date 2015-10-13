<?php
namespace App\Libraries;
use Session;


class FlashMessages {

    public function successMessage( $txt ){

        Session::flash('message', 'Item has been '.$txt.' successfully.');
        Session::flash('alert-class', 'alert-success');

    }

    public function failMessage( $txt ){

        Session::flash('message',"Item could not be ".$txt);
        Session::flash('alert-class', 'alert-danger');

    }

    public function warning( $txt ){

        Session::flash('message', $txt);
        Session::flash('alert-class', 'alert-danger');

    }

}