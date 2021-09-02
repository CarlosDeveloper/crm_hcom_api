composer install

composer require tymon/jwt-auth
php artisan jwt:secret
php artisan db:seed --class=UserSeeder

Configuracion para el envío de correos
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=0e3e70fdd1d9ac
MAIL_PASSWORD=70364debd48795
MAIL_ENCRYPTION=tls

#Endpoints API
#data 
{
   "name": "Compañia Prueba",
   "email": "prueba@prueba.com",
   "logo": "",
   "website": "www.paginaweb.com"
}


#Endpoint to get all companies
#GET
crm_hcom_api.local:85/api/companies


#Endpoint to create new company
#POST, and data
crm_hcom_api.local:85/api/companies

#Endpoint to update a company
#PUT, and data
crm_hcom_api.local:85/api/companies/1


#Endpoint to delete a company
#DELETE
crm_hcom_api.local:85/api/companies/1

________________________________________________________
________________________________________________________
#Endpoint to get all employees
#data 
{
   "first_name": "Hector Carlos",
   "last_name": "Oseguera",
   "company_id": 1,
   "email": "prueba@prueba.com",
   "phone": "4521066732"
}

#GET
crm_hcom_api.local:85/api/employees


#Endpoint to create new employee
#POST, and data
crm_hcom_api.local:85/api/employees

#Endpoint to update a employee
#PUT, and data
crm_hcom_api.local:85/api/employees/1


#Endpoint to delete a employee
#DELETE
crm_hcom_api.local:85/api/employees/1

______________________________________________________
______________________________________________________
#auth Endpoints
#data 
{
   "email": "admin@admin.com",
   "password": "password"
}

#For register
#POST
crm_hcom_api.local:85/api/auth/login

#For logout
#POST
crm_hcom_api.local:85/api/auth/logout
