<?php


namespace App\Http\Api;


use Illuminate\Http\Response;

trait RestResponse
{
    public function ok($data = []) : Response
    {
        return $this->response($data,200);
    }

    public function created($data = []) : Response
    {
        return $this->response($data,201);
    }

    public function updated($data = []) : Response
    {
        return $this->response($data,204);
    }

    public function notFound($message = 'Not found', $data=[]) : Response
    {
        $this->error($data, 404);
    }

    public function unprocessable(array $data = []) : Response
    {
        return $this->error($data,422);
    }

    public function error(array $data, int $status) : Response
    {
        $payload = '';
        if($data){
            $payload = [
                'status' => $status,
                'error' => $data
            ];
        }
        return response($payload, $status);
    }

    public function response(array $data, int $status) : Response
    {
        return response($data,$status);
    }
}
