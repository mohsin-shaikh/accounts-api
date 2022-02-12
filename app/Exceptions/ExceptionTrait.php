<?php

namespace App\Exceptions;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;
// use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

trait ExceptionTrait
{
    public function apiException($request, $e)
    {
        if ($this->isModel($e)) {
            return $this->ModelResponse($e);
        }

        if ($this->isHttp($e)) {
            return $this->HttpResponse($e);
        }

        if ($this->isAuthorized($e)) {
            return $this->AuthorizedResponse($e);
        }

        return parent::render($request, $e);
    }

    protected function isModel($e)
    {
        return $e instanceof ModelNotFoundException;
    }

    protected function isHttp($e)
    {
        return $e instanceof NotFoundHttpException;
    }

    protected function isAuthorized($e)
    {
        return $e instanceof AccessDeniedHttpException;
    }

    protected function ModelResponse($e)
    {
        return response()->json([
            'title' => 'Resource Not Found!',
            'errors' => $e->getMessage() ?: null,
            'status' => Response::HTTP_NOT_FOUND,
        ], Response::HTTP_NOT_FOUND);
    }

    protected function HttpResponse($e)
    {
        return response()->json([
            'title' => 'Not Found!',
            'errors' => $e->getMessage() ?: null,
            'status' => Response::HTTP_NOT_FOUND
        ], Response::HTTP_NOT_FOUND);
    }

    protected function AuthorizedResponse($e)
    {
        return response()->json([
            'title' => 'Access Denied!',
            'errors' => $e->getMessage() ?: null,
            'status' => Response::HTTP_FORBIDDEN,
        ], Response::HTTP_FORBIDDEN);
    }
}
