<?php namespace App\Filters;
 
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
 
class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // prevent guest and user to open admin pages
        // not logged in
        if(!session()->get('login') ){
            return redirect()->to(base_url() . 'login'); 
            // if user
        } else if (session()->get('level') == 2) {
            return redirect()->to(base_url() . 'profile'); 
        }



    }
 
    //--------------------------------------------------------------------
 
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        
    }
}