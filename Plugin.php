<?php namespace Rebel59\Likeable;

use Backend;
use System\Classes\PluginBase;

/**
 * Likeable Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Likeable',
            'description' => 'No description provided yet...',
            'author'      => 'Rebel59',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'Rebel59\Likeable\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'rebel59.likeable.some_permission' => [
                'tab' => 'Likeable',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return []; // Remove this line to activate

        return [
            'likeable' => [
                'label'       => 'Likeable',
                'url'         => Backend::url('rebel59/likeable/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['rebel59.likeable.*'],
                'order'       => 500,
            ],
        ];
    }
}
