<?php

namespace Tests\Feature;

use App\Models\Kategori;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_store_produk_allows_valid_category_reference(): void
    {
        $user = User::factory()->create();
        $kategori = Kategori::create([
            'nama_kategori' => 'Elektronik',
        ]);

        $response = $this->actingAs($user)->postJson('/api/produk', [
            'nama_barang' => 'Laptop ASUS',
            'harga_barang' => 12000000,
            'deskripsi' => 'Laptop untuk kerja dan belajar',
            'stok' => 5,
            'id_kategori' => $kategori->id,
        ]);

        $response->assertStatus(201)
            ->assertJsonPath('data.id_kategori', $kategori->id)
            ->assertJsonPath('data.nama_barang', 'Laptop ASUS');
    }
}
