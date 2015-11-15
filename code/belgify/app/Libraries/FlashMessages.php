<?php
namespace App\Libraries;
use Session;


class FlashMessages {

    public function successMessage( $model, $txt ){

        Session::flash('message', 'Your '.$model. ' has been '.$txt.' successfully.');
        Session::flash('alert-class', 'alert-success');

    }

    public function failMessage( $model, $txt ){

        Session::flash('message','Your '.$model. " could not be ".$txt);
        Session::flash('alert-class', 'alert-danger');

    }

    public function warning( $txt ){

        Session::flash('message', $txt);
        Session::flash('alert-class', 'alert-warning');

    }

}