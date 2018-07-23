{*
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
*}
<div class="crm-block crm-content-block crm-financialtype-view-form-block">
  <div class="action-link">
    <div class="crm-submit-buttons">
      <a class="button" href='{crmURL p="civicrm/admin/financial/financialType" q="action=update&id=$financialTypeId&reset=1"}' accesskey="e"><span>
        <i class="crm-i fa-pencil"></i> {ts}Edit{/ts}</span>
      </a>
      <a class="button" href='{crmURL p="civicrm/admin/financial/financialType" q="action=delete&id=$financialTypeId&reset=1"}'><span>
        <i class="crm-i fa-trash"></i> {ts}Delete{/ts}</span>
      </a>
      <a class="button" href='{crmURL p="civicrm/admin/financial/financialType/accounts" q="action=browse&reset=1&aid=$financialTypeId"}'><span>
        <i class="crm-i fa-check"></i>{ts}View or Edit Financial Accounts{/ts}</span>
      </a>
      <a class="button" href='{crmURL p="civicrm/admin/financial/financialType" q="action=browse&reset=1"}'><span>
        <i class="crm-i fa-times"></i> {ts}Done{/ts}</span>
      </a>
    </div>
  </div>
  <table class="crm-info-panel">
    {foreach from=$labels key=fieldName item=value}
      <tr>
        <td class="label">{$value}</td>
        <td>
          {if in_array($fieldName, array('is_reserved', 'is_deductible', 'is_active'))}
            {if $rows.$fieldName eq 0}{ts}No{/ts}{else}{ts}Yes{/ts}{/if}
          {else}
            {$rows.$fieldName}
          {/if}
        </td>
      </tr>
    {/foreach}
  </table>
  {include file="CRM/Custom/Page/CustomDataView.tpl"}
  <div class="action-link">
    <div class="crm-submit-buttons">
      <a class="button" href='{crmURL p="civicrm/admin/financial/financialType" q="action=update&id=$financialTypeId&reset=1"}' accesskey="e"><span>
        <i class="crm-i fa-pencil"></i> {ts}Edit{/ts}</span>
      </a>
      <a class="button" href='{crmURL p="civicrm/admin/financial/financialType" q="action=delete&id=$financialTypeId&reset=1"}'><span>
        <i class="crm-i fa-trash"></i> {ts}Delete{/ts}</span>
      </a>
      <a class="button" href='{crmURL p="civicrm/admin/financial/financialType/accounts" q="action=browse&reset=1&aid=$financialTypeId"}'><span>
        <i class="crm-i fa-check"></i>{ts}View or Edit Financial Accounts{/ts}</span>
      </a>
      <a class="button" href='{crmURL p="civicrm/admin/financial/financialType" q="action=browse&reset=1"}'><span>
        <i class="crm-i fa-times"></i> {ts}Done{/ts}</span>
      </a>
    </div>
  </div>
</div>
