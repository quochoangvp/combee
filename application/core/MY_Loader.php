<?php
/* load the MX_Loader class */
require APPPATH . "third_party/MX/Loader.php";
/**
 * PHP Codeigniter Simplicity
 *
 * Copyright (C) 2013  John Skoumbourdis.
 *
 * GROCERY CRUD LICENSE
 *
 * Codeigniter Simplicity is released with dual licensing, using the GPL v3 and the MIT license.
 * You don't have to do anything special to choose one license or the other and you don't have to notify anyone which license you are using.
 * Please see the corresponding license file for details of these licenses.
 * You are free to use, modify and distribute this software, but all copyright information must remain.
 *
 * @package      Codeigniter Simplicity
 * @copyright      Copyright (c) 2013, John Skoumbourdis
 * @license        https://github.com/scoumbourdis/grocery-crud/blob/master/license-grocery-crud.txt
 * @version        0.6
 * @author         John Skoumbourdis <scoumbourdisj@gmail.com>
 */
class MY_Loader extends MX_Loader
{
    private $_javascript = array();
    private $_css = array();
    private $_inline_scripting = array("infile" => "", "stripped" => "", "unstripped" => "");
    private $_sections = array();
    private $_cached_css = array();
    private $_cached_js = array();
    private $_theme_dir = "default/";
    private $_layout_dir = "layouts/";
    private $_section_dir = 'sections/';
    private $_widget_dir = 'widgets/';
    public function __construct()
    {
        if (!defined('SPARKPATH')) {
            define('SPARKPATH', 'sparks/');
        }
        parent::__construct();
    }
    public function css()
    {
        $css_files = func_get_args();
        foreach ($css_files as $css_file) {
            $css_file = substr($css_file, 0, 1) == '/' ? substr($css_file, 1) : $css_file;
            $is_external = false;
            if (is_bool($css_file)) {
                continue;
            }

            $is_external = preg_match("/^https?:\/\//", trim($css_file)) > 0 ? true : false;
            if (!$is_external) {
                $css_file = 'assets/themes/' . $this->_theme_dir . $css_file;
                if (!file_exists($css_file)) {
                    show_error("Cannot locate stylesheet file: {$css_file}.");
                }

            }
            $css_file = $is_external == false ? base_url() . $css_file : $css_file;
            if (!in_array($css_file, $this->_css)) {
                $this->_css[] = $css_file;
            }
            $this->output->add_css($css_file);
        }
        return;
    }
    public function js()
    {
        $script_files = func_get_args();
        foreach ($script_files as $script_file) {
            $script_file = substr($script_file, 0, 1) == '/' ? substr($script_file, 1) : $script_file;
            $is_external = false;
            if (is_bool($script_file)) {
                continue;
            }

            $is_external = preg_match("/^https?:\/\//", trim($script_file)) > 0 ? true : false;
            if (!$is_external) {
                $script_file = 'assets/themes/' . $this->_theme_dir . $script_file;
                if (!file_exists($script_file)) {
                    show_error("Cannot locate javascript file: {$script_file}.");
                }

            }
            $script_file = $is_external == false ? base_url() . $script_file : $script_file;
            if (!in_array($script_file, $this->_javascript)) {
                $this->_javascript[] = $script_file;
            }
            $this->output->add_js($script_file);
        }
        return;
    }
    public function start_inline_scripting()
    {
        ob_start();
    }
    public function end_inline_scripting($strip_tags = true, $append_to_file = true)
    {
        $source = ob_get_clean();
        if ($strip_tags) {
            $source = preg_replace("/<script.[^>]*>/", '', $source);
            $source = preg_replace("/<\/script>/", '', $source);
        }
        if ($append_to_file) {
            $this->_inline_scripting['infile'] .= $source;
        } else {
            if ($strip_tags) {
                $this->_inline_scripting['stripped'] .= $source;
            } else {
                $this->_inline_scripting['unstripped'] .= $source;
            }
        }
    }
    public function get_css_files()
    {
        return $this->_css;
    }
    public function get_cached_css_files()
    {
        return $this->_cached_css;
    }
    public function get_js_files()
    {
        return $this->_javascript;
    }
    public function get_cached_js_files()
    {
        return $this->_cached_js;
    }
    public function get_inline_scripting()
    {
        return $this->_inline_scripting;
    }
    public function theme($theme_name)
    {
        $this->_theme_dir = '../themes/' . $theme_name . '/';
        $this->output->set_theme($theme_name);
        return $this->_theme_dir;
    }
    /**
     * Loads the requested view in the given area
     * <em>Useful if you want to fill a side area with data</em>
     * <em><b>Note: </b> Areas are defined by the template, those might differs in each template.</em>
     *
     * @param string $area
     * @param string $view
     * @param array $data
     * @return string
     */
    public function section($area, $data = array())
    {
        if (!array_key_exists($area, $this->_sections)) {
            $this->_sections[$area] = array();
        }

        $view = $this->_theme_dir . $this->_section_dir . $area;
        $content = $this->view($view, $data, true);
        $checksum = md5($view . serialize($data));
        $this->_sections[$area][$checksum] = $content;
        $this->output->set_output_data($area, $content);
        return $checksum;
    }
    public function widget($area, $data = array())
    {
        $view = $this->_theme_dir . $this->_widget_dir . $area;
        return $this->view($view, $data, true);
    }
    public function layout($layout, $data = array())
    {
        $this->_layout_dir = $layout;
        $this->output->set_layout($layout);
        return $this->_layout_dir;
    }

    public function get_section($section_name)
    {
        $section_string = '';
        if (isset($this->_sections[$section_name])) {
            foreach ($this->_sections[$section_name] as $section) {
                $section_string .= $section;
            }
        }

        return $section_string;
    }
    /**
     * Gets the declared sections
     *
     * @return object
     */
    public function get_sections()
    {
        return (object) $this->_sections;
    }
    /*
     * Can load a view file from an absolute path and
     * relative to the CodeIgniter index.php file
     * Handy if you have views outside the usual CI views dir
     */
    public function viewfile($viewfile, $vars = array(), $return = false)
    {
        return $this->_ci_load(
            array('_ci_path' => $viewfile,
                '_ci_vars' => $this->_ci_object_to_array($vars),
                '_ci_return' => $return)
        );
    }
    /**
     * Specific Autoloader (99% ripped from the parent)
     *
     * The config/autoload.php file contains an array that permits sub-systems,
     * libraries, and helpers to be loaded automatically.
     *
     * @access    protected
     * @param    array
     * @return    void
     */
    public function _ci_autoloader($basepath = null)
    {
        if ($basepath !== null) {
            $autoload_path = $basepath . 'config/autoload' . EXT;
        } else {
            $autoload_path = APPPATH . 'config/autoload' . EXT;
        }
        if (!file_exists($autoload_path)) {
            return false;
        }
        include_once $autoload_path;
        if (!isset($autoload)) {
            return false;
        }
        // Autoload packages
        if (isset($autoload['packages'])) {
            foreach ($autoload['packages'] as $package_path) {
                $this->add_package_path($package_path);
            }
        }
        // Autoload sparks
        if (isset($autoload['sparks'])) {
            foreach ($autoload['sparks'] as $spark) {
                $this->spark($spark);
            }
        }
        if (isset($autoload['config'])) {
            // Load any custom config file
            if (count($autoload['config']) > 0) {
                $CI = &get_instance();
                foreach ($autoload['config'] as $key => $val) {
                    $CI->config->load($val);
                }
            }
        }
        // Autoload helpers and languages
        foreach (array('helper', 'language') as $type) {
            if (isset($autoload[$type]) and count($autoload[$type]) > 0) {
                $this->$type($autoload[$type]);
            }
        }
        // A little tweak to remain backward compatible
        // The $autoload['core'] item was deprecated
        if (!isset($autoload['libraries']) and isset($autoload['core'])) {
            $autoload['libraries'] = $autoload['core'];
        }
        // Load libraries
        if (isset($autoload['libraries']) and count($autoload['libraries']) > 0) {
            // Load the database driver.
            if (in_array('database', $autoload['libraries'])) {
                $this->database();
                $autoload['libraries'] = array_diff($autoload['libraries'], array('database'));
            }
            // Load all other libraries
            foreach ($autoload['libraries'] as $item) {
                $this->library($item);
            }
        }
        // Autoload models
        if (isset($autoload['model'])) {
            $this->model($autoload['model']);
        }
    }
}
