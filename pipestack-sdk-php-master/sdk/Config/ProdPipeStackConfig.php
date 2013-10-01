<?php

require_once 'AbstractPipeStackConfig.php';

class ProdPipeStackConfig extends AbstractPipeStackConfig {

    protected $clientId = '52461a1d18a51639178b4568';

    protected $clientSecret = '59b7289ac0';

    protected $accessToken = 'VbgA2VWy-NVciZJhElIogLEKtSXn2GjpGgjnjkJInXq9H37vvA3lLkKJt8mrpWfXWZNHCCmzR3LklYNl3H5ZTXKZSm5xIZzpFJGSofpsvkwXaWMLQDR90wqPkoAHNI9A';

    protected $protocol = 'http://';

    protected $format = 'json';

    protected $hostname = 'api.pipestack.com';

    protected $timeout = 20;

}