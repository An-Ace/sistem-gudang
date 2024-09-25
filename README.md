# SISTEM GUDANG
## Test From ID-GROW
### Use Stack
- **Laravel 11 as Backend Framework API**
- **Vue JS as Frontend Framework**
- **Postgres as DBMS**
- **Tailwind as CSS Utility**
- **Prime UI as Frontend UI**
- **Docker Container**
- **Nginx**

## Installations
- **Clone this repository**
- **Run `docker-compose build`**
- **Run `docker-compose up -d`**
- **Run `docker exec app-be-nasrulloh php artisan migrate --seed`**
- **Open In Brower Or Click -> ['localhost:8000'](http://localhost:8000)**
- **You can Register an Account On: -> ['localhost:8000/signup'](http://localhost:8000/signup)**


## Backend Tests
- ~~Open Postman ['Click Here'](https://www.postman.com/satellite-specialist-33117715/workspace/test-muhammad-nasrulloh/collection/30824227-9ba35438-add0-4211-ad95-e8c7a81192bc?action=share&creator=30824227)~~ ***(Issue: can’t send requests to the Localhost)**
- **Open Here:** [<img src="https://run.pstmn.io/button.svg" alt="Run In Postman" style="width: 128px; height: 32px;">](https://god.gw.postman.com/run-collection/30824227-9ba35438-add0-4211-ad95-e8c7a81192bc?action=collection%2Ffork&source=rip_markdown&collection-url=entityId%3D30824227-9ba35438-add0-4211-ad95-e8c7a81192bc%26entityType%3Dcollection%26workspaceId%3D4a395420-f9e6-402f-8703-810890b1988d) **And Choose <u>import a copy</u>**
- **SignUp Account on Auth Tab**
- **For Example:**
  - **Name:** `Example`
  - **Email:** `example@demo.com`
  - **Password:** `password`
  - **Confirm Password:** `password`
- **Copy Token from the response (data.token) ex: "1|ec6SeOEog8omnjSsaWWEA9JsFQIkQB80e4UBKkYDf68187eb"**
- **Paste to env Tab -> variable: bearerToken**
  - **Ex: "Bearer 1|ec6SeOEog8omnjSsaWWEA9JsFQIkQB80e4UBKkYDf68187eb"**
- **After Login, You Can Get token API**