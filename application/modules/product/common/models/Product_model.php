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
        $this->load->model('common/attribute_model', 'common_attribute');
        $this->load->model('common/brand_model', 'common_brand');
        $this->load->model('common/manufacturer_model', 'common_manufacturer');
        $this->load->model('common/catalog_model', 'common_catalog');
        $this->load->model('common/product_tag_model', 'common_product_tag');
        $this->load->model('common/supplier_model', 'common_supplier');
        $this->load->model('common/product_attribute_relation_model', 'common_product_attribute_relation');
        $this->load->model('common/product_catalog_relation_model', 'common_product_catalog_relation');
		parent::__construct();
	}

	public function get_all_product($where = null) {
		$sql_product = "SELECT
					{$this->table}.product_id,
					{$this->table}.product_name,
					{$this->common_catalog->table}.catalog_id,
					{$this->common_catalog->table}.catalog_name
			FROM {$this->table}
			LEFT JOIN {$this->common_product_catalog_relation->table} ON {$this->table}.product_id = {$this->common_product_catalog_relation->table}.product_id
			LEFT JOIN {$this->common_catalog->table} ON {$this->common_product_catalog_relation->table}.catalog_id = {$this->common_catalog->table}.catalog_id";
        if ($where) {
            $sql_product .= " WHERE {$where}";
        }
        $products = $this->db->query($sql_product)->result_array();
        $sql_product_attribute = "SELECT
					{$this->table}.product_id,
					{$this->common_product_attribute_relation->table}.price,
					{$this->common_product_attribute_relation->table}.quantity,
					{$this->common_product_attribute_relation->table}.is_instock,
					{$this->common_attribute->table}.attr_name
			FROM {$this->table}
			LEFT JOIN {$this->common_product_attribute_relation->table} ON {$this->table}.product_id = {$this->common_product_attribute_relation->table}.product_id
			LEFT JOIN {$this->common_attribute->table} ON {$this->common_product_attribute_relation->table}.attr_id = {$this->common_attribute->table}.attr_id";
        if ($where) {
            $sql_product_attribute .= " WHERE {$where}";
        }
        $attributes = $this->db->query($sql_product_attribute)->result_array();
        for ($i=0; $i < count($products); $i++) {
        	foreach ($attributes as $attribute) {
        		if ($attribute['product_id'] == $products[$i]['product_id']) {
        			$products[$i]['attributes'][] = $attribute;
        		}
        	}
        }
        print_r($products);die;
        return $products;
	}

}

/* End of file Product_model.php */
/* Location: ./application/modules/product/common/models/Product_model.php */