<?php
/*
 * Plugin Name: plugin feedbakck
 * Description: a simple plugin with simple form to collect user feedback
 * Version: 1.0
 * Author: karimmh7
 * Author URI: kalimu.mh7
 */


function feedback_plugin_activate()
{
  global $wpdb;
  $table_name = $wpdb->prefix . 'feedback_data';
  $charset_collate = $wpdb->get_charset_collate();

  $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        -- 8388608-8388607
        note tinyint(1) NOT NULL,   
        -- 128-127
        remark text NOT NULL,
        post_id mediumint(9) NOT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;";

  require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
  dbDelta($sql);
}
register_activation_hook(__FILE__, 'feedback_plugin_activate');


function feedback_plugin_menu()
{
  add_menu_page(
    'Feedback Plugin',
    'Feedback Plugin',
    'manage_options',
    'feedback-plugin',
    'feedback_plugin_options_page'
  );
}

// Load options page for plugin
function feedback_plugin_options_page()
{     
  $post_id = get_the_ID();

  // Check if form has been submitted
  if (isset($_POST['feedback_submit'])) {
    // Process form data here
    $note = $_POST['feedback_note'];
    $remark = $_POST['feedback_remark'];
    

    // Save data to database here
    global $wpdb;
    $table_name = $wpdb->prefix . 'feedback_data';
    $wpdb->insert(
      $table_name,
      array(
        'note' => $note,
        'remark' => $remark,
        'post_id' => $post_id
      )
    );


    // Display success message
    echo '<div class="feedback-success">Thank you for your feedback!</div>';
  }

  // Output form HTML
  echo '
  <style>
  .feedback-form {
    max-width: 600px;
    margin: 0 auto;
    margin-top: 20px;
    padding: 20px;
    background-color: #6fa8dc;
    border: 1px solid #ccc;
    border-radius: 5px;
  }
  .feedback-form h2 {
    text-align: center;
    margin-bottom: 30px;
    font-size: 28px;
  }
  .feedback-form .form-group {
    margin-bottom: 25px;
  }
  .feedback-form .form-group label {
    display: block;
    margin-bottom: 10px;
    font-size: 18px;
    font-weight: bold;
  }
  .feedback-form .form-group input,
  .feedback-form .form-group textarea {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border-radius: 5px;
    border: 1px solid #ccc;
  }
  .feedback-form .form-group input[type="submit"] {
    width: auto;
    padding: 10px 20px;
    background-color: #000;
    color: #fff;
    border: none;
    border-radius: 5px;
    font-size: 18px;
    cursor: pointer;
    transition: all 0.3s ease-in-out;
  }
  .feedback-form .form-group input[type="submit"]:hover {
    background-color: #444;
  }
  .feedback-form .btnfrm{
    display:flex;
    justidy-content:center;
    text-align:center;
  }
  .feedback-success {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #3EB489;
    color: #fff;
    text-align: center;
    border-radius: 5px;
    font-size: 18px;
    margin-top: 20px;
  }
</style>







    <div class="feedback-form">
  <h2>Leave Your Feedback</h2>
  <form method="post">
    <div class="form-group">
      <label for="feedback_note">Rank (0-5): *</label>
      <input type="number" name="feedback_note" id="feedback_note" min="0" max="5" required>
    </div>
    <div class="form-group">
      <label for="feedback_remark">feedback: *</label>
      <textarea name="feedback_remark" id="feedback_remark" required></textarea>
    </div>
   
    <div class="form-group btnfrm">
      <input type="submit" name="feedback_submit" value="Submit Feedback">
    </div>
  </form>
</div>

  ';
}


add_action('admin_menu', 'feedback_plugin_menu');



// Add shortcode for feedback form
function feedback_form_shortcode()
{
  ob_start();
  feedback_plugin_options_page();
  $output = ob_get_contents();
  ob_end_clean();
  return $output;
}

add_shortcode('feedback', 'feedback_form_shortcode');