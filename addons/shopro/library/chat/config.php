<?php

return array (
  'type' => 'shopro',
  'basic' => 
  array (
    'last_customer_service' => 1,
    'allocate' => 'busy',
    'notice' => '小喵主人，很高兴为您服务!',
  ),
  'system' => 
  array (
    'is_ssl' => 0,
    'ssl_cert' => '/www/server/panel/vhost/cert/****/fullchain.pem',
    'ssl_key' => '/www/server/panel/vhost/cert/****/privkey.pem',
    'gateway_port' => 1819,
    'gateway_num' => 2,
    'gateway_start_port' => 2010,
    'business_worker_port' => 2238,
    'business_worker_num' => 4,
  ),
);