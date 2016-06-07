<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Base_Controller extends MX_Controller
{

    public $modules = [];

    public function __construct()
    {
        parent::__construct();

        $this->load->model('module_model');
        // Get module in db
        // $db_modules = $this->module_model->set_cache('get_all_db_modules')->get_all();
        $db_modules = $this->module_model->get_all();

        // Load library needed
        $this->load->library('dir');
        $this->load->library('file');

        // Get all modules from modules folder
        $file_modules = $this->dir->listDir(MODULE_PATH);
        $db_module_total = count($db_modules);
        for ($i = 0; $i < $db_module_total; $i++) {
            $info = $this->file->read(MODULE_PATH . $db_modules[$i]['module_path'] . '/.info');
            if ($info) {
                $info = json_decode($info);
                $db_modules[$i]['maps'] = $info->maps;
            } else {
                $db_modules[$i]['module_is_active'] = 'n';
            }
            if (!in_array($db_modules[$i]['module_path'], $file_modules)) {
                $db_modules[$i]['module_is_active'] = 'n';
                $db_modules[$i]['module_is_delete'] = 'y';
            } else {
                $db_modules[$i]['module_is_delete'] = 'n';
            }
        }

        // Fetch all module with module status
        $all_modules = [];
        foreach ($file_modules as $key => $file_m) {
            $info = $this->file->read(MODULE_PATH . $file_m . '/.info');
            if ($info) {
                $info = json_decode($info);
                $module_info = new stdClass();
                $module_info->module_path = $file_m;
                $module_info->module_version = $info->version;
                $module_info->module_package = $info->package;
                $all_modules[] = $module_info;
            }
        }
        $all_modules = array_merge($all_modules, $db_modules);
        $all_modules = array_uniqueif($all_modules, 'module_package', 'user_id');

        $this->modules = $all_modules;
    }

}

/* End of file Base_Controller.php */
/* Location: ./application/core/Base_Controller.php */
