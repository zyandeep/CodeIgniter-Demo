<main>
  <article><?=$content;?></article>

  <?php if (is_array($dashboard)): ?>

    <section class="dashboard">
      <p>Received :: <?=$dashboard['received'];?></p>
      <p>Pending :: <?=$dashboard['pending'];?></p>
      <p>Pending in Time :: <?=$dashboard['pending_in_time'];?></p>
      <p>Delivered :: <?=$dashboard['delivered'];?></p>
      <p>Timely Delivered :: <?=$dashboard['timely_delivered'];?></p>
    </section>

  <?php else: ?>

    <p class="error-msg"><?=$dashboard;?></p>

  <?php endif;?>


</main>