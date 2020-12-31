# Simple blog Engine with laravel #


installation guide :  
**git clone https://github.com/Armanjafari/blog**  
**cd blog**  
**composer install**    
**composer require laravel/ui**   
# **Setup env file and database then run :**  
**php artisan migrate**  
**php artisan db:seed**    

# Note  #
this project isnt work for you becuse Laravel authentication controller had changes and you should put this on **view** function in the auth controllers :  
  
**cats = Categories::all();**  
**view ('viewfile', ['cats' => $cats])**  
