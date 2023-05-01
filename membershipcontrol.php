<?php

require_once 'membershipcontrol.civix.php';
// phpcs:disable
use CRM_Membershipcontrol_ExtensionUtil as E;
// phpcs:enable

/**
 * Implements hook_civicrm_config().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_config/
 */
function membershipcontrol_civicrm_config(&$config): void {
  _membershipcontrol_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function membershipcontrol_civicrm_install(): void {
  _membershipcontrol_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function membershipcontrol_civicrm_enable(): void {
  _membershipcontrol_civix_civicrm_enable();
}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_preProcess
 */
//function membershipcontrol_civicrm_preProcess($formName, &$form): void {
//
//}

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_navigationMenu
 */
//function membershipcontrol_civicrm_navigationMenu(&$menu): void {
//  _membershipcontrol_civix_insert_navigation_menu($menu, 'Mailings', [
//    'label' => E::ts('New subliminal message'),
//    'name' => 'mailing_subliminal_message',
//    'url' => 'civicrm/mailing/subliminal',
//    'permission' => 'access CiviMail',
//    'operator' => 'OR',
//    'separator' => 0,
//  ]);
//  _membershipcontrol_civix_navigationMenu($menu);
//}

/**
 * Prevent someone from creating a new membership while an existing recurring membership exists
 */
function membershipcontrol_civicrm_validateForm($formName, &$fields, &$files, &$form, &$errors) {
  $temp = 1;
  if ($form) {
    // Check for an active membership of one of the recurring types;
    $activeMembership = TRUE;
    if ($activeMembership) {
      // fail validation
      // return message
    }
  }
}
