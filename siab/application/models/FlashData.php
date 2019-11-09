<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class FlashData extends CI_Model
	{

		public static $flashMessages = 'FlashMessages';

		public function __construct()
		{	
			parent::__construct();
        	$this->load->model('Session');
		}

		public function setFlashMessages(string $type,string $title,string $text,$dangerMode = 'false')
		{
			if(!$this->Session->sessionExist(self::$flashMessages))
			{
				$data = [	'typeMessages'	=> $type,
							'titleMessages' => $title,
							'textMessages'	=> $text,
							'dangerMode'	=> $dangerMode
						];
				return $this->Session->setSession(self::$flashMessages,$data);
			}
		}

		public function showFlashMessages()
		{		
			$flashMessages = '';

			if($this->Session->sessionExist('FlashMessages'))
			{
				$dataFLashMessages = $this->Session->getSession(self::$flashMessages);
				$flashMessages 	= "<script>".
									"swal({
										title: '$dataFLashMessages[titleMessages]',
										text:  \" $dataFLashMessages[textMessages]\",
										icon: '$dataFLashMessages[typeMessages]',
										dangerMode:$dataFLashMessages[dangerMode]
									});".
								  "</script>";
				$this->Session->unsetSession(self::$flashMessages);

			}

			return $flashMessages;
		}


	}


 ?>