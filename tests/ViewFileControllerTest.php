<?php

namespace App\Tests;

use Symfony\Component\Panther\PantherTestCase;

class ViewFileControllerTest extends PantherTestCase
{
    public function testViewFiles_Admin(): void
    {
        $client = static::createPantherClient();
        
        $client->followRedirects(true);
        
        $client->request('GET', '/login'); 

        $client->submitForm('Sign in', [
            'email' => 'nuria.villaronga@gmail.com',
            'password' => 'nuria',
        ]);

        $client->clickLink('Users List');

        $crawler = $client->clickLink('2');
        
        $link = $crawler->filter('#view-2')->link(); 
        $client->click($link);

        $this->assertEquals('http://127.0.0.1:9080/view/1', $client->getCurrentURL());
    }
    
    public function testViewFilesUser_Admin(): void
    {
        $client = static::createPantherClient();
        
        $client->followRedirects(true);
        
        $client->request('GET', '/login'); 

        $client->submitForm('Sign in', [
            'email' => 'nuria.villaronga@gmail.com',
            'password' => 'nuria',
        ]);

        $client->clickLink('Users List');

        $crawler = $client->clickLink('1');
        
        $link = $crawler->filter('#view-3')->link(); 
        $client->click($link);

        $this->assertEquals('http://127.0.0.1:9080/view/5', $client->getCurrentURL());
    }

    public function testViewFilesUser_Admin_Redirect(): void
    {
        $client = static::createPantherClient();
        
        $client->followRedirects(true);

        $client->clickLink('Logout');
        
        $client->request('GET', '/view/2'); 

        $client->submitForm('Sign in', [
            'email' => 'nuria.villaronga@gmail.com',
            'password' => 'nuria',
        ]);

        $this->assertEquals('http://127.0.0.1:9080/view/2', $client->getCurrentURL());
    }

    public function testViewFiles_UserAutenticated(): void
    {
        $client = static::createPantherClient();
        
        $client->followRedirects(true);
        
        $client->request('GET', '/login'); 

        $client->submitForm('Sign in', [
            'email' => 'juana.villaronga@gmail.com',
            'password' => 'juana',
        ]);

        $client->clickLink('Users List');
        
        $client->clickLink('view files');

        $this->assertEquals('http://127.0.0.1:9080/view/3', $client->getCurrentURL());
    }
    
    public function testViewFiles_UserAutenticated_CorrectRedirect(): void
    {
        $client = static::createPantherClient();
        
        $client->followRedirects(true);

        $client->clickLink('Logout');
        
        $client->request('GET', '/view/4'); 

        $client->submitForm('Sign in', [
            'email' => 'dalila.villaronga@gmail.com',
            'password' => 'dalila',
        ]);

        $this->assertEquals('http://127.0.0.1:9080/view/4', $client->getCurrentURL());
    }

    public function testViewFiles_UserAutenticated_IncorrectRedirect(): void
    {
        $client = static::createPantherClient();
        
        $client->followRedirects(true);

        $client->clickLink('Logout');
        
        $client->request('GET', '/view/7'); 

        $client->submitForm('Sign in', [
            'email' => 'dalila.villaronga@gmail.com',
            'password' => 'dalila',
        ]);

        $this->assertEquals('http://127.0.0.1:9080/homepage', $client->getCurrentURL());
    }

    public function testViewFiles_UserNoAutenticated(): void
    {
        $client = static::createPantherClient();
        
        $client->followRedirects(true);
        
        $client->clickLink('Logout');
        
        $client->request('GET', '/view/6'); 

        $client->submitForm('Sign in', [
            'email' => 'xura.villaronga@gmail.com',
            'password' => 'xura',
        ]);

        $this->assertEquals('http://127.0.0.1:9080/login', $client->getCurrentURL());
    }
}
