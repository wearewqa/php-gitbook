<?php

namespace WQA\Gitbook\Tests;

use Dotenv\Dotenv;
use WQA\Gitbook\Models\User;
use WQA\Gitbook\SpaceClient;
use WQA\Gitbook\Models\Space;
use WQA\Gitbook\GitbookClient;
use PHPUnit\Framework\TestCase;

class GitbookClientTest extends TestCase
{
    protected $secretKey;
    protected $client;

    protected function setUp(): void
    {
        parent::setUp();

        $dotenv = Dotenv::createImmutable(__DIR__ . '/../');
        $dotenv->load();

        $this->secretKey = $_ENV['GITBOOK_SECRET'];
        $this->client = new GitbookClient($this->secretKey);
    }

    public function test_can_make_client()
    {
        $this->assertInstanceOf(GitbookClient::class, $this->client);
    }

    public function test_can_get_current_user()
    {
        $this->assertInstanceOf(User::class, $this->client->getCurrentUser());
    }

    public function test_can_get_user()
    {
        $this->assertInstanceOf(User::class, $this->client->getUser('73tH0MyJh3d5KQqzia3IK7T37gV2'));
    }

    public function test_get_user_returns_null_if_invalid_id_provided()
    {
        $this->assertNull($this->client->getUser('invalid_id'));
    }

    public function test_can_get_spaces()
    {
        $spaces = $this->client->getSpaces();
        $this->assertIsArray($spaces);
        $this->assertInstanceOf(Space::class, $spaces[0]);
    }

    public function test_can_get_spaces_for_specific_user()
    {
        $this->markTestSkipped('This does not work due to a bug in the response from GB.');

        $spaces = $this->client->getSpacesFor('73tH0MyJh3d5KQqzia3IK7T37gV2');
        $this->assertIsArray($spaces);
        $this->assertInstanceOf(Space::class, $spaces[0]);
    }

    public function test_can_get_space_client()
    {
        $this->assertInstanceOf(SpaceClient::class, $this->client->space('dummy-space-uid'));
    }
}
