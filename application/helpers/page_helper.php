<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// getting the dsm function
if (!function_exists('page_render'))
{
  function page_render($data) {
  	$ci =& get_instance();
    $ci->load->view('templates/html', $data);
  }
}

if (!function_exists('set_message'))
{
  /**
   * This message will set a session variable message
   * which will be used to pass messages and alerts.
   * @param $message
   * @param string $type
   * @return bool
   */
  function set_message($message, $type = 'info') {
//    getting the CI instance
    $ci =& get_instance();

//    setting the messeage to the session data
    $ci->session->set_flashdata('message', $message);

//    Setting the message type - block | error | success | info
    $ci->session->set_flashdata('type', $type);

    return true;
  }
}

if (!function_exists('get_message'))
{
  /**
   * This message will be used to get any message
   * which might have been set by some code in the session
   * and then display the message
   * @return bool
   */
  function get_message() {
//    getting the ci instance
    $ci =& get_instance();

//    building the array
    if ($ci->session->flashdata('message')) {
      $message['message'] = $ci->session->flashdata('message');
      $message['type'] = $ci->session->flashdata('type');
      return $message;
    }
    else {
      return false;
    }
  }
}

if (!function_exists('send_email'))
{
	/**
	 * This message will be used to get any message
	 * which might have been set by some code in the session
	 * and then display the message
	 * @return bool
	 */
	function send_email($to, $subject, $message) {
		//getting the ci instance
		$ci =& get_instance();
		Logger::debug_var('msg', $message);
		$ci->load->library('email');
		$ci->email->from(ADMIN_FROM_EMAIL, ADMIN_FROM_NAME);
		$ci->email->to($to);
		$ci->email->subject($subject);
		$ci->email->message($message);
		$ci->email->send();
	}
}