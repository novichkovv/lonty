<?
Abstract Class Controller {
	public $t;
    protected $registry;
    protected $template;
    protected $layouts; // шаблон
    protected $styles;
    protected $scripts;
    public $title;
    protected $meta;
    public $action;
    public $vars = array();
    protected $action_name;
    //private $layouts;

    // в конструкторе подключаем шаблоны
    function __construct($registry) {
        $this->registry = $registry;
        $this->layouts='main';
    }
    function view($name='', $vars='')
    {
    	$arr=explode('_', get_class($this));
    	$view=$arr[0];
        /*$pathLayout = SITE_PATH . DS . 'application' . DS . 'views' . DS . 'layouts' . DS . $this->layouts . '.php';
        $contentPage = SITE_PATH . DS . 'application' . DS . 'views' . DS . $view . DS . $name . '.php';
        if (file_exists($pathLayout) == false) {
            trigger_error ('Layout `' . $this->layouts . '` does not exist.', E_USER_NOTICE);
            return false;
        }
        if (file_exists($contentPage) == false) {
            trigger_error ('Template `' . $name . '` does not exist.', E_USER_NOTICE);
            return false;
        }*/
       	if($vars)
       	{
       			foreach ($vars as $key => $value) {
	            $$key = $value;
	        }
        }
        $class = $controller.'_Controller';
        $this->t = new Smarty();
        $this->t->template_dir = SITE_PATH.DS.'application'.DS.'templates'.DS;
        $this->t->compile_dir = SITE_PATH.DS.'application'.DS.'templates_c'.DS;
        $this->t->config_dir = SITE_PATH.DS.'application'.DS.'configs'.DS;
        $this->t->cache_dir = SITE_PATH.DS.'application'.DS.'cache'.DS;
        $template_dir = SITE_PATH.DS.'application'.DS.'templates'.DS.strtolower($view).DS.strtolower($name).'.tpl';
        $this->t->assign('fof', SITE_PATH.DS.'application'.DS.'templates'.DS.$view.DS.'not_found.tpl');
		$this->t->assign('template_dir', $template_dir);

		$this->style();
        $this->scripts();

    }
    public function style()
    {
    	if($this->styles)
    	{
    		$style = array();
    		foreach($this->styles as $key=>$filename)
    		{
    			$style[] = '<link rel="stylesheet" type="text/css" href="http://'.$_SERVER['HTTP_HOST'].'/css/'.$filename.'.css" />';
    		}
    		$this->t->assign('styles', $style);


    	}
    }
    public function scripts()
    {
    	if($this->scripts)
    	{
    		foreach($this->scripts as $key=>$filename)
    		{
    			$scripts[] = '
    			<script type="text/javascript" charset="utf-8" src="http://'.$_SERVER['HTTP_HOST'].'/js/'.$filename.'.js">
    			</script>
    			';
    		}
    		$this->t->assign('scripts',$scripts);
    	}
    }
    public function meta()
    {
    	if($this->meta)
    	{
            $meta = array();
    		foreach($this->meta as $type=>$data)
    		{
    			foreach($data as $name=>$content)
    			{
    	            $meta[] = '<meta '.$type.'="'.$name.'" content="'.$content.'">';
    			}
    		}
            $this->t->assign('meta', $meta);
    	}
    }
    protected function monthes($month)
    {
    	$monthes=array('01'=>'января',
    				   '02'=>'февраля',
    				   '03'=>'марта',
    				   '04'=>'апреля',
    				   '05'=>'мая',
    				   '06'=>'июня',
    				   '07'=>'июля',
    				   '08'=>'августа',
    				   '09'=>'сентября',
    				   '10'=>'октября',
    				   '11'=>'ноября',
    				   '21'=>'декабря');
    	return $monthes[$month];
    }
    function not_found()
    {

    }
    abstract function index($args='');
}
?>