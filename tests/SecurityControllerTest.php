<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SecurityControllerTest extends WebTestCase
{  
    public function testLetRedirect_User_Active_NoDeleted(): void
    {
        $client = static::createClient();
        
        $client->followRedirects(true);
        
        $crawler = $client->request('GET', '/create');
        
        $form = $crawler->filter('#sign-in')->form([
            'email' => 'juana.villaronga@gmail.com',
            'password' => 'juana'
        ]);
        
        $crawler = $client->submit($form);

        $this->assertEquals('http://localhost/homepage', $crawler->getUri());
    }

    public function testLoginNoActive_NoDeleted(): void
    {
        $client = static::createClient();
        
        $client->followRedirects(true);

        $crawler = $client->request('GET', '/login');
        
        $form = $crawler->filter('#sign-in')->form([
            'email' => 'xura.villaronga@gmail.com',
            'password' => 'xura'
        ]);
        
        $crawler = $client->submit($form);
        
        $this->assertNotEquals('http://localhost/', $crawler->getUri());
        $this->assertEquals('http://localhost/login', $crawler->getUri());
    }

    public function testLoginActive_Deleted(): void
    {
        $client = static::createClient();
        
        $client->followRedirects(true);

        $crawler = $client->request('GET', '/login');
        
        $form = $crawler->filter('#sign-in')->form([
            'email' => 'milena.villaronga@gmail.com',
            'password' => 'milena'
        ]);
        
        $crawler = $client->submit($form);
        
        $this->assertNotEquals('http://localhost/', $crawler->getUri());
        $this->assertEquals('http://localhost/login', $crawler->getUri());
    }
    
    public function testLoginLogoutUser_Active_NoDeleted(): void
    {
        $client = static::createClient();
        
        $client->followRedirects(true);

        $crawler = $client->request('GET', '/login');
        
        $form = $crawler->filter('#sign-in')->form([
            'email' => 'juana.villaronga@gmail.com',
            'password' => 'juana'
        ]);
        
        $crawler = $client->submit($form);
        
        $this->assertEquals('http://localhost/', $crawler->getUri());

        $link = $crawler->filter('#logout')->link();
        $crawler = $client->click($link);

        $this->assertEquals('http://localhost/login', $crawler->getUri());
    }

    public function testLoginLogoutAdmin(): void
    {
        $client = static::createClient();
        
        $client->followRedirects(true);

        $crawler = $client->request('GET', '/login');
        
        $form = $crawler->filter('#sign-in')->form([
            'email' => 'nuria.villaronga@gmail.com',
            'password' => 'nuria'
        ]);
        
        $crawler = $client->submit($form);
        
        $this->assertEquals('http://localhost/', $crawler->getUri());

        $link = $crawler->filter('#logout')->link();
        $crawler = $client->click($link);

        $this->assertEquals('http://localhost/login', $crawler->getUri());
    }
    
    public function testLoginNoUser(): void
    {
        $client = static::createClient();
        
        $client->followRedirects(true);

        $crawler = $client->request('GET', '/login');
        
        $form = $crawler->filter('#sign-in')->form([
            'email' => 'no.user@gmail.com',
            'password' => 'nouser'
        ]);
        
        $crawler = $client->submit($form);
        
        $this->assertNotEquals('http://localhost/', $crawler->getUri());
    }

    public function testLetRedirect_Admin(): void
    {
        $client = static::createClient();
        
        $client->followRedirects(true);

        $crawler = $client->request('GET', '/login');

        $link = $crawler->filter('#list')->link();
        $crawler = $client->click($link);
        
        $form = $crawler->filter('#sign-in')->form([
            'email' => 'nuria.villaronga@gmail.com',
            'password' => 'nuria'
        ]);
        
        $crawler = $client->submit($form);

        $this->assertEquals('http://localhost/list', $crawler->getUri());
    }
    
    public function testLetRedirect_Admin_2(): void
    {
        $client = static::createClient();
        
        $client->followRedirects(true);

        $crawler = $client->request('GET', '/create');

        $form = $crawler->filter('#sign-in')->form([
            'email' => 'nuria.villaronga@gmail.com',
            'password' => 'nuria'
        ]);
        
        $crawler = $client->submit($form);

        $this->assertEquals('http://localhost/create', $crawler->getUri());
    }

    public function testLogoutFromLogin_form(): void
    {
        $client = static::createClient();
        
        $client->followRedirects(true);

        $crawler = $client->request('GET', '/login');

        $form = $crawler->filter('#sign-in')->form([
            'email' => 'dalila.villaronga@gmail.com',
            'password' => 'dalila'
        ]);
        
        $crawler = $client->submit($form);

        $crawler = $client->request('GET', '/login');

        //var_dump($crawler);

        $link = $crawler->filter('#logout')->link();
        $crawler = $client->click($link);

        $this->assertEquals('http://localhost/login', $crawler->getUri());
    }
}