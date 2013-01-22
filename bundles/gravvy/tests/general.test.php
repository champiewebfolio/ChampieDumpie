<?php
class TestGeneral extends PHPUnit_Framework_TestCase {
    /**
     * Test that an avatars output appears as expected.
     *
     * @return void
     */
    public function testAvatarImageIsGenerated()
    {
        // start the gravvy bundle
        Bundle::start('gravvy');
        // check that the output matches the expected
        $this->assertEquals(Gravvy::make('thepunkfan@gmail.com'),
            '<img src="http://www.gravatar.com/avatar/fac3a58aaa455adbcb3f684ccff663b8?s=32" />');
    }
    /**
     * Test that an avatars output appears as expected when
     * specifying a custom avatar size.
     *
     * @return void
     */
    public function testAvatarImageIsGeneratedWithSize()
    {
        // start the gravvy bundle
        Bundle::start('gravvy');
        // check that the output matches the expected
        $this->assertEquals(Gravvy::make('thepunkfan@gmail.com', 64),
            '<img src="http://www.gravatar.com/avatar/fac3a58aaa455adbcb3f684ccff663b8?s=64" />');
    }
   
}