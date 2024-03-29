<?php

 class FormattedRow

{


	 private $info;

	 public function getInfo(): string
	 {
		 return $this->info;
	 }

	 public function setInfo(string $info): void
	 {
		 $this->info = $info;
	 }

	 public function getMessage(): string
	 {
		 return $this->message;
	 }


	 public function getTime()
	 {
		 return $this->time;
	 }


	 private $message;
	 private $time;

	 public function __construct(string $info, string $message) {

		 $this->info = $info;

		 $this->message = $message;

		 $this->time = date("Y-m-d H:i:s");

	 }




}
