<?php
/* For licensing terms, see /license.txt */

/**
* View (MVC patter) for adding a course description
* @author Christian Fasanando <christian1827@gmail.com>
* @package chamilo.course_description
*/

// protect a course script
api_protect_course_script(true);

// display categories
$categories = array ();
foreach ($default_description_titles as $id => $title) {
	$categories[$id] = $title;
}
$categories[ADD_BLOCK] = get_lang('NewBloc');

$i=1;
echo '<div class="actions" style="margin-bottom:30px">';
echo '<a href="index.php?'.api_get_cidreq().'">'.Display::return_icon('back.png',get_lang('BackTo').' '.get_lang('ToolCourseDescription'),'',ICON_SIZE_MEDIUM).'</a>';
ksort($categories);
foreach ($categories as $id => $title) {
	if ($i==ADD_BLOCK) {
		echo '<a href="index.php?'.api_get_cidreq().'&action=add">'.Display::return_icon($default_description_icon[$id], $title, '',ICON_SIZE_MEDIUM).'</a>';
		break;
	} else {
		echo '<a href="index.php?action=edit&'.api_get_cidreq().'&description_type='.$id.'">'.Display::return_icon($default_description_icon[$id], $title,'',ICON_SIZE_MEDIUM).'</a>';
		$i++;
	}
}
echo '</div>';

// error messages
if (isset($error) && intval($error) == 1) {
	Display::display_error_message(get_lang('FormHasErrorsPleaseComplete'),false);
}

// default header title form
$header = '';
$description_type = intval($description_type);
if ($description_type >= ADD_BLOCK) {
	$header = $default_description_titles[ADD_BLOCK];
}

if (!$error) {
	$token = Security::get_token();
}
// display form
$form = new FormValidator('course_description','POST','index.php?action=add&'.api_get_cidreq());
$form->addElement('header', '', $header);
$form->addElement('hidden', 'description_type',$description_type);
$form->addElement('hidden', 'sec_token',$token);
$form->add_textfield('title', get_lang('Title'), true, array('size'=>'width: 350px;'));
$form->applyFilter('title','html_filter');

if (api_get_setting('wcag_anysurfer_public_pages')=='true') {
	WCAG_rendering::prepare_admin_form($description_content, $form);
} else {
	$form->add_html_editor('contentDescription', get_lang('Content'), true, false, array('ToolbarSet' => 'TrainingDescription', 'Width' => '100%', 'Height' => '200'));
}
$form->addElement('style_submit_button', null, get_lang('Save'), 'class="save"');

// display default questions
if (isset ($question[$description_type])) {
	$message = '<strong>'.get_lang('QuestionPlan').'</strong><br />';
	$message .= $question[$description_type];
	Display::display_normal_message($message, false);
}
if (api_get_setting('wcag_anysurfer_public_pages')=='true') {
	echo (WCAG_Rendering::editor_header());
}
$form->display();
if (api_get_setting('wcag_anysurfer_public_pages')=='true') {
	echo (WCAG_Rendering::editor_footer());
}