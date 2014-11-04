<?php
$rs = FALSE;
$q = '';
if(isset($_GET['q'])){
    $rs = TRUE;
    $GID = '009361176712058116504:muah0e6keec';
    $GKEY = 'AIzaSyAhab2DKOCZy5skCTa071DOVMH-NC02nbk';
    $p = isset($_GET['p']) ? intval($_GET['p']) : 0;
    $start = $p * 10 + 1;
    $q = $_GET['q'];
    $url = "https://www.googleapis.com/customsearch/v1?key={$GKEY}&cx={$GID}&num=10&q=".urlencode($q)."&start=$start";
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, $url); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt($ch, CURLOPT_REFERER, 'http://search.4705648.com'); 
    $body = curl_exec($ch); 
    curl_close($ch); 
    $data = json_decode($body);
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
    <script type="text/javascript" src="lib/modernizr.js"></script>
    <style type="text/css">
    .row {margin-top: 2rem;}
    .summary {font-size: 0.8rem;}
    h5 {font-size:0.5rem;}
    </style> 
</head>
<body>
    <div class="row">
        <div class="large-6 large-offset-3 columns">
            <div class="row collapse postfix-round">
                <form id="sf" method="get">
                <div class="small-9 columns">
                  <input type="text" name="q" value="<?php print $q; ?>" placeholder="偷偷搜" />
		          <input type="hidden" name="p" id="p" value="0"/>
                </div>
                <div class="small-3 columns">
                  <a href="#" class="button postfix" onclick="$('#sf').submit();return false;">Go</a>
                </div>
                </form>
            </div>
            <div class="row">
                <div class="small-10 small-offset-1 columns summary">
                    如果你喜欢本站，请尽一份心力，以支持本站的持续运营。支付宝账号：<strong>robchen@126.com</strong>，捐款会被用于支付本站的服务器和流量费用。
                </div>
            </div>
        </div>
    </div>
    <hr />
    <?php if(!empty($data)){ ?>
	<?php foreach($data->items as $item){ ?>
	<div class="row">
		<div class="large-10 large-offset-1 columns">
            <div class="row">
                <a href="<?php print $item->link; ?>" target="_blank"><?php print $item->htmlTitle; ?></a>
            </div>
            <div class="row summary">
                <?php print $item->htmlSnippet ;?>
            </div>
            <div class="row">
                <h5><?php print $item->displayLink; ?></h5>
            </div>
        </div>
	</div>
    <?php 
        }
        $total = round($data->queries->nextPage[0]->totalResults, 10);
	if($total > 1){
            $ps = $p - 10 > 0 ? $p - 10 : 0;
            $pe = $p + 10 > $total ? $total : $p + 10;
    ?>
    <hr/>
    <div class="row">
    <div class="large-10 large-offset-1 columns">
    <ul class="pagination">
      <li class="arrow unavailable"><a href="#" class="page" data-page="<?php print $p - 1 ;?>">«</a></li>
      <?php for($i = $ps; $i <= $pe; $i ++){ ?>
      <li <?php if($i == $p){?>class="current"<?php } ?>><a href="#" class="page" data-page="<?php print $i ?>"><?php print $i + 1 ?></a></li>
      <?php } ?>
      <li class="arrow"><a href="#" class="page" data-page="<?php print $p + 1 ;?>">»</a></li>
    </ul>
    </div>
    </div>
    <?php
        }
    }else{ ?>
    <div class="row">
        <div class="large-4 large-offset-4 columns"><?php if(isset($q)){?>没有结果<?php }else{?>请输入关键词<?php } ?></div>
    </div>
    <?php } ?>
    <script type="text/javascript" src="lib/jquery.js"></script>
    <script type="text/javascript" src="lib/fastclick.js"></script>
    <script type="text/javascript" src="lib/foundation/js/foundation.min.js"></script>
    <script type="text/javascript">
    $(document).foundation();
    $(document).ready(function(){
        $('.page').click(function(){
            var page = $(this).data('page');
            $('#p').val(page);
            $('#sf').submit();
            return false;    
        });
    });
    </script>
</body>
