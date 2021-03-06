![alt text](https://i.imgur.com/aUpMns5.jpg)

## About 

Heimdall is a way to organise all those links to your most used web sites and web applications in a simple way.

Simplicity is the key to Heimdall.

Why not use it as your browser start page?  It even has the ability to include a search bar using either Google, Bing or DuckDuckGo.

## Video
If you want to see a quick video of it in use, go to https://drive.google.com/file/d/1cijXgmjem_q2OfKMp36qVuXRiyOzvhWC/view

## Installing

Apart from the Laravel dependencies, namely PHP >= 7.0.0, OpenSSL PHP Extension, PDO PHP Extension, Mbstring PHP Extension, Tokenizer PHP Extension and XML PHP Extension, the only other thing Heimdall needs is sqlite support.

Installation is as simple as cloning the repository somewhere, or downloading and extracting the zip/tar and pointing your httpd document root to it.  For simple testing you could just go to the folder and type `php artisan serve`

## Web Server Configuration

### Apache
A .htaccess file ships with the app, however, if it does not work with your Apache installation, try this alternative:

```
Options +FollowSymLinks
RewriteEngine On

RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^ index.php [L]
```

### Nginx
If you are using Nginx, the following directive in your site configuration will direct all requests to the index.php front controller:

```
location / {
    try_files $uri $uri/ /index.php?$query_string;
}
```
Someone was using the same nginx setup to both run this and reverse proxy Plex, Plex is served from /web so their location was interferring with the /webfonts.

Therefore, if your fonts aren't showing because you have a location for /web add the following
```
location /webfonts {
     try_files $uri $uri/;
}
```
If there are any other locations which might interefere with any of the folders in the /public folder, you might have to do the same for those as well, but it's a super fringe case.

## Credits
- PHP Framework - [Laravel](https://laravel.com/)
- Icons - [FonteAwesome 5](https://fontawesome.com/)
- Javascript - [jQuery](https://jquery.com/)
- Colour picker - [Huebee](http://huebee.buzz/)

## License

This app is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
