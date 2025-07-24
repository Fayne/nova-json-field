<?php

namespace MobileNowGroup\NovaJsonField\Tests;

use MobileNowGroup\NovaJsonField\Json;

class JsonFieldTest extends TestCase
{
    /** @test */
    public function it_can_create_json_field()
    {
        $field = Json::make('Settings');
        
        $this->assertInstanceOf(Json::class, $field);
        $this->assertEquals('Settings', $field->name);
    }

    /** @test */
    public function it_can_set_attribute()
    {
        $field = Json::make('Settings', 'settings_data');
        
        $this->assertEquals('settings_data', $field->attribute);
    }

    /** @test */
    public function it_has_correct_component()
    {
        $field = Json::make('Settings');
        
        $this->assertEquals('nova-json-field', $field->component);
    }
}