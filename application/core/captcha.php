<?php 
Class Captcha
{	
	public $imgDir = 'captcha/'; //path to captcha .gif files
	public $length = '5'; // captcha length
	public function __construct() 
	{
		$this->keystring=array();
		for($i=0;$i < $this->length;$i++) {
			 $this->keystring[] .= mt_rand(0,9);
		}
		
	}
	public function draw()
	{
		$img = '';
		foreach($this->keystring as $keystring) {
			$img .= '<img src="'.$this->imgDir.$keystring.'.gif" border="0">';
		}
		return $img;
	}
	public function getKeyString() 
	{
		return implode($this->keystring);
	}
}
//initialize the captcha
$captcha = new Captcha();
$_SESSION['keystring'] = $captcha->getKeyString();
echo $captcha->draw();
?>