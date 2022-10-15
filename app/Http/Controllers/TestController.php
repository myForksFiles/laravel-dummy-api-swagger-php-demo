<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TestController extends Controller
{
    protected function generateArray(int $rows, int $cols): array
    {
        $rows = ($rows) ? $rows : 10;
        $cols = ($cols) ? $cols : 10;
        $_i = 0;
        $results = [];
        do {
            $_i++;
            foreach (range(0, $cols) as $_j) {
                $results[$_i][$_j] = md5(uniqid(null, false));
            }
        } while ($_i < $rows);

        return $results;
    }

    public function showEntry($id)
    {
        $this->response(['status' => 'show'], Response::HTTP_OK);
    }

    public function newEntry(Request $request)
    {
        $this->response(['status' => 'created'], Response::HTTP_CREATED);
    }

    public function updateEntry(int $id, Request $request)
    {
        $this->response(['status' => 'updated'], Response::HTTP_ACCEPTED);
    }

    public function whereCanIfind(int $id)
    {
        return [
            'https://stackoverflow.com',
            'https://lmgtfy.com',
            'https://DuckDuckGo.com',
            'https://google.com',
        ];
    }

    public function l33t()
    {
        return 'Why is the number 10 afraid of seven?' . PHP_EOL . 'Because seven ate nine, and 10 is next.';
    }

    public function b008s()
    {
    }

    public function justReturn()
    {
        return 'face:b00c';
    }

    public function christmass()
    {
        $data = ['Oct 31', 'Dec 25'];

        return $data[0] . ' = ' . $data[1];
    }
}
