<?php

return [
    // ClassName:method
    'Server:send' => [
        // description for method
        '_desc' => 'send data to the client',
        '_return' => 'bool If success return True, fail return False',
        // method params
        // name => type(default):description
        'server_socket' => 'int(-1):This parameter is required when sending data to the Unix Socket DGRAM peer.
        The TCP client does not need to fill in',
    ],
    // Func:function
    'Func:swoole_version' => [
        '_desc' => 'return swoole version. eg: 4.4.1'
    ],
];
