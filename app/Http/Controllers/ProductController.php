<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Reference;
use Symfony\Component\HttpFoundation\HeaderBag;


class ProductController extends Controller
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
        $page = \request()->query('page') !== null ? (int)\request()->query('page') : 1;
        $response = $this->client->get('https://api.bigcommerce.com/stores/a64wa5r7na/v3/catalog/products?direction=desc&sort=id&page=' . $page, ['headers' => $this->headers]);
        $products = $response->getBody()->getContents();
        $products = json_decode($products, true);
        $totalPages = $products['meta']['pagination']['total_pages'];
        $products = $products['data'];

        return view('Products.index', compact('products', 'totalPages'));
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
        return view('Products.create', compact('categories'));
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
                'sku' => 'required',
                'price' => 'required',
                'categories' => 'required|array',
                'weight' => 'required',
                'type' => 'required'
            ]);
            /* dd($validation);*/
            $validation['categories'] = array_map('intval', $validation['categories']);
            $response = $this->client->post('https://api.bigcommerce.com/stores/a64wa5r7na/v3/catalog/products', [
                'headers' => $this->headers,
                'json' => $validation
            ]);
            if ($response->getStatusCode() == 200) {
                return redirect()->route("products.index")->with("success", $response->getStatusCode());
            }
        } catch (\Exception $exception) {
            dd($exception);
            //return redirect()->route("products.index")->with("failed", $exception->getMessage());
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
     /*   dd($categories);*/

        $response = $this->client->get('https://api.bigcommerce.com/stores/a64wa5r7na/v3/catalog/products/' . $id, ['headers' => $this->headers]);
        $products = $response->getBody()->getContents();
        $products = json_decode($products, true);
        $products = $products['data'];
        return view('Products.edit', compact('products','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $validation = $request->validate([
            'name' => 'required',
            'sku' => 'required',
            'price' => 'required',
            'categories' => 'required|array',
            'weight' => 'required',
            'type' => 'required'
        ]);
        $validation['categories'] = array_map('intval', $validation['categories']);
        try {

            $response = $this->client->put('https://api.bigcommerce.com/stores/a64wa5r7na/v3/catalog/products/' . $id, [
                'headers' => $this->headers,
                'json' => $validation
            ]);


            if ($response->getStatusCode() == 200) {
                return redirect()->route("products.index")->with("success", $response->getStatusCode());
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
            $product_Id = $id;
            $response = $this->client->delete('https://api.bigcommerce.com/stores/a64wa5r7na/v3/catalog/products/' . $id, [
                'headers' => $this->headers,
                'json' => $product_Id
            ]);
            if ($response->getStatusCode() == 200) {
                return redirect()->route("products.index")->with("success", $response->getStatusCode());
            }
        } catch (\Exception $exception) {
            dd($exception);
            // return redirect()->route("products.index")->with("failed", $exception->getMessage());
        }
    }

}
