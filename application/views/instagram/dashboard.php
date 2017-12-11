<style>

    @font-face{font-family:'Calluna';
        src:url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/4273/callunasansregular-webfont.woff') format('woff');
    }
    body {

    }
    #columns {
        column-width: 320px;
        column-gap: 15px;
        width: 90%;
        margin: 50px auto;
        -webkit-column-width:320px;
        -webkit-column-gap: 15px;
        -moz-column-gap: 15px;
        -moz-column-width: 320px;
    }

    div#columns figure {
        background: #fefefe;
        border: 2px solid #fcfcfc;
        box-shadow: 0 1px 2px rgba(34, 25, 25, 0.4);
        margin: 0 2px 15px;
        padding: 15px;
        padding-bottom: 10px;
        display: inline-block;

    }

    div#columns figure img {
        width: 100%; height: auto;
        border-bottom: 1px solid #ccc;
        padding-bottom: 15px;
        margin-bottom: 5px;
    }

    div#columns figure figcaption {
        font-size: 14px;
        color: #444;
        line-height: 1.5;
    }

    div#columns small {
        font-size: 1rem;
        float: right;
        text-transform: uppercase;
        color: #aaa;
    }

    div#columns small a {
        color: #666;
        text-decoration: none;
        transition: .4s color;
    }

    div#columns:hover figure:not(:hover) {
        opacity: 0.6;
    }

    @media screen and (max-width: 750px) {
        #columns { column-gap: 0px; }
        #columns figure { width: 100%; }
    }

</style>
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

    <div id="columns">

   <?php foreach($posts as $media) {?>

       <figure>
           <div class="ibox-content no-padding border-left-right">
               <img alt="image" class="img-responsive" src="<?php echo $media->images->standard_resolution->url ?>" >
           </div>
           <figcaption style="height:auto">
               <?php if(!empty($media->location->name)){ ?>
               <p><i class="fa fa-map-marker"></i><?php echo $media->location->name ?></p>
               <?php }?>
               <p>
                   <?php echo $media->caption->text ?>
               </p>
               <div class="row m-t-lg">
                   <div class="actions"  style="padding-left: 10px;">
                       <a href="<?php echo $media->link ?>" target="_blank" class="btn btn-xs btn-primary"><i class="fa fa-comment"> </i> <?php echo (isset( $media->comments->count))? $media->comments->count : 0 ?> Comments</a>
                       <a href="<?php echo $media->link ?>" target="_blank"  class="btn btn-xs btn-danger"><i class="fa fa-heart"></i> <?php echo (isset( $media->likes->count))? $media->likes->count : 0 ?> Likes</a>
                       <a href="<?php echo $media->link ?>" target="_blank" class="btn btn-xs btn-warning"><i class="fa fa-user"></i> <?php echo (isset( $media->users_in_photo->count))? $media->users_in_photo->count : 0 ?> Tags</a>
                   </div>

               </div>
           </figcaption>
       </figure>
    <?php } ?>
    </div>
</div>