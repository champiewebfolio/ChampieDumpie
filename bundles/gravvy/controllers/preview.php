<?php
class Gravvy_Preview_Controller extends Controller
{
    /**
     * Show the preview avatar form.
     */
    public function action_form()
    {
        // load the form view
        return View::make('gravvy::form');
    }
    /**
     * Show the resulting avatar.
     */
    public function action_preview()
    {
        // get data from our form
        $email  = Input::get('email');
        $size   = Input::get('size');
        // generate the avatar
        $avatar = Gravvy::make($email, $size);
        // load the preview view
        return View::make('gravvy::preview')
            ->with('element', $avatar);
    }

    public function action_index(){

            echo "ASDF";

    }
}