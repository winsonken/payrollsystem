<?php namespace App\Filters;
 
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
 
class HomeFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if(!session()->get('login')) {
            return redirect()->to(base_url() . 'login'); 
        } else if (session()->get('level') == 2) {
            return redirect()->to(base_url() . 'profile'); 
        } else if (session()->get('level') == 1) {
            return redirect()->to(base_url() . 'home'); 
        } 
        
    }
 
    //--------------------------------------------------------------------
 
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}