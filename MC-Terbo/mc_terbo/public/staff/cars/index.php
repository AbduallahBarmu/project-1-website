<?php require_once('../../../private/initialize.php'); ?>
<?php require_login(); ?>
<?php


$current_page = $_GET['page'] ?? 1;
$per_page = 4;
$total_count = car::count_all();

$pagination = new Pagination($current_page, $per_page, $total_count);




$sql = "SELECT * FROM cars ";
$sql .= "LIMIT {$per_page} ";
$sql .= "OFFSET {$pagination->offset()}";
$terbo = car::find_by_sql($sql);


?>
<?php $page_title = 'car'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div class="bicycles listing">
    <h1>Cars</h1>

    <div class="actions">
      <a class="action" href="<?php echo url_for('/staff/cars/new.php'); ?>">Add cars</a>
    </div>

  	<table class="list">
      <tr>
        <th>ID</th>
        <th>Brand</th>
        <th>Model</th>
        <th>Year</th>
        <th>Category</th>
        <th>Color</th>
        <th>Price</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>

      <?php foreach($terbo as $car) { ?>
        <tr>
          <td><?php echo h($car->id); ?></td>
          <td><?php echo h($car->brand); ?></td>
          <td><?php echo h($car->model); ?></td>
          <td><?php echo h($car->year); ?></td>
          <td><?php echo h($car->category); ?></td>
          <td><?php echo h($car->color); ?></td>
          <td><?php echo h($car->price); ?></td>
          <td><a class="action" href="<?php echo url_for('/staff/cars/show.php?id=' . h(u($car->id))); ?>">View</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/cars/edit.php?id=' . h(u($car->id))); ?>">Edit</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/cars/delete.php?id=' . h(u($car->id))); ?>">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>

<?php
  $url=url_for('/staff/cars/index.php');
 echo $pagination->page_links($url);
 ?>





  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
