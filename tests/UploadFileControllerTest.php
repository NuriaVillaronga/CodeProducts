<?php

namespace App\Tests;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Panther\PantherTestCase;

class UploadFileControllerTest extends PantherTestCase
{
    public function testUploadFile_Admin(): void
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
        
        $link = $crawler->filter('#upload-2')->link(); 
        $client->click($link);

        $this->assertEquals('http://127.0.0.1:9080/upload/1', $client->getCurrentURL());

        $uploadedFile = new UploadedFile(
            __DIR__.'/onixTest/grupo_planeta_20210330234509_1.onix',
            'grupo_planeta_20210330234509_1.onix'
        );

        /*
        $client->clickLink('Examinar'); --> Probar con $forms individuales

        $this->assertEquals('http://127.0.0.1:9080/view/1', $client->getCurrentURL());
        */
    }

    public function testUploadFileUser_Admin(): void
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
        
        $link = $crawler->filter('#upload-3')->link(); 
        $client->click($link);

        $this->assertEquals('http://127.0.0.1:9080/upload/5', $client->getCurrentURL());

        $uploadedFile = new UploadedFile(
            __DIR__.'/onixTest/grupo_planeta_20210330234509_1.onix',
            'grupo_planeta_20210330234509_1.onix'
        );

        /*
        $client->submitForm('Upload', [
            'form[catalog]' =>  'Tipo1',
            'form[files]' => $uploadedFile->getFilename()
        ]);

        $this->assertEquals('http://127.0.0.1:9080/view/1', $client->getCurrentURL());
        */
    }

    public function testUploadFileUser_Admin_Redirect(): void
    {
        $client = static::createPantherClient();
        
        $client->followRedirects(true);

        $client->clickLink('Logout');
        
        $client->request('GET', '/upload/5'); 

        $client->submitForm('Sign in', [
            'email' => 'nuria.villaronga@gmail.com',
            'password' => 'nuria',
        ]);

        $this->assertEquals('http://127.0.0.1:9080/upload/5', $client->getCurrentURL());

        $uploadedFile = new UploadedFile(
            __DIR__.'/onixTest/grupo_planeta_20210330234509_1.onix',
            'grupo_planeta_20210330234509_1.onix'
        );

        /*
        $client->submitForm('Upload', [
            'form[catalog]' =>  'Tipo1',
            'form[files]' => $uploadedFile->getFilename()
        ]);

        $this->assertEquals('http://127.0.0.1:9080/view/1', $client->getCurrentURL());
        */
    }
 
    public function testUploadFile_UserAutenticated(): void
    {
        $client = static::createPantherClient();
        
        $client->followRedirects(true);
        
        $client->request('GET', '/login'); 

        $client->submitForm('Sign in', [
            'email' => 'juana.villaronga@gmail.com',
            'password' => 'juana',
        ]);

        $client->clickLink('Users List');
        
        $client->clickLink('upload');

        $this->assertEquals('http://127.0.0.1:9080/upload/3', $client->getCurrentURL());

        $uploadedFile = new UploadedFile(
            __DIR__.'/onixTest/grupo_planeta_20210330234509_1.onix',
            'grupo_planeta_20210330234509_1.onix'
        );

        /*
        $client->submitForm('Upload', [
            'form[catalog]' =>  'Tipo1',
            'form[files]' => $uploadedFile->getFilename()
        ]);

        $this->assertEquals('http://127.0.0.1:9080/view/1', $client->getCurrentURL());
        */
    }

    public function testUploadFile_UserAutenticated_CorrectRedirect(): void
    {
        $client = static::createPantherClient();
        
        $client->followRedirects(true);

        $client->clickLink('Logout');
        
        $client->request('GET', '/upload/4'); 

        $client->submitForm('Sign in', [
            'email' => 'dalila.villaronga@gmail.com',
            'password' => 'dalila',
        ]);

        $this->assertEquals('http://127.0.0.1:9080/upload/4', $client->getCurrentURL());

        $uploadedFile = new UploadedFile(
            __DIR__.'/onixTest/grupo_planeta_20210330234509_1.onix',
            'grupo_planeta_20210330234509_1.onix'
        );

        /*
        $client->submitForm('Upload', [
            'form[catalog]' =>  'Tipo1',
            'form[files]' => $uploadedFile->getFilename()
        ]);

        $this->assertEquals('http://127.0.0.1:9080/view/1', $client->getCurrentURL());
        */
    }

    public function testUploadFile_UserAutenticated_InorrectRedirect(): void
    {
        $client = static::createPantherClient();
        
        $client->followRedirects(true);

        $client->clickLink('Logout');
        
        $client->request('GET', '/upload/6'); 

        $client->submitForm('Sign in', [
            'email' => 'juana.villaronga@gmail.com',
            'password' => 'juana',
        ]);

        $this->assertEquals('http://127.0.0.1:9080/homepage', $client->getCurrentURL());

        $uploadedFile = new UploadedFile(
            __DIR__.'/onixTest/grupo_planeta_20210330234509_1.onix',
            'grupo_planeta_20210330234509_1.onix'
        );

        /*
        $client->submitForm('Upload', [
            'form[catalog]' =>  'Tipo1',
            'form[files]' => $uploadedFile->getFilename()
        ]);

        $this->assertEquals('http://127.0.0.1:9080/view/1', $client->getCurrentURL());
        */
    }

    public function testUploadFile_UserNoAutenticated(): void
    {
        $client = static::createPantherClient();
        
        $client->followRedirects(true);
         
        $client->clickLink('Logout');
        
        $client->request('GET', '/upload/6'); 

        $client->submitForm('Sign in', [
            'email' => 'xura.villaronga@gmail.com',
            'password' => 'xura',
        ]);

        $this->assertEquals('http://127.0.0.1:9080/login', $client->getCurrentURL());
    }

    public function testUploadNoOnixFile_UserAutenticated(): void
    {
        $client = static::createPantherClient();
        
        $client->followRedirects(true);
        
        $client->request('GET', '/login'); 

        $client->submitForm('Sign in', [
            'email' => 'juana.villaronga@gmail.com',
            'password' => 'juana',
        ]);

        $client->clickLink('Users List');
        
        $client->clickLink('upload');

        $this->assertEquals('http://127.0.0.1:9080/upload/3', $client->getCurrentURL());

        $uploadedFile = new UploadedFile(
            __DIR__.'/onixTest/bootstrap-4.0.0-dist.zip',
            'bootstrap-4.0.0-dist.zip'
        );

        /*
        $client->submitForm('Upload', [
            'form[catalog]' =>  'Tipo1',
            'form[files]' => $uploadedFile->getFilename()
        ]);

        $this->assertEquals('http://127.0.0.1:9080/view/1', $client->getCurrentURL());
        */
    }
}
