<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomepageControllerTest extends WebTestCase
{
    public function testHomepageUser(): void
    {
        $client = static::createClient();
        
        $client->followRedirects(true); //Cuando no lo utilizas no redirecciona bien!!

        $crawler = $client->request('GET', '/login');
        
        $form = $crawler->filter('#sign-in')->form([
            'email' => 'juana.villaronga@gmail.com',
            'password' => 'juana'
        ]);
        
        $crawler = $client->submit($form);

        $this->assertEquals('http://localhost/', $crawler->getUri()); 
        
        $link = $crawler->filter('#list')->link();
        $crawler = $client->click($link);

        $this->assertEquals('http://localhost/list', $crawler->getUri());
        
        $link = $crawler->filter('#createDisable')->link();
        $crawler = $client->click($link);

        $this->assertEquals('http://localhost/list#', $crawler->getUri());

        $link = $crawler->filter('#logout')->link();
        $crawler = $client->click($link);

        $this->assertEquals('http://localhost/login', $crawler->getUri());
    }

    public function testHomepageAdmin(): void
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

        $link = $crawler->filter('#list')->link();
        $crawler = $client->click($link);
        
        $this->assertEquals('http://localhost/list', $crawler->getUri());

        $link = $crawler->filter('#create')->link();
        $crawler = $client->click($link);

        $this->assertEquals('http://localhost/create', $crawler->getUri());

        $link = $crawler->filter('#logout')->link();
        $crawler = $client->click($link);

        $this->assertEquals('http://localhost/login', $crawler->getUri());
    }
}