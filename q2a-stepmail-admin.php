<?php
class q2a_stepmail_admin {
	function init_queries($tableslc) {
		return null;
	}
	function option_default($option) {
		switch($option) {
			case 'q2a-stepmail-day-1':
				return 3; 
			case 'q2a-stepmail-day-2':
				return 10; 
			case 'q2a-stepmail-day-3':
				return 21; 
			default:
				return null;
		}
	}
		
	function allow_template($template) {
		return ($template!='admin');
	}       
		
	function admin_form(&$qa_content){                       
		// process the admin form if admin hit Save-Changes-button
		$ok = null;
		if (qa_clicked('q2a-stepmail-save')) {
			qa_opt('q2a-stepmail-1', qa_post_text('q2a-stepmail-1'));
			qa_opt('q2a-stepmail-title-1', qa_post_text('q2a-stepmail-title-1'));
			qa_opt('q2a-stepmail-day-1', (int)qa_post_text('q2a-stepmail-day-1'));
			qa_opt('q2a-stepmail-2', qa_post_text('q2a-stepmail-2'));
			qa_opt('q2a-stepmail-title-2', qa_post_text('q2a-stepmail-title-2'));
			qa_opt('q2a-stepmail-day-2', (int)qa_post_text('q2a-stepmail-day-2'));
			qa_opt('q2a-stepmail-3', qa_post_text('q2a-stepmail-3'));
			qa_opt('q2a-stepmail-title-3', qa_post_text('q2a-stepmail-title-3'));
			qa_opt('q2a-stepmail-day-3', (int)qa_post_text('q2a-stepmail-day-3'));

			$ok = qa_lang('admin/options_saved');
		}
		
		// form fields to display frontend for admin
		$fields = array();
		
		$fields[] = array(
			'type' => 'text',
			'label' => 'mail 1 title',
			'tags' => 'name="q2a-stepmail-title-1"',
			'value' => qa_opt('q2a-stepmail-title-1'),
		);


		$fields[] = array(
			'type' => 'textarea',
			'label' => 'mail 1',
			'tags' => 'name="q2a-stepmail-1"',
			'value' => qa_opt('q2a-stepmail-1'),
		);
		
		$fields[] = array(
			'type' => 'number',
			'label' => 'mail 1 day',
			'tags' => 'name="q2a-stepmail-day-1"',
			'value' => qa_opt('q2a-stepmail-day-1'),
		);


		$fields[] = array(
			'type' => 'text',
			'label' => 'mail 2 title',
			'tags' => 'name="q2a-stepmail-title-2"',
			'value' => qa_opt('q2a-stepmail-title-2'),
		);

		$fields[] = array(
			'type' => 'textarea',
			'label' => 'mail 2',
			'tags' => 'name="q2a-stepmail-2"',
			'value' => qa_opt('q2a-stepmail-2'),
		);

		$fields[] = array(
			'type' => 'number',
			'label' => 'mail 2 day',
			'tags' => 'name="q2a-stepmail-day-2"',
			'value' => qa_opt('q2a-stepmail-day-2'),
		);

		$fields[] = array(
			'type' => 'text',
			'label' => 'mail 3 title',
			'tags' => 'name="q2a-stepmail-title-3"',
			'value' => qa_opt('q2a-stepmail-title-3'),
		);

		$fields[] = array(
			'type' => 'textarea',
			'label' => 'mail 3',
			'tags' => 'name="q2a-stepmail-3"',
			'value' => qa_opt('q2a-stepmail-3'),
		);

		$fields[] = array(
			'type' => 'number',
			'label' => 'mail 3 day',
			'tags' => 'name="q2a-stepmail-day-3"',
			'value' => qa_opt('q2a-stepmail-day-3'),
		);


		return array(     
			'ok' => ($ok && !isset($error)) ? $ok : null,
			'fields' => $fields,
			'buttons' => array(
				array(
					'label' => qa_lang_html('main/save_button'),
					'tags' => 'name="q2a-stepmail-save"',
				),
			),
		);
	}
}

