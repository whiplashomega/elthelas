<?php

/*
 *production server has environment variable set, dev comps do not we run this test so composer
 *update doesn't have a fit because it can't set production parameters in development.
 */
if(getenv('CLEARDB_DATABASE_URL')) {
    $db = parse_url(getenv('CLEARDB_DATABASE_URL'));
    $mailerport = getenv('MAILGUN_SMTP_PASS');

    $container->setParameter('database_driver', 'pdo_mysql');
    $container->setParameter('database_host', $db['host']);
    $container->setParameter('database_port', $db['port']);
    $container->setParameter('database_name', substr($db["path"], 1));
    $container->setParameter('database_user', $db['user']);
    $container->setParameter('database_password', $db['pass']);
    $container->setParameter('secret', getenv('SECRET'));
    $container->setParameter('locale', 'en');
    $container->setParameter('mailer_transport', "smtp");
    $container->setParameter('mailer_host', getenv('MAILGUN_SMTP_SERVER'));
    $container->setParameter('mailer_user', getenv('MAILGUN_SMTP_LOGIN'));
    $container->setParameter('mailer_port', getenv('MAILGUN_SMTP_PORT'));
    $container->setParameter('mailer_password', getenv('MAILGUN_SMTP_PASS'));
    }
    else { //we are not on production, so we'll use our defaults for development servers
    $container->setParameter('database_driver', 'pdo_mysql');
    $container->setParameter('database_host', 'localhost');
    $container->setParameter('database_port', '3306');
    $container->setParameter('database_name', 'elthelas');
    $container->setParameter('database_user', 'root');
    $container->setParameter('database_password', '');
    $container->setParameter('secret', 'elthelas');
    $container->setParameter('locale', 'en');
    $container->setParameter('mailer_transport', "gmail");
    $container->setParameter('mailer_host', "smtp.gmail.com");
    $container->setParameter('mailer_user', "elthelaswebmaster@gmail.com");
    $container->setParameter('mailer_password', "gX8OkSPtoUi6#5Mw");      
    }