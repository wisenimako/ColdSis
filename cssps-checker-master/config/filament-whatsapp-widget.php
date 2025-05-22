<?php

use JeffersonGoncalves\WhatsappWidget\Models\WhatsappAgent;

return [
    'whatsapp_agent_resource' => [
        'cluster' => null,
        'model' => WhatsappAgent::class,
        'should_register_navigation' => true,
        'navigation_badge' => true,
        'navigation_sort' => -1,
        'slug' => 'whatsapp/whatsapp-agent',
    ],
];
