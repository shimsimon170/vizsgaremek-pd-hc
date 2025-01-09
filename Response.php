<?php
class Response{
    private $status;
    private $message;
    private $httpStatusCode;
    private $body;

    public function getStatus() {return $this->status;}

	public function getMessage() {return $this->message;}

	public function getHttpStatusCode() {return $this->httpStatusCode;}

	public function getBody() {return $this->body;}

    public function __construct()
    {
        $this->status = "error";
        $this->message = "Internal Server Error";
        $this->httpStatusCode = 500;
    }
	
    public function setStatus( $status): void {$this->status = $status;}

	public function setMessage( $message): void {$this->message = $message;}

	public function setHttpStatusCode( $httpStatusCode): void {$this->httpStatusCode = $httpStatusCode;}

	public function setBody( $body): void {$this->body = $body;}

	
}