<?php
if ( ! defined( 'WPINC' ) ){
	die;
}

require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
require_once( ABSPATH . 'wp-admin/includes/screen.php' );
require_once( ABSPATH . 'wp-admin/includes/class-wp-screen.php' );
require_once( ABSPATH . 'wp-admin/includes/template.php' );
	   

class Chirag_Admin extends WP_List_Table {
		
	function __construct()
    {
        global $status, $page;

        parent::__construct(array(
            'singular' => 'person',
            'plural' => 'persons',
        ));
    }

    /**
     * [REQUIRED] this is a default column renderer
     *
     * @param $item - row (key, value array)
     * @param $column_name - string (key)
     * @return HTML
     */
    function column_default($item, $column_name)
    {
        return $item[$column_name];
    }

    /**
     * [OPTIONAL] this is example, how to render specific column
     *
     * method name must be like this: "column_[column_name]"
     *
     * @param $item - row (key, value array)
     * @return HTML
     */
    function column_age($item)
    {
        return '<em>' . $item['age'] . '</em>';
    }

    /**
     * [OPTIONAL] this is example, how to render column with actions,
     * when you hover row "Edit | Delete" links showed
     *
     * @param $item - row (key, value array)
     * @return HTML
     */
    function column_name($item)
    {
        // links going to /admin.php?page=[your_plugin_page][&other_params]
        // notice how we used $_REQUEST['page'], so action will be done on curren page
        // also notice how we use $this->_args['singular'] so in this example it will
        // be something like &person=2
        /*$actions = array(
            'edit' => sprintf('<a href="?page=persons_form&id=%s">%s</a>', $item['id'], __('Edit', 'custom_table_example')),
            'delete' => sprintf('<a href="?page=%s&action=delete&id=%s">%s</a>', $_REQUEST['page'], $item['id'], __('Delete', 'custom_table_example')),
        );

        return sprintf('%s %s',
            $item['Title'],
            $this->row_actions($actions)
        );
        */

  $actions = array(
            'edit'      => sprintf('<a href="?page=%s&action=%s&book=%s">Edit</a>',$_REQUEST['page'],'edit',$item['ParliamentaryID']),
            'delete'    => sprintf('<a href="?page=%s&action=%s&book=%s">Delete</a>',$_REQUEST['page'],'delete',$item['ParliamentaryID']),
        );

  return sprintf('%1$s %2$s', $item['booktitle'], $this->row_actions($actions) );
    }

    /**
     * [REQUIRED] this is how checkbox column renders
     *
     * @param $item - row (key, value array)
     * @return HTML
     */
    function column_cb($item)
    {
        return sprintf(
            '<input type="checkbox" name="id[]" value="%s" />',
            $item['id']
        );
    }

    /**
     * [REQUIRED] This method return columns to display in table
     * you can skip columns that you do not want to show
     * like content, or description
     *
     * @return array
     */
    function get_columns()
    {
        $columns = array(
            'cb' => '<input type="checkbox" />', //Render a checkbox instead of text
            'Title' => __('Title', 'custom_table_example'),
            'StartDate' => __('StartDate', 'custom_table_example'),
            'EndDate' => __('EndDate', 'custom_table_example'),
             'IsCurrent' => __('IsCurrent', 'custom_table_example'),
            // 'ParliamentaryID' => __('Edit', 'custom_table_example','<input type="checkbox" />'),
             ParliamentaryID =>'<a href=#>Edit</a>',

        );
        return $columns;
    }

    /**
     * [OPTIONAL] This method return columns that may be used to sort table
     * all strings in array - is column names
     * notice that true on name column means that its default sort
     *
     * @return array
     */
    function get_sortable_columns()
    {
        $sortable_columns = array(
            'Title' => array('Title', true),
            'StartDate' => array('StartDate', false),
            'EndDate' => array('EndDate', false),
             'IsCurrent' => __('IsCurrent', false),
             'ParliamentaryID'=> __('ParliamentaryID', false),

        );
        return $sortable_columns;
    }

    /**
     * [OPTIONAL] Return array of bult actions if has any
     *
     * @return array
     */
    function get_bulk_actions()
    {
        $actions = array(
            'delete' => 'Delete',
            'edit' =>'Edit'
        );
        return $actions;
    }

    /**
     * [OPTIONAL] This method processes bulk actions
     * it can be outside of class
     * it can not use wp_redirect coz there is output already
     * in this example we are processing delete action
     * message about successful deletion will be shown on page in next part
     */
    function process_bulk_action()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'cte'; // do not forget about tables prefix

        if ('delete' === $this->current_action()) {
            $ids = isset($_REQUEST['id']) ? $_REQUEST['id'] : array();
            if (is_array($ids)) $ids = implode(',', $ids);

            if (!empty($ids)) {
                $wpdb->query("DELETE FROM $table_name WHERE id IN($ids)");
            }
        }
        if ('Edit' === $this->current_action()) {
            echo('Edit');
        }
    }

    /**
     * [REQUIRED] This is the most important method
     *
     * It will get rows from database and prepare them to be showed in table
     */
    function prepare_items()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'cte'; // do not forget about tables prefix
         $table_name='oop_parliamentary_info';

        $per_page = 5; // constant, how much records will be shown per page

        $columns = $this->get_columns();
        $hidden = array();
        $sortable = $this->get_sortable_columns();

        // here we configure table headers, defined in our methods
        $this->_column_headers = array($columns, $hidden, $sortable);

        // [OPTIONAL] process bulk action if any
        $this->process_bulk_action();

        // will be used in pagination settings
        $total_items = $wpdb->get_var("SELECT COUNT(ParliamentaryID) FROM $table_name");

        // prepare query params, as usual current page, order by and order direction
        $paged = isset($_REQUEST['paged']) ? max(0, intval($_REQUEST['paged']) - 1) : 0;

        $orderby = (isset($_REQUEST['orderby']) && in_array($_REQUEST['orderby'], array_keys($this->get_sortable_columns()))) ? $_REQUEST['orderby'] : 'name';
        $order = (isset($_REQUEST['order']) && in_array($_REQUEST['order'], array('asc', 'desc'))) ? $_REQUEST['order'] : 'asc';



        // [REQUIRED] define $items array
        // notice that last argument is ARRAY_A, so we will retrieve array
        $this->items = $wpdb->get_results($wpdb->prepare("SELECT Title,StartDate,EndDate,ParliamentaryID  FROM oop_parliamentary_info  ", $per_page, $paged), ARRAY_A);
       // $this->items = $wpdb->get_results($wpdb->prepare("SELECT Title,StartDate,EndDate FROM oop_parliamentary_info   ORDER BY $orderby $order LIMIT 100 OFFSET 10 ", $per_page, $paged), ARRAY_A);
        //echo(serialize($this->.);
        //$this->column_name("StartDate");
        //loop thorough this and fpormat 
        foreach ($this->items as $item ) {
                 static $row_class = '';
                   $row_class = ( $row_class == '' ? ' class="alternate"' : '' );

               echo '<tr' . $row_class . '>';
              // $this->single_row_columns( $item );
               echo '</tr>';
        }
        // [REQUIRED] configure pagination
        $this->set_pagination_args(array(
            'total_items' => $total_items, // total items defined above
            'per_page' => $per_page, // per page constant defined at top of method
            'total_pages' => ceil($total_items / $per_page) // calculate pages count
        ));
    }


     function single_row_columns($item) {
		list($columns, $hidden) = $this->get_column_info();
			foreach ($columns as $column_name => $column_display_name) {
				   $class = "class='$column_name column-$column_name'";

				   $style = '';
				if (in_array($column_name, $hidden))
					$style = ' style="display:none;"';
					$attributes = "$class$style";
					if ('cb' == $column_name) {
						   echo  "<td $attributes>";
						  // echo '<input type="checkbox" name="id[]" value="%s" />', $item['ID'];
						   echo "</td>";
					}
					elseif ('ParliamentaryID' == $column_name) {
							   echo "<td $attributes>";
							  //echo '<a href="#">', $item['ParliamentaryID'];
							   echo '<a href="#">', '';
							   echo "</a>";

								   echo "<div class='row-actions'><span class='edit'>";
						   echo sprintf('<a class="editParlRow"  href="?page=%s&action=%s&gid=%s">Edit</a>',$_REQUEST['page'],'edit',$item['ParliamentaryID']);
								   echo "</span> | <span class='trash'>";
						   echo sprintf('<a href="?page=%s&action=%s&gid=%s">Delete</a>',$_REQUEST['page'],'delete',$item['ParliamentaryID']);
						   echo "</span></div></td>";
					}
					else {
						echo "<td $attributes>";
						echo $this->column_default( $item, $column_name );
						echo "</td>";
					} 
			} 
		} 
		
		
}
$chirag_admin = new Chirag_Admin();

