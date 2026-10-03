<?php
if ( ! class_exists( 'Job_Forum_Plugin_Activation_WPElemento_Importer' ) ) {
    /**
     * Job_Forum_Plugin_Activation_WPElemento_Importer initial setup
     *
     * @since 1.6.2
     */

    class Job_Forum_Plugin_Activation_WPElemento_Importer {

        private static $job_forum_instance;
        public $job_forum_action_count;
        public $job_forum_recommended_actions;

        /** Initiator **/
        public static function get_instance() {
          if ( ! isset( self::$job_forum_instance) ) {
            self::$job_forum_instance = new self();
          }
          return self::$job_forum_instance;
        }

        /*  Constructor */
        public function __construct() {

            add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

            // ---------- wpelementoimpoter Plugin Activation -------
            add_filter( 'job_forum_recommended_plugins', array($this, 'job_forum_recommended_elemento_importer_plugins_array') );

            $job_forum_actions                   = $this->job_forum_get_recommended_actions();
            $this->job_forum_action_count        = $job_forum_actions['count'];
            $this->job_forum_recommended_actions = $job_forum_actions['actions'];

            add_action( 'wp_ajax_create_pattern_setup_builder', array( $this, 'create_pattern_setup_builder' ) );
        }

        public function job_forum_recommended_elemento_importer_plugins_array($job_forum_plugins){
            $job_forum_plugins[] = array(
                    'name'     => esc_html__('WPElemento Importer', 'job-forum'),
                    'slug'     =>  'wpelemento-importer',
                    'function' => 'WPElemento_Importer_ThemeWhizzie',
                    'desc'     => esc_html__('We highly recommend installing the WPElemento Importer plugin for importing the demo content with Elementor.', 'job-forum'),               
            );
            return $job_forum_plugins;
        }

        public function enqueue_scripts() {
            wp_enqueue_script('updates');      
            wp_register_script( 'job-forum-plugin-activation-script', esc_url(get_template_directory_uri()) . '/includes/getstart/js/plugin-activation.js', array('jquery') );
            wp_localize_script('job-forum-plugin-activation-script', 'job_forum_plugin_activate_plugin',
                array(
                    'installing' => esc_html__('Installing', 'job-forum'),
                    'activating' => esc_html__('Activating', 'job-forum'),
                    'error' => esc_html__('Error', 'job-forum'),
                    'ajax_url' => esc_url(admin_url('admin-ajax.php')),
                    'wpelementoimpoter_admin_url' => esc_url(admin_url('admin.php?page=wpelemento-importer-tgmpa-install-plugins')),
                    'addon_admin_url' => esc_url(admin_url('admin.php?page=wpelementoimporter-wizard'))
                )
            );
            wp_enqueue_script( 'job-forum-plugin-activation-script' );

        }

        // --------- Plugin Actions ---------
        public function job_forum_get_recommended_actions() {

            $job_forum_act_count  = 0;
            $job_forum_actions_todo = get_option( 'recommending_actions', array());

            $job_forum_plugins = $this->job_forum_get_recommended_plugins();

            if ($job_forum_plugins) {
                foreach ($job_forum_plugins as $job_forum_key => $job_forum_plugin) {
                    $job_forum_action = array();
                    if (!isset($job_forum_plugin['slug'])) {
                        continue;
                    }

                    $job_forum_action['id']   = 'install_' . $job_forum_plugin['slug'];
                    $job_forum_action['desc'] = '';
                    if (isset($job_forum_plugin['desc'])) {
                        $job_forum_action['desc'] = $job_forum_plugin['desc'];
                    }

                    $job_forum_action['name'] = '';
                    if (isset($job_forum_plugin['name'])) {
                        $job_forum_action['title'] = $job_forum_plugin['name'];
                    }

                    $job_forum_link_and_is_done  = $this->job_forum_get_plugin_buttion($job_forum_plugin['slug'], $job_forum_plugin['name'], $job_forum_plugin['function']);
                    $job_forum_action['link']    = $job_forum_link_and_is_done['button'];
                    $job_forum_action['is_done'] = $job_forum_link_and_is_done['done'];
                    if (!$job_forum_action['is_done'] && (!isset($job_forum_actions_todo[$job_forum_action['id']]) || !$job_forum_actions_todo[$job_forum_action['id']])) {
                        $job_forum_act_count++;
                    }
                    $job_forum_recommended_actions[] = $job_forum_action;
                    $job_forum_actions_todo[]        = array('id' => $job_forum_action['id'], 'watch' => true);
                }
                return array('count' => $job_forum_act_count, 'actions' => $job_forum_recommended_actions);
            }

        }

        public function job_forum_get_recommended_plugins() {

            $job_forum_plugins = apply_filters('job_forum_recommended_plugins', array());
            return $job_forum_plugins;
        }

        public function job_forum_get_plugin_buttion($slug, $name, $function) {
                $job_forum_is_done      = false;
                $job_forum_button_html  = '';
                $job_forum_is_installed = $this->is_plugin_installed($slug);
                $job_forum_plugin_path  = $this->get_plugin_basename_from_slug($slug);
                $job_forum_is_activeted = (class_exists($function)) ? true : false;
                if (!$job_forum_is_installed) {
                    $job_forum_plugin_install_url = add_query_arg(
                        array(
                            'action' => 'install-plugin',
                            'plugin' => $slug,
                        ),
                        self_admin_url('update.php')
                    );
                    $job_forum_plugin_install_url = wp_nonce_url($job_forum_plugin_install_url, 'install-plugin_' . esc_attr($slug));
                    $job_forum_button_html        = sprintf('<a class="job-forum-plugin-install install-now button-secondary button" data-slug="%1$s" href="%2$s" aria-label="%3$s" data-name="%4$s">%5$s</a>',
                        esc_attr($slug),
                        esc_url($job_forum_plugin_install_url),
                        sprintf(esc_html__('Install %s Now', 'job-forum'), esc_html($name)),
                        esc_html($name),
                        esc_html__('Install & Activate', 'job-forum')
                    );
                } elseif ($job_forum_is_installed && !$job_forum_is_activeted) {

                    $job_forum_plugin_activate_link = add_query_arg(
                        array(
                            'action'        => 'activate',
                            'plugin'        => rawurlencode($job_forum_plugin_path),
                            'plugin_status' => 'all',
                            'paged'         => '1',
                            '_wpnonce'      => wp_create_nonce('activate-plugin_' . $job_forum_plugin_path),
                        ), self_admin_url('plugins.php')
                    );

                    $job_forum_button_html = sprintf('<a class="job-forum-plugin-activate activate-now button-primary button" data-slug="%1$s" href="%2$s" aria-label="%3$s" data-name="%4$s">%5$s</a>',
                        esc_attr($slug),
                        esc_url($job_forum_plugin_activate_link),
                        sprintf(esc_html__('Activate %s Now', 'job-forum'), esc_html($name)),
                        esc_html($name),
                        esc_html__('Activate', 'job-forum')
                    );
                } elseif ($job_forum_is_activeted) {
                    $job_forum_button_html = sprintf('<div class="action-link button disabled"><span class="dashicons dashicons-yes"></span> %s</div>', esc_html__('Active', 'job-forum'));
                    $job_forum_is_done     = true;
                }

                return array('done' => $job_forum_is_done, 'button' => $job_forum_button_html);
            }
        public function is_plugin_installed($slug) {
            $job_forum_installed_plugins = $this->get_installed_plugins(); // Retrieve a list of all installed plugins (WP cached).
            $job_forum_file_path         = $this->get_plugin_basename_from_slug($slug);
            return (!empty($job_forum_installed_plugins[$job_forum_file_path]));
        }
        public function get_plugin_basename_from_slug($slug) {
            $job_forum_keys = array_keys($this->get_installed_plugins());
            foreach ($job_forum_keys as $job_forum_key) {
                if (preg_match('|^' . $slug . '/|', $job_forum_key)) {
                    return $job_forum_key;
                }
            }
            return $slug;
        }

        public function get_installed_plugins() {

            if (!function_exists('get_plugins')) {
                require_once ABSPATH . 'wp-admin/includes/plugin.php';
            }

            return get_plugins();
        }
        public function create_pattern_setup_builder() {

            $edit_page = admin_url().'post-new.php?post_type=page&create_pattern=true';
            echo json_encode(['page_id'=>'','edit_page_url'=> $edit_page ]);

            exit;
        }

    }
}
/**
 * Kicking this off by calling 'get_instance()' method
 */
Job_Forum_Plugin_Activation_WPElemento_Importer::get_instance();