## Khatabook API (Accounting)

Khatabook API is a RESTful API for accounting.

### Endpoints

| Method       | Endpoint                                                |
| ------------ | ------------------------------------------------------- |
| `POST`       | `api/auth/login`                                        |
| `POST`       | `api/auth/logout`                                       |
| `GET\|HEAD`  | `api/auth/me`                                           |
| `POST`       | `api/auth/register`                                     |
| `GET\|HEAD`  | `api/books`                                             |
| `POST`       | `api/books`                                             |
| `GET\|HEAD`  | `api/books/{book}`                                      |
| `PUT\|PATCH` | `api/books/{book}`                                      |
| `DELETE`     | `api/books/{book}`                                      |
| `GET\|HEAD`  | `api/books/{book}/customers`                            |
| `POST`       | `api/books/{book}/customers`                            |
| `GET\|HEAD`  | `api/books/{book}/customers/{customer}`                 |
| `PUT\|PATCH` | `api/books/{book}/customers/{customer}`                 |
| `DELETE`     | `api/books/{book}/customers/{customer}`                 |
| `GET\|HEAD`  | `api/books/{book}/customers/{customer}/entries`         |
| `POST`       | `api/books/{book}/customers/{customer}/entries`         |
| `GET\|HEAD`  | `api/books/{book}/customers/{customer}/entries/{entry}` |
| `PUT\|PATCH` | `api/books/{book}/customers/{customer}/entries/{entry}` |
| `DELETE`     | `api/books/{book}/customers/{customer}/entries/{entry}` |

### HTTP Status

-   1XX Info
-   2XX Response Successfully
-   3XX Redirection
-   4XX Error Client
-   5XX Error Server
