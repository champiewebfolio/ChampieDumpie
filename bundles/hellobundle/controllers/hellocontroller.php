<?php
/*
===Algorithm===

<profile name> is not a good connection to you. 

You might not get involved with these people <list profile name>

You are currently obsessed with <profile name> because you are always mentioning that name.


You might want to make great connections with <profile name>

So you like visiting sites such as <xxx sitename here> and enjoying the palm while it's hot. 

These followers should be reached; let them in your circles. <list of followers>
*/
class Hellobundle_Hellocontroller_Controller extends Controller
{
	public function action_index(){

        return View::make('hellobundle::index');
	}
}