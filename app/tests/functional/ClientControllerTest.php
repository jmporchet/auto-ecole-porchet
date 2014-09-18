<?php

class ClientControllerTest extends TestCase
{
    public function test_displays_clients_page()
    {
        $this->call('GET', 'clients');
        $this->assertResponseOk();
    }

    public function test_displays_anniversaires_page()
    {
        $this->call('GET', 'clients/anniversaires');
        $this->assertResponseOk();
    }

}