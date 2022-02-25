<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ListControllerTest extends WebTestCase
{    
    /*
    public function testUpdateOtherUser_FromNavBar(): void
    {
        $client = static::createClient();
        
        $client->followRedirects(true);

        $crawler = $client->request('GET', '/update/5');
        
        $form = $crawler->filter('#sign-in')->form([
            'email' => 'juana.villaronga@gmail.com',
            'password' => 'juana'
        ]);
        
        $crawler = $client->submit($form);

        $this->assertEquals('http://localhost/homepage', $crawler->getUri());
    }
    
    public function testDeleteUser_User(): void
    {
        $client = static::createClient();
        
        $client->followRedirects(true);
        
        $crawler = $client->request('GET', '/delete/6');
        
        $form = $crawler->filter('#sign-in')->form([
            'email' => 'juana.villaronga@gmail.com',
            'password' => 'juana'
        ]);
        
        $crawler = $client->submit($form);

        $this->assertEquals('http://localhost/homepage', $crawler->getUri());

    }

    public function testUpdateOtherUser_Admin_FromNavBar(): void
    {
        $client = static::createClient();
        
        $client->followRedirects(true);

        $crawler = $client->request('GET', '/update/3');
        
        $form = $crawler->filter('#sign-in')->form([
            'email' => 'nuria.villaronga@gmail.com',
            'password' => 'nuria'
        ]);
        
        $crawler = $client->submit($form);
        
        $this->assertEquals('http://localhost/update/3', $crawler->getUri());
    }
    
    public function testUpdateOtherUser_Admin_FromMenu(): void
    {
        $client = static::createClient();
        
        $client->followRedirects(true);

        $crawler = $client->request('GET', '/login');
        
        $form = $crawler->filter('#sign-in')->form([
            'email' => 'nuria.villaronga@gmail.com',
            'password' => 'nuria'
        ]);
        
        $crawler = $client->submit($form);
        
        $link = $crawler->filter('#list')->link();
        $crawler = $client->click($link);
        
        //Cuando está en la pagina 1 realmente no hace falta clicar en la página 1
        
        $link = $crawler->filter('#update-4')->link(); 
        $crawler = $client->click($link);
        
        $this->assertEquals('http://localhost/update/6', $crawler->getUri());
        
        //Debido a la paginación (que solo hay cuando el usuario es ADMIN), los indices van de ultimo a primero, es decir, que el ultimo
        //usuario que fue creado, será el que tenga el primer indice. Tengo creados 9 usuarios, por lo que para el usuario update/9, 
        //su loop.index será el 1
    }

    public function testUpdateSelf_Admin(): void
    {
        $client = static::createClient();
        
        $client->followRedirects(true);

        $crawler = $client->request('GET', '/login');
        
        $form = $crawler->filter('#sign-in')->form([
            'email' => 'nuria.villaronga@gmail.com',
            'password' => 'nuria'
        ]);
        
        $crawler = $client->submit($form);

        $link = $crawler->filter('#list')->link();
        $crawler = $client->click($link);
        
        //Clicar en una página
        $link = $crawler->filter('a:contains("2")')->link();
        $crawler = $client->click($link);
        
        $link = $crawler->filter('#update-4')->link();
        $crawler = $client->click($link);
        
        $this->assertEquals('http://localhost/update/1', $crawler->getUri());
    }

    public function testUpdateSelf_User(): void
    {
        $client = static::createClient();
        
        $client->followRedirects(true);

        $crawler = $client->request('GET', '/login');
        
        $form = $crawler->filter('#sign-in')->form([
            'email' => 'dalila.villaronga@gmail.com',
            'password' => 'dalila'
        ]);
        
        $crawler = $client->submit($form);

        $link = $crawler->filter('#list')->link();
        $crawler = $client->click($link);

        //Si no eres Admin, no necesitas clicar en las paginas, porque solo vas a poder actualizarte a ti mismo
        $link = $crawler->filter('#update')->link();
        $crawler = $client->click($link);

        $this->assertEquals('http://localhost/update/4', $crawler->getUri()); 
    }
    */
    
    public function testDelete_Admin(): void
    {
        $client = static::createClient();
        
        $client->followRedirects(true);

        $crawler = $client->request('GET', '/login');
        
        $form = $crawler->filter('#sign-in')->form([
            'email' => 'nuria.villaronga@gmail.com',
            'password' => 'nuria'
        ]);
        
        $crawler = $client->submit($form);

        $link = $crawler->filter('#list')->link();
        $crawler = $client->click($link);

        $link = $crawler->filter('#delete-2')->link(); //borrará a sofia.villaronga@gmail.com, que es la 8º usuaria.
        $crawler = $client->click($link);

        $this->assertEquals('http://localhost/list', $crawler->getUri());
    }

    public function testDeleteUser_Admin_FromNavBar(): void
    {
        $client = static::createClient();
        
        $client->followRedirects(true);
        
        $crawler = $client->request('GET', '/delete/6');
        
        $form = $crawler->filter('#sign-in')->form([
            'email' => 'nuria.villaronga@gmail.com',
            'password' => 'nuria'
        ]);
        
        $crawler = $client->submit($form);

        $this->assertEquals('http://localhost/list', $crawler->getUri());

    }
}