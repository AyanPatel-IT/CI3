

<form action="<?php echo base_url('login/authenticate');?>" method="post">
  <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Login System</h4>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control">    
                        <small><?php echo form_error('email')?></small>
                    </div>

                    <div class="form-group">
                        <label for="pass">Password</label>
                        <input type="password" name="pass" id="pass" class="form-control"> <br>
                        <label class="">
                            <input type="checkbox" onclick="showpass()"> Show Password
                        </label>   
                        <small><?php echo form_error('pass')?></small>
                    </div>
                   
                     <div class="form-group">
                        <button type="submit" class="btn btn-primary">Login</button>   
                    </div>
                    <?php if($this->session->flashdata('error')):?>
                        <p style="color:red;">
                            <?= $this->session->flashdata('error'); ?>
                        </p>
                    <?php endif;?>
                </div>

            </div>
        </div>
    </div>
  </div>
                    <script>
                       function showpass() {
                         const pass = document.getElementById('pass');
                         pass.type = pass.type === "password" ? "text" : "password";
                            }  
                            //Above code is similar to this 
                            // if(pass.type==="password"){
                            //     pass.type="text";
                            // }else{
                            //     pass.type="password";
                                
                            // }}
                    </script>
  </form>



