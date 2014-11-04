<?php
$rs = FALSE;
if(isset($_GET['q'])){
    $rs = TRUE;
    $GID = '009361176712058116504:cj6hkpgdzxw';
    $GKEY = 'AIzaSyBvvxhAGflRemIopgIL-h5BKB7lb4Ci0HA';
    $start = isset($_GET['s']) ? intval($_GET['s']) : 0;
    $q = urlencode($_GET['q']);
    $url = "https://www.googleapis.com/customsearch/v1?key={$GKEY}&cx={$GID}&num=10&q={$q}";
    $data = file_get_contents($url);
    echo $data;
}
?>
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="initial-scale=1.0,user-scalable=no,maximum-scale=1,width=device-width" name="viewport" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
    <link rel="stylesheet" href="lib/foundation/css/foundation.min.css" />
    <link rel="stylesheet" href="lib/foundation-icons/foundation-icons.css" />
    <title>GSP Robin</title>
</head>
<body>
    <?php if($rs){ ?>
    
    <?php }else{ ?>
    <div class="row">
        <div class="small-6 small-offset-3 columns">
            <div class="row collapse postfix-round">
                <form id="sf" method="get">
                <div class="small-9 columns">
                  <input type="text" placeholder="关键词" name="q" />
                </div>
                <div class="small-3 columns">
                  <a href="#" class="button postfix">Go</a>
                </div>
                </form>
            </div>
        </div>
    </div>
    <?php } ?>
    <script type="text/javascript" src="lib/jquery.js"></script>
    <script type="text/javascript" src="lib/foundation/js/foundation.min.js"></script>
    <script type="text/javascript">
    
    </script>
</body>