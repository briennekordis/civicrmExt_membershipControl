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
    if ($form->_id === 4) {
   
    $loggedInUser = $form->_contactID;
    if (!$loggedInUser) {
      $loggedOutUser = \Civi\Api4\Email::get(FALSE)
        ->addSelect('contact_id')
        ->addWhere('email', '=', $fields["email-5"])
        ->execute()
        ->first()['contact_id'];
    }
    $contactId = $loggedInUser ?: $loggedOutUser;
    if ($contactId) {
      $activeMembership = \Civi\Api4\Membership::get(FALSE)
        ->addSelect('id')
        ->addWhere('contact_id', '=', $contactId)
        // Check for an active membership (status of 'New', 'Current', or 'Pending') of one of the recurring types;
        ->addWhere('status_id', 'IN', [1, 2, 5])
        ->addWhere('membership_type_id', 'IN', [1, 2])
        ->execute()
        ->first();
      if ($activeMembership) {
        // fail validation
        // return message
        $errors['membership'] = ts('There is already an active, recurring membership for this contact.');
      }
    }
  }
  return;
}
