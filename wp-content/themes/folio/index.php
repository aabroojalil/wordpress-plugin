<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPres
 * @subpackage ajalil
 * @since ajalil */
get_header();
?>

<h2><b>Contact Form<b></h2>    
<form action = "<?php $_PHP_SELF ?>" method = "POST">
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" name = "name" id="name" placeholder="Enter your name"/>
    </div>
    <div class="form-group">
        <label for="email">email:</label>
        <input type="email" class="form-control" name = "email" id="email" placeholder="Enter Email"/>
    </div>
    <div  class="form-group">
        <label for="sub">subject</label>
        <input type="text" class="form-control" name="sub" id="sub" placeholder="enter subject"/>

    </div>
    <div  class="form-group">
        <label for="message">message</label>
        <input type="text" class="form-control" name="message" id="message" placeholder="enter message"/>

    </div>

    
     <div class="col-md-6 text-right"> <button type="submit" class="btn btn-primary">Submit</button> </div>

</form>
<?php
/* @var $name type */
if (isset($_POST['name']) && isset($_POST['email'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $sub = $_POST['sub'];
    $msg = $_POST['message'];
}
//php mailer variables
$to = get_option('admin_email');
$subject = "Someone sent a message from " . get_bloginfo('name');
$headers = 'From: ' . $email . "\r\n" .
        'Reply-To: ' . $email . "\r\n";

wp_mail($to, $subject, $msg, $headers);

 //message wasn't sent


get_footer(); 

