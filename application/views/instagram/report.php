<div class="row">
    <div class="col-lg-3">
        <div class="widget style1 yellow-bg">
            <div class="row">
                <div class="col-xs-4 text-center">
                    <div class="m-b-sm">
                        <img alt="image" width="56" class="img-circle" src="<?php echo $user->profile_picture ?>">
                    </div>
                </div>
                <div class="col-xs-8 text-right">
                    <span> <?php echo $user->full_name ?> </span>

                    <h2 class="font-bold"><?php echo mb_strimwidth($user->username, 0, 15, "...");  ?></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="widget style1 navy-bg">
            <div class="row">
                <div class="col-xs-4">
                    <i class="fa fa-picture-o fa-5x"></i>
                </div>
                <div class="col-xs-8 text-right">
                    <span> Total Posts </span>

                    <h2 class="font-bold"><?php echo $user->counts->media ?></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="widget style1 yellow-bg">
            <div class="row">
                <div class="col-xs-4">
                    <i class="fa fa-user fa-5x"></i>
                </div>
                <div class="col-xs-8 text-right">
                    <span> Total Followers </span>

                    <h2 class="font-bold"><?php echo $user->counts->followed_by ?></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="widget style1 navy-bg">
            <div class="row">
                <div class="col-xs-4">
                    <i class="fa fa-thumbs-o-up fa-5x"></i>
                </div>
                <div class="col-xs-8 text-right">
                    <span> Total Followings </span>

                    <h2 class="font-bold"><?php echo $user->counts->follows ?></h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row animated fadeInRight">
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Hashtag Chart</h5>
        </div>
        <div class="ibox-content">
                <div style="width: 100%!important;">
                <canvas id="barChart" height="70"></canvas>

                </div>


        </div>
    </div>
    </div>

</div>

<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Hashtag Report</h5>
            </div>
            <div class="ibox-content">

                <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>Popular #tags used in posts</th>
                        <th>No. of times # was used</th>
                        <th>Total ‘Likes’ received to posts with # </th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php foreach($posts as $key =>$item){ ?>

                        <tr class="gradeX">
                            <td><?php echo $key ?></td>
                            <td><?php echo $item['count'] ?></td>
                            <td><?php echo $item['likes'] ?></td>

                        </tr>

                    <?php } ?>

                    </tbody>

                </table>

            </div>
        </div>
    </div>
</div>