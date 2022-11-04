<?php
/**
 * Custom footer plugin.
 * Adds html on each page.
 */

use Shaarli\Plugin\PluginManager;

/**
 * Initialization function.
 * It will be called when the plugin is loaded.
 * This function can be used to return a list of initialization errors.
 *
 * @param $conf ConfigManager instance.
 *
 * @return array List of errors (optional).
 */
function customfooter_init($conf)
{
    $customfooterHTML= $conf->get('plugins.CUSTOMFOOTER_HTML');
}


/**
 * Hook render_footer.
 * Executed on every page redering.
 *
 * Template placeholders:
 *   - text
 *   - endofpage
 *   - js_files
 *
 * Data:
 *   - _PAGE_: current page
 *   - _LOGGEDIN_: true/false
 *
 * @param array $data data passed to plugin
 *
 * @return array altered $data.
 */

function hook_customfooter_render_footer($data, $conf)
{
    $customfooterHTML = $conf->get('plugins.CUSTOMFOOTER_HTML');
    if (empty($customfooterHTML)) {
        return $data;
    }

        $data['text'][] = '<div id="customfooter_plugin">'.
                html_entity_decode($customfooterHTML) .
                '</div>';

        return $data;
}
?>
