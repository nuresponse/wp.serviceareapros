<?php
class Service_Area_Pros {
    protected $loader;
    protected $plugin_name;
    protected $version;

    public function __construct() {
        $this->plugin_name = 'service-area-pros';
        $this->version = '1.0.0';
        $this->load_dependencies();
        $this->define_admin_hooks();
        $this->define_public_hooks();
    }

    private function load_dependencies() {
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-service-area-pros-loader.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-service-area-pros-admin.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'public/class-service-area-pros-public.php';
        $this->loader = new Service_Area_Pros_Loader();
    }

    private function define_admin_hooks() {
        $plugin_admin = new Service_Area_Pros_Admin($this->get_plugin_name(), $this->get_version());
        $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_styles');
        $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts');
        $this->loader->add_action('admin_menu', $plugin_admin, 'add_plugin_admin_menu');
    }

    private function define_public_hooks() {
        $plugin_public = new Service_Area_Pros_Public($this->get_plugin_name(), $this->get_version());
        $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_styles');
        $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_scripts');
    }

    public function run() {
        $this->loader->run();
    }

    public function get_plugin_name() {
        return $this->plugin_name;
    }

    public function get_loader() {
        return $this->loader;
    }

    public function get_version() {
        return $this->version;
    }
}
