<?php return array (
  'logs' => 
  array (
    'path' => 'backup/logs/log',
    'type' => 'file',
  ),
  'DB' => 
  array (
    'type' => 'mysqli',
    'tablePre' => 'eter',
    'read' => 
    array (
      0 => 
      array (
        'host' => 'localhost:3306',
        'user' => 'root',
        'passwd' => '19940527',
        'name' => 'eter',
      ),
    ),
    'write' => 
    array (
      'host' => 'localhost:3306',
      'user' => 'root',
      'passwd' => '19940527',
      'name' => 'eter',
    ),
  ),
  'interceptor' => 
  array (
    0 => 'themeroute@onCreateController',
    1 => 'layoutroute@onCreateView',
    2 => 'hookCreateAction@onCreateAction',
    3 => 'hookFinishAction@onFinishAction',
  ),
  'langPath' => 'language',
  'viewPath' => 'views',
  'skinPath' => 'skin',
  'classes' => 'classes.*',
  'rewriteRule' => 'url',
  'theme' => 
  array (
    'pc' => 
    array (
      'sysseller' => 'blue',
      'default' => 'blue',
      'sysdefault' => 'blue',
    ),
    'mobile' => 
    array (
      'sysseller' => 'default',
      'default' => 'blue',
      'sysdefault' => 'blue',
    ),
  ),
  'timezone' => 'Etc/GMT-8',
  'upload' => 'upload',
  'dbbackup' => 'backup/database',
  'safe' => 'cookie',
  'lang' => 'zh_sc',
  'debug' => false,
  'configExt' => 
  array (
    'site_config' => 'config/site_config.php',
  ),
  'encryptKey' => '63b1fe03c0de10b92eeb198bce4dc03e',
  'authorizeCode' => '',
)?>