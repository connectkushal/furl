<?php

namespace Connectkushal\Furl;

class CurlBuilder
{
    public $headers = [];
    public $method;
    public $data=[];
    public $baseUrl;
    public $route;
    public $url;
    public $curlCommand;

    /* $body = []; */

    public function build()
    {
        $curl = 'curl ';

        $method = $this->curlMethod();

        $headers = $this->curlHeaders();

        $data = $this->curlData();

        $url = $this->curlUrl();

        $cmd = $curl.$method.$headers.$data.$url;

        /* dd($cmd); */
        $this->curlCommand = $cmd;

        return $cmd;
    }

    public function bearer($token)
    {
        $this->headers['Authorization'] = "Bearer ".$token;

        return $this;
    }

    public function contentType($type)
    {
        $this->headers['Content-Type'] = $type;

        return $this;
    }

    public function json($setJson=true)
    {
        if ($setJson) {
            $this->contentType('application/json');
        }

        return $this;
    }

    public function header($name, $value)
    {
        $this->header[$name] = $value;

        return $this;
    }

    public function curlHeaders()
    {
        $this->header['Content-Type'] = $this->header['Content-Type'] ?? 'application/json';

        $curl_headers = "";

        foreach ($this->headers as $foo=>$bar) {
            $curl_headers=$curl_headers."-H \"".$foo.": ".$bar."\" " ;
        }

        return $curl_headers;
    }

    public function curlMethod()
    {
        $this->method = $this->method ?? 'GET';

        return "-X ".$this->method." ";
    }

    public function get()
    {
        $this->method='GET';

        return $this;
    }

    public function post()
    {
        $this->method='POST';

        return $this;
    }

    public function delete()
    {
        $this->method='DELETE';

        return $this;
    }

    public function curlData()
    {
        //$data_array['name'] = 'some_name';

        $curl_data = "";

        if (!empty($this->data)) {
            $data_json = json_encode($this->data);

            $curl_data = "-d '".$data_json."' ";
        }

        return $curl_data;
    }

    public function data($data_array)
    {
        $this->data = $data_array;

        return $this;
    }

    public function baseUrl($baseUrl)
    {
        $this->baseUrl = $baseUrl;

        return $this;
    }

    public function route($route)
    {
        $this->route = $route;

        return $this;
    }

    public function url($url)
    {
        $this->url = $url;

        return $this;
    }

    public function curlUrl()
    {
        if (!$this->url && $this->baseUrl && $this->route) {
            $this->url = $this->baseUrl.$this->route;
        }

        //dd($this->url);
        return $this->url;
    }
}
