Upload file to Amazon AWS S3 Bucket with Laravel
================================================

* ***Actions on the deployment of the project:***

- Making a new project aws-laravel_bitfumes.loc:

	sudo chmod -R 777 /var/www/LARAVEL/AWS/aws-laravel_bitfumes.loc

	//!!!! .conf
	sudo cp /etc/apache2/sites-available/test.loc.conf /etc/apache2/sites-available/aws-laravel_bitfumes.loc.conf
		
	sudo nano /etc/apache2/sites-available/aws-laravel_bitfumes.loc.conf

	sudo a2ensite aws-laravel_bitfumes.loc.conf

	sudo systemctl restart apache2

	sudo nano /etc/hosts

	cd /var/www/LARAVEL/AWS/aws-laravel_bitfumes.loc

- Deploy project:

	`git clone << >>`
	
	`or Download`
	
	_+ Сut the contents of the folder up one level and delete the empty one._

	`composer install`	

---

Bitfumes

[Upload file to Amazon AWS S3 Bucket with Laravel #1 (20:47)]( https://www.youtube.com/watch?v=nMDIVQsESBY&ab_channel=Bitfumes )

Amazon Web Service S3 Bucket file Upload with Laravel.

- Create IAM User with permissions.
- How to get aws s3 credentials
- How to upload file to aws s3 with laravel.

--You May Also Like --

Real-Time Chat Series - 
<https://goo.gl/ri42FD>

Git and Github series - 
<https://goo.gl/BXyPxf>

Blog with Admin panel Series - 
<https://goo.gl/S5JGyt>

Laravel Authentication Series: Multi Auth - 
<https://goo.gl/TyCLlX>

Vue Beginner To advanced Series - 
<https://goo.gl/1bjdGg>

Sublime Text Best Package Series - 
<https://goo.gl/6phTPP>

Laravel Ajax Todo Project - 
<https://goo.gl/p2xTPW>

Laravel 5.4 Full Beginner Playlist - 
<https://goo.gl/zpKzhM>

	composer create-project --prefer-dist laravel/laravel

[(3:15)]( https://youtu.be/nMDIVQsESBY?t=195 ) `AWS Management Console-> S3-> Create Bucket`.

	`bitfumes-laravel`

![screenshot of sample]( https://github.com/mslobodyanyuk/aws-laravel_bitfumes/blob/main/public/images/aws/1.png )

`Create Bucket`.

[(4:50)]( https://youtu.be/nMDIVQsESBY?t=290 ) `bitfumes-laravel`

![screenshot of sample]( https://github.com/mslobodyanyuk/aws-laravel_bitfumes/blob/main/public/images/aws/2.png )

[(5:00)]( https://youtu.be/nMDIVQsESBY?t=300 ) `Upload`.

![screenshot of sample]( https://github.com/mslobodyanyuk/aws-laravel_bitfumes/blob/main/public/images/aws/3.png )

[(5:20)]( https://youtu.be/nMDIVQsESBY?t=320 ) `Upload-> Permissions`.

![screenshot of sample]( https://github.com/mslobodyanyuk/aws-laravel_bitfumes/blob/main/public/images/aws/4.png )

`Upload`.

![screenshot of sample]( https://github.com/mslobodyanyuk/aws-laravel_bitfumes/blob/main/public/images/aws/5.png )

![screenshot of sample]( https://github.com/mslobodyanyuk/aws-laravel_bitfumes/blob/main/public/images/aws/6.png )

[(5:50)]( https://youtu.be/nMDIVQsESBY?t=350 ) `Open Link`.

![screenshot of sample]( https://github.com/mslobodyanyuk/aws-laravel_bitfumes/blob/main/public/images/firefox/1.png )

[(6:00)]( https://youtu.be/nMDIVQsESBY?t=360 ) `Change the Permissions`.

![screenshot of sample]( https://github.com/mslobodyanyuk/aws-laravel_bitfumes/blob/main/public/images/aws/7.png )

`Save changes`.

[(6:10)]( https://youtu.be/nMDIVQsESBY?t=370 ) `Open Link again`.

![screenshot of sample]( https://github.com/mslobodyanyuk/aws-laravel_bitfumes/blob/main/public/images/firefox/2.png )

[(6:30)]( https://youtu.be/nMDIVQsESBY?t=390 ) `Delete Uploaded file`.

`In Browser`:

	http://aws-laravel_bitfumes.loc/

![screenshot of sample]( https://github.com/mslobodyanyuk/aws-laravel_bitfumes/blob/main/public/images/firefox/3.png )


[(6:50)]( https://youtu.be/nMDIVQsESBY?t=410 ) `Create Authentication`.

	php artisan make:auth

_"- Got Error:"_	

![screenshot of sample]( https://github.com/mslobodyanyuk/aws-laravel_aschmelyun/blob/main/public/images/terminal/1.png )	

<https://stackoverflow.com/questions/68974362/php-artisan-makeauth-not-defined-in-laravel-8>

	composer require laravel/ui
	
	php artisan ui vue --auth

`Copy home.blade.php and Rename to fileUpload.blade.php`.

[(7:20)]( https://youtu.be/nMDIVQsESBY?t=440 ) `routes/web.php`.

```php
...
Route::get('/', function () {
    return view('fileUpload');
});
```

[(7:35)]( https://youtu.be/nMDIVQsESBY?t=455 ) `In Browser - Refresh(F5)`.

	http://aws-laravel_bitfumes.loc/

_"- Looks like Home Page"_

`Edit fileUpload.blade.php`.

![screenshot of sample]( https://github.com/mslobodyanyuk/aws-laravel_bitfumes/blob/main/public/images/firefox/4.png )

[(8:50)]( https://youtu.be/nMDIVQsESBY?t=530 ) `routes/web.php`.

```php
...
Route::post('upload', function () {
	dd(request()->file('file'));
})->name('upload');
```

[(9:40)]( https://youtu.be/nMDIVQsESBY?t=580 ) `Upload File`.

`In Browser`:

	http://aws-laravel_bitfumes.loc/

![screenshot of sample]( https://github.com/mslobodyanyuk/aws-laravel_bitfumes/blob/main/public/images/firefox/5.png )

`Edit fileUpload.blade.php`.

```html
...
<form action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
...
```

`Upload File again`.

![screenshot of sample]( https://github.com/mslobodyanyuk/aws-laravel_bitfumes/blob/main/public/images/firefox/6.png )

[(9:55)]( https://youtu.be/nMDIVQsESBY?t=555 ) `Upload File to AWS S3`.

`routes/web.php`.

```php
...
Route::post('upload', function () {

	request()->file('file')->store(
		'my-file',
		's3'
	);
	
})->name('upload');
```

_IF there is no in the `.env` we can Copy S3 details from the `config/filesystems.php` and Fill in our `.env`_
												
```
AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=eu-north-1
AWS_BUCKET=bitfumes-laravel
AWS_URL=http://`bucket`.s3-`aws-region`.amazonaws.com
```

[(11:10)]( https://youtu.be/nMDIVQsESBY?t=670 ) `IAM-> Users-> Add Users-> Add user`.

![screenshot of sample]( https://github.com/mslobodyanyuk/aws-laravel_bitfumes/blob/main/public/images/aws/8.png )

[(12:45)]( https://youtu.be/nMDIVQsESBY?t=765 )

![screenshot of sample]( https://github.com/mslobodyanyuk/aws-laravel_bitfumes/blob/main/public/images/aws/9.png )

`Next: Permissions`.

![screenshot of sample]( https://github.com/mslobodyanyuk/aws-laravel_bitfumes/blob/main/public/images/aws/10.png )

`Next: Tags`.

`Create User`.

[(13:10)]( https://youtu.be/nMDIVQsESBY?t=790 ) `Access key ID`, `Secret access key`. After leaving this window, the `Secret access key` is no longer shown in the system. 

![screenshot of sample]( https://github.com/mslobodyanyuk/aws-laravel_bitfumes/blob/main/public/images/aws/11.png )

- Access key ID
												
- Secret access key

[(14:05)]( https://youtu.be/nMDIVQsESBY?t=845 ) `Accessing a Bucket. How to Create URL`. 

http://`bucket`.s3-`aws-region`.amazonaws.com

Regions: 
<https://docs.aws.amazon.com/general/latest/gr/rande.html>

[(15:50)]( https://youtu.be/nMDIVQsESBY?t=950 ) `Upload File again`.

Error:
_"Class 'League\Flysystem\AwsS3v3\AwsS3Adapter' not found"_

	composer require league/flysystem-aws-s3-v3 
	
_"- Got Error:"_	

![screenshot of sample]( https://github.com/mslobodyanyuk/aws-laravel_bitfumes/blob/main/public/images/terminal/2.png )

	composer require league/flysystem-aws-s3-v3  ^1.0 -W	

[(17:10)]( https://youtu.be/nMDIVQsESBY?t=1030 ) `Upload File again`.

	sudo systemctl restart apache2

![screenshot of sample]( https://github.com/mslobodyanyuk/aws-laravel_bitfumes/blob/main/public/images/firefox/7.png )

[(17:25)]( https://youtu.be/nMDIVQsESBY?t=1045 )

![screenshot of sample]( https://github.com/mslobodyanyuk/aws-laravel_bitfumes/blob/main/public/images/aws/12.png )

[(17:45)]( https://youtu.be/nMDIVQsESBY?t=1065 ) 
_"Why not Delete this( `folder my-file` ) and try to `Upload` a `video file`."_

[(17:55)]( https://youtu.be/nMDIVQsESBY?t=1075 )

`routes/web.php`.

```php
...
Route::post('upload', function () {

	request()->file('file')->store(
		'my-file',
		's3'
	);
	
	return back();
	
})->name('upload');
```

[(18:00)]( https://youtu.be/nMDIVQsESBY?t=1080 ) `Upload video File`.

![screenshot of sample]( https://github.com/mslobodyanyuk/aws-laravel_bitfumes/blob/main/public/images/firefox/8.png )

Error:
_"Symfony\Component\Mime\Exception\InvalidArgumentException The "" file does not exist or is not readable."_

<https://stackoverflow.com/questions/52498582/the-file-does-not-exist>

`/etc/php/7.4/apache2/php.ini`:
						
```
...
upload_max_filesize=20M
...
post_max_size=20M
...
```

_Restart `Apache` after changes in `php.ini`_

	sudo systemctl restart apache2

[(18:35)]( https://youtu.be/nMDIVQsESBY?t=1115 )

![screenshot of sample]( https://github.com/mslobodyanyuk/aws-laravel_bitfumes/blob/main/public/images/aws/13.png )

![screenshot of sample]( https://github.com/mslobodyanyuk/aws-laravel_bitfumes/blob/main/public/images/aws/14.png )

`Open Link in a New Tab`.

![screenshot of sample]( https://github.com/mslobodyanyuk/aws-laravel_bitfumes/blob/main/public/images/firefox/9.png )

_"- Which this restricted."_

![screenshot of sample]( https://github.com/mslobodyanyuk/aws-laravel_bitfumes/blob/main/public/images/aws/15.png ) 

`Save changes`.

[(18:45)]( https://youtu.be/nMDIVQsESBY?t=1125 ) `Open Link in a New Tab once more`.

![screenshot of sample]( https://github.com/mslobodyanyuk/aws-laravel_bitfumes/blob/main/public/images/aws/14.png )

![screenshot of sample]( https://github.com/mslobodyanyuk/aws-laravel_bitfumes/blob/main/public/images/firefox/10.png )

#### Useful links:

Bitfumes

[Upload file to Amazon AWS S3 Bucket with Laravel #1]( https://www.youtube.com/watch?v=nMDIVQsESBY&ab_channel=Bitfumes )

---

<https://docs.aws.amazon.com/general/latest/gr/rande.html>

Possible Errors

<https://stackoverflow.com/questions/68974362/php-artisan-makeauth-not-defined-in-laravel-8>

<https://stackoverflow.com/questions/52498582/the-file-does-not-exist> 