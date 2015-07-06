<?
require_once ("./Lib/Twig/lib/Twig/Autoloader.php");
/**
* 
*/
class ControllerBase
{
protected   $twig;	
	function __construct()
	{
		Twig_Autoloader::register();
		$loader = new Twig_Loader_Filesystem("./Templates/");
		$this->twig = new Twig_Environment($loader, array('cache' => "./Cache", 'debug' => true));
	}
	protected function View ($template, array $param )
	{
		$template = $this->twig->loadTemplate($template);
		echo $template->render($param) ;
	}
}