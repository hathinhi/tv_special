<?php

/**
 * Created by IntelliJ IDEA.
 * User: nhiha
 * Date: 02/08/2017
 * Time: 11:17
 */
abstract class Base_layout extends CI_Controller {
    public $_arrcss_footer = array();
    public $_arrcss_header = array();
    public $_arrjs_footer = array();
    public $_arrjs_header = array();

    function __construct() {
        parent::__construct();
    }

    public function render($url) {
        if (file_exists(self::VIEW_PATH . $this->_template . ".php")) {
            ob_start();
            $this->load($url);
            $this->load->view();
            $content = ob_get_contents();
            ob_end_clean();
            $this->content = $content;
            $this->load($this->_template);
        } else {
            require self::VIEW_PATH . $url . '.php';
        }

    }

    function set_template($template_view) {
        $template_view = str_replace(".php", "", $template_view);
        $this->_template = self::TEMPLATE_ROOT . $template_view;
    }

    protected function load_more_css($file_path, $at_footer = FALSE) {
        if ($at_footer) {
            array_push($this->_arrcss_footer, $file_path);
        } else {
            array_push($this->_arrcss_header, $file_path);
        }
    }

    /**
     * Load more js
     *
     * @param String $file_path File want to load
     * @param bool   $at_footer True if want to load at footer assets, false if want to load ad header asset
     */
    protected function load_more_js($file_path, $at_footer = FALSE) {
        if ($at_footer) {
            array_push($this->_arrjs_footer, $file_path);
        } else {
            array_push($this->_arrjs_header, $file_path);
        }
    }
}