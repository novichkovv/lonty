<?
Abstract Class CController {

    protected $registry;
    protected $template;
    protected $layouts; // ������

    public $vars = array();

    // � ������������ ���������� �������
    function __construct($registry) {
        $this->registry = $registry;
        // �������
        $this->template = new Template($this->layouts, get_class($this));
    }

    abstract function index();
}
?>