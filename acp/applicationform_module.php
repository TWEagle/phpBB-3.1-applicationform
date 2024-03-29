<?php
/**
*
* Application Form extension for the phpBB Forum Software package.
*
* @copyright (c) 2016 Rich McGirr (RMcGirr83)
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace rmcgirr83\applicationform\acp;

class applicationform_module
{
	public	$u_action;

	function main($id, $mode)
	{
		global $db, $config, $request, $template, $user;

		$this->page_title = $user->lang['ACP_APPLICATIONFORM_SETTINGS'];
		$this->tpl_name = 'applicationform_body';

		add_form_key('appform');

		if ($request->is_set_post('submit'))
		{
			// Test if form key is valid
			if (!check_form_key('appform'))
			{
				trigger_error($user->lang['FORM_INVALID'] . adm_back_link($this->u_action), E_USER_WARNING);
			}
			if (utf8_normalize_nfc($request->variable('appform_positions', '', true)) === '')
			{
				trigger_error($user->lang['APPFORM_MUST_HAVE_POSITIONS'] . adm_back_link($this->u_action), E_USER_WARNING);
			}
			// Set the options the user configured
			$this->set_options();

			trigger_error($user->lang['APPFORM_SETTINGS_SUCCESS'] . adm_back_link($this->u_action));
		}

		$template->assign_vars(array(
			'ERROR'			=> isset($error) ? ((sizeof($error)) ? implode('<br />', $error) : '') : '',
			'APPFORM_FORUM_ID' => $this->appform_forum_select($config['appform_forum_id']),
			'APPFORM_POSITIONS'	=> utf8_normalize_nfc($request->variable('appform_positions', $config['appform_positions'], true)),

			'U_ACTION'			=> $this->u_action,
		));
	}

	/**
	 * Set the options a user can configure
	 *
	 * @return null
	 * @access protected
	 */
	protected function set_options()
	{
		global $config, $request;

		$config->set('appform_forum_id', $request->variable('appform_forum_id', 0));
		$config->set('appform_positions', utf8_normalize_nfc($request->variable('appform_positions', '', true)));
	}

	/**
	 * Display a drop down of all forums that one can post into
	 *
	 * @return drop down select
	 * @access protected
	 */
	private function appform_forum_select($value, $key = '')
	{
		return '<select id="' . $key . '" name="appform_forum_id">' . make_forum_select($value, false, true, true) . '</select>';
	}
}
