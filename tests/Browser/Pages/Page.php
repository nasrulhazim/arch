<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;

abstract class Page extends BasePage
{
    /**
     * URL for the page.
     * 
     * @var string
     */
    const URL = '/';

    /**
     * Element shortcuts for the page.
     * 
     * @var array
     */
    const ELEMENTS = [
        '@element' => '#selector',
    ];

    /**
     * Global element shortcuts for the site.
     * 
     * @var array
     */
    const SITE_ELEMENTS = [
        '@element' => '#selector',
    ];

    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return static::URL;
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return static::ELEMENTS;
    }

    /**
     * Get the global element shortcuts for the site.
     *
     * @return array
     */
    public static function siteElements()
    {
        return static::SITE_ELEMENTS;
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param \Laravel\Dusk\Browser $browser
     */
    public function assert(Browser $browser)
    {
        $browser->assertPathIs($this->url());
    }
}
