# Php Turnstile Serverside Validation

## Installation And Usage

```bash
git clone https://github.com/lukkshh/php-turnstile.git
```

then copy **src/Turnstile.php** into your project folder

There Are Two Functions **exec()** and **f_response()**

- Turnslite() Gets Two Argument (SECRET_KEY , CF_TOKEN)
- _exec()_ function returns True or False
- _f_response()_ returns full response

#### **HTLM** _put this in your html form_

```html
<div class="cf-turnstile" data-sitekey="YOUR_PUBLIC_SITE_KEY" required></div>
```

#### **exec()** _example:_

```php

require_once './Turnslite.php';

$secret = "YOUR_PRIVATE_SITE_KEY"
$cf_token = $_POST["cf-turnstile-response"];

$captcha = new Turnslite($secret , $cf_token);

$result = $captcha->exec();

if ($result == true){
    // your logic on success
} elseif ($result == false){
    // your logic on faliure
}


```

#### **f_response()** _example:_

```php

require_once './Turnslite.php';

$secret = "YOUR_PRIVATE_SITE_KEY"
$cf_token = $_POST["cf-turnstile-response"];

$captcha = new Turnslite($secret , $cf_token);

$result = $captcha->f_response();

print_r($result);

```
