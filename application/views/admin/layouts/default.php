<?php $this->load->view('admin/layouts/header');?>

<div class="content-wrapper">
<section class="content-header">
    <h1><?php echo $page_title; ?></h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?php echo $page_title; ?></li>
    </ol>
</section>

<section class="content">
<?php echo $content; ?>
</section
</div>

<?php $this->load->view('admin/layouts/footer');?>