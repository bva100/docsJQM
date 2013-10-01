<?php

require_once 'pipestack-sdk-php-master/sdk/PipeStackFactory.php';

$nodeSlug = $_GET['slug'];
if ( ! $nodeSlug ){
    $nodeSlug = 'docs/intro';
}

$PipeStack = PipeStackFactory::build();
try{
    $response = $PipeStack->get('nodes?slug='.$nodeSlug.'&fields=title,views,id');
}catch (PipeStackException $e){
    echo  '<h1>Ooopps!</h1><p>', $e->getMessage(), '</p>';
}
$nodes = $response->nodes;
$node = $nodes[0];
?>

<!DOCTYPE html>
<html>
<head>
    <title>PipeStack Developers</title>
    <meta name="apple-mobile-web-app-title" content="PipeStack">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.css" />
</head>
<body>

    <div data-role="page" data-theme="c">

        <div data-role="header">
            <a data-icon="arrow-l" data-rel="back">back</a>
            <h1>PipeStack Docs</h1>
            <a href="dialogs/browse.php" data-role="button" data-icon="home" data-prefetch>menu</a>
        </div>

        <div data-role="content">
            <h1 style="text-align: center"><?php echo ucwords($node->title) ?></h1>
            <p><?php echo wordwrap($node->views->html); ?></p>
        </div>

        <a data-role="button" data-theme="b" href="dialogs/browse.php">Explore the Docs</a>

    </div>

<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>
    <script type="text/javascript">
        $(document).on( "pageinit", function( event ) {
            $("pre").hide();
        });
    </script>
</body>
</html>