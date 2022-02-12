<?php

namespace App\Exceptions;

use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

trait APIExceptionTrait
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

        if ($this->isValidation($e)) {
            return $this->ValidationResponse($e);
        }

        if ($this->isRoute($e)) {
            return $this->RouteResponse($e);
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

    protected function isValidation($e)
    {
        return $e instanceof ValidationException;
    }

    protected function isRoute($e)
    {
        return $e instanceof RouteNotFoundException;
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

    protected function ValidationResponse($e)
    {
        return response()->json([
            'title' => 'Validation Error!',
            'errors' => $e->errors(),
            'status' => Response::HTTP_UNPROCESSABLE_ENTITY,
        ], Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    protected function RouteResponse($e)
    {
        return response()->json([
            'title' => 'Route Not Found!',
            'errors' => $e->getMessage() ?: null,
            'status' => Response::HTTP_NOT_FOUND,
        ], Response::HTTP_NOT_FOUND);
    }
}
