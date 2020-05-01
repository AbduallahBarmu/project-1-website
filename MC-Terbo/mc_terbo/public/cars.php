<?php require_once('../private/initialize.php'); ?>

<?php $page_title = 'Inventory'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="main">

  <div id="page">
    <div class="intro">
      <img class="inset" src="<?php echo url_for('/images/car2.jpg') ?>" />
      <h2>Our Inventory  Used for sport cars</h2>
      <p> Choose the favorite car </p>
    </div>

    <table id="inventory">
      <tr>
        <th>Brand</th>
        <th>Model</th>
        <th>Year</th>
        <th>Category</th>
        <th>Color</th>
        <th>Price</th>
        <th>&nbsp;</th>
      </tr>
<?php

 $mc = car::find_all();

?>
      <?php foreach($mc as $terbo) { ?>
      <tr>
        <td><?php echo h($terbo->brand); ?></td>
        <td><?php echo h($terbo->model); ?></td>
        <td><?php echo h($terbo->year); ?></td>
        <td><?php echo h($terbo->category); ?></td>
        <td><?php echo h($terbo->color ); ?></td>
        <td><?php echo h(money_format('$%i', $terbo->price)); ?></td>
        <td><a href="detail.php?id=<?php echo $terbo->id; ?>">View</a></td>
      </tr>
      <?php } ?>

    </table>
  </div>
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
