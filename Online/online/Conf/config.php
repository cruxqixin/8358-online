<?php
return array(
// 	//'配置项'=>'配置值'

//     // 开启路由
    'URL_ROUTER_ON' => true,
    'URL_ROUTE_RULES' => array(
        'Index/info/:uid' => 'Index/info',
        'Index/info_c/:uid' => 'Index/info_c',
        'Index/info_b/:uid' => 'Index/info_b',
    ),
);