<?php
/**
 * Piwik - free/libre analytics platform
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 */
namespace Piwik\Plugins\PrivacyManager;

use Piwik\Menu\MenuAdmin;
use Piwik\Piwik;

class Menu extends \Piwik\Plugin\Menu
{
    public function configureAdminMenu(MenuAdmin $menu)
    {
        if (Piwik::isUserHasSomeAdminAccess()) {
            $category = 'PrivacyManager_MenuPrivacySettings';
            $menu->registerMenuIcon($category, 'icon-locked-4');
            $menu->addItem($category, null, array(), 2);

            if (Piwik::hasUserSuperUserAccess()) {
                $menu->addItem($category, 'Anonymize data', $this->urlForAction('privacySettings'), 5);
            }

            $menu->addItem($category, 'Users opt-out', $this->urlForAction('usersOptOut'), 10);
            $menu->addItem($category, 'Asking for consent', $this->urlForAction('consent'), 15);
            $menu->addItem($category, 'GDPR Overview', $this->urlForAction('gdprOverview'), 20);
            $menu->addItem($category, 'GDPR Tools', $this->urlForAction('gdprTools'), 25);
        }
    }
}
