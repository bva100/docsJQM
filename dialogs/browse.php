<?php

require_once '../pipestack-sdk-php-master/sdk/PipeStackFactory.php';

$PipeStack = PipeStackFactory::build();
try{
    $response = $PipeStack->get('nodes?contentTypeName=docs&fields=title,slug,id');
}catch (PipeStackException $e){
    echo  '<h1>Ooopps!</h1><p>', $e->getMessage(), '</p>';
}

//foreach ($response->nodes as $node) {
//    echo '<pre>', \var_dump($node);
//}
//die();

?>

<!DOCTYPE html>
<html>
<head>
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PipeStack Developers</title>
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.css" />
</head>
<body>

<div data-role="page">
    <div data-role="header">
        <h1 class="ui-title" role="heading" aria-level="1">Browse Docs</h1>
    </div>
    <div data-role="content">
        <ul data-role="listview" data-inset="true" data-filter="true">
            <?php foreach($response->nodes as $node): ?>
                <li data-small="true"><a href="/index.php?slug=<?php echo $node->slug ?>" data-prefetch><?php echo ucwords($node->title) ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>
</body>
</html>
