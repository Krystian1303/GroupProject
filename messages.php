<?php

	// whichMessage - 1) menuMess -> komunikat w menu.php
	//				  2) makeItMess -> komunikat w make_it.php
	function showMessages($whichMessage){

		if(!isset($_SESSION[$whichMessage]))
			return "";

		$messageClass = $_SESSION[$whichMessage . 'Type'] ? "create__alert-red" : "create__alert-green";

		$message  = '<div class="create__alert" >';
		$message .= '	<p class="' . $messageClass . '">' . $_SESSION[$whichMessage] . '</p>';
		$message .= '</div>';
		$message .= '<hr />';

		unset($_SESSION[$whichMessage]);

		return $message;
	}


?>