<main>
  <section>
    <?=validation_errors('<p class="error-msg">', '</p>');?>

    <?php if ($this->session->flashdata('message') !== null): ?>

      <p class="success-msg"><?=$this->session->flashdata('message');?></p>

    <?php endif;?>

  </section>

  <?=form_open('comments/post', array('id' => 'comment-form'));?>

    <fieldset>
      <legend><?=$this->lang->line('form_legend')?></legend>

      <div>
        <label for="name"><?=$this->lang->line('form_input_name')?></label>
        <input type="text" id="name" name="name" placeholder="<?=$this->lang->line('form_input_name_placeholder')?>" required>
      </div>

      <div>
        <label for="comment"><?=$this->lang->line('form_input_comment')?></label>
        <textarea name="comment" id="comment" cols="30" rows="5" placeholder="<?=$this->lang->line('form_input_comment_placeholder')?>" required></textarea>
      </div>

      <input type="submit" value="<?=$this->lang->line('form_submit_btn')?>">
    </fieldset>

  </form>

  <h4><?= $this->lang->line('recent_comments') ?></h4>
  <ul>

      <?php foreach ($comments as $comment): ?>

        <li>
           <strong><?=ucfirst($comment['user']);?></strong>
            <em><?=$comment['created_at']->toDateTime()->format('Y-M-d H:i:s');?></em>
            <p><?=$comment['comment'];?></p>
        </li>

      <?php endforeach;?>


  </ul>
</main>