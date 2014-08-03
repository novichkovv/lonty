<?
Abstract Class Controller {

    protected $registry;
    protected $template;
    protected $layouts; // шаблон
    protected $styles;
    protected $scripts;
    protected $title;
    protected $meta;
    public $vars = array();
    //private $layouts;

    // в конструкторе подключаем шаблоны
    function __construct($registry) {
        $this->registry = $registry;
        $this->layouts='main';
    }
    function view($name, $vars='')
    {    	$arr=explode('_', get_class($this));
    	$view=$arr[0];
        $pathLayout = SITE_PATH . DS . 'application' . DS . 'views' . DS . 'layouts' . DS . $this->layouts . '.php';
        $contentPage = SITE_PATH . DS . 'application' . DS . 'views' . DS . $view . DS . $name . '.php';
        if (file_exists($pathLayout) == false) {
            trigger_error ('Layout `' . $this->layouts . '` does not exist.', E_USER_NOTICE);
            return false;
        }
        if (file_exists($contentPage) == false) {
            trigger_error ('Template `' . $name . '` does not exist.', E_USER_NOTICE);
            return false;
        }
       	if($vars)
       	{
	        foreach ($vars as $key => $value) {
	            $$key = $value;
	        }
        }

        include ($pathLayout);
    }
    public function style()
    {    	if($this->styles)
    	{    		foreach($this->styles as $key=>$filename)
    		{    			echo ('
    			<link rel="stylesheet" type="text/css" href="http://'.$_SERVER['HTTP_HOST'] . '/css/' .$filename.'.css" />
    			');    		}    	}    }
    public function scripts()
    {    	if($this->scripts)
    	{    		foreach($this->scripts as $key=>$filename)
    		{    			echo ('
    			<script type="text/javascript" charset="utf-8" src="http://'.$_SERVER['HTTP_HOST'].'/js/'.$filename.'.js">
    			</script>
    			');    		}    	}    }
    public function meta()
    {    	if($this->meta)
    	{    		foreach($this->meta as $type=>$data)
    		{    			foreach($data as $name=>$content)
    			{    				echo ('
    				<meta '.$type.'="'.$name.'" content="'.$content.'">
    				');    			}    		}    	}    }
    protected function monthes($month)
    {    	$monthes=array('01'=>'января',
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
    	return $monthes[$month];    }
    abstract function index($args='');
}
?>