<?php

require_once 'financialtypecustomfield.civix.php';
use CRM_Financialtypecustomfield_ExtensionUtil as E;

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function financialtypecustomfield_civicrm_config(&$config) {
  _financialtypecustomfield_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function financialtypecustomfield_civicrm_install() {
  _financialtypecustomfield_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_postInstall
 */
function financialtypecustomfield_civicrm_postInstall() {
  _financialtypecustomfield_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function financialtypecustomfield_civicrm_uninstall() {
  _financialtypecustomfield_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function financialtypecustomfield_civicrm_enable() {
  _financialtypecustomfield_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function financialtypecustomfield_civicrm_disable() {
  _financialtypecustomfield_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function financialtypecustomfield_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _financialtypecustomfield_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function financialtypecustomfield_civicrm_managed(&$entities) {
  $entities[] = [
    'module' => 'org.civicrm.financialtypecustomfield',
    'name' => 'financialtypecustomfield',
    'update' => 'never',
    'entity' => 'OptionValue',
    'params' => [
      'label' => ts('Financial Type'),
      'name' => 'civicrm_financial_type',
      'value' => 'FinancialType',
      'option_group_id' => 'cg_extend_objects',
      'is_active' => 1,
      'version' => 3,
    ],
  ];
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_entityTypes
 */
function financialtypecustomfield_civicrm_entityTypes(&$entityTypes) {
  _financialtypecustomfield_civix_civicrm_entityTypes($entityTypes);
}

/**
 * Implements hook_civicrm_links().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_links
 */
function financialtypecustomfield_civicrm_links($op, $objectName, $objectId, &$links, &$mask, &$values) {
  if ($objectName == 'FinancialType' && $op == 'financialType.manage.action') {
    $viewlinks = [
      CRM_Core_Action::VIEW => [
      'name' => ts('View'),
      'url' => 'civicrm/admin/financial/financialType/view',
      'qs' => 'reset=1&action=view&id=%%id%%',
      'title' => ts('View'),
    ]];
    $links = array_merge($viewlinks, $links);
  }
}
