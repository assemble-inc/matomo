<?php
/**
 * Piwik - Open source web analytics
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 * @category Piwik_Plugins
 * @package Provider
 */
namespace Piwik\Plugins\Provider;

use Piwik\ViewDataTable\Factory;

/**
 *
 * @package Provider
 */
class Controller extends \Piwik\Plugin\Controller
{
    /**
     * Provider
     * @param bool $fetch
     * @return string|void
     */
    public function getProvider($fetch = false)
    {
        return $this->renderReport(__FUNCTION__, $fetch);
    }
}

