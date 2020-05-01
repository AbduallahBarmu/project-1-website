<?php

require_once('../../../private/initialize.php');
require_login();

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/cars/index.php'));
}
$id = $_GET['id'];
$car = car::find_by_id($id);
if($car == false) {
  redirect_to(url_for('/staff/cars/index.php'));
}

if(is_post_request()) {

  // Delete bicycle
  $result = $car->delete();
  $session->message('The car was deleted successfully.');
  redirect_to(url_for('/staff/cars/index.php'));

} else {

}

?>

<?php $page_title = 'Delete car'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/cars/index.php'); ?>">&laquo; Back to List</a>

  <div class="car delete">
    <h1>Delete car</h1>
    <p>Are you sure you want to delete this car?</p>
    <p class="item"><?php echo h($car->name()); ?></p>

    <form action="<?php echo url_for('/staff/cars/delete.php?id=' . h(u($id))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete car" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
