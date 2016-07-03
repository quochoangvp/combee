<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends Base_model {

	public $table = 'product';
	public $primary_key = 'product_id';
	public $rules = array(
		array(
			'field' => 'product_name',
			'label' => 'Name',
			'rules' => 'trim|required|min_length[2]|max_length[255]',
		),
		array(
			'field' => 'product_thumb',
			'label' => 'Thumbnail',
			'rules' => 'trim|min_length[2]|max_length[255]',
		),
		array(
			'field' => 'product_image',
			'label' => 'Images',
			'rules' => 'trim',
		),
		array(
			'field' => 'product_summary',
			'label' => 'Summary',
			'rules' => 'trim',
		),
		array(
			'field' => 'product_content',
			'label' => 'Content',
			'rules' => 'trim',
		),
		array(
			'field' => 'product_code',
			'label' => 'Code',
			'rules' => 'trim|min_length[2]|max_length[50]',
		),
		array(
			'field' => 'product_barcode',
			'label' => 'Barcode',
			'rules' => 'trim|min_length[2]|max_length[20]',
		),
		array(
			'field' => 'price',
			'label' => 'Price',
			'rules' => 'trim|decimal',
		),
		array(
			'field' => 'reduction_price',
			'label' => 'Reduction price',
			'rules' => 'trim|decimal',
		),
		array(
			'field' => 'reduction_percent',
			'label' => 'Reduction percent',
			'rules' => 'trim|integer|max_length[3]',
		),
		array(
			'field' => 'reduction_from',
			'label' => 'Reduction from',
			'rules' => 'trim',
		),
		array(
			'field' => 'reduction_to',
			'label' => 'Reduction to',
			'rules' => 'trim',
		),
		array(
			'field' => 'wholesale_price',
			'label' => 'Wholesale price',
			'rules' => 'trim|decimal',
		),
		array(
			'field' => 'brand_id',
			'label' => 'Brand',
			'rules' => 'trim|integer',
		),
		array(
			'field' => 'manufacturer_id',
			'label' => 'Manufacturer',
			'rules' => 'trim|integer',
		),
		array(
			'field' => 'supplier_id',
			'label' => 'Supplier',
			'rules' => 'trim|integer',
		),
		array(
			'field' => 'is_instock',
			'label' => 'Instock',
			'rules' => 'trim|integer',
		),
		array(
			'field' => 'New product',
			'label' => 'is_new',
			'rules' => 'trim|integer',
		),
		array(
			'field' => 'Hot product',
			'label' => 'is_hot',
			'rules' => 'trim|integer',
		),
		array(
			'field' => 'Meta keyword',
			'label' => 'meta_keywords',
			'rules' => 'trim|min_length[2]|max_length[255]',
		),
		array(
			'field' => 'Meta description',
			'label' => 'meta_description',
			'rules' => 'trim|min_length[2]|max_length[255]',
		),
	);

	public function __construct() {
		$this->table = $this->_db_prefix . $this->table;
        $this->load->model('common/attribute_group_model', 'common_attritube_group');
        $this->load->model('common/attribute_model', 'common_attritube');
        $this->load->model('common/brand_model', 'common_brand');
        $this->load->model('common/manufacturer_model', 'common_manufacturer');
        $this->load->model('common/catalog_model', 'common_catalog');
        $this->load->model('common/product_tag_model', 'common_product_tag');
        $this->load->model('common/supplier_model', 'common_supplier');
		parent::__construct();
	}

	public function get_all_product($where = null) {
		$sql = "SELECT * FROM {$this->table}";
        if ($where) {
            $sql .= " WHERE {$where}";
        }
        return $this->db->query($sql)->result_array();
	}

}

/* End of file Product_model.php */
/* Location: ./application/modules/product/common/models/Product_model.php */