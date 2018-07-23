<?php
/*
 +--------------------------------------------------------------------+
 | CiviCRM version 5                                                  |
 +--------------------------------------------------------------------+
 | Copyright CiviCRM LLC (c) 2004-2018                                |
 +--------------------------------------------------------------------+
 | This file is a part of CiviCRM.                                    |
 |                                                                    |
 | CiviCRM is free software; you can copy, modify, and distribute it  |
 | under the terms of the GNU Affero General Public License           |
 | Version 3, 19 November 2007 and the CiviCRM Licensing Exception.   |
 |                                                                    |
 | CiviCRM is distributed in the hope that it will be useful, but     |
 | WITHOUT ANY WARRANTY; without even the implied warranty of         |
 | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.               |
 | See the GNU Affero General Public License for more details.        |
 |                                                                    |
 | You should have received a copy of the GNU Affero General Public   |
 | License and the CiviCRM Licensing Exception along                  |
 | with this program; if not, contact CiviCRM LLC                     |
 | at info[AT]civicrm[DOT]org. If you have questions about the        |
 | GNU Affero General Public License or the licensing of CiviCRM,     |
 | see the CiviCRM license FAQ at http://civicrm.org/licensing        |
 +--------------------------------------------------------------------+
 */

/**
 *
 * @package CRM
 * @copyright CiviCRM LLC (c) 2004-2018
 */
class CRM_Financial_Page_ViewFinancialType extends CRM_Core_Page {

  /**
   * Perform actions.
   */
  public function run() {
    $this->getIdAndAction();
    if ($this->_action & (CRM_Core_Action::VIEW)) {
      // use edit form for view, add or update or delete
      $this->view($this->_action);
    }
    else {
      // if no action or browse
      $this->browse(NULL, $sort);
    }
    parent::run();
  }

  /**
   * Perform actions.
   */
  public function view() {
    $id = $this->_id;
    // Check permission for Financial Type when ACL-FT is enabled
    if (CRM_Financial_BAO_FinancialType::isACLFinancialTypeStatus()
      && !CRM_Core_Permission::check('administer CiviCRM Financial Types')
    ) {
      CRM_Core_Error::fatal(ts('You do not have permission to access this page.'));
    }

    $financialType = civicrm_api3('FinancialType', 'getsingle', [
      'id' => $id,
    ]);
    $accountRelationship = civicrm_api3('EntityFinancialAccount', 'get', [
      'return' => ["account_relationship.label", "financial_account_id.name"],
      'entity_table' => "civicrm_financial_type",
      'entity_id' => $id,
    ]);
    $financialAccounts = [];
    foreach ($accountRelationship['values'] as $values) {
      $financialAccounts[] = "{$values['account_relationship.label']} : {$values['financial_account_id.name']}";
    }
    $financialType['account_relationships'] = nl2br(implode("\n", $financialAccounts));
    $labels = [
      'name' => ts('Name'),
      'description' => ts('Description'),
      'is_deductible' => ts('Deductible?'),
      'is_reserved' => ts('Enabled?'),
      'is_active' => ts('Reserved?'),
      'account_relationships' => ts('Financial Accounts'),
    ];
    $this->assign('labels', $labels);
    $this->assign('financialTypeId', $id);
    $this->assign('rows', $financialType);
    $groupTree = CRM_Core_BAO_CustomGroup::getTree('FinancialType', NULL, $id, 0);
    CRM_Core_BAO_CustomGroup::buildCustomDataView($this, $groupTree, FALSE, NULL, NULL, NULL, $id);
    CRM_Utils_System::setTitle(ts('Financial Type') . ' - ' . $financialType['name']);
  }

  /**
   * Retrieve the action and ID from the request.
   *
   * Action is assigned to the template while we're at it.  This is pulled from
   * the `run()` method above.
   *
   */
  public function getIdAndAction() {
    $this->_action = CRM_Utils_Request::retrieve('action', 'String', $this, FALSE, 'browse');
    $this->assign('action', $this->_action);
    // get 'id' if present
    $this->_id = CRM_Utils_Request::retrieve('id', 'Positive', $this, FALSE, 0);
  }

}
