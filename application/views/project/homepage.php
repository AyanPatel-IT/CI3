
    <div class="container">
        <div class="row">
            <div class="col-md-12">
    <h1 class="card-header">Welcome <?= $email;?> To The Homepage  <a href="<?php echo base_url('logout');?>" class="btn btn-danger float-right mr-2">LogOut</a> <a href="<?php echo base_url('tickets');?>" class="btn btn-warning float-right mr-2">Tickets</a> </h1><br><br>
    <div class="card-body">
    <?php if($role=='admin'): ?>
        <h2>Access Level: Admin</h2>
    <?php else: ?>
         <h2>Access Level: User</h2>
    <?php endif ?>
    
</div>
        </div>
        </div>
</div>


