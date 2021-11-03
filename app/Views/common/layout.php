<?php echo view('common/header');?>

<?php echo view('common/menu');?>

<?php if(isset($body)){ echo view($body);} ?>
        
<?php echo view('common/footer');?>