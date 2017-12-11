<div class="row">

    <?php if(isset($is_authenticate)){ ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Instagram Account</h5>
                    </div>
                    <div class="ibox-content">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Username</th>
                                <th>Key</th>
                                <th>Status</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><?php echo $is_authenticate->user_name ?></td>
                                <td><?php echo $is_authenticate->insta_key ?></td>
                                <td><?php echo ($is_authenticate->status == 1)? 'Enable' : 'Disable' ?></td>

                            </tr>
                            </tbody>
                        </table>

                        <a onclick="deleteAcc('<?php echo base_url()?>/insta/deleteAccount<?php echo $item->page_id ?>','')"  class="btn btn-danger" type="submit">Delete Profile</a>
                    </div>
                </div>
            </div>
        </div>

    <?php }elseif( $_SESSION['showSettings'] ==1 ){ ?>
        <div class="col-lg-12">

            <div class="ibox float-e-margins">
                <div class="ibox-title">
                </div>
                <div class="ibox-content">
                    <a class="btn btn-success btn-facebook" href="<?php echo $loginUrl ?>">
                        <i class="fa fa-instagram"> </i> Authenticate
                    </a>
                </div>
            </div>

        </div>


    <?php }else{ ?>

        <div class="col-lg-12">

            <div class="ibox float-e-margins">
                <div class="ibox-title">
                </div>
                <div class="ibox-content">
                    <a class="btn btn-success btn-facebook" href="<?php echo $loginUrl ?>">
                        <i class="fa fa-instagram"> </i> Authenticate
                    </a>
                </div>
            </div>

        </div>
    <?php }?>

