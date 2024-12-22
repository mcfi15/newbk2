<?php include 'header.php'; ?>


    <div class="reg-top">
        <div class="container h-100">
            <div class="h-100 d-flex justify-content-center align-items-center">
                <div class="shadow">
                    <div class="bg-light rounded">

                        <div class="pl-5 mt-2 py-3">
                            <a href="<?php echo $siteurl; ?>" class=" mb-0 d-flex align-items-center navbar-brand">

                                <i class='fa fa-home' style='font-size:35px;color:black; align-content: center;'></i>
                                

                            </a>
                        </div>
                        <form class="p-4 mt-2" action="#" method="POST">
                            <div class="form-group">
                                 <label for="email">Email</label>
                                <div class="input-group">
                                    <div class="input-group-prepend d-flex align-items-center justify-content-center">
                                        <span class="input-group-text fa fa-envelope text-purple" style="font-size: 1.5em;"></span>
                                    </div>
                                    <input type="text" name="id" id="id" class="form-control" required>
                                </div>
                                <span class="help-block text-danger"></span>
                            </div>


                            <div class="text-center my-4">
                                <button type="submit" name="check_id" class="btn btn-block btn-outline-purple rounded">Submit</button>
                            </div>
                            <div>
                                <!-- <a href="" class="text-purple">Forgot User ID?</a> -->
                            </div>
                            <div class="my-3 mr-auto">
                                <a href="login" class="text-purple">Back to Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include 'footer.php'; ?>