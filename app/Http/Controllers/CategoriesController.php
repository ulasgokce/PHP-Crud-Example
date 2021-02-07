<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    private $client;
    private $headers;


    public function __construct()
    {
        $this->client = new Client();
        $this->headers = [
            'X-Auth-Token' => '23xucr3miy6qp1jt8dhytktzsjamk7x',
            'X-Auth-Client' => 'memytrvdrrsxp65ht3ihn5omg7bnbnz',
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {

        $response = $this->client->get('https://api.bigcommerce.com/stores/a64wa5r7na/v3/catalog/categories?direction=desc', ['headers' => $this->headers]);
        $categories = $response->getBody()->getContents();
        $categories = json_decode($categories, true);
        $categories = $categories['data'];
        return view('Categories.index', compact('categories'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $categoryResponse = $this->client->get('https://api.bigcommerce.com/stores/a64wa5r7na/v3/catalog/categories', ['headers' => $this->headers]);
        $categories = $categoryResponse->getBody()->getContents();
        $categories = json_decode($categories, true);
        $categories = $categories['data'];
        return view('Categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        try {
            $validation = $request->validate([
                'name' => 'required',
                'description' => 'required',
                'parent_id' => 'required'
            ]);
            $response = $this->client->post('https://api.bigcommerce.com/stores/a64wa5r7na/v3/catalog/categories', [
                'headers' => $this->headers,
                'json' => $validation
            ]);
            if ($response->getStatusCode() == 200) {
                return redirect()->route("categories.index")->with("success", $response->getStatusCode());
            }
        } catch (\Exception $exception) {
            dd($exception);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $categoryResponse = $this->client->get('https://api.bigcommerce.com/stores/a64wa5r7na/v3/catalog/categories', ['headers' => $this->headers]);
        $categories = $categoryResponse->getBody()->getContents();
        $categories = json_decode($categories, true);
        $categories = $categories['data'];

        $categoryResponse = $this->client->get('https://api.bigcommerce.com/stores/a64wa5r7na/v3/catalog/categories/' . $id, ['headers' => $this->headers]);
        $category = $categoryResponse->getBody()->getContents();
        $category = json_decode($category, true);
        $category = $category['data'];

        return view('categories.edit', compact('categories', 'category'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {

        $validation = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'parent_id' => 'required'
        ]);

        try {

            $response = $this->client->put('https://api.bigcommerce.com/stores/a64wa5r7na/v3/catalog/categories/' . $id, [
                'headers' => $this->headers,
                'json' => $validation
            ]);


            if ($response->getStatusCode() == 200) {
                return redirect()->route("categories.index")->with("success", $response->getStatusCode());
            }
        } catch (\Exception $exception) {
            dd($exception);
            // return redirect()->route("products.index")->with("failed", $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            $response = $this->client->delete('https://api.bigcommerce.com/stores/a64wa5r7na/v3/catalog/categories/' . $id, [
                'headers' => $this->headers,
                'json' => $id
            ]);
            if ($response->getStatusCode() == 200) {
                return redirect()->route("categories.index")->with("success", $response->getStatusCode());
            }
        } catch (\Exception $exception) {
            dd($exception);
            // return redirect()->route("products.index")->with("failed", $exception->getMessage());
        }
    }
}
