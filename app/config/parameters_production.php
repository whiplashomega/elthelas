<?php

/*
 *production server has environment variable set, dev comps do not we run this test so composer
 *update doesn't have a fit because it can't set production parameters in development.
 */
if(getenv('CLEARDB_DATABASE_URL')) {
    $db = parse_url(getenv('CLEARDB_DATABASE_URL'));


    $container->setParameter('database_driver', 'pdo_mysql');
    $container->setParameter('database_host', $db['host']);
    $container->setParameter('database_port', $db['port']);
    $container->setParameter('database_name', substr($db["path"], 1));
    $container->setParameter('database_user', $db['user']);
    $container->setParameter('database_password', $db['pass']);
    $container->setParameter('secret', getenv('SECRET'));
    $container->setParameter('locale', 'en');
    }
    else { //we are not on production, so we'll use our defaults for development servers
    $container->setParameter('database_driver', 'pdo_mysql');
    $container->setParameter('database_host', 'localhost');
    $container->setParameter('database_port', '3306');
    $container->setParameter('database_name', 'elthelas');
    $container->setParameter('database_user', 'elthelas');
    $container->setParameter('database_password', 'elthelas');
    $container->setParameter('secret', 'elthelas');
    $container->setParameter('locale', 'en');     
    }