<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

// use App\Http\Controllers\HomeController;

class HomeControllerTest extends TestCase
{
    
    protected $instance;

    public function testIndex() {

        $this->instance = $this->getMockBuilder('App\Http\Controllers\HomeController')
            ->disableOriginalConstructor()
            ->setMethods(['view'])
            ->getMock();

        $viewMock = $this->getMockBuilder('Illuminate\View\View')
            ->disableOriginalConstructor()
            ->setMethods(['with'])
            ->getMock();

        $viewMock->expects($this->at(3))
            ->method('with')
            ->with('totalDislikes', 200)
            ->will($this->returnValue($viewMock));

        $viewMock->expects($this->at(2))
            ->method('with')
            ->with('totalLikes', 100)
            ->will($this->returnValue($viewMock));

        $viewMock->expects($this->at(1))
            ->method('with')
            ->with('logoutUrl', '/authorization/logout')
            ->will($this->returnValue($viewMock));

        $viewMock->expects($this->at(0))
            ->method('with')
            ->with('actionUrl', '/home/action')
            ->will($this->returnValue($viewMock));

        $this->instance->expects($this->once())
            ->method('view')
            ->with('home')
            ->will($this->returnValue($viewMock));

        $this->instance->index();
        
    }

}
