<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?=$title;?></title>

  <link rel="stylesheet" href="<?=base_url('resources/css/style.css');?>">
  <script src="<?=base_url('resources/js/jquery-3.5.1.min.js');?>" defer></script>
  <script src="<?=base_url('resources/js/index.js');?>" defer></script>
</head>
<body>

  <header>
    <h2><a href="<?=site_url('/');?>">CodeIgniter Demo</a></h2>
    <nav>
      <a href="<?=site_url('home');?>"><?=$this->lang->line('link_home')?></a>
      <a href="<?=site_url('about');?>"><?=$this->lang->line('link_about')?></a>
      <a href="<?=site_url('comments');?>"><?=$this->lang->line('link_comments')?></a>

      <form id="lang-switch" action="<?=site_url('language/change');?>" method="post">
        <select name="language">
        
          <option value="english" <?=($language === 'english') ? 'selected' : ''?>  ><?=$this->lang->line('english')?></option>
          <option value="bangla" <?=($language === 'bangla') ? 'selected' : ''?> ><?=$this->lang->line('bangla')?></option>
          <option value="hindi" <?=($language === 'hindi') ? 'selected' : ''?> ><?=$this->lang->line('hindi')?></option>

        </select>

        <input type="hidden" name="redirect-url" value="<?=current_url()?>">


      </form>

    </nav>
  </header>
