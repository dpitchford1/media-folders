<?php
namespace MediaFolders\Tests\Unit\Database;

use PHPUnit\Framework\TestCase;
use MediaFolders\Database\Folder;

class FolderTest extends TestCase
{
    private $folder;

    protected function setUp(): void
    {
        parent::setUp();
        $this->folder = new Folder();
    }

    public function test_create_folder()
    {
        // Test folder creation
        $data = [
            'name' => 'Test Folder',
            'parent_id' => 0
        ];
        
        $result = $this->folder->create($data);
        $this->assertIsInt($result);
        $this->assertGreaterThan(0, $result);
    }

    public function test_get_folder()
    {
        // Test retrieving a folder
        $folder = $this->folder->get(1);
        $this->assertIsArray($folder);
        $this->assertArrayHasKey('name', $folder);
    }
}