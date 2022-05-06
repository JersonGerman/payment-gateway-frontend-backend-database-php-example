<?php

/**
 * Get the client
 */
require_once __DIR__ . '/vendor/autoload.php';

/**
 * Define configuration
 */

/* Username, password and endpoint used for server to server web-service calls */
Lyra\Client::setDefaultUsername("44842422");
Lyra\Client::setDefaultPassword("testpassword_GYlAyCPpf2qQCDRGWjxv0qJDqW6F064GY7TmdBefPZEiz");
Lyra\Client::setDefaultEndpoint("https://api.micuentaweb.pe");

/* publicKey and used by the javascript client */
Lyra\Client::setDefaultPublicKey("44842422:testpublickey_Az8ibtrm5cAhb3aOt1g20oQtgpR14c9TSdPYSVhqFlj2P");

/* SHA256 key */
Lyra\Client::setDefaultSHA256Key("ZjbNRAlxT6FCG1UITWqr6gg9ukABNMoKozihudREXvIOI");
