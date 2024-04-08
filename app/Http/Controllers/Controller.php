<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Psr\Http\Message\ServerRequestInterface;
 

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $request;
    protected $httpRequest;

    public function __construct(
        ServerRequestInterface $request,
        \Illuminate\Http\Request $httpRequest
    ) {
        $this->request = $request;
        $this->httpRequest = $httpRequest;
    }

    protected function getQueryParam($key, $default = null) {
        $queryParams = $this->request->getQueryParams();

        return ($queryParams[$key] ?? $default);
    }

    private function getDefaultValues($data) {
        $return = [
            'title' => config('app.defaultTitle')
        ];


        if(isset($data['results'])) {
            $currentPage = $this->getQueryParam('page', 1);

            $totalPages = ceil($data['results'] / $data['perPage']);

            $pagesBeforeAfter = $data['pagesBeforeAfter'] ?? 3;

            $basePaginationUrl = preg_replace('/[\?\&]page=[^\?\&]*/', '', url()->current());
            $basePaginationChar = (strpos($basePaginationUrl, '?') === false ? '?' : '&');
            
            $return += [
                'basePaginationUrl' => $basePaginationUrl,
                'basePaginationChar' => $basePaginationChar,
                'currentPage' => $currentPage,
                'totalPages' => $totalPages,
                'pagesBeforeAfter' => $pagesBeforeAfter
            ];
        }
        
        return $return;
    }

    public function view($view, $data = []) {
        $mainData = $data;
        $mainData += $this->getDefaultValues($data);

        return view($view, $mainData);
    }
}
