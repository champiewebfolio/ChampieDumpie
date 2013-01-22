<?php
/**
 * Class to create Gravatar image elements.
 *
 * @author  You <you@you.com>
 */
class Gravvy
{
    /**
     * Create a new image element from an email address.
     * @param  string  $email The email address.
     * @param  integer $size  The avatar size.
     * @return string The source for an image element.
     */
    public static function make($email, $size = 32)
    {
        // convert our email into an md5 hash
        $email = md5($email);
        // return the image element
        return '<img src="http://www.gravatar.com/avatar/'
                    .$email.'?s='.$size;
    }
}