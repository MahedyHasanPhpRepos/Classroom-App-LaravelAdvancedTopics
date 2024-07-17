composer require laravel/breeze --dev
php artisan breeze:install
php artisan migrate
npm install
npm run dev

php artisan serve 

now we creating some users of different roles 

admin 
teacher
student

creating table for users/teacher , class_types/course name , scheduled_classes/time_for_the_class 


scheduled_classes table will manage which teacher , which course in which time 

one teacher can take many scheduled_classes so one to many relationship 
one course can be in many scheduled_classes so one to many relationship 



