<?php
/**
 * Piwik - free/libre analytics platform
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 */

namespace Piwik\Application\Kernel\GlobalSettingsProvider;

use Piwik\Config\IniFileChain;
use Piwik\Config\IniFileChainFactory;

/**
 * TODO
 */
class IniSettingsProvider implements \Piwik\Application\Kernel\GlobalSettingsProvider
{
    /**
     * @var IniFileChain
     */
    private $iniFileChain;

    public function __construct($pathGlobal = null, $pathLocal = null, $pathCommon = null)
    {
        $this->reload($pathGlobal, $pathLocal, $pathCommon);
    }

    public function reload($pathGlobal = null, $pathLocal = null, $pathCommon = null)
    {
        $this->iniFileChain = IniFileChainFactory::get($pathGlobal, $pathLocal, $pathCommon); // TODO: move IniFileChainFactory logic to here.
    }

    public function &getSection($name)
    {
        $section =& $this->iniFileChain->get($name);
        return $section;
    }

    public function setSection($name, $value)
    {
        $this->iniFileChain->set($name, $value);
    }

    public function getIniFileChain()
    {
        return $this->iniFileChain;
    }
}