## Cash Book API (Accounting)

Cash Book API is a RESTful API for accounting.

### Endpoints

| Method       | Endpoint                                                | Description              |
| ------------ | ------------------------------------------------------- | ------------------------ |
| `POST`       | `api/auth/login`                                        | Login                    |
| `POST`       | `api/auth/logout`                                       | Logout                   |
| `GET\|HEAD`  | `api/auth/me`                                           | Me/Profile               |
| `POST`       | `api/auth/register`                                     | Register new user        |
| `GET\|HEAD`  | `api/books`                                             | Get All Books            |
| `POST`       | `api/books`                                             | Create New Book          |
| `GET\|HEAD`  | `api/books/{book}`                                      | Get Book                 |
| `PUT\|PATCH` | `api/books/{book}`                                      | Update Existing Book     |
| `DELETE`     | `api/books/{book}`                                      | Delete Existing Book     |
| `GET\|HEAD`  | `api/books/{book}/customers`                            | Get All Customers        |
| `POST`       | `api/books/{book}/customers`                            | Create New Customer      |
| `GET\|HEAD`  | `api/books/{book}/customers/{customer}`                 | Get Customer             |
| `PUT\|PATCH` | `api/books/{book}/customers/{customer}`                 | Update Existing Customer |
| `DELETE`     | `api/books/{book}/customers/{customer}`                 | Delete Existing Customer |
| `GET\|HEAD`  | `api/books/{book}/customers/{customer}/entries`         | Get All Entries          |
| `POST`       | `api/books/{book}/customers/{customer}/entries`         | Create New Entry         |
| `GET\|HEAD`  | `api/books/{book}/customers/{customer}/entries/{entry}` | Get Entry                |
| `PUT\|PATCH` | `api/books/{book}/customers/{customer}/entries/{entry}` | Update Existing Entry    |
| `DELETE`     | `api/books/{book}/customers/{customer}/entries/{entry}` | Delete Existing Entry    |

### HTTP Status

-   1XX Info
-   2XX Response Successfully
-   3XX Redirection
-   4XX Error Client
-   5XX Error Server

### License

MIT
