<!-- API CRUD Functionality -->

In this i Create a Contoller which name is Productscontoller.

    - Inside controller all the api functioncality working 
        - Index
        - show
        - edit
        - update
        - delete

Also Create a Model which Name is Products.

    - In model i'll connect to table which name is products.



If you want to testing a API Firstly you have to finds all api using this command   <!-- php artisan route:list -->
then you will get all api route list.



After that you want to testing a api here is some url:

Data Fetch API URL
GET      http://127.0.0.1:8000/api/product/


Data Insert API URL
POST     http://127.0.0.1:8000/api/product/

Inside postman data insert formate like this.

        {
            "title": "last testing",
            "price": "4000",
            "description": "bythunderclient"
        }


Data Update API URL
PUT      http://127.0.0.1:8000/api/product/2/edit

Inside postman data updated formate like this.

        {
            "title": "New Entry",
            "price": "1600",
            "description": "bupostman"
        }



Data Delete API URL
DELETE    http://127.0.0.1:8000/api/product/2/delete