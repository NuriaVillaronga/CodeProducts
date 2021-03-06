<?php

namespace App\Tests;

use Symfony\Component\Panther\PantherTestCase;

class NewObjectTest extends PantherTestCase
{

    //Crear contributor desde usuario existente
    public function testCreateContributor(): void
    {
        $client = static::createClient();

        $client->followRedirects(true);

        $crawler = $client->request('GET', '/login');
        
        $form = $crawler->filter('#sign-in')->form([
            'email' => 'nuria.villaronga@gmail.com',
            'password' => 'nuria'
        ]);
        
        $crawler = $client->submit($form);

        $link = $crawler->filter('#addContributor')->link();
        $crawler = $client->click($link);

        $this->assertEquals('http://localhost/user/7/catalog/6/update/product/21', $crawler->getUri());

        /*
        $form1 = $crawler->filter('#save-user')->form([
            'form[name]' => 'Sofia Villaronga',
            'form[email]' => 'sofia.villaronga@gmail.com',
            'form[password]' => 'sofia',
            'form[isActive]' => 1,
            'form[isDeleted]' => 0,
            'form[roles]' => ["ROLE_USER"]
        ]);
        
        $crawler = $client->submit($form1);

        $this->assertEquals('http://localhost/list', $crawler->getUri());
        */
    }

    /* Utilizando webTestCase
    public function testCreateUser_Admin(): void
    {
        $client = static::createClient();

        $client->followRedirects(true);

        $crawler = $client->request('GET', '/login');
        
        $form = $crawler->filter('#sign-in')->form([
            'email' => 'nuria.villaronga@gmail.com',
            'password' => 'nuria'
        ]);
        
        $crawler = $client->submit($form);

        $link = $crawler->filter('#create')->link();
        $crawler = $client->click($link);

        $this->assertEquals('http://localhost/create', $crawler->getUri());

        $form1 = $crawler->filter('#save-user')->form([
            'form[name]' => 'Sofia Villaronga',
            'form[email]' => 'sofia.villaronga@gmail.com',
            'form[password]' => 'sofia',
            'form[isActive]' => 1,
            'form[isDeleted]' => 0,
            'form[roles]' => ["ROLE_USER"]
        ]);
        
        $crawler = $client->submit($form1);

        $this->assertEquals('http://localhost/list', $crawler->getUri());
    }
    
    public function testCreateUser_NameExists_Admin(): void
    {
        $client = static::createClient();

        $client->followRedirects(true);

        $crawler = $client->request('GET', '/login');
        
        $form = $crawler->filter('#sign-in')->form([
            'email' => 'nuria.villaronga@gmail.com',
            'password' => 'nuria'
        ]);
        
        $crawler = $client->submit($form);

        $link = $crawler->filter('#create')->link();
        $crawler = $client->click($link);

        $this->assertEquals('http://localhost/create', $crawler->getUri());

        $form1 = $crawler->filter('#save-user')->form([
            'form[name]' => 'Sofia Villaronga',
            'form[email]' => 's.villaronga@gmail.com',
            'form[password]' => 'sofia',
            'form[isActive]' => 1,
            'form[isDeleted]' => 1,
            'form[roles]' => ["ROLE_USER"]
        ]);
        
        $crawler = $client->submit($form1);

        $this->assertEquals('http://localhost/list', $crawler->getUri());
    }

    public function testCreateUser_EmailExists_Admin(): void
    {
        $client = static::createClient();

        $client->followRedirects(true);

        $crawler = $client->request('GET', '/login');
        
        $form = $crawler->filter('#sign-in')->form([
            'email' => 'nuria.villaronga@gmail.com',
            'password' => 'nuria'
        ]);
        
        $crawler = $client->submit($form);

        $link = $crawler->filter('#create')->link();
        $crawler = $client->click($link);

        $this->assertEquals('http://localhost/create', $crawler->getUri());

        $form1 = $crawler->filter('#save-user')->form([
            'form[name]' => 'S Villaronga',
            'form[email]' => 'sofia.villaronga@gmail.com',
            'form[password]' => 'sofia',
            'form[isActive]' => 0,
            'form[isDeleted]' => 0,
            'form[roles]' => ["ROLE_USER"]
        ]);
        
        $crawler = $client->submit($form1);

        $this->assertNotEquals('http://localhost/list', $crawler->getUri()); //No puede permitir crear el usuario, por lo que se quedar?? en la ruta /create, y no coincidir?? con /list
    }

    public function testCreateUser_User(): void
    {
        $client = static::createClient();

        $client->followRedirects(true);

        $crawler = $client->request('GET', '/login');
        
        $form = $crawler->filter('#sign-in')->form([
            'email' => 'milena.villaronga@gmail.com',
            'password' => 'milena'
        ]);
        
        $crawler = $client->submit($form);

        $link = $crawler->filter('#createDisable')->link(); 
        $crawler = $client->click($link);

        $this->assertNotEquals('http://localhost/create', $crawler->getUri());
    }*/
}
