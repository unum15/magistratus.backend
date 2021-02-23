<?php

use App\Person;

class PersonControllerTest extends TestCase
{

    public function testIndex()
    {
        $items = Person::factory(2)->create();
        $response = $this->actingAs($this->getAdminUser())->get('/people');
        $response->seeStatusCode(200);
        $response->seeJson($items[0]->toArray());
        $response->seeJson($items[1]->toArray());
    }    
    
    public function testCreate()
    {
        $user = $this->getAdminUser();
        $item = Person::factory(['creator_id'=>$user->id,'updater_id'=>$user->id])->make();
        $response = $this->actingAs($user)->post('/person', $item->toArray());
        $response->seeStatusCode(201);
        $response->seeJson($item->toArray());
        $this->seeInDatabase('people', $item->toArray());
    }
    
    public function testRead()
    {
        $item = Person::factory()->create();
        $response = $this->actingAs($this->getAdminUser())->get('/person/' . $item->id);
        $response->seeStatusCode(200);
        $response->seeJsonEquals(['data' => $item->toArray()]);
        $this->seeInDatabase('people', $item->toArray());
    }
    
    public function testUpdate()
    {
        $item = Person::factory()->create();
        $update = ['name' => 'test'];
        $response = $this->actingAs($this->getAdminUser())->patch('/person/' . $item->id, $update);
        $response->seeStatusCode(200);
        $item = $item->find($item->id);
        $updated_array = array_merge($item->toArray(), $update);
        $response->seeJsonEquals(['data' => $updated_array]);
        $this->seeInDatabase('people', $updated_array);
    }
    
    public function testDelete()
    {
        $item = Person::factory()->create();
        $response = $this->actingAs($this->getAdminUser())->delete('/person/' . $item->id);
        $response->seeStatusCode(204);
        $this->notSeeInDatabase('people', $item->toArray());
    }
}

