<?php

namespace Controllers;
use Core\_abstracts\Controller;
use Exception;
use Klein\Request;
use Klein\Response;
use Models\Posts;

class PostsController extends Controller
{
    public function index()
    {
        return $this->render('index',['posts' => Posts::select('*'), 'title' => 'Main']);
    }

    public function view(Request $request, Response $response)
    {
        $post = Posts::get('*', ['id'=> $request->param('id')]);

        if ($post === null) {
            return $response->code(404);
        }

        $this->render('post', ['post' => $post]);
    }

    public function create($request)
    {
        return $this->render('form', ['action' => 'create']);
    }

    public function insert(Request $request, Response $response)
    {
        $title = $request->param('title');
        $content = $request->param('content');
    
        return Posts::insert(['Title' => $title,
                       'Content' => $content]) ?
                       $response->redirect('/') :
                       $response->code(503);
    }


    public function update(Request $request, Response $response)
    {
        $id = $request->param('id');
        $title = $request->param('title');
        $content = $request->param('content');
    
        return Posts::update(['Title' => $title,
                       'Content' => $content], ['id' => $id]) ?
                       $response->redirect('/') :
                       $response->code(503);
    }

    public function edit($request, Response $response)
    {
        $post = Posts::get('*', ['id'=> $request->param('id')]);

        if ($post === null) {
            return $response->code(404);
        }

        return $this->render('form', ['action' => 'update',
                                      'post' => $post]);
    }

    public function delete()
    {
        
    }
}