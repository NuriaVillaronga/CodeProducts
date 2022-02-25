<?php

namespace App\Tests;

use App\Entity\File;
use App\Entity\User;
use Symfony\Component\Panther\PantherTestCase;

class DeleteControllerTest extends PantherTestCase
{
    public function testNumUsers(): void
    {
        self::bootKernel();
        $container = static::getContainer();
        $entityManager = $container->get('doctrine')->getManager();
        $users = $entityManager->getRepository(User::class)->findBy(['isDeleted'=>true]);

        $this->assertEquals(4, count($users));
    }

    //Cambiar la X por un valor de fichero (cuando tenga ya los ficheros asignados)
    public function testNumFiles(): void
    {
        self::bootKernel();
        $container = static::getContainer();
        $entityManager = $container->get('doctrine')->getManager();
        $files = $entityManager->getRepository(File::class)->findAll();

        $this->assertEquals('X', count($files));
    }

    public function testDeleteFile_Admin(): void
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

        $link = $crawler->filter('#deleteFile-X')->link(); 
        $client->click($link);

        $this->assertEquals('http://127.0.0.1:9080/view/1', $client->getCurrentURL());
    }

    public function testDeleteFileUser_Admin(): void
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
        
        $link = $crawler->filter('#view-2')->link(); 
        $client->click($link);

        $link = $crawler->filter('#deleteFile-X')->link(); 
        $client->click($link);

        $this->assertEquals('http://127.0.0.1:9080/view/6', $client->getCurrentURL());
    }

    public function testDeleteFileUser_Admin_Redirect(): void
    {
        $client = static::createPantherClient();
        
        $client->followRedirects(true);

        $client->clickLink('Logout');
        
        $client->request('GET', '/delete/X/3'); 

        $client->submitForm('Sign in', [
            'email' => 'nuria.villaronga@gmail.com',
            'password' => 'nuria',
        ]);

        $this->assertEquals('http://127.0.0.1:9080/view/3', $client->getCurrentURL());
    }
    
    public function testDeleteFile_UserAutenticated(): void
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
        $client->clickLink('delete');

        $this->assertEquals('http://127.0.0.1:9080/view/3', $client->getCurrentURL());
    }

    public function testDeleteNoFiles_UserAutenticated(): void
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
        
        $this->assertSelectorTextContains('div', 'No files uploaded yet');
    }

    public function testDeleteFile_UserAutenticated_CorrectRedirect(): void
    {
        $client = static::createPantherClient();
        
        $client->followRedirects(true);

        $client->clickLink('Logout');
        
        $client->request('GET', '/delete/X/4'); 

        $client->submitForm('Sign in', [
            'email' => 'dalila.villaronga@gmail.com',
            'password' => 'dalila',
        ]);

        $this->assertEquals('http://127.0.0.1:9080/view/4', $client->getCurrentURL());
    }

    public function testDeleteFile_UserAutenticated_InorrectRedirect(): void
    {
        $client = static::createPantherClient();
        
        $client->followRedirects(true);

        $client->clickLink('Logout');
        
        $client->request('GET', '/delete/X/6'); 

        $client->submitForm('Sign in', [
            'email' => 'dalila.villaronga@gmail.com',
            'password' => 'dalila',
        ]);

        $this->assertEquals('http://127.0.0.1:9080/homepage', $client->getCurrentURL());
    }
    
}